<?php
    public function actionIndex()  
    {  
        $model = new UserForm;  
        if ($model->load(\Yii::$app->request->post()) && $model->validate())  
        {  
            echo "通过";  
        }  
          
        return $this->render('index',[  
            "model" => $model,     
        ]);  
    }