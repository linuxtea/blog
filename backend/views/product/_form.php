<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use zxbodya\yii2\tinymce\TinyMce;
use zxbodya\yii2\elfinder\TinyMceElFinder;
/**
 * @var yii\web\View $this
 * @var app\models\Product $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
	
	<div class="form-group field-product-title required">
		<label class="control-label" for="product-title">图片</label>
		<input id="product-thumb" type="file" maxlength="255" name="thumb">
		<a href="javascript:void(0)" id="add_file">+上传多张图片</a>
        <img id="thumbimg"  name="picthumb" src="" style="height:101px;width:182px; display:none"/>
	</div>
	
	<?php
		echo $form->field($model, 'content')->widget(
			TinyMce::className(),
			[
				'fileManager' => [
					'class' => TinyMceElFinder::className(),
					'connectorRoute' => 'el-finder/connector',
				],
			]
		);
	?>
    <?= $form->field($model, 'userid')->textInput(['maxlength' => 50]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

