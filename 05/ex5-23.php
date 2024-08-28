<?php
    $file = fopen("hello.txt", "r"); 

    while (!feof($file)){ // feof는 파일의 끝인지를 검사. while (!feof)이므로, 파일이 끝나지 않는 동안 읽는다. -> 파일이 끝날 때까지 로딩
        echo fgets($file)."<br>";
    }

    fclose($file);
?>