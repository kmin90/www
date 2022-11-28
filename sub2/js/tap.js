

$(document).ready(function(){
    var cnt=$('#logoTap li').size();
    $('.contentInner .contlist:eq(0)').show(); // 첫번째 탭 내용만 열어라
    $('.contentInner .tab1').css('filter','grayscale(0)'); //첫번째 탭메뉴 활성화
              
      
    $('.contentInner .tab').click(function(e){
          e.preventDefault();  

          var ind = $(this).index('.contentInner .tab'); 

          $(".contentInner .contlist").hide(); //모든 탭내용을 안보이게...
          $(".contentInner .contlist:eq("+ind+")").show(); //클릭한 해당 탭내용만 보여라
          $('.tab').css('filter','grayscale(1)'); //모든 탭메뉴를 비활성화
          $(this).css('filter','grayscale(0)') // 클릭한 해당 탭메뉴만 활성화

     });


     $('.openBtn').on('click', function(e){
        e.preventDefault();
        
        $(this).next().next('.popup').fadeIn('slow');
        $('.modal_box').show();
    });
   
   $('.close_btn, .modal_box').on('click', function(e){
        e.preventDefault();

        $('.popup').fadeOut('fast');
        $('.modal_box').hide();
   });



  });
