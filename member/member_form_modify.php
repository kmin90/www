<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="../common/css/common.css">
<link rel="stylesheet" href="./css/member_check.css" >
<script>
        $(document).ready(function() {
            //pw-pw_confirm 중복검사
            $("#pass, #pass_confirm").keyup(function() {    
                var pass = $('#pass').val(); 
                var pass_confirm = $('#pass_confirm').val();

                $.ajax({
                    type: "POST",
                    url: "check_pw.php",
                    data: {"pass_confirm": pass_confirm,
                    "pass": pass},
                    cache: false, 
                    success: function(data)
                    {
                        $("#loadtext1").html(data);
                    }
                });
            });
        });
   </script>
<script>
  //  function check_id()
  //  {
  //    window.open("check_id.php?id=" + document.member_form.id.value,
  //        "IDcheck",
  //         "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
  //  }

  //  function check_nick()
  //  {
  //    window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
  //        "NICKcheck",
  //         "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
  //  }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
<!-- <script>

$("#pass, #pass_confirm").keyup(function() {    
      var pass = $('#pass').val(); 
      var pass_confirm = $('#pass_confirm').val();

      $.ajax({
          type: "POST",
          url: "check_pw.php",
          data: {"pass_confirm": pass_confirm,
          "pass": pass},
          cache: false, 
          success: function(data)
          {
              $("#loadtext1").html(data);
          }
      });
  });

  $("#nick").keyup(function() {   
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 
</script> -->

</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = '010';
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
<div id="wrap">
              <div id="header">
              <h1 class="hidden">유한양행</h1>
    <a class="logo" href="../index.html"><img src="../common/images/yuhan_logo.png" alt="yuhan_logo"></a> 
                <? include "../lib/top_login2.php"; ?>
              </div>  <!-- end of header -->
            
              <div id="menu">
              <? include "../lib/top_menu2.php"; ?>
              </div>  <!-- end of menu --> 
              
              <div id="content">
              <div id="col1">
                <div id="left_menu">
            <?
                  include "../lib/left_menu.php";
            ?>
                </div>
              </div> <!-- end of col1 -->
            
              <div id="col2">
                    <form  name="member_form" method="post" action="modify.php"> 
                <div id="title">
                  <h3>내 프로필 수정</h3>
                </div>
            
            
                <div id="form_join">
                  <div id="join1">
                    <ul>
                      <li>아이디</li>
                      <li>비밀번호 수정</li>
                      <li>비밀번호 수정 확인</li>
                      <li>이름</li>
                      <li>닉네임</li>
                      <li>휴대폰</li>
                      <li>이메일</li>
                    </ul>
                  </div>
                  <div id="join2">
                            <ul>
                                <li><?= $row[id] ?></li>
                                <li><input type="password" name="pass" value="" maxlength="8" id="pass"></li>
                                <li><input type="password" name="pass_confirm" value="" maxlength="8" id="pass_confirm">8자이내
                                <span id="loadtext1"></span>
                              </li>
                                <li><input type="text" name="name" value="<?= $row[name] ?>"></li>
                                <li><div id="nick1"><input type="text" id="nick" name="nick" value="<?= $row[nick] ?>">
                                <span id="loadtext2"></span></div>
                        </li>
                            <li>
                            <select class="hp" name="hp1" id="hp1"> 
                                <option value='010' <? if($hp1=='010') echo 'selected'; ?>>010</option>
                                <option value='011' <? if($hp1=='011') echo 'selected'; ?>>011</option>
                                <option value='016' <? if($hp1=='016') echo 'selected'; ?>>016</option>
                                <option value='017' <? if($hp1=='017') echo 'selected'; ?>>017</option>
                                <option value='018' <? if($hp1=='018') echo 'selected'; ?>>018</option>
                                <option value='019' <? if($hp1=='019') echo 'selected'; ?>>019</option>
                            </select>
                            -<input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>"></li>
                                <li><input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" value="<?= $email2 ?>"></li>
                            </ul>
                  </div>
                  <div class="clear"></div>
                </div>
            
                <div id="button"><a href="#" onclick="check_input()">수정</a>&nbsp;&nbsp;
                                 <a href="#" onclick="reset_form()">취소</a>
                </div>
                  </form>
              </div>
              </div>
            </div>
            

</body>
</html>
