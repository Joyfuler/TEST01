<?php
    $file = fopen('test.txt', "r");
    var_dump($file); // 불러온 텍스트의 타입을 출력시 resource로 출력된다.
    // 파일이나 데이터베이스 다룰 때 사용!
?>