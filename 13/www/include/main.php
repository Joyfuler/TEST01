<div class="notice">
    <h4>공지 게시판</h4>
<?php
   include "../include/db_connect.php";
   $sql = "select * from _notice order by num desc limit 5";
   $result = mysqli_query($conn, $sql); // include에 $conn이 존재하므로 상속받아 사용 가능.

	while ($row = mysqli_fetch_assoc($result)){ // 더이상 검색되지 않을 때까지. 즉 전체 행만큼 반복
		$num = $row["num"];
		$name = $row["name"];
		$date = $row["regist_day"];
		$date = substr($date, 0, 10); // 앞에서 0에서부터 10까지 가져옴. 시간 제외한 날짜.
		$subject = $row["subject"];
		$subject = htmlspecialchars_decode($subject, ENT_QUOTES);
		// html에서 &nbsp; <br> 등의 언어로 처리했다면, 이를 다시 띄어쓰기나 엔터 등의 데이터로 바꿔준다.
?>
	<div class = "item">
		<span class = "col1"><a href = "../mboard/index.php?type=view&table=_notice&num=<?=$num?>&page=1"><?=$subject?></a></span>
		<span class = "col2"><?=$date?></span>
	</div>
<?php
	}
?>
	
</div> <!-- 공지게시판 끝 -->

<div class="qna">
    <h4>QNA 게시판</h4>
<?php
	$sql = "select * from _qna order by num desc limit 5";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result))
	{
		$num    = $row["num"];
		$name    = $row["name"];
		$date    = $row["regist_day"];
	  	$date = substr($date, 0, 10);

		$subject = $row["subject"];
	  	$subject = htmlspecialchars_decode($subject, ENT_QUOTES);
?>
        <div class="item">
            <span class="col1"><a href="../mboard/index.php?type=view&table=_qna&num=<?=$num?>&page=1">
                <?=$subject ?></a>
                <?php
					$sql = "select * from _qna_ripple where parent=$num";
	  			    $result2 = mysqli_query($conn, $sql);
	  				$num_reply = mysqli_num_rows($result2); // 리플라이 갯수

					if ($num_reply)
				 		echo " [$num_reply]";
	  			?>
            </span>
            <span class="col2"><?=$date?></span>
        </div>
<?php
	}

	mysqli_close($conn);
?>
</div> <!-- QNA 게시판 끝 -->