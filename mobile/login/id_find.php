<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>유한양행-아이디찾기</title>

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="css/login.css">
<script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/jquery-migrate-1.4.1.min.js"></script>
<script>
	$(document).ready(function() {

         $(".find").click(function() {    // id입력 상자에 id값 입력시
            var name = $('#name').val(); //홍길동
            var hp1 = $('#hp1').val(); //010
            var hp2 = $('#hp2').val(); //1111
            var hp3 = $('#hp3').val(); //2222

            $.ajax({
                type: "POST",
                url: "find.php",  
                data: "name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3,  /*매개변수id도 같이 넘겨줌*/
                cache: false, 
                success: function(data) /*이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감*/
                {
                     $("#loadtext").html(data); /*span안에 있는 태그를 사용할것이기 때문에 html 함수사용*/
                }
            });
             
            $("#loadtext").addClass('loadtexton'); // css 변경
        }); 

    });
</script>
</head>
<body>
    <div id="wrap">
    <h1 class="hidden">유한양행</h1>
    <a class="logo" href="../index.html"><img src="../images/yuhan_logox2.png" alt="yuhan_logo"></a> 
	<div id="col2">
        <form name="find" method="get" action="find.php"> 
		<div id="title">
			<h2 class="hidden">아이디찾기</h2>
			<p><span>아이디 찾기</span>아래 정보를 입력해주세요.</p>
		</div>
       
		<div id="login_form">
			 <div class="clear"></div>

			 <div id="login2">
				<div id="id_input_button">
					<fieldset>
                        <label for="name">이름</label>
                        <input type="text" name="name" class="find_input" id="name" placeholder="이름을 입력해주세요">
                        <div class="telBox">
                            <label for="hp1">연락처</label>
                            <select name="hp1" id="hp1" title="휴대폰 앞3자리를 선택하세요." class="find_input">
                                <option>010</option>
                                <option>011</option>
                                <option>016</option>
                                <option>017</option>
                                <option>018</option>
                                <option>019</option>
                            </select> -
                            <label class="hidden" for="hp2">연락처 가운데3자리</label>
                            <input class="find_input hp" type="text" id="hp2" name="hp2" title="연락처 가운데3자리를 입력하세요." maxlength="4" placeholder="1234"> -
                            <label class="hidden" for="hp3">연락처 마지막3자리</label>
                            <input class="find_input hp" type="text" id="hp3" name="hp3" title="연락처 마지막3자리를 입력하세요." maxlength="4" placeholder="0000">
                        </div>
                        <input type="button" value="검색" class="find">
                    </fieldset>

                    <span id="loadtext">


                    </span>

                    <ul class="go">
                        <li><a href="login_form.php" class="loggo">로그인하러가기</a></li>
                        <li><a href="pw_find.php">비밀번호를 잊으셨나요?<br>비밀번호 찾기</a></li>
                    </ul>

				</div>
				<div class="clear"></div>
				
                <div id="login_line"></div>
				<div id="join_button"><a href="../member/join.html" class="go_join">아직 회원이 아니신가요?<br>회원가입 하러가기</a></div>
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->

</div> <!-- end of wrap -->
</body>
</html>