$(document).ready(function(){
$(".picbox div").hover(function() {
	//$(this).animate({"top": "-350px"}, 300, "swing");  pic-list-b.png
	$(this).animate({"top": "-350px"}, 0, "swing");
},function() {
	//$(this).stop(true,false).animate({"top": "0px"}, 300, "swing");  pic-list-b.png
	$(this).stop(true,false).animate({"top": "0px"}, 0, "swing");
});
});

$(function(){
	//图片延迟加载
	$("img").lazyload({ 
		effect : "fadeIn",
		threshold :100 
	});
})
function goTop()
 {
     $(window).scroll(function(e) {
         if($(window).scrollTop()>100)
             $("#gotop").fadeIn(500);
         else
             $("#gotop").fadeOut(500);
     });
 };
$(function(){
     $("#gotop").click(function(e) {
             $('body,html').animate({scrollTop:0},300);
     });
     $("#gotop").mouseover(function(e) {
         $(this).css("background","url(/style/gettop.png) no-repeat 0px 0px");
     });
     $("#gotop").mouseout(function(e) {
         $(this).css("background","url(/style/gettop.png) no-repeat 0px -131px");
     });
     goTop();
 });