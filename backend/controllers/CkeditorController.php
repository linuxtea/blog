<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
class CkeditorController extends BaseController
{
	public $enableCsrfValidation = false;
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload' => ['post','get'],
                ],
            ],
        ];
    }
	
	public function actionUpload(){
		$upload = UploadedFile::getInstanceByName("upload");
		$isImageType = 0;
		foreach(Yii::$app->params['allowImageType'] as $item){
			$extname = "ss".strtolower($upload->type)."cc";
			if (strpos($extname,$item)){
				$isImageType = 1;
				$ext = $item;
				break;
			}
		}
		if($isImageType==0) {
			continue;
			throw new NotFoundHttpException('不支持的图片类型');
		}
		$upload->name = str_replace(".","",microtime(true)).".".$ext;
		$uploadpath = '/website/yii2/pictures/upload/' . date('Ymd',time()) . '/';
		if(!file_exists($uploadpath)){
			mkdir($uploadpath,0755,true);
		}
		$orig = $uploadpath . $upload->name;
		$upload->saveAs($orig);
		$backimg = str_replace("/website/yii2/pictures/","",$orig);
		$src = "http://img.yii.com/".$backimg;
		echo "<img style='cursor:pointer' onclick='top.document.getElementById(\"cke_114_textInput\").value=\"".$src."\";' src='".$src."'/>";
		exit;
	}
	

}
