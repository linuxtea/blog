<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<?php \philippfrenzel\yii2masonry\yii2masonry::begin([
			'clientOptions' => [
				'itemSelector' => '.itemmasonry',
				'columnWidth'=> 60
			]
		]); ?>
		<?php for($i=1;$i<10;$i++):?>
		<div class="itemmasonry">
			<h3>Test</h3>
			<a href='#'><img class="img-responsive img-thumbnail" alt="Responsive image"  src="/images/<?php echo $i;?>.jpg"/></a>
			<p class="text-info text-left">我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰我是武海峰武海峰武海峰武海峰...</p>
			<p>
				<a href="#" class="btn btn-primary" role="button">
				   按钮
				</a> 
				<a href="#" class="btn btn-default" role="button">
				   按钮
				</a>
			 </p>
		</div>
		<?php endfor;?>
<?php \philippfrenzel\yii2masonry\yii2masonry::end(); ?>
