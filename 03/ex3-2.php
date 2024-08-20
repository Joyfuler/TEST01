<?php
 	$pilgi = 75;
	$silgi = 90;
	$result = '불합격';

	if ($pilgi >= 70 and $silgi >= 70){
		$result = '합격';
	}

	echo "필기 점수:".$pilgi."점<br>";
	echo "실기 점수:".$silgi."점<br>";
	echo "판정:".$result."<br>";

?>