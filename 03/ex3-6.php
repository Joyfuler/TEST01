<?php
   	$now_year = 2024;
	$now_month = 8;
	$now_day = 15;

	$birth_year = 2000;
	$birth_month = 7;
	$birth_day = 10;

	if ($birth_month <$now_month) // 생년월일보다 현재일이 더 늦다면 그대로 나이를 뺀다.
	$age = $now_year - $birth_year;

	elseif ($birth_month == $now_month){  // 같은 월일 경우
		if ($birth_day <= $now_day) // 현재일이 생일보다 크다면
			$age = $now_year - $birth_year; // 그대로 나이를 뺀다.
		else 
			$age = $now_year - $birth_year -1; // 작다면 뺀 년월에서 1을 더 뺀다.
	}

	else
		$age = $now_year - $birth_year -1; // 현재월보다 생일이 더 빠른 경우는 무조건 1을 더 뺀다.

	echo "오늘 날짜:".$now_year."/".$now_month."/".$now_day."<br>";
	echo "출생년월일:".$birth_year."/".$birth_month."/".$birth_day."<br>";
	echo "만 나이:".$age."세";	
?>