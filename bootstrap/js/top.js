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


//img change
 $(function() { 
 $(".content_2 div ul li img").hover(function(){ 
     $(this).attr("src", $(this).attr("src").replace(".png", "_on.jpg")); 
 }, function(){ 
     $(this).attr("src", $(this).attr("src").replace("_on.jpg", ".png")); 
 }); 
});

