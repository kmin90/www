


$(document).ready(function () {
    var account = $('.qna .account'); 
        $('.qna li:eq(0) .a').slideDown(100);
        $('.qna .account:first').find('.a').slideDown(800);
        
        $('.qna .account .trigger').click(function(e){ 
            e.preventDefault(); 
            var myArticle = $(this).parents('.account'); 
        
            if(myArticle.hasClass('hide')){   
                account.find('.a').slideUp(100); 
                account.removeClass('show').addClass('hide'); 
    
                myArticle.removeClass('hide').addClass('show'); 
                myArticle.find('.a').slideDown(100); 
            } 
            else { 
                myArticle.removeClass('show').addClass('hide');  
                myArticle.find('.a').slideUp(100);  
            }  
 });
      

    
    });

 
