<? 
	session_start(); 

	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION);
	
	include "../../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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

<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

<body>

<? include "../../common/subphp_header.html" ?>
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
  
  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div>

	<div id="col2">
        
	

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>&nbsp;
            	<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
