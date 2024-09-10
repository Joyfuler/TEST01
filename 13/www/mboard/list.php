<ul class="board_list">
	<h2><?=$board_title?> > 목록보기</h2>
	<li>
		<span class="col1">번호</span>
		<span class="col2">제목</span>
		<span class="col3">글쓴이</span>
		<span class="col4">첨부</span>
		<span class="col5">등록일</span>
	</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"]; // 받은 페이지 패러미터가 있다면 page는 해당 패러미터 값으로 대입.
	else
		$page = 1; // 기본적으로는 1페이지.

	include "../include/db_connect.php";
	$sql = "select * from $table order by num desc";	// 받은 테이블 패러미터에 따라 동적으로 다른 검색 sql을 수행한다.
	$result = mysqli_query($conn, $sql);			// SQL 명령 실행 (reulstSet?)

	$total_record = mysqli_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0) // 딱 떨어지는 경우 한 페이지당 표시되는 페이지만큼 표시.
		$total_page = floor($total_record/$scale);      
	else // 딱 떨어지지 않으면 표시되는 페이지만큼 나눈 후 1을 더한다.
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = (intval($page) - 1) * $scale;      

	$number = $total_record - $start;
   	for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) {
      	mysqli_data_seek($result, $i); 		// 가져올 레코드로 위치(포인터) 이동      	
      	$row = mysqli_fetch_assoc($result); // 하나의 레코드 가져오기

	  	$num         = $row["num"];			// 일련번호
		$id        	 = $row["id"];			// 아이디
	  	$name        = $row["name"];		// 이름
	  	$subject     = $row["subject"];		// 제목
      	$regist_day  = $row["regist_day"]; 	// 작성일
		$file_name  = $row["file_name"];	// 첨부 파일
		$file_copied  = $row["file_copied"];	// 저장된 파일

		if ($file_name) {
			if ($table == "_youtube") //받은 패러미터가 _youtube면 youtube 이미지를 표시한다.
      			$file_image = "<img src='../img/youtube.png' height='20'>";
			else
				$file_image = "<img src='../img/file.png'>"; // youtube 테이블이 아닌 경우는 첨부 파일을 그대로 표시한다.
		}
      	else
      		$file_image = " ";		  
?>
	<li>
		<span class="col1"><?=$number?></span>		
			<?php 
				$view_url = "index.php?type=view&table=$table&num=$num&page=$page"; 
			?>
		<span class="col2">
			<a href="<?=$view_url?>">
					<?php
						if($table=="_youtube" && $file_name)
							echo "<img src='./data/".$file_copied."' width='150'>".$subject;
						else 
							echo $subject;
					?>
			</a>
					<?php
						if($table=="_qna") { // qna 게시판이라면 qna게시판의 리플수를 가져와야 한다.
							$table_ripple = $table."_ripple";

							$sql = "select * from $table_ripple where parent=$num";
							$result2 = mysqli_query($conn, $sql);
							$num_ripple = mysqli_num_rows($result2);
  
						  	if ($num_ripple) // 리플이 존재한다면 제목 뒤에 [3] 등으로 표시한다.
							   echo " [$num_ripple]";
						}
	  				?>
		</span>
		<span class="col3"><?=$name?></span>
		<span class="col4"><?=$file_image?></span>
		<span class="col5"><?=$regist_day?></span>
	</li>	
<?php
   	   $number--;
   	}
   	mysqli_close($conn);
?>
	</ul>
<!-- 페이지 내비게이션 -->
	<ul class="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2) { // 만일 2페이지 이상 존재하는 경우는 이전 페이지를 표시해야 함.
		$new_page = $page-1;
		echo "<li><a href='index.php?type=list&table=$table&page=$new_page'>◀ </a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++) {
		if ($page == $i)     // 현재 페이지와 동일한 숫자는 링크 대신 볼드체를 사용한다.
			echo "<li><b> $i </b></li>";
		else // 다른 페이지라면 해당 페이지로 이동한다.
			echo "<li> <a href='index.php?type=list&table=$table&page=$i'> $i </a> <li>";
   	}
   	if ($total_page>=2 && $page != $total_page)	{
		$new_page = $page+1; // 총 페이지가 2페이지가 넘고, 마지막 페이지가 아닌 경우는 다음 페이지를 표시해야 함.
		echo "<li> <a href='index.php?type=list&table=$table&page=$new_page'> ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";		
?>
</ul> <!-- page -->
<ul class="buttons">
		<?php
			$list_url = "index.php?type=list&table=$table&page=$page";
		?>
	<li><button onclick="location.href='<?=$list_url?>'">목록</button></li>
		<?php
			if($userid)	
				$onclick = "location.href='index.php?type=form&table=$table'";
			else
			$onclick = "alert('로그인 후 이용해 주세요!')";
		?>
        <?php
	        if ( $userlevel==1 or $table=="_youtube" or  $table=="_qna") {
        ?>
	        <li><button onclick="<?=$onclick?>">글쓰기</button></li>
	    <?php
	        }
	    ?>
</ul>		
