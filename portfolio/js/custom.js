$(document).ready(function(){

	var ht = $(window).height();	
	$("section").height(ht);
	$("html,body").stop().animate({"scrollTop":0},'slow');
	
	$(window).on("resize",function(){
		ht = $(window).height();	
		$("section").height(ht);
	});	
	




	$("#gnb li").on("click",function(e){
		e.preventDefault();
		
		var ht = $(window).height();
		var i = $(this).index();
		var nowTop = i*ht;			

		$("html,body").stop().animate({"scrollTop":nowTop},1400);
	});
	
    $(window).on("scroll",function(){	
	
		var ht = $(window).height();
		var scroll = $(window).scrollTop();
		
		for(var i=0; i<7;i++){
			if(scroll>=ht*i && scroll< ht*(i+1)){
				$("#gnb li").removeClass();
				$("#gnb li").eq(i).addClass("on");
			};
		}
	});



		$("section").on("mousewheel",function(event,delta){    
           
              if (delta > 0) {  
                
                 var prev = $(this).prev().offset().top;
              
                 $("html,body").stop().animate({"scrollTop":prev},'slow');
                 return false;
           
              }else if (delta < 0) {  
               
                 var next = $(this).next().offset().top;
                 
                 $("html,body").stop().animate({"scrollTop":next},'slow');   
                 return false;                                      
              }
              
         });
    
  
	
			var op = false; 
	
			$(".menu_ham").click(function(e) { 
				e.preventDefault();

				var documentHeight =  $(document).height();
				
				$("#gnb").css('height',documentHeight); 
		 
			   if(op==false){
				 $("#gnb ul").animate({right:'-20px', opacity:1}, 'fast');
				 $('#headerArea').addClass('mn_open');
				 op=true;
			   }else{
			
				 $("#gnb ul").animate({right:'-100%', opacity:1}, 'fast');
				 $('#headerArea').removeClass('mn_open');
				 op=false;
			   }
		 
			 
			});
		
		
				


const options = {
	root: null, 
	rootMargin: "0px",
	threshold: .5, 
  }
  
  const observer = new IntersectionObserver(entries => {
	entries.forEach(entry => {
	  console.log(entry.isIntersecting);
	  if (entry.isIntersecting) {
		entry.target.classList.add("active");
	  } else {
		entry.target.classList.remove("active");
	  }
	});
  }, options);
  
  const titleList = document.querySelectorAll('.down');
  const titleList1 = document.querySelectorAll('.left');
  const titleList2 = document.querySelectorAll('.right');
  

  titleList.forEach(el => observer.observe(el));
  titleList1.forEach(el => observer.observe(el));
  titleList2.forEach(el => observer.observe(el));

});

 





