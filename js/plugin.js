//document.writeln("<script src='js/jquery-3.5.0.min.js'></script>");
document.writeln('<script src="js/jquery-3.5.0.min.js"></script>');
//JQuery
$(document).ready(function()
{
	$("h1").mouseenter(function(){
		$(this).css("color","DarkGoldenRod");
	});
	$("h1").mouseleave(function(){
		$(this).css("color","white");
	});
	$("div").mouseenter(function(){
		$(this).css("color","DarkGoldenRod");
	});
	$("div").mouseleave(function(){
		$("div").css("color","black");
	});
	$("button").mouseenter(function(){
		$(this).css("color","white");
	});
	$("button").mouseleave(function(){
		$(this).css("color","black");
	});
	$("#btnhaut").click(function () {
        $('body,html').animate({ scrollTop: $('body').height()/4 }, 3000);
        return false; 
            });

	$("#meth").show(600);
		
});