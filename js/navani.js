// JavaScript Document

$(document).ready(function(){

	<!-- HOME BUTTON -->
	<!-- ----------- -->
	$("#link1").mouseenter(function(){
		$(this).stop();
		$(this).animate({marginTop:0, height:53},300);			
	});
	$("#link1").mouseleave(function(){
		$(this).stop();
		$(this).animate({marginTop:10, height:43},300);	
	});
	
	<!-- BEAWARE BUTTON -->
	<!-- -------------- -->
	$("#link2").mouseenter(function(){
		$(this).stop();
		$(this).animate({ marginTop:0, height:53},300);
		$("#drop").stop();	


	});
	$("#link2").mouseleave(function(){
		$(this).stop();
		$("#drop").stop();
		$("#drop").css('opacity', '1.0');
		$(this).delay(100);
		$(this).animate({marginTop:10, height:43},300);
	});
	
	<!-- LINKS BUTTON -->
	<!-- ------------ -->
	$("#link3").mouseenter(function(){
		$(this).stop();
		$(this).animate({marginTop:0},300);	
	});
	$("#link3").mouseleave(function(){
		$(this).stop();
		$(this).animate({marginTop:10},300);	
	});
	
	<!-- EVENTS BUTTON -->
	<!-- ------------- -->
	$("#link4").mouseenter(function(){
		$(this).stop();
		$(this).animate({marginTop:0},300);	
	});
	$("#link4").mouseleave(function(){
		$(this).stop();
		$(this).animate({marginTop:10},300);	
	});
	
	<!-- ABOUT BUTTON -->
	<!-- ------------ -->
	$("#link5").mouseenter(function(){
		$(this).stop();
		$(this).animate({marginTop:0},300);	
	});
	$("#link5").mouseleave(function(){
		$(this).stop();
		$(this).animate({marginTop:10},300);	
	});
	
	<!-- CONTACT BUTTON -->
	<!-- -------------- -->
	$("#link6").mouseenter(function(){
		$(this).stop();
		$(this).animate({marginTop:0},300);	
	});
	$("#link6").mouseleave(function(){
		$(this).stop();
		$(this).animate({marginTop:10},300);	
	});

	<!-- STICKY NAV -->
	<!-- ---------- -->

	//<![CDATA[ 
	$(window).load(function(){
	$(function() {
	  var a = function() {
		var b = $(window).scrollTop();
		var d = $("#scroller_anchor").offset().top;
		var c=$("#scroller");
		if (b>d) {
		  $("#scroller").css('position','fixed','top','0px');
		  if (b<=0){
			$("#scroller").css('position','fixed','top','0px');  
		  }
		} else {
		  if (b<=d) {
		  $("#scroller").css('position','relative');
		  $("#scroller").css('top','0px');
		  
		  }
		}
	  };
	  $(window).scroll(a);a()
	});
	});//]]>


});