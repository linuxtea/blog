<?php

namespace backend\controllers;

use Yii;
use app\models\Product;
use app\models\Pictures;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
        } else {
        return $this->render('view', ['model' => $model]);
}
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product;
		
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
			foreach($_FILES as $k=>$v){
				$upload = UploadedFile::getInstanceByName($k);
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
				$uploadpath = Yii::$app->params['uploadimagepath'].'upload/' . date('Ymd',time()) . '/';
				if(!file_exists($uploadpath)){
					mkdir($uploadpath,0755,true);
				}
				$orig = $uploadpath . $upload->name;
				$upload->saveAs($orig);
				$picturesModel = new Pictures;
				$picturesModel->itemid=$model->id;
				$picturesModel->userid=Yii::$app->user->identity->id;
				$picturesModel->original=str_replace(Yii::$app->params['uploadimagepath'],"",$orig);
				$picturesModel->etype=0;
				$picturesModel->addtime=time();
				$picturesModel->save();
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
