


$(document).ready(function () {
var account = $('.contentInner .account');  //모든 질문 답변 리스트
	//account.find('.a').slideUp(100); // 모든 답변 닫아라
    $('.contentInner li:eq(0) .a').slideDown(100);
    account.find('span.plus').html('<i class="fas fa-chevron-down"></i>');
    $('.contentInner .account:first').find('.a').slideDown(800);
    $('.contentInner .account:first').find('span.plus').html('<i class="fas fa-chevron-up"></i>');
	
	$('.contentInner .account .trigger').click(function(e){  // 각각의 질문을 클릭하면
	    e.preventDefault();  //<a href="#"> 태그 링크 처리
        var myArticle = $(this).parents('.account'); //클릭한 해당 list 
	
        if(myArticle.hasClass('hide')){   //클릭한 해당 리스트의 상태가 hide냐?? 답변이 닫혀있냐??
            account.find('.a').slideUp(100); //모든 답변을 닫아라
            account.removeClass('show').addClass('hide'); // 모든 리스트를 hide교체
            account.find('span.plus').html('<i class="fas fa-chevron-down"></i>');

            myArticle.removeClass('hide').addClass('show');  // show로 바꾼다 
            myArticle.find('.a').slideDown(100);  //해당 리스트의 답변을 열어라  
            myArticle.find('span.plus').html('<i class="fas fa-chevron-up"></i>');
        } else {  // 'show' 답변이 열려있냐??
            myArticle.removeClass('show').addClass('hide');  // hide로 바꾼다 
            myArticle.find('.a').slideUp(100);  //해당 리스트의 답변을 닫아라  
            myArticle.find('span.plus').html('<i class="fas fa-chevron-down"></i>');
        }  
  });
  
  //모두 여닫기 처리
  $('.all').toggle(function(e){
        e.preventDefault(); 
        account.find('.a').slideDown(800);
        account.removeClass('hide').addClass('show');
        account.find('span.plus').html('<i class="fas fa-chevron-up"></i>');
        account.parents().parents().find('.all').html('<span>모두닫기<i class="fa-solid fa-circle-minus"></i></span>');
  },function(e){
        e.preventDefault(); 
        account.find('.a').slideUp(100);
        account.removeClass('show').addClass('hide');
        account.find('span.plus').html('<i class="fas fa-chevron-down"></i>');
        account.parents().parents().find('.all').html('<span>모두열기<i class="fa-solid fa-circle-plus"></i></span>');
  });  

//tap menu

    var cnt=$('.contentInner li').size();
    $('.contentInner .table1:eq(0)').show(); // 첫번째 탭 내용만 열어라
    $('.contentInner .tab1').css('color','#3672c3').css('border-bottom',0).css('border-top',' 2px solid #3672c3'); //첫번째 탭메뉴 활성화
               //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***
      
    $('.contentInner .tab').click(function(e){
          e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
          
          var ind = $(this).index('.contentInner .tab');  // 클릭시 해당 index를 뽑아준다

          $(".contentInner .table1").hide(); //모든 탭내용을 안보이게...
          $(".contentInner .table1:eq("+ind+")").show(); //클릭한 해당 탭내용만 보여라
          $('.tab').css('color','#333').css('border',' 1px solid #ccc' ); //모든 탭메뉴를 비활성화
          $(this).css('color','#3672c3').css('border-bottom',0).css('border-top',' 2px solid #3672c3'); // 클릭한 해당 탭메뉴만 활성화

     });


});