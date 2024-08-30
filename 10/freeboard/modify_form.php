<?php
    if (isset($_GET["num"]))
		$num = $_GET["num"];
	else 
		$num = "";

	$conn = mysqli_connect("localhost", "user", "tiger", "sample");
	$sql = "select * from freeboard where num = $num";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$name = $row["name"];
	$pass = $row["pass"];
	$subject = $row["subject"];
	$content = $row["content"];
	$regist_day = $row["regist_day"];

	mysqli_close($conn);
	?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title> PHP + MySQL 입문 </title>
			<link rel = "stylsheet" href = "style.css">
			<script>
				function check_input(){
					if (!document.board.name.value){
						alert("이름을 입력해주세요!")
						document.board.name.focus();
						return;
					} 

					if (!document.board.pass.value){
						alert("비번을 입력해주세요.");
						document.board.pass.focus();
						return;
					}

					if (!document.board.subject.value){
						alert("제목을 입력해주세요.");
						document.board.subject.focus();
						return;
					}

					if (!document.board.content.value){
						alert("내용을 입력해주세요.");
						document.board.content.focus();
						return;
					}

					document.board.submit();					
				}

			</script>
			</head>
			<body>
				<h2>자유 게시판 > 글 수정하기</h2>
					<form name = "board" method = "post" action = "modify.php?num=<?=$num?>">
						<ul class = "board_form">
							<li>
								<span class = "col1"> 이름 : </span>
								<span class = "col2"><input name = "name" type = "text" value = "<?=$name?>"></span>
							</li>
							<li>
								<span class = "col1"> 비밀번호 : </span>
								<span class = "col2"><input name = "pass" type = "password" value = "<?=$pass?>"></span>
							</li>
							<li>
								<span class = "col1">제목: </span>
								<span class = "col2"><input name = "subject" type = "text" value = "<?=$subject?>"></span>
							</li>
							<li class = "area">
								<span class = "col1">내용: </span>
								<span class = "col2">
									<textarea name = "content">
										<?=$content?></textarea>
								</span>		
							</li>
						</ul>
						<ul class = "buttons">
							<li><button type = "button" onclick = "check_input()">
								저장하기</button></li>
							<li><button type = "button" onclick = "location.href='list.php'">목록보기</button></li>
						</ul>
			</form>
			</body>
			</html>


								



			
