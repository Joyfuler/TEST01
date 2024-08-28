<?php
    $file = fopen("hello2.txt", "w");
    $str = "만나서 반갑습니까?";
    fwrite($file, $str);

    echo "파일쓰기 완료!";
    fclose($file);


?>