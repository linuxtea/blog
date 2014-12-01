<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use a3ch3r46\tinymce\TinyMCE;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
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
	
	
	<?php echo $form->field($model, 'content')->widget(CKEditor::className(), [
					'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
						'height' => '300px',
						'preset'=>'base',
						'inline'=>false,
						'filebrowserImageUploadUrl'=>'index.php?r=ckeditor/upload',
					
					]),
				]
    );?>
	<?php
		//echo TinyMCE::widget(['name' => 'Product[content]','value'=>$model->content, 'toggle' => ['active' => false]]);
	?>
	  
    <?= $form->field($model, 'userid')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'addtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

