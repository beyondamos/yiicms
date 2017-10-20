<?php
namespace app\tools;

class UploadFile
{
    //默认上传配置
    private $config = array(
        'mimes'         =>  array(), //允许上传的文件MiMe类型
        'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
        'exts'          =>  array('jpg','gif','png'), //允许上传的文件后缀
        'autoSub'       =>  true, //自动子目录保存文件
        'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath'      =>  './uploads/', //保存根路径
        'savePath'      =>  '', //保存路径
        'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
        'replace'       =>  false, //存在同名是否覆盖
        'hash'          =>  true, //是否生成hash编码
        'callback'      =>  false, //检测文件是否存在回调，如果存在返回文件信息数组
        'driver'        =>  '', // 文件上传驱动
        'driverConfig'  =>  array(), // 上传驱动配置
    );

    private $error = '';    //上传错误的信息

    /**
     * 构造方法
     * @param array $config 配置
     */
    public function __construct($config = array())
    {
        //读取配置
        $this->config = array_merge($this->config, $config);
        //调整配置,把字符串配置参数转为数组
        if (!empty($this->config['mimes'])) {
            if (is_string($this->mimes)) {
                $this->config['mimes'] = explode(',', $this->mimes);
            }
            $this->config['mimes'] = array_map('strtolower', $this->mimes);
        }

        if (!empty($this->config['exts'])) {
            if (is_string($this->exts)) {
                $this->config['exts'] = explode(',', $this->exts);
            }
            $this->config['exts'] = array_map('strtolower', $this->exts);
        }   

    }


    /**
     * 魔术方法
     * 使用 $this->name 获取配置
     * @param  string $name 配置名称
     * @return mixed        配置值
     */
    public function __get($name)
    {
        return $this->config[$name];
    }


