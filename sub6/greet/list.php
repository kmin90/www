<? 
	session_start();
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
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION);

	include "../../lib/dbconn.php";

	if(!$scale) $scale=8;			// 한 화면에 표시되는 게시글 수

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

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
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
<div id="wrap">

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
  </div>  <!-- end of menu --> 

  <div id="content">

	<div id="col2">

		<form  name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
			<div id="list_search1">▶ 총 <?= $total_record ?> 개의 게시물이 있습니다.</div>
			<div class="float_R">
				<!-- <div id="list_search2">검색</div> -->
				<div id="list_search3">
					<select name="find">
								 <option value='subject'>제목</option>
								 <option value='content'>내용</option>
								 <option value='nick'>글쓴이</option>
					</select>
				</div>
				<div id="list_search4"><input type="text" name="search"></div>
				<div id="list_search5">
					<input type="submit" class="search_btn" value="검색">
				</div>
			</div>
		</div>
		</form>
		<div class="list_count">
			<label for="scale">리스트개수</label>
			<select name="scale" onchange="location.href='list.php?scale='+this.value">
						<option value=''><?=$value?>보기</option>
						<option value='2'>2</option>
						<option value='4'>4</option>
						<option value='6'>6</option>
						<option value='8'>8</option>
			</select>
		</div>

		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">글쓴이</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<div id="list_content">
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
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  			//          교체 

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
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
			echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
<!-- 목록  -->
			&nbsp;&nbsp;&nbsp;&nbsp;>
				</div>
				<div id="button">
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?> 	
		<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->

		<div class="clear"></div>
	</div> <!-- end of col2 -->
</div> <!-- end of content -->
<? include "../../common/subphp_footer.html"; ?>
</div> <!-- end of wrap -->
</body>
</html>
