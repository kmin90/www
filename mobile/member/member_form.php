<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>유한양행-회원가입</title>
    <link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="./css/member_check.css">
	
	
	<script src="./js/jquery-1.12.4.min.js"></script>
  <script src="./js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //aaa

    $.ajax({
        type: "POST",
        url: "check_id.php",
        data: "id="+ id,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
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


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

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
		   // insert.php 로 변수 전송
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
<script>
$(document).ready(function(){
    $('#nick').keyup(function(){
        if ($(this).val().length > $(this).attr('maxlength')) {
            alert('제한길이 초과');
            $(this).val($(this).val().substr(0, $(this).attr('maxlength')));
        }
    });
});
</script>
</head>
<body>

	 <h1 class="hidden">유한양행</h1>
     <a class="logo" href="../index.html"><img src="../images/yuhan_logox2.png" alt="yuhan_logo"></a>  
	<article id="content">  
	  
	  <h2>회원가입</h2>
      <p>필수</p>
	  <form  name="member_form" method="post" action="insert.php"> 
		
     <table>
      <caption class="hidden">회원가입</caption>
     	<tr>
     		<th scope="col"><label for="id" class="hidden">아이디</label></th>
     		<td>
     			 <input type="text" name="id" autocomplete="off"
                  placeholder="아이디 입력" required>
			     <span id="loadtext"></span>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass" class="hidden">비밀번호</label></th>
     		<td>
     			 <input type="password" name="pass" id="pass" autocomplete="off" maxlength="8" placeholder="비밀번호 8자 이내"  required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm" class="hidden">비밀번호확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm" autocomplete="off" maxlength="8" placeholder="비밀번호 재입력" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name" class="hidden">이름</label></th>
     		<td>
     			<input type="text" name="name" id="name" autocomplete="off" placeholder="이름 입력" required> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick" class="hidden">닉네임</label></th>
     		<td>
     			 <input type="text" name="nick" id="nick" autocomplete="off" maxlength="10" placeholder="10자 이내" required>
			     <span id="loadtext2"></span>
     		</td>
     	</tr>

     	<tr>
     		<th scope="col" class="hidden">휴대폰번호</th>
           
     		<td> <span class="hp_label">휴대폰번호</span>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
          </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" autocomplete="off" placeholder="0000" required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" autocomplete="off" placeholder="0000"  required>
     			
     		</td>
     	</tr>
     	<tr>
     		<th scope="col" class="hidden">이메일</th>
     		<td><span class="email_label">이메일</span>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1" required> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2"  required>
     		</td>
     	</tr>
     	<tr>
     		<td colspan="2" >
     			<a href="#" onclick="check_input()">확인</a>&nbsp;&nbsp;
                <a href="#" onclick="reset_form()">다시쓰기</a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>

</body>
</html>


