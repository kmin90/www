//top menu

$('.topMove').hide();
           
$(window).on('scroll',function(){ 
     var scroll = $(window).scrollTop(); 
    

     if(scroll>1000){
         $('.topMove').fadeIn('slow'); 
     }else{
         $('.topMove').fadeOut('fast');
     }
});

 $('.topMove').click(function(e){
    e.preventDefault();
    $("html,body").stop().animate({"scrollTop":0},1000); 
 });



 $(document).ready(function() {
    $('#gnb ul li h3 a').on('mouseover', function(){
        $(this).addClass('gradcircle');
    });
    $('#gnb ul li h3 a').on('mouseleave', function(){
        $(this).removeClass('gradcircle');
    });
});



	$(document).ready(function() {
	 $(".openBtn").toggle(function() {
	   $("#gnb").slideDown('slow');
	 }, function() {
	   $("#gnb").slideUp('fast');
	 });
	 
	$(document).ready(function() {
		var op = false; 
		  
		$(".menu_ham").click(function() { 
	
		   if(op==false){
			 $('#headerArea').addClass('mn_open');
			 op=true;
		   }else{
			 $('#headerArea').removeClass('mn_open');
			 op=false;
		   }
	 
	 
		});  
		
	var current=0;
		 $(window).resize(function(){ 

	var screenSize = $(window).width(); 

		if( screenSize > 768){
		  $("#gnb").show();
				current=1;
		}
		if(current==1 && screenSize < 768){
		  $("#gnb").hide();
			current=0;
		}
	  }); 
	  
	 });


});

