<?
  session_start();
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['userlevel']);

  echo("
       <script>
          window.alert('로그아웃되셨습니다.');
          location.href = '../index.html'; 
        </script>
       ");
?>
