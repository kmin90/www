<? 
	session_start(); 
	
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION);

	include "../../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">

<link rel="stylesheet" href="../../common/css/common.css" >
<link rel="stylesheet" href="../common/css/sub6common.css" >
<link rel="stylesheet" href="../css/sub6_content1.css" >
<script
      src="https://kit.fontawesome.com/cb50a41295.js"
      crossorigin="anonymous"
    ></script>

</head>

<body>
<div id="wrap">

	<? include "../../common/subphp_header.html"; ?>

  <div class="main">
        <img src="../common/images/sub6_bg.png" alt="고객지원배경이미지" >
        <h3>고객지원</h3>
        <p>Customer Support</p>
      </div>
      <div class="subNav">
        <ul>
          <li><a href="../../sub6/greet/list.php" class="current">뉴스&공지</a></li>
          <li><a href="../../sub6/sub6_2.html">자주묻는질문</a></li>
          <li><a href="../../sub6/sub6_3.html">온라인상담</a></li>
        </ul>
      </div>
      <article id="content">
        <div class="titleArea">
          <div class="lineMap">
            <span class="home">home</span>&gt; <span>고객지원</span>&gt;
            <strong>뉴스&공지</strong>
          </div>
          <h2>뉴스&공지</h2>
        </div>

	<div id="col2">        

		<div class="clear"></div>

		<div id="write_form_title">
			내 글 수정하기
		</div>

		<div class="clear"></div>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit" class="btn" value="수정">&nbsp;
								<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> 
  <? include "../../common/subphp_footer.html"; ?>
</div> <!-- end of wrap -->

</body>
</html>