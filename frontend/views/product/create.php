<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-contact">
    <h1>文章添加</h1>
    <p>
        添加文章
    </p>
    <form role="form" id="opproduct" name="opproduct" method="post" action="" enctype="multipart/form-data">

	  <div class="form-group">
		<label for="inputTitle">标题</label>
		<input type="text" name="product[title]" class="form-control" id="inputTitle" placeholder="标题">
	  </div>
	  <div class="form-group">
		<label for="inputPictures">图片</label>
		<input type="file" name="thumb" id="inputPictures">
	  </div>
      
      <div class="form-group">
		<label for="inputTag">标签</label>
		<input type="text" name="product[tag]" class="form-control" id="inputTag" placeholder="标签，多个标签使用空格间隔">
	  </div>
      <div class="form-group">
      	<?php foreach($tagRows as $item):?>
		<button type="button" class="btn btn-info tagbutton"><?php echo $item['name'];?></button>
        <?php endforeach;?>
	  </div>
	  <div class="form-group">
		<label for="inputContent">内容</label>
		<textarea rows="20" name="product[content]" id="inputContent" class="form-control"></textarea>
	  </div>

	  <button type="submit" class="btn btn-default">提交</button>
	</form>


</div>
<script src="/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
	selector:'textarea',
	plugins: ["jbimages","image"],
	menubar: false,
	toolbar: "insertfile undo redo | styleselect fontsizeselect| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      | print preview fullpage | forecolor backcolor jbimages image",  
	//theme_advanced_buttons3: //"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	language:'zh_CN'
});
</script>