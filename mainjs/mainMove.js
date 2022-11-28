// JavaScript Document

$(document).ready(function () {
  //메인이미지 롤링//
  var timeonoff;
  var imageCount = $(".gallery ul li").size();
  var cnt = 1;
  var onoff = true;

  $(".btn1").css("background", "#fff");
  $(".btn1").css("width", "35");

  $(".gallery .link1").fadeIn("slow");
  $(".gallery .link1 p").delay(500).animate({ top: 380, opacity: 1 }, "slow");

  function moveg() {
    if (cnt == imageCount + 1) cnt = 1;
    if (cnt == imageCount) cnt = 0;
    cnt++;

    $(".gallery li").hide();
    $(".gallery .link" + cnt).fadeIn("slow");

    $(".mbutton").css("background", "rgba(255, 255, 255, .5)");
    $(".mbutton").css("width", "14");
    $(".btn" + cnt).css("background", "#fff");
    $(".btn" + cnt).css("width", "35");

    $(".gallery li p").css("top", 430).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find("p")
      .delay(500)
      .animate({ top: 380, opacity: 1 }, "slow");

    if (cnt == imageCount) cnt = 0;
  }

  timeonoff = setInterval(moveg, 4000);

  $(".mbutton").click(function (event) {
    var $target = $(event.target);
    clearInterval(timeonoff);

    $(".gallery li").hide();

    if ($target.is(".btn1")) {
      cnt = 1;
    } else if ($target.is(".btn2")) {
      cnt = 2;
    } else if ($target.is(".btn3")) {
      cnt = 3;
    }

    $(".gallery .link" + cnt).fadeIn("slow");

    $(".mbutton").css("background", "rgba(255, 255, 255, .5)");
    $(".mbutton").css("width", "14");
    $(".btn" + cnt).css("background", "#fff");
    $(".btn" + cnt).css("width", "35");

    $(".gallery li p").css("top", 430).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find("p")
      .delay(500)
      .animate({ top: 380, opacity: 1 }, "slow");

    timeonoff = setInterval(moveg, 4000);

    if (onoff == false) {
      onoff = true;
      $(".ps").html(
        '<span class="hidden">stop</span><i class="fa-solid fa-pause"></i>'
      );
    }
  });

  //stop/play 버튼 클릭시 타이머 동작/중지
  $(".ps").click(function () {
    if (onoff == true) {
      clearInterval(timeonoff);
      $(this).html(
        '<span class="hidden">play</span><i class="fa-solid fa-play"></i>'
      ); //js파일에서는 경로의 기준이 html파일이 기준!!
      onoff = false;
    } else {
      timeonoff = setInterval(moveg, 4000);
      $(this).html(
        '<span class="hidden">stop</span><i class="fa-solid fa-pause"></i>'
      );
      onoff = true;
    }
  });

  $(".visual .btn").click(function () {
    clearInterval(timeonoff);

    if ($(this).is(".btnRight")) {
      if (cnt == imageCount) cnt = 0;

      cnt++;
    } else if ($(this).is(".btnLeft")) {
      if (cnt == 1) cnt = imageCount + 1;
      if (cnt == 0) cnt = imageCount;
      cnt--;
    }

    $(".gallery li").hide();
    $(".gallery .link" + cnt).fadeIn("slow");

    $(".mbutton").css("background", "rgba(255, 255, 255, .5)");
    $(".mbutton").css("width", "14");
    $(".btn" + cnt).css("background", "#fff");
    $(".btn" + cnt).css("width", "35");

    $(".gallery li p").css("top", 350).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find("p")
      .delay(500)
      .animate({ top: 300, opacity: 1 }, "slow");

    timeonoff = setInterval(moveg, 4000);

    if (onoff == false) {
      onoff = true;
      $(".ps").html(
        '<span class="hidden">stop</span><i class="fa-solid fa-pause"></i>'
      );
    }
  });

  //본문전체 움직임//
  $(document).ready(function () {
    $("#content").find(".Rmove:eq(0)").addClass("boxMove");
    $("#content").find(".Rmove:eq(1)").addClass("boxMove");
    // $('#content .sect:eq(0)').addClass('boxMove');

    // var smh= $('.visual').height();
    var h0 = $("#content .sect:eq(0)").offset().top - 600;
    var h1 = $("#content .sect:eq(1)").offset().top - 600;
    var h2 = $("#content .sect:eq(2)").offset().top - 600;
    var h3 = $("#content .sect:eq(3)").offset().top - 600;
    var h4 = $("#content .sect:eq(4)").offset().top - 600;
    var h5 = $("#content .sect:eq(5)").offset().top - 600;
    var h6 = $("#content .sect:eq(6)").offset().top - 600;
    var h7 = $("#content .sect:eq(7)").offset().top - 600;
    var h8 = $("#content .sect:eq(8)").offset().top - 600;

    $(window).on("scroll", function () {
      var scroll2 = $(window).scrollTop();
      var cnt = 0;

      if (scroll2 >= 0 && scroll2 < h0) {
        cnt = 0;
      } else if (scroll2 >= h0 && scroll2 < h1) {
        cnt = 1;
      } else if (scroll2 >= h1 && scroll2 < h2) {
        cnt = 2;
      } else if (scroll2 >= h2 && scroll2 < h3) {
        cnt = 3;
      } else if (scroll2 >= h3 && scroll2 < h4) {
        cnt = 4;
      } else if (scroll2 >= h4 && scroll2 < h5) {
        cnt = 5;
      } else if (scroll2 >= h5 && scroll2 < h6) {
        cnt = 6;
      } else if (scroll2 >= h6 && scroll2 < h7) {
        cnt = 7;
      } else if (scroll2 >= h7 && scroll2 < h8) {
        cnt = 8;
      } else if (scroll2 >= h8) {
        cnt = 9;
      }

      $("#content .sect:eq(" + cnt + ")").addClass("boxMove");
      $("#content")
        .find(".Rmove:eq(" + cnt + ")")
        .addClass("boxMove");
    });
  });

  //제품소개 //

  $(document).ready(function () {
    var pcnt = 1;
    var totalcnt = 3;

    $(".next").click(function (e) {
      e.preventDefault();

      pcnt++;
      if (pcnt > totalcnt) {
        pcnt = 1;
      }

      $(".newProduct .conBox1").hide().show();
      $(".newProduct .conBox1 ul li")
        .first()
        .appendTo(".newProduct .conBox1 ul");
    });

    $(".before").click(function (e) {
      e.preventDefault();
      pcnt--;
      if (pcnt < 1) {
        pcnt = totalcnt;
      }

      $(".newProduct ul li").last().prependTo(".newProduct .conBox1 ul");
    });

    function change() {
      pcnt++;
      if (pcnt > totalcnt) {
        pcnt = 1;
      }

      $(".newProduct .conBox1").hide().show();
      $(".newProduct .conBox1 ul li")
        .first()
        .appendTo(".newProduct .conBox1 ul");
    }
  });

  //conbox4 아코디언//

  $(".social ul li").mouseenter(function (event) {
    var $target = $(event.target);

    if ($target.is(".social ul li.socialBox1")) {
      $(".social .img01").css("width", 745).animate({ left: [0, "easeOutQuad"] }, 0).clearQueue();
      $(".social .up1")
        .css("background-color", "rgba(0, 0, 0, 0.6)")
        .animate({ bottom: [-40, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img02")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up2")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img03")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up3")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img04")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up4")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      cnt = 1;
    } else if ($target.is(".social ul li.socialBox2")) {
      $(".social .img01")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up1")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img02")
        .css("width", 745)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up2")
        .css("background-color", "rgba(0, 0, 0, 0.6)")
        .animate({ bottom: [-40, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img03")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up3")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img04")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up4")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      cnt = 2;
    } else if ($target.is(".social ul li.socialBox3")) {
      $(".social .img01")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up1")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img02")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up2")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img03")
        .css("width", 745)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up3")
        .css("background-color", "rgba(0, 0, 0, 0.6)")
        .animate({ bottom: [-40, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img04")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up4")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      cnt = 3;
    } else if ($target.is(".social ul li.socialBox4")) {
      $(".social .img01")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up1")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img02")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up2")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .img03")
        .css("width", 245)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up3")
        .css("background-color", "rgba(0, 0, 0, 0)")
        .animate({ bottom: [-240, "easeOutQuad"] }, 0)
       .clearQueue();
      $(".social .img04")
        .css("width", 745)
        .animate({ left: [0, "easeOutQuad"] }, 0)
        .clearQueue();
      $(".social .up4")
        .css("background-color", "rgba(0, 0, 0, 0.6)")
        .animate({ bottom: [-40, "easeOutQuad"] }, 0)
        .clearQueue();
      cnt = 4;
    }
  });

  $(".social ul li").mouseleave(function () {
    $(".social .img01")
      .css("width", 370)
      .animate({ left: [0, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .img02")
      .css("width", 370)
      .animate({ left: [0, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .img03")
      .css("width", 370)
      .animate({ left: [0, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .img04")
      .css("width", 370)
      .animate({ left: [0, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .up1")
      .css("background-color", "rgba(0, 0, 0, 0)")
      .animate({ bottom: [-240, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .up2")
      .css("background-color", "rgba(0, 0, 0, 0)")
      .animate({ bottom: [-240, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .up3")
      .css("background-color", "rgba(0, 0, 0, 0)")
      .animate({ bottom: [-240, "easeOutQuad"] }, 0)
      .clearQueue();
    $(".social .up4")
      .css("background-color", "rgba(0, 0, 0, 0)")
      .animate({ bottom: [-240, "easeOutQuad"] }, 0)
      .clearQueue();
  });
});
