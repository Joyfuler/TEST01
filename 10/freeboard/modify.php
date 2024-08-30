<?php
	$num = $_GET["num"];
	$name = $_POST["name"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	$regist_day = date("Y-m-d (H:i)");
	$conn = mysqli_connect("localhost", "user", "tiger", "sample");
	$sql = "update freeboard set name='$name', pass='$pass', subject='$subject',";
	$sql .= "content='$content', regist_day='$regist_day' where num=$num";
	
	mysqli_query($conn,$sql);
	mysqli_close($conn);

	echo "<script>
			location.href = 'list.php';
		  </script>	
	";

?>