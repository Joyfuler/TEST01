<?php
	include "session.php"; 	// 세션 처리

    $num = $_GET["num"];
    $page = $_GET["page"]; // num과 page는 패러미터로 넘기므로 get으로 처리.

	$subject = $_POST["subject"];
	$content = $_POST["content"];
	$regist_day = date("Y-m-d (H:i)");

	$conn = mysqli_connect("localhost", "user", "tiger", "sample");
	$sql = "update memberboard set subject = '$subject',";
	$sql .= "content='$content', regist_day = '$regist_day' where num = $num";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	echo
		"<script>
			location.href = 'list.php?page=$page';
		 </script>";

?>