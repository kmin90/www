$(document).ready(function() {
  
    $('.openBtn2').on('click', function(e){
    e.preventDefault();
    
    $(this).next().next('.popup').fadeIn('slow');
    $('.modal_box2').show();
  });

  $('.close_btn2, .modal_box2').on('click', function(e){
    e.preventDefault();

    $('.popup').fadeOut('fast');
    $('.modal_box2').hide();
  });
});

