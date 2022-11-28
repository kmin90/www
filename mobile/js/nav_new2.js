$(document).ready(function() {
   var op = false; 
 	
   $(".menu_ham").click(function() { 
       
       var documentHeight =  $(document).height();
       $("#gnb").css('height',documentHeight); 

      if(op==false){
        $("#gnb").animate({right:0,opacity:1}, 'fast');
        $('#headerArea').addClass('mn_open');
        op=true;
      }else{
        $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
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
           
         $('.depth1 span').html('<i class="fa-solid fa-plus"></i>'); 
         $(this).find('span').html('<i class="fa-solid fa-minus"></i>'); 
            
       }else{
         $(this).parents('.depth1').find('ul').slideUp('fast'); 
         onoff[ind]=false;   
           
         $(this).find('span').html('<i class="fa-solid fa-plus"></i>');   
       }
    });    
   
   

});


