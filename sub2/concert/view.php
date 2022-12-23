<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
	$item_nick    = $row[nick];
	$item_hit     = $row[hit];
	$item_category   = $row[category];

	// 배열에 넣어
	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

	$item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	// 이미지 가져오기
	for ($i=0; $i<3; $i++) // 0~2
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			// 배열로 리턴
			// [이미지너비, 이미지높이, 이미지정보(타입/확장자)]

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			//이미지 너비 제한
			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else //첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num"; // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
        <img src="../common/images/sub2_bg.jpg" alt="제품소개배경이미지" >
        <h3>제품정보</h3>
        <p>Product Information</p>
      </div>
      <div class="subNav">
        <ul>
          <li><a href="../../sub2/concert/list.php" class="current">제품정보</a></li>
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
	<div class="contentInner">
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div>
			<div id="view_title2"><?= $item_category ?></div>
			<div id="view_title3"><?= $item_nick ?><i class="fa-regular fa-eye"></i><?= $item_hit ?>&nbsp;&nbsp; <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
	{
?>
	<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
	<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
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

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
  <? include "../../common/subphp_footer.html"; ?>
</div> <!-- end of wrap -->

</body>
</html>
