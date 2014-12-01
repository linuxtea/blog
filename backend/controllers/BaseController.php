<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
class BaseController extends Controller
{
    public function actions()
    {
		if(Yii::$app->user->identity->username!='admin'){
			$this->redirect(['/site/login']);
		}
    }

}
