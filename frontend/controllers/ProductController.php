<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\Pictures;
use frontend\models\Tag;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
/**
 * Product controller
 */
class ProductController extends BaseController
{
   

	public function actionCreate()
    {
		if(empty(Yii::$app->user->identity->id)){
			$this->redirect(['/site/login']);
		}
        $model = new Product();
        if (Yii::$app->request->post()) {
			$upload = UploadedFile::getInstanceByName("thumb");
			$isImageType = 0;
			foreach(Yii::$app->params['allowImageType'] as $item){
				$extname = "ss".strtolower($upload->type)."ss";
				if (strpos($extname,$item)){
					$isImageType = 1;
					$ext = $item;
					break;
				}
			}
			if($isImageType==0) {
				throw new NotFoundHttpException('图片必填，且支持的图片类型为：gif,png,jpg,jpeg');
			}
			
			$product = Yii::$app->request->post();
			$data = array();
			$data['title'] = trim($product['product']['title']);
			$data['content'] = trim($product['product']['content']);
			$data['userid'] = Yii::$app->user->identity->id;
			$data['addtime'] = time();
			if(empty($data['title']) || empty($data['content'])){
				throw new NotFoundHttpException('标题或者内容不能为空！');	
			}
			$data['title'] = addslashes($data['title']);
			$data['content'] = addslashes($data['content']);
			$id = $model->customInsert($data,"lt_product");

			$upload->name = str_replace(".","",microtime(true)).".".$ext;
			$uploadpath = Yii::$app->params['uploadimagepath'].'upload/' . date('Ymd',time()) . '/';
			if(!file_exists($uploadpath)){
				mkdir($uploadpath,0755,true);
			}
			$orig = $uploadpath . $upload->name;
			$upload->saveAs($orig);
			$picturesModel = new Pictures;
			$picturesModel->itemid=$id;
			$picturesModel->userid=Yii::$app->user->identity->id;
			$picturesModel->original=str_replace(Yii::$app->params['uploadimagepath'],"",$orig);
			$picturesModel->etype=0;
			$picturesModel->addtime=time();
			$picturesModel->save();
			if (!empty($product['product']['tag'])){
				$tagModel = new Tag;
				$tagModel->opTag($product['product']['tag'],$id,0);
			}
			$this->redirect(['/site/index']);
        } else {
			$tagRows = $model->getRows(array(),'','','lt_tag');
            return $this->render('create', [
                'model' => $model,
				'tagRows'=>$tagRows
            ]);
        }
    }
	
	
	
	
}