$(function(){
	$(".tagbutton").click(function(){
		var tag = $(this).text();
		var inputTag = $("#inputTag").val()+" "+tag;
		$("#inputTag").val(inputTag)
	});	
	
	
	
	
	
	
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