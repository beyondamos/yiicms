<?php
public function rules()
{
    return [
        //1.布尔型,该验证器检查输入值是否为一个布尔值。
        // 检查 "selected" 是否为 0 或 1，无视数据类型
        ['selected', 'boolean'],
        // 检查 "deleted" 是否为布尔类型，即 true 或 false
        ['deleted', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
        //trueValue： 代表真的值。默认为 '1'。
        //falseValue：代表假的值。默认为 '0'。
        //strict：是否要求待测输入必须严格匹配 trueValue 或 falseValue。默认为 false。
        //注意: 因为通过 HTML 表单传递的输入数据都是字符串类型，所以一般情况下你都需要保持 strict 属性为假。


        //2.captcha（验证码）,该验证器通常配合 yii\captcha\CaptchaAction 以及 yii\captcha\Captcha 使用，以确保某一输入与 CAPTCHA 小部件所显示的验证代码（verification code）相同。
        ['verificationCode', 'captcha'],
        //caseSensitive：对验证代码的比对是否要求大小写敏感。默认为 false。
        //captchaAction：指向用于渲染 CAPTCHA 图片的 CAPTCHA action 的 路由。 默认为 'site/captcha'。
        //skipOnEmpty：当输入为空时，是否跳过验证。 默认为 false，也就是输入值为必需项。


        //3.compare（比较）,该验证器比较两个特定输入值之间的关系是否与 operator 属性所指定的相同。
        // 检查 "password" 特性的值是否与 "password_repeat" 的值相同
        ['password', 'compare'],
        // 检查年龄是否大于等于 30
        ['age', 'compare', 'compareValue' => 30, 'operator' => '>='],
        //compareAttribute：用于与原特性相比较的特性名称。 当该验证器被用于验证某目标特性时， 该属性会默认为目标属性加后缀 _repeat。 举例来说，若目标特性为 password，则该属性默认为 password_repeat。
        //compareValue：用于与输入值相比较的常量值。当该属性与 compareAttribute 属性同时被指定时， 该属性优先被使用。
        //operator：比较操作符。默认为 ==，意味着检查输入值是否与 compareAttribute 或 compareValue 的值相等。 该属性支持如下操作符：
        //==：检查两值是否相等。比对为非严格模式。
        //===：检查两值是否全等。比对为严格模式。
        //!=：检查两值是否不等。比对为非严格模式。
        //!==：检查两值是否不全等。比对为严格模式。
        //>：检查待测目标值是否大于给定被测值。
        //>=：检查待测目标值是否大于等于给定被测值。
        //<：检查待测目标值是否小于给定被测值。
        //<=：检查待测目标值是否小于等于给定被测值。


        //4.date（日期,该验证器检查输入值是否为适当格式的 date，time，或者 datetime。另外， 它还可以帮你把输入值转换为一个 UNIX 时间戳并保存到 timestampAttribute 属性所指定的特性里。
        [
            [['from', 'to'], 'date'],
            [['from_date', 'to_date'], 'default', 'value' => null],
            [['from_date', 'to_date'], 'date'],
        ]
        //format
        //timestampAttribute


        //5.default（默认值）,该验证器并不进行数据验证。而是，给为空的待测特性分配默认值。
        // 若 "age" 为空，则将其设为 null
        ['age', 'default', 'value' => null],
        // 若 "country" 为空，则将其设为 "USA"
        ['country', 'default', 'value' => 'USA'],
        // 若 "from" 和 "to" 为空，则分别给他们分配自今天起，3 天后和 6 天后的日期。
        [['from', 'to'], 'default', 'value' => function ($model, $attribute) {
           return date('Y-m-d', strtotime($attribute === 'to' ? '+3 days' ：'+6 days'));
        }],
        //value：默认值，或一个返回默认值的 PHP Callable 对象（即回调函数）.它们会分配给检测为空的待测特性。
        //PHP 回调方法的样式如下：
        //function foo($model, $attribute) {
        // ... 计算 $value ...
            //return $value;
        //}


        //6.double（双精度浮点型）,该验证器检查输入值是否为双精度浮点数。他等效于 number 验证器。
        // 检查 "salary" 是否为浮点数
        ['salary', 'double'],
        //max：上限值（含界点）。若不设置，则验证器不检查上限。
        //min：下限值（含界点）。若不设置，则验证器不检查下限。


        //7.each 该验证器仅当需要验证的属性是数组时进行验证。如果数组的每一个元素能被指定的规则通过则验证成功。
        // checks if every category ID is an integer
        ['categoryIDs', 'each', 'rule' => ['integer']],
        //rule: 一个数组指定的验证规则。数组的第一个元素指定类名或者验证器的别名，数组中剩余的键值对用来配置验证器对象。
        //allowMessageFromRule: 是否使用嵌入的验证器规则返回的错误信息，默认为 true;如果是 false, 那么就用当前 message 的信息作为错误信息。
        //注意：如果属性值不是一个数组，会被认为是验证失败，message会被返回作为错误信息。


        //8.email（电子邮件）,该验证器检查输入值是否为有效的邮箱地址。
        // 检查 "email" 是否为有效的邮箱地址
        ['email', 'email'],
        //allowName：检查是否允许带名称的电子邮件地址 (e.g. 张三 <John.san@example.com>)。 默认为 false。
        //checkDNS：检查邮箱域名是否存在，且有没有对应的 A 或 MX 记录。有的时候该项检查可能会因为临时性 DNS 故障而失败，哪怕它其实是有效的。默认为 false。
        //enableIDN：验证过程是否应该考虑 IDN（internationalized domain names，国际化域名，也称多语种域名，比如中文域名）。默认为 false。使用 IDN 验证功能，请先确保安装并开启 intl PHP 扩展，不然会导致抛出异常。


        //9.exist（存在性）
        // a1 需要在 "a1" 特性所代表的字段内存在
        ['a1', 'exist'],
        // a1 必需存在，但检验的是 a1 的值在字段 a2 中的存在性
        ['a1', 'exist', 'targetAttribute' => 'a2'],
        // a1 和 a2 的值都需要存在，且它们都能收到错误提示
        [['a1', 'a2'], 'exist', 'targetAttribute' => ['a1', 'a2']],
        // a1 和 a2 的值都需要存在，只有 a1 能接收到错误信息
        ['a1', 'exist', 'targetAttribute' => ['a1', 'a2']],
        // 通过同时在 a2 和 a3 字段中检查 a2 和 a1 的值来确定 a1 的存在性
        ['a1', 'exist', 'targetAttribute' => ['a2', 'a1' => 'a3']],
        // a1 必需存在，若 a1 为数组，则其每个子元素都必须存在。
        ['a1', 'exist', 'allowArray' => true],
        //This validator checks if the input value can be found in a table column represented by an Active Record attribute. You can use targetAttribute to specify the Active Record attribute and targetClass the corresponding Active Record class. If you do not specify them, they will take the values of the attribute and the model class being validated.
        //You can use this validator to validate against a single column or multiple columns (i.e., the combination of multiple attribute values should exist).
        //targetClass：用于查找输入值的目标 AR 类。若不设置， 则会使用正在进行验证的当前模型类。
        //targetAttribute：用于检查输入值存在性的 targetClass 的模型特性。 若不设置，它会直接使用待测特性名（整个参数数组的首元素）。 除了指定为字符串以外，你也可以用数组的形式，同时指定多个用于验证的表字段，数组的键和值都是代表字段的特性名， 值表示 targetClass 的待测数据源字段，而键表示当前模型的待测特性名。 若键和值相同，你可以只指定值。（如:['a2'] 就代表 ['a2'=>'a2']）
        //filter：用于检查输入值存在性必然会进行数据库查询，而该属性为用于进一步筛选该查询的过滤条件。 可以为代表额外查询条件的字符串或数组（关于查询条件的格式，请参考 yii\db\Query::where()）； 或者样式为 function ($query) 的匿名函数， $query 参数为你希望在该函数内进行修改的 Query 对象。
        //allowArray：是否允许输入值为数组。默认为 false。若该属性为 true 且输入值为数组，则数组的每个元素都必须在目标字段中存在。 值得注意的是，若用吧 targetAttribute 设为多元素数组来验证被测值在多字段中的存在性时， 该属性不能设置为 true。


        //10.file（文件）,该验证器检查输入值是否为一个有效的上传文件。
        // 检查 "primaryImage" 是否为 PNG, JPG 或 GIF 格式的上传图片。
        // 文件大小必须小于  1MB
        ['primaryImage', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 1024*1024*1024],
        //extensions：可接受上传的文件扩展名列表。它可以是数组，也可以是用空格或逗号分隔各个扩展名的字符串 (e.g. "gif, jpg")。 扩展名大小写不敏感。默认为 null， 意味着所有扩展名都被接受。
        //mimeTypes：可接受上传的 MIME 类型列表。 它可以是数组，也可以是用空格或逗号分隔各个 MIME 的字符串 (e.g. "image/jpeg, image/png")。 Mime 类型名是大小写不敏感的。默认为 null，意味着所有 MIME 类型都被接受。
        //minSize：上传文件所需最少多少 Byte 的大小。默认为 null，代表没有下限。
        //maxSize：上传文件所需最多多少 Byte 的大小。默认为 null，代表没有上限。
        //maxFiles：给定特性最多能承载多少个文件。 默认为 1，代表只允许单文件上传。 若值大于一，那么输入值必须为包含最多 maxFiles 个上传文件元素的数组。
        //checkExtensionByMimeType：是否通过文件的 MIME 类型来判断其文件扩展。若由 MIME 判定的文件扩展与给定文件的扩展不一样，则文件会被认为无效。默认为 true，代表执行上述检测。


        //11.filter（滤镜）,该验证器并不进行数据验证。而是，给输入值应用一个滤镜，并在检验过程之后把它赋值回特性变量。
        // trim 掉 "username" 和 "email" 输入
        [['username', 'email'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
        // 标准化 "phone" 输入
        ['phone', 'filter', 'filter' => function ($value) {
        // 在此处标准化输入的电话号码
            return $value;
        }],
        //filter：用于定义滤镜的 PHP 回调函数。可以为全局函数名，匿名函数，或其他。 该函数的样式必须是 function ($value) { return $newValue; }。该属性不能省略，必须设置。
        //skipOnArray：是否在输入值为数组时跳过滤镜。默认为 false。请注意如果滤镜不能处理数组输入，就应该把该属性设为 true。 否则可能会导致 PHP Error 的发生。


        //12.image（图片）,该验证器检查输入值是否为代表有效的图片文件。它继承自 file 验证器，并因此继承有其全部属性。
        // 检查 "primaryImage" 是否为适当尺寸的有效图片
        ['primaryImage', 'image', 'extensions' => 'png, jpg',
            'minWidth' => 100, 'maxWidth' => 1000,
            'minHeight' => 100, 'maxHeight' => 1000,
        ],
        //minWidth：图片的最小宽度。默认为 null，代表无下限。
        //maxWidth：图片的最大宽度。默认为 null，代表无上限。
        //minHeight：图片的最小高度。默认为 null，代表无下限。
        //maxHeight：图片的最大高度。默认为 null，代表无上限。


        //13.ip
        // checks if "ip_address" is a valid IPv4 or IPv6 address
        ['ip_address', 'ip'],
        // checks if "ip_address" is a valid IPv6 address or subnet,
        // value will be expanded to full IPv6 notation.
        ['ip_address', 'ip', 'ipv4' => false, 'subnet' => null, 'expandIPv6' => true],
        // checks if "ip_address" is a valid IPv4 or IPv6 address,
        // allows negation character `!` at the beginning
        ['ip_address', 'ip', 'negation' => true],


        //14.in（范围）,该验证器检查输入值是否存在于给定列表的范围之中。
        // 检查 "level" 是否为 1、2 或 3 中的一个
        ['level', 'in', 'range' => [1, 2, 3]],
        //range：用于检查输入值的给定值列表。
        //strict：输入值与给定值直接的比较是否为严格模式（也就是类型与值都要相同，即全等）。 默认为 false。
        //not：是否对验证的结果取反。默认为 false。当该属性被设置为 true， 验证器检查输入值是否不在给定列表内。
        //allowArray：是否接受输入值为数组。当该值为 true 且输入值为数组时，数组内的每一个元素都必须在给定列表内存在，否则返回验证失败。


        //15.integer（整数）,该验证器检查输入值是否为整形。
        // 检查 "age" 是否为整数
        ['age', 'integer'],
        //max：上限值（含界点）。若不设置，则验证器不检查上限。
        //min：下限值（含界点）。若不设置，则验证器不检查下限。


        //16.match（正则表达式）,该验证器检查输入值是否匹配指定正则表达式。
        // 检查 "username" 是否由字母开头，且只包含单词字符
        ['username', 'match', 'pattern' => '/^[a-z]\w*$/i']
        //pattern：用于检测输入值的正则表达式。该属性是必须的， 若不设置则会抛出异常。
        //not：是否对验证的结果取反。默认为 false， 代表输入值匹配正则表达式时验证成功。如果设为 true， 则输入值不匹配正则时返回匹配成功。


        //17.number（数字）,该验证器检查输入值是否为数字。他等效于 double 验证器。
        // 检查 "salary" 是否为数字
        ['salary', 'number'],
        //max：上限值（含界点）。若不设置，则验证器不检查上限。
        //min：下限值（含界点）。若不设置，则验证器不检查下限。


        //18.required（必填）,该验证器检查输入值是否为空，还是已经提供了。
        // 检查 "username" 与 "password" 是否为空
        [['username', 'password'], 'required'],
        //requiredValue：所期望的输入值。若没设置，意味着输入不能为空。
        //strict：检查输入值时是否检查类型。默认为 false。 当没有设置 requiredValue 属性时，若该属性为 true， 验证器会检查输入值是否严格为 null；若该属性设为 false， 该验证器会用一个更加宽松的规则检验输入值是否为空。 当设置了 requiredValue 属性时，若该属性为 true，输入值与 requiredValue 的比对会同时检查数据类型。


        //19.safe（安全）,该验证器并不进行数据验证。而是把一个特性标记为 安全特性。
        // 标记 "description" 为安全特性
        ['description', 'safe'],


        //20.string（字符串）,该验证器检查输入值是否为特定长度的字符串。并检查特性的值是否为某个特定长度。
        // 检查 "username" 是否为长度 4 到 24 之间的字符串
        ['username', 'string', 'length' => [4, 24]],
        //length：指定待测输入字符串的长度限制。 该属性可以被指定为以下格式之一：
            //证书：the exact length that the string should be of;
            //单元素数组：代表输入字符串的最小长度 (e.g. [8])。这会重写 min 属性。
            //包含两个元素的数组：代表输入字符串的最小和最大长度(e.g. [8, 128])。 这会同时重写 min 和 max 属性。
        //min：输入字符串的最小长度。若不设置，则代表不设下限。
        //max：输入字符串的最大长度。若不设置，则代表不设上限。
        //encoding：待测字符串的编码方式。若不设置，则使用应用自身的 charset 属性值， 该值默认为 UTF-8。


        //21.trim（译为修剪/裁边）,该验证器并不进行数据验证。而是，trim 掉输入值两侧的多余空格。
        // trim 掉 "username" 和 "email" 两侧的多余空格
        [['username', 'email'], 'trim'],
        //注意若该输入值为数组，那它会忽略掉该验证器。


        //22.unique（唯一性）,该验证器检查输入值是否在某表字段中唯一。它只对活动记录类型的模型类特性起作用， 能支持对一个或多过字段的验证。
        // a1 需要在 "a1" 特性所代表的字段内唯一
        ['a1', 'unique'],
        // a1 需要唯一，但检验的是 a1 的值在字段 a2 中的唯一性
        ['a1', 'unique', 'targetAttribute' => 'a2'],
        // a1 和 a2 的组合需要唯一，且它们都能收到错误提示
        [['a1', 'a2'], 'unique', 'targetAttribute' => ['a1', 'a2']],
        // a1 和 a2 的组合需要唯一，只有 a1 能接收错误提示
        ['a1', 'unique', 'targetAttribute' => ['a1', 'a2']],
        // 通过同时在 a2 和 a3 字段中检查 a2 和 a3 的值来确定 a1 的唯一性
        ['a1', 'unique', 'targetAttribute' => ['a2', 'a1' => 'a3']],
        //targetClass：用于查找输入值的目标 AR 类。 若不设置，则会使用正在进行验证的当前模型类。
        //targetAttribute：用于检查输入值唯一性的 targetClass 的模型特性。 若不设置，它会直接使用待测特性名（整个参数数组的首元素）。 除了指定为字符串以外，你也可以用数组的形式，同时指定多个用于验证的表字段，数组的键和值都是代表字段的特性名， 值表示 targetClass 的待测数据源字段，而键表示当前模型的待测特性名。 若键和值相同，你可以只指定值。（如:['a2'] 就代表 ['a2'=>'a2']）
        //filter：用于检查输入值唯一性必然会进行数据库查询， 而该属性为用于进一步筛选该查询的过滤条件。可以为代表额外查询条件的字符串或数组 （关于查询条件的格式，请参考 yii\db\Query::where()）；或者样式为 function ($query) 的匿名函数， $query 参数为你希望在该函数内进行修改的 Query 对象。


        //23.url（网址）,该验证器检查输入值是否为有效 URL。
        // 检查 "website" 是否为有效的 URL。若没有 URI 方案，则给 "website" 特性加 "http://" 前缀
        ['website', 'url', 'defaultScheme' => 'http'],
        //validSchemes：用于指定那些 URI 方案会被视为有效的数组。默认为 ['http', 'https']， 代表 http 和 https URLs 会被认为有效。
        //defaultScheme：若输入值没有对应的方案前缀，会使用的默认 URI 方案前缀。 默认为 null，代表不修改输入值本身。
        //enableIDN：验证过程是否应该考虑 IDN（internationalized domain names，国际化域名，也称多语种域名，比如中文域名）。 默认为 false。要注意但是为使用 IDN 验证功能， 请先确保安装并开启 intl PHP 扩展，不然会导致抛出异常。



}