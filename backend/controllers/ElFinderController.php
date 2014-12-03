<?php
namespace backend\controllers;

use Yii;       
use yii\web\Controller;         
use zxbodya\yii2\elfinder\ConnectorAction; 

class ElFinderController extends BaseController         
{         
    public function actions()         
    {         
        return [         
            'connector' => array(         
                'class' => ConnectorAction::className(),         
                'settings' => array(         
                    //'root' => Yii::getAlias('@webroot') . '/uploads/',                    
                    //'URL' => Yii::getAlias('@web') . '/uploads/', 
					'root' => Yii::$app->params['uploadimagepath'].'upload/',            
                    'URL' => 'http://img.letaowan.com/upload/',       
                    'rootAlias' => 'Home',         
                    'mimeDetect' => 'none'         
                )                    
            ),         
        ];                    
    }         
}