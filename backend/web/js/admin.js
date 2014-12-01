//¶àÍ¼Æ¬ÉÏ´«
$(function(){
	var j=1;
	$('#add_file').click(function()
	{
		$('#add_file').before("<div class='upimg'><input type='file' name='thumb"+j+"'></div>");
		j++;
	})
 });