    /**
     * 魔术方法
     * 使用 $this->name = $value 来设置配置
     * @param string $name  配置名称
     * @param mixed $value [description]
     */
    public function __set($name, $value)
    {
        if (isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }


    /**
     * 魔术方法
     * 使用 isset($name) 时触发
     * @param  string  $name 配置名称
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($this->config[$name]);
    }


    /**
     * 获取最后一次上传错误信息
     * @return [type] [description]
     */
    public function getError()
    {
        return $this->error;
    }


    /**
     * 上传文件
     * @param  string $files [description]
     * @return [type]        [description]
     */
    public function upload($files='')
    {   
        if ('' === $files) {
            $this->error = '没有指定要上传的文件名称';
            return false;
        } else {
            $files = $_FILES[$files];
        }

        if (empty($files)) {
            $this->error = '没有上传的文件!';
            return false;
        }

        //检测上传根目录
        if (!$this->checkRootPath()) {
            return false;
        }

        //检查上传目录
        if (!$this->checkSavePath($this->savePath)) {
            return false;
        }

        //逐个检测并上传文件
        $info = array();
        //官方推荐的获取文件mime类型的方法
        if (function_exists('finfo_open')) {
            $finfo = finfo_open( FILEINFO_MIME_TYPE );
        }

        //对上传的文件数组进行处理
        $files = $this->dealFiles($files);
        foreach($files as $key => $file) {
            $file['name'] = strip_tags($file['name']);
            /* 通过扩展获取文件类型，可解决FLASH上传$FILES数组返回文件类型错误的问题 */
            if(isset($finfo)){
                $file['type'] = finfo_file($finfo, $file['tmp_name']);
            }
            //获取上传文件后缀,允许上传无后缀文件
            $file['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

            //文件上传检测
            if (!$this->check($file)) {
                continue;
            }

            //生成保存文件名
            $savename = $this->getSaveName($file);
            if ($savename == false) {
                continue;
            } else {
                $file['savename'] = $savename; 
            }

            //检测并创建子目录
            $subpath = $this->getSubPath();
            //恒等判断 可能并不需要创建子目录
            if (false === $subpath) {
                continue;
            } else {
                $file['savepath'] = $this->savePath . $subpath;
            }

            //对图像文件进行严格检测
            $ext = strtolower($file['ext']);
            if (in_array($ext, array('gif', 'jpg', 'jpeg', 'bmp', 'png', 'swf'))) {
                $imginfo = getimagesize($file['tmp_name']);
                if (empty($imginfo) || ($ext == 'gif' && empty($imginfo['bits']))) {
                    $this->error = '非法的图像文件!';
                    continue;
                }
            }

            //保存文件，并记录保存成功的文件
            if ($this->save($file, $this->replace)) {
                unset($file['error'], $file['tmp_name']);
                $info[$key] = $file;
            }

        }

        if (isset($finfo)) {
            finfo_close($finfo);
        }

        return empty($info) ? false : $info;

    }


    /**
     * 检测文件
     * @param  array $file  文件的信息数组
     * @return boolean 存在错误返回false 否则返回true
     */
    private function check($file)
    {
        //文件上传失败,捕获上传错误信息
        if ($file['error']) {
            $this->error($file['error']);
            return false;
        }

        //无效上传
        if (empty($file['name'])) {
            $this->error = '未知上传错误！';
            return false;
        }

        /*检查是否合法上传, 检测文件是否由HTTP POST上传 */
        if (!is_uploaded_file($file['tmp_name'])) {
            $this->error = '非法上传文件！';
            return false;
        }

        /* 检查文件大小 */
        if (!$this->checkSize($file['size'])) {
            $this->error = '上传文件大小不符！';
            return false;
        }

        /* 检查文件Mime类型 */
        //TODO:FLASH上传的文件获取到的mime类型都为application/octet-stream
        if (!$this->checkMime($file['type'])) {
            $this->error = '上传文件MIME类型不允许！';
            return false;
        }

        //检查上传文件后缀
        if (!$this->checkExt($file['ext'])) {
            $this->error = '上传文件后缀不允许';
            return false;
        }

        //通过检测
        return true;

    }


    /**
     * 获取错误代码信息
     * @param string $errorNo  错误号
     */
    private function error($errorNo) {
        switch ($errorNo) {
            case 1:
                $this->error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值！';
                break;
            case 2:
                $this->error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值！';
                break;
            case 3:
                $this->error = '文件只有部分被上传！';
                break;
            case 4:
                $this->error = '没有文件被上传！';
                break;
            case 6:
                $this->error = '找不到临时文件夹！';
                break;
            case 7:
                $this->error = '文件写入失败！';
                break;
            default:
                $this->error = '未知上传错误！';
        }
    }


    /**
     * 转换上传文件的数组变量格式
     * @param  array    $files    上传的文件变量
     * @return array [description]
     */
    private function dealFiles($files)
    {       
        $fileArray  = array();
        foreach ($files as $key => $file) {
            if(is_array($files['name'])) {
                $keys = array_keys($files);
                $count = count($files['name']);
                for ($i=0; $i<$count; $i++) {
                    foreach ($keys as $_key) {
                        $fileArray[$i][$_key] = $files[$_key][$i];
                    }
                }
            }else{
               $fileArray[] = $files;
               break;
            }
        }
       return $fileArray;
    }

    /**
     * 检测上传根目录
     * @return boolean true为检测通过 false为检测失败
     */
    private function checkRootPath()
    {
        if (!(is_dir($this->rootPath) && is_writable($this->rootPath))) {
            $this->error = '上传目录不存在,请尝试手动创建:'. $this->rootPath;
            return false;
        }
        return true;
    }

    /**
     * 检测上传目录
     * @return  boolean true为检测通过 false为检测失败
     */
    private function checkSavePath($savepath)
    {
        //检测并创建目录
        if (!$this->mkdir($savepath)) {
            return false;
        } else {
            //检测目录是否可写
            if (!is_writable($this->rootPath . $savepath)) {
                $this->error = '上传目录 ' . $savepath . ' 不可写';
                return false;
            }
            return true;
        }
        
    }


    /**
     * 创建文件夹
     * @param string $savepath 目录名称
     * @return boolean
     */
    private function mkdir($savepath)
    {
        $dir = $this->rootPath . $savepath;
        if (is_dir($dir)) {
            return true;
        }
        if (mkdir($dir, 0777, true)) {
            return true;
        } else {
            $this->error = "目录 {$dir} 创建失败";
            return false;
        }
    }


    /**
     * 检测文件大小
     * @param  int $size 文件大小数据
     * @return boolean
     */
    private function checkSize($size)
    {
        return ($this->maxSize == 0) || ($size < $this->maxSize);
    }


    /**
     *  检查上传的文件MIME类型是否合法
     * @param  string $mime 
     * @return boolean
     */
    private function checkMime($mime)
    {
        return empty($this->mimes) ? true : in_array(strtolower($mime), $this->mimes);
    }


    /**
     * 检查上传文件的后缀
     * @param  string $ext 
     * @return boolean
     */
    private function checkExt($ext)
    {
        return empty($this->exts) ? true : in_array(strtolower($ext), $this->exts);
    }


    /**
     * 根据上传文件命名规则获取保存文件名
     * @param  array $file 文件信息
     */
    private function getSaveName($file)
    {
        $rule = $this->saveName;
        $savename = $this->getName($rule, $file['name']);
        if (empty($savename)) {
            $this->error = '文件命名规则错误！';
            return false;
        }
        //文件保存后缀，支持强制更改后缀名
        $ext = empty($this->saveExt) ? $file['ext'] : $this->saveExt;
        return $savename . '.' . $ext;
    }


    /**
     * 根据指定的规则获取文件或者目录名称
     * @param  mixed $rule     规则
     * @return string          文件或者目录名称
     */
    private function getName($rule)
    {
        $name = '';
        if (is_array($rule)) {//数组规则
            $func = $rule[0];
            $param = (array)$rule[1];
            $name = call_user_func_array($func, $param);
        } elseif (is_string($rule)) {//字符串规则
            if (function_exists($rule)) {
                $name = call_user_func($rule);
            }   else {
                $name = $rule;
            }
        }
        return $name;
    }


    /**
     * 获取子目录的名称
     * @return string 子目录的名称
     */
    private function getSubPath()
    {
        $subpath = '';
        $rule = $this->subName;
        if ($this->autoSub && !empty($rule)) {
            $subpath = $this->getName($rule) . '/';
            if (!empty($subpath) && !$this->mkdir($this->savePath.$subpath)) {
                return fasle;
            }
        }
        return $subpath;

    }


    /**
     * 保存指定的文件
     * @param  array  $file    需要保存文件的信息
     * @param  boolean $replace 同名文件是否覆盖
     * @return boolean          
     */
    private function save($file, $replace=true)
    {
        $filename = $this->rootPath . $file['savepath'] . $file['savename'];
        //不覆盖同名文件
        if (!$replace && is_file($filename)) {
            $this->error = '存在同名文件'. $file['savename'];
            return false;
        } 

        if (!move_uploaded_file($file['tmp_name'], $filename )) {
            $this->error = '上传文件保存错误！';
            return false;
        }
        return true;

    }





}

