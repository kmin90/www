$(document).ready(function(){   

    /*숫자 자동입력*/

    var memberCountConTxt= 16;
  
    $({ val : 0 }).animate({ val : memberCountConTxt }, {
     duration: 2000,
    step: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count1").text(number);
    },
    complete: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count1").text(number);
    }
  });
  
   var memberCountConTxt= 16512000;
    
    $({ val : 0 }).animate({ val : memberCountConTxt }, {
     duration: 2000,
    step: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count2").text(number);
    },
    complete: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count2").text(number);
    }
  });
  
  function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  
  
   var memberCountConTxt= 22;
    
    $({ val : 0 }).animate({ val : memberCountConTxt }, {
     duration: 2000,
    step: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count3").text(number);
    },
    complete: function() {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count3").text(number);
    }
});
});


