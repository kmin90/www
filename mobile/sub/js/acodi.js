


$(document).ready(function () {
    var account = $('.contentInner .account'); 
        account.find('span.plus')
        $('.contentInner .account:first').find('span.plus');
        
        $('.contentInner .account .trigger').click(function(e){ 
            e.preventDefault(); 
            var myArticle = $(this).parents('.account'); 
        
            if(myArticle.hasClass('hide')){  
                account.find('.a').slideUp(100);
                account.removeClass('show').addClass('hide'); 
    
                myArticle.removeClass('hide').addClass('show');  
                myArticle.find('.a').slideDown(100); 
            } else { 
                myArticle.removeClass('show').addClass('hide');  
                myArticle.find('.a').slideUp(100);  
            }  
      });
      
      //모두 여닫기 처리
      $('.all').toggle(function(e){
            e.preventDefault(); 
            account.find('.a').slideDown(800);
            account.removeClass('hide').addClass('show');
            account.parents().parents().find('.all').html('<span>모두닫기<i class="fa-solid fa-circle-minus"></i></span>');
           
      },function(e){
            e.preventDefault(); 
            account.find('.a').slideUp(100);
            account.removeClass('show').addClass('hide');
            account.parents().parents().find('.all').html('<span>모두열기<i class="fa-solid fa-circle-plus"></i></span>');
           
      });  
 
    
    
    });