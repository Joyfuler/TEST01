<?php
	// url 패러미터로 전달받으므로 기본적으로 get 형태로 전달받는다.
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$conn = mysqli_connect("localhost", "user", "tiger", "sample");
	$sql = "select * from memberboard where num=$num";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$id = $row["id"]; // 결과로 받아온 것 중 id컬럼 내용을 담는다.
	$name = $row["name"];
	$subject = $row["subject"];
	$regist_day = $row["regist_day"];
	$content = $row["content"];
	$content = str_replace(" ", "&nbsp;", $content); // 띄어쓰기가 있다면 html의 띄어쓰기로 변경한다.
	$content = str_replace("\n", "<br>", $content); // 엔터가 있다면 html의 엔터로 변경한다.

	$file_name = $row["file_name"];
	$file_type = $row["file_type"];
	$file_copied = $row["file_copied"];
?>	
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet" href="style.css">
</head>
<body> 
	<h2>회원 게시판 > 내용보기</h2>
	<ul class="board_view">
		<li class="row1">
			<span class="col1"><b>제목 :</b> <?=$subject?></span>	<!-- 제목 출력 -->
			<span class="col2"><?=$name?> | <?=$regist_day?></span>	<!-- 이름, 작성일 출력 -->
		</li>
		<li class="row2">
		<?php
			if($file_name) { // 첨부된 파일이 있다면
				$file_path = "./data/".$file_copied;  
				$file_size = filesize($file_path);
				echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       	<a href='download.php?num=$num&file_copied=$file_copied&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			}	
			echo $content; // 글 내용 출력
		?>
		</li>		
	</ul>
	<ul class="buttons">
		<li><button onclick="location.href='list.php?page=<?=$page?>'">목록보기</button></li>
		<li><button onclick="location.href='modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정하기</button></li>   
		<li><button onclick="location.href='delete.php?num=<?=$num?>&page=<?=$page?>'">삭제하기</button></li>
		<li><button onclick="location.href='form.php'">글쓰기</button></li>
	</ul>
</body>
</html>
