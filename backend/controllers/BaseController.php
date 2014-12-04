<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
class BaseController extends Controller
{
    public function actions()
    {
		if(empty(Yii::$app->user->identity->username)|| Yii::$app->user->identity->username!='admin'){
			$this->redirect(['/site/login']);
		}
    }

}
