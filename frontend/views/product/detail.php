<h2><?php echo $detailRows['title'];?></h3>
<div id="carousel-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php foreach($picturesRows as $k=>$v):?>
    <li data-target="#carousel-generic" data-slide-to="<?php echo $k;?>" class="<?php echo ($k==0)?'active':'';?>"></li>
    <?php endforeach;?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	<?php foreach($picturesRows as $k=>$v):?>
    <div class="item <?php echo ($k==0)?'active':'';?> text-right" style="background:url(http://img.letaowan.com/<?php echo $v['original'];?>); background-size:cover;">
      <img src="http://img.letaowan.com/<?php echo $v['original'];?>" alt="" data-holder-rendered="true" style="max-height:500px;">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
    <?php endforeach;?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<p>
	<?php echo $detailRows['content'];?>
</p>