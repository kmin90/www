<? 
	session_start(); 

	//새글쓰기는 $table만 넘어옴
	//수정 $table, $mode=modify, $num
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];
		$item_category   = $row[category];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
     		return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
          <h2>제품정보 등록</h2>
        </div>
	<div class="contentArea">
	<div class="contentInner">
        

<?
	// 수정 / 새로쓰기에 따라 폼 다르게 넘겨줌
	// 수정
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	// 수정
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div id="write_row1"><div class="col1"></div>
			<div class="col2 cent"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{
?>
	<div class="col3 cent"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
	}
?>						
			</div>
			<div class="write_line"></div>
			<div id="write_row2">
				<div class="col1"> 제목 </div>
			    <div class="col2">
						<input type="text" name="subject" value="<?=$item_subject?>" >
					</div>
			</div>
			<div id="write_row3">
				<div class="col1"> 카테고리 </div>
			    <div class="col2">
						<input type="text" name="category" value="<?=$item_category?>" >
					</div>
			</div>
			<div id="write_row4">
				<div class="col1"> 내용 </div>
			    <div class="col2">
						<textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
					</div>
			</div>
			<div id="write_row5">
				<div class="col1"> 이미지파일1 </div>
			  <div class="col2">
					<input type="file" name="upfile[]">
				</div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0) // 수정모드 + 첨부파일이 있으면
	{
?>
	<!-- 진짜 파일 이름  -->
	<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. 
		<input type="checkbox" name="del_file[]" value="0"> 삭제
	</div>
	<div class="clear"></div>
<?
	}
?>
	<div class="write_line"></div>
	<div id="write_row6">
		<div class="col1"> 이미지파일2  </div>
		<div class="col2">
			<input type="file" name="upfile[]">
		</div>
	</div>
<? 	
	if ($mode=="modify" && $item_file_1){
?>
	<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
		<input type="checkbox" name="del_file[]" value="1"> 삭제
	</div>
	<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row7"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. 
				<input type="checkbox" name="del_file[]" value="2"> 삭제
			</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button">
			<input type="submit" value="저장" class="btn" onclick="check_input()">
			<a href="list.php?table=<?=$table?>&page=<?=$page?>">
				목록
			</a>
		</div>

		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
  <? include "../../common/subphp_footer.html"; ?>
</div> <!-- end of wrap -->

</body>
</html>
