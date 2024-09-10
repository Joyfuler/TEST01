<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet"  href="style.css">
</head>
<body>
	<h2> 회원 게시판 > 목록보기</h2>
		<ul class = "board_list">
			<li>
				<span class = "col1"> 번호 </span>
				<span class = "col2"> 제목 </span>
				<span class = "col3"> 글쓴이 </span>
				<span class = "col4"> 첨부 </span>
				<span class = "col5"> 등록일 </span>
			</li>
<?php
	include "session.php";

	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1; //들어온 page 패러미터가 없다면 1로 고정.

	$conn = mysqli_connect("localhost", "user", "tiger", "sample");
	$sql = "select * from memberboard order by num desc";
	$result = mysqli_query($conn, $sql);
	$total_record = mysqli_num_rows($result);
	
	$scale = 5; // 한 페이지당 표시할 글 수.

	if ($total_record % $scale ==0) // 정확히 떨어질 경우에는 해당 페이지를 글 수로 나눈 그대로 페이지 수가 된다.
		$total_page = floor($total_record / $scale);
	else 
		$total_page = floor($total_record / $scale) + 1; // 만일 그대로 떨어지지 않는다면 페이지 수에 +1을 해준다.
	
	$start = (intval($page) -1) * $scale; // 패러미터로 들어온 페이지의 글 목록.
	$number = $total_record - $start; // 
	for ($i=$start; $i<$start+$scale && $i < $total_record; $i++){
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);
		$num = $row["num"];
		$id = $row["id"];
		$name = $row["name"];
		$subject = $row["subject"];
		$regist_day = $row["regist_day"];
		if ($row["file_name"]){ // 파일 이름이 존재한다면
			$file_image = "<img src ='./file.png'>"; // file.png를 표시한다.
		} else{
			$file_image = " "; // 첨부하지 않았으면 첨부 이미지를 표시하지 않는다.
		}

?>
	<li>
		<span class = "col1"><?=$number?></span>
		<span class = "col2"><a href = "view.php?num=<?=$num?>&page=<?=$page?>">
			<?=$subject?></a></span>
		<span class = "col3"><?=$name?></span>
		<span class = "col4"><?=$file_image?></span>
		<span class = "col5"><?=$regist_day?></span>
	</li>
<?php
	$number--;
	}
	mysqli_close($conn);	
?>
	</ul>

<!-- 페이지 번호 매김 -->
	<ul class = "page_num">
<?php
	if ($total_page >=2 && $page >= 2){ // 페이지가 2페이지 이상이면 하단에 페이지를 표시해야 함.
		$new_page = $page -1; // 이전페이지 링크를 표시하기 위함.
		echo "<li><a href='list.php?page=$new_page'>◀ 이전 </a></li>";
	} else {
		echo "<li>&nbsp;</li>";
	}

	// 게시판 하단의 페이지 링크 출력. (페이징처리)
	for ($i=1; $i<=$total_page; $i++){
		if ($page == $i){
			echo "<li><b> $i </b></li>"; // 만일 이미 해당 페이지라면 진하게 표시하고, 링크는 없음.
		} else {
			echo "<li><a href = 'list.php?page=$i'> $i </a></li>";
		}
	}
		if ($total_page >=2 && $page != $total_page){
			// 만일 2페이지 이상이고, 마지막 페이지가 아닌 경우는 [다음]을 표시한다.
			$new_page = $page+1; //다음 페이지의 페이지수
			echo "<li><a href ='list.php?page=$new_page'>다음▶</a></li>";
		} else{
			echo "<li>&nbsp;</li>";
		}	

?>
	</ul>

	<ul class = "buttons">
		<li><button onclick = "location.href='list.php?page=<?=$page?>">목록</button></li>
		<li><button onclick = "location.href='form.php'">글쓰기</button></li>
	</ul>
	</body>
</html>
