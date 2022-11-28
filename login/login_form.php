<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>유한양행-로그인</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
</head>
<body>
<h1 class="hidden">유한양행</h1>
    <a class="logo" href="../index.html"><img src="../common/images/yuhan_logo.png" alt="yuhan_logo"></a> 
<form name="member_form" method="post" action="login.php"> 

    <div id="id_pw_input">
        <h2>로그인</h2>
        <ul>
            <li><span>아이디</span>
                <input type="text" name="id" class="login_input" required></li>
            <li><span>비밀번호</span>
                <input type="password" name="pass" class="login_input" required></li>
        </ul>						
	</div>
    <div id="login_button">
		<button type="submit">로그인</button>
	</div>
    <div id="join_button">
        <a href="../member/join.html">아직 회원이 아니신가요? 회원가입하러가기</a>
    </div>

    <ul>
        <li><img src="image/Security_icon.png" alt="Security_icon"></li>
        <li>
            <span><a href="id_find.php">아이디 찾기</a></span>
            <span><a href="pw_find.php">비밀번호 찾기</a></span>
        </li>
	</ul>

</form>

</body>
</html>