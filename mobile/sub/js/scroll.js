
 $(document).ready(function () {
        
    $('.historyNav ul li:eq(0)').find('a').addClass('current');
 
 
  var smh= $('.contentArea').offset().top + $('.historyNav').height();
  var h1= $('.historyInner div:eq(0)').offset().top -0;
  var h2= $('.historyInner div:eq(1)').offset().top -0;
  var h3= $('.historyInner div:eq(2)').offset().top -0;


  $(window).on('scroll',function(){
      var scroll = $(window).scrollTop();
      
    
      if(scroll>smh){ 
          $('.historyNav').addClass('navOn');
        //   $('header').hide();
      }else{
          $('.historyNav').removeClass('navOn');
        //   $('header').show();
      }
      
      
       $('.historyNav ul li').find('a').removeClass('current');
      
      
       var cnt=0;
     
              if(scroll>=0 && scroll<h1){
                  cnt=0;
              }else if(scroll>=h1 && scroll<h2){
                  cnt=1;
              }else if(scroll>=h2 && scroll<h3){
                  cnt=2;
              }else if(scroll>=h3){
                  cnt=3;
              }
         $('.historyNav ul li:eq('+cnt+')').find('a').addClass('current');

      
  });
});

$(document).ready(function () {

    $('.historyNav a').click(function(e){
       e.preventDefault();
  
        var value=0;

        if($(this).hasClass('link1')){  
           value= $('.historyInner #historyList1').offset().top-100;  
        }else if($(this).hasClass('link2')){
           value= $('.historyInner #historyList2').offset().top-100; 
        }else if($(this).hasClass('link3')){
           value= $('.historyInner #historyList3').offset().top-100; 
        }
        
      $("html,body").stop().animate({"scrollTop":value},1000);
    });
});