
$(document).ready(function() {

   var on_off=false;  
   
       $('#headerArea').mouseenter(function(){
         var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
          
           on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  
           
           if(scroll ){
               $(this).css('background','#fff').css('border-bottom','1px solid #ccc'); 
            
           }else{
               $(this).css('background','#fff'); 
           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){
           var scroll = $(window).scrollTop();  
           
           if(scroll){
               $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
              
           }else{
              if(on_off==false){ 
                   $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
                 
              }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:300},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').hide();
          $('#headerArea').animate({height:80},'fast').clearQueue();
     });
    


     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:300},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:80},'normal').clearQueue();
    });

    //top메뉴
    $('.topMove').hide();
           
    $(window).on('scroll',function(){ 
         var scroll = $(window).scrollTop(); 
        
        
         $('.text').text(Math.floor(scroll));

         if(scroll>800){
             $('.topMove').fadeIn('slow'); 
         }else{
             $('.topMove').fadeOut('fast');
         }
    });
  
     $('.topMove').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1000); 
     });



//conbox3 mouseenter

$('.conBox3 ul li img:eq(0)').show();
$('.conBox3 ul li:eq(0)').children('dl').css('width',562).css('color','#fff').css('background','#3672c3');
$('.conBox3 ul li img:eq(0)').css('right',0);

$('.conBox3 ul li dl').each(function(index){
    $(this).mouseenter(function(){
        
        
        $('.conBox3 ul li img').hide();
        $('.conBox3 ul li img:eq('+index+')').show();

        $('.conBox3 ul li img').css('right',50);
        // $(this).css('right',50);

        $('.conBox3 ul li dl').css('width',518).css('color','#333').css('background','#fff'); 
        $(this).css('width',562).css('color','#fff').css('background','#3672c3');
        $('.conBox3 ul li img').css('right',0);
    });
});



     //family toggle

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
	
	//tab키 처리
	  $('.family .arrow').on('focus', function () {        
              $('.family .FList').fadeIn('fast');
			  $(this).find('span').html('Famliy Site<i class="fas fa-chevron-down"></i>');	
       });
       $('.family .FList li:last a').on('blur', function () {        
              $('.family .FList').fadeOut('fast');
			  $(this).find('span').html('Famliy Site<i class="fas fa-chevron-up"></i>');
       });
});
