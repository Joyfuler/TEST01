<?php
    $file = fopen("data.csv", "r");
    $header = fgetcsv($file); // 한 줄 데이터를 배열로 읽어 header에 넣는다. (첫번째 줄이므로 header가 된다.)
    $num = count($header);
    echo "<h3> 5명 학생의 ".$num."과목 합계/평균 구하기</h3>";
    
    while (!feof($file)){
        $sum = 0;
        $line = fgetcsv($file);
        foreach ($line as $v){
            $sum += $v;
        }

        $avg = round(($sum /3) , 2);
        echo "합계:".$sum.", 평균:".$avg."<br>";
    }

    fclose($file);


?>