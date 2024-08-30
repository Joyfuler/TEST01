<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet"  href="style.css">
</head>
<body> 
	<h2>자유 게시판 > 목록보기</h2>
	<ul class="board_list">
		<li>
			<span class="col1">번호</span>
			<span class="col2">제목</span>
			<span class="col3">글쓴이</span>
			<span class="col4">등록일</span>
		</li>
<?php
	$conn = mysqli_connect("localhost", "user", "tiger", "sample");		// DB 연결
	$sql = "select * from freeboard order by num desc";		// 일련번호 내림차순 전체 레코드 검색
	$result = mysqli_query($conn, $sql);			// SQL 명령 실행
	$total_record = mysqli_num_rows($result); // 총 줄수.

	for ($i=0; $i<$total_record; $i++){
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result); // select를 통해 레코드를 가져올 때.

		$num = $row["num"];
		$name = $row["name"];
		$subject = $row["subject"];
		$regist_day = $row["regist_day"];
	
?>	
		<li>
			<span class = "col1"><?=$num?>
			</span>
			<span class = "col2">
				<a href = "view.php?num=<?=$num?>"><?=$subject?></a>
			</span>
			<span class = "col3">
				<?=$name?>
			</span>
			<span class = "col4">
				<?=$regist_day?>
			</span>
		</li>

<?php
	$num--;
	}

	mysqli_close($conn);
?>

	</ul>
	<ul class = "buttons">
		<li><button onclick = "location.href='list.php'">목록</button></li>
		<li><button onclick = "location.href='form.php'">글쓰기</button></li>
	</ul>
</body>
</html>