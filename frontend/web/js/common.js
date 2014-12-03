$(function(){
	$(".tagbutton").click(function(){
		var tag = $(this).text();
		var inputTag = $("#inputTag").val()+" "+tag;
		$("#inputTag").val(inputTag)
	});	
	//多图片上传
	var j=4;
	$('#add_file').click(function()
	{
		$('#add_file').before("<div class='upimg'><input type='file' name='thumb"+j+"'></div>");
		j++;
	})
	$('.carousel').carousel();
	
	
	
})



function scroll_func(){
	var scrollheight = $(document).scrollTop();
	scrollheight > 0 ? $('.goto-top').fadeIn("slow") : $('.goto-top').fadeOut("slow");
}

$(function(){
	scroll_func();
	$(window).bind({'scroll' : scroll_func});
	$('.goto-top').click(function(){
		$('html, body').animate({scrollTop:0},300);
	});
})