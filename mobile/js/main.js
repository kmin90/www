$(document).ready(function() {
   var op = false; 
 	
   $(".menu_ham").click(function() { 
       
       var documentHeight =  $(document).height();
       $("#gnb").css('height',documentHeight); 
       $(".modal_box").css('height',documentHeight);

      if(op==false){
        $('.modal_box').show();
        $("#gnb").animate({left:0, opacity:1}, 'fast');
        $('#headerArea').addClass('mn_open');
        op=true;
      }else{
        $('.modal_box').hide();
        $("#gnb").animate({left:'-100%', opacity:0}, 'fast');
        $('#headerArea').removeClass('mn_open');
        op=false;
      }


   });
   
   
    //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false];
    var arrcount=onoff.length;
    
    console.log(arrcount);
    
    $('#gnb .depth1 h3 a').click(function(){
        var ind=$(this).parents('.depth1').index();
        
        console.log(ind);
        
       if(onoff[ind]==false){
         $(this).parents('.depth1').find('ul').slideDown('slow');
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true;
         
         $(this).css('color','#00943a')
         $('.depth1 span').html('<i class="fa-solid fa-plus"></i>'); 
         $(this).find('span').html('<i class="fa-solid fa-minus"></i>'); 
            
       }else{
        $(this).css('color','#333')
         $(this).parents('.depth1').find('ul').slideUp('fast'); 
         onoff[ind]=false;   
           
         $(this).find('span').html('<i class="fa-solid fa-plus"></i>');   
       }
    });    
   
   

});


$(document).ready(function() {
  $('.family .arrow').click(function(){
  $('.family .FList').fadeIn('slow');			  
});

$('.family .FList').mouseleave(function(){
  $(this).fadeOut('fast');			  
});

   $('.family .arrow').toggle(function(){
  $('.family .FList').fadeIn('fast');	
  $(this).find('span').html('Famliy Site<i class="fas fa-chevron-down"></i>');	
},function(){
      $('.family .FList').fadeOut('fast');
  $(this).find('span').html('Famliy Site<i class="fas fa-chevron-up"></i>');	
});

});





$(document).ready(function() {

  $('.topMove').hide();
         
  $(window).on('scroll',function(){ 
       var scroll = $(window).scrollTop(); 

       if(scroll>600){
           $('.topMove').fadeIn('slow'); 
       }else{
           $('.topMove').fadeOut('fast');
       }
  });

   $('.topMove').click(function(e){
      e.preventDefault();
      $("html,body").stop().animate({"scrollTop":0},1000); 
   }); 
  
});