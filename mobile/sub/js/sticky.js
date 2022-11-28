$(document).ready(function() {


  $('.wp1').waypoint(function() {    //스크롤링시 효과가 발생할 요소의 클래스나 아이디명.
    $('.wp1').addClass('animated fadeInLeft');
  }, {
    offset: '75%'            //스크롤과의 거리
  });
  $('.wp2').waypoint(function() {
    $('.wp2').addClass('animated fadeInUp');
  }, {
    offset: '75%'
  });        
  $('.wp3').waypoint(function() {
    $('.wp3').addClass('animated fadeInDown');
  }, {
    offset: '50%'
  });
  $('.wp4').waypoint(function() {
    $('.wp4').addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });
  $('.wp5').waypoint(function() {
    $('.wp5').addClass('animated fadeInRight');
  }, {
    offset: '75%'
  });


var sticky = new Waypoint.Sticky({
 element: $('.historyNav')[0]
});
 
});


$(document).ready(function () {
        
  $('.historyNav ul li:eq(0)').find('a').addClass('current');


// var smh= $('.contentArea').offset().top + $('.historyNav').height();
var h1= $('.historyInner #historyList1').offset().top -100;
var h2= $('.historyInner #historyList2').offset().top -100;
var h3= $('.historyInner #historyList3').offset().top -100;


$(window).on('scroll',function(){
    var scroll = $(window).scrollTop();
    
  
    // if(scroll>smh){ 
    //     $('.historyNav').addClass('navOn');
    // }else{
    //     $('.historyNav').removeClass('navOn');
    // }
    
    
      $('.historyNav ul li').find('a').removeClass('current');
    
    
     var cnt=0;
   
          
            if(scroll>=h1 && scroll<h2){
                cnt=0;
            }else if(scroll>=h2 && scroll<h3){
                cnt=1;
            }else if(scroll>=h3){
                cnt=2;
            }
       $('.historyNav ul li:eq('+cnt+')').find('a').addClass('current');

    
});
});

$(document).ready(function () {

  $('.historyNav a').click(function(e){
     e.preventDefault();

      var value=0;

      if($(this).hasClass('link1')){  
         value= $('.historyInner #historyList1').offset().top-90;  
      }else if($(this).hasClass('link2')){
         value= $('.historyInner #historyList2').offset().top-90; 
      }else if($(this).hasClass('link3')){
         value= $('.historyInner #historyList3').offset().top-90; 
      }
      
    $("html,body").stop().animate({"scrollTop":value},1000);
  });
});