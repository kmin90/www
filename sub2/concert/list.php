<? 
	session_start(); 
	$table = "concert";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="../../common/css/common.css" >
<link rel="stylesheet" href="../common/css/sub2common.css" >
<link rel="stylesheet" href="../css/sub2_content1.css" >
<script
      src="https://kit.fontawesome.com/cb50a41295.js"
      crossorigin="anonymous"
    ></script>
  
</head>
<?
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../../lib/dbconn.php";
	if(!$scale)
	$scale=6;		

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find1 like '%$search%' or $find2 like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>
<? include "../../common/subphp_header.html" ?>
      <div class="main">
        <img src="../common/images/sub2_bg.jpg" alt="제품소개배경이미지" >
        <h3>제품정보</h3>
        <p>Product Information</p>
      </div>
      <div class="subNav">
        <ul>
          <li><a href="../../sub2/concert/list.php" class="current">제품소개</a></li>
          <li><a href="../../sub2/sub2_3.html">브랜드</a></li>
        </ul>
      </div>
      <article id="content">
        <div class="titleArea">
          <div class="lineMap">
            <span class="home">home</span>&gt; <span>제품정보</span>&gt;
            <strong>제품소개</strong>
          </div>
          <h2>제품소개</h2>
        </div>
	<div class="contentArea">
          <p>
            유한양행의 다양한 제품들을 찾아 볼 수 있습니다.
          </p>
          <div class="contentInner">
        
			<form  name="board_form" method="post" action="../concert/list.php?mode=search&table=concert">
            <label for="find1"></label>
            <input type="hidden" name="find1" id="name" value="subject">
			<label for="find2"></label>
            <input type="hidden" name="find2" value="content">
				<div id="list_search">
					<div id="list_search1"> <input
                      type="text"
                      name="search"
                      id="searchIn"
                      autocomplete="off"
                      placeholder="제품명/효능으로 검색하실 수 있습니다."
                    ></div>
				<div id="list_search2"><input type="submit" name="btn" id="btn" value="검색버튼"></div>
				</div>
			</form>
			<dl>
				<dt>인기검색어</dt>
				<dd><a href="http://kmin90.cafe24.com/sub2/concert/list.php?table=concert&mode=search&find1=subject&find2=content&search=비타민">&#35;비타민</a></dd>
				<dd><a href="http://kmin90.cafe24.com/sub2/concert/list.php?table=concert&mode=search&find1=subject&find2=content&search=소화제">&#35;소화제</a></dd>
				<dd><a href="http://kmin90.cafe24.com/sub2/concert/list.php?table=concert&mode=search&find1=subject&find2=content&search=생리통">&#35;생리통</a></dd>
				<dd><a href="http://kmin90.cafe24.com/sub2/concert/list.php?table=concert&mode=search&find1=subject&find2=content&search=두통">&#35;두통</a></dd>
				<dd><a href="http://kmin90.cafe24.com/sub2/concert/list.php?table=concert&mode=search&find1=subject&find2=content&search=결막염">&#35;결막염</a></dd>
			</dl>
		<div id="list_box">
		<div id="list_search3">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.</div>
		<div class="clear"></div>

		
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
	  $item_date    = $row[regist_day];
	  $item_category   = $row[category];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if($row[file_copied_0]){
		$item_img = './data/'.$row[file_copied_0];
	 } else if($row[file_copied_1]){
		$item_img = './data/'.$row[file_copied_1];
	 } else if($row[file_copied_2]){
		$item_img = './data/'.$row[file_copied_2];
	 } else{
		$item_img = './data/default.jpg';
	 }

?>
			<div id="list_item">
				<ul>
					<li><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
						<div id="list_item1"><img src="<?=$item_img?>" alt="이미지"></div>
						<div id="list_item1_2">
							<div id="list_item2"><?= $item_subject ?></div>
							<div id="list_item3"><?= $item_category ?></div>
							<div id="list_item4"><?= $item_nick ?></div>
							<div id="list_item5"><?= $item_date ?>
							<i class="fa-regular fa-eye"></i><?= $item_hit ?></div>
						</div>
						
						
					</a></li>
				</ul>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> < &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;>
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
</div>
	
		<div class="clear"></div>
</div>   
</div>

</div>
  <? include "../../common/subphp_footer.html"; ?>


</body>
</html>
