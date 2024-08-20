<?php      
    $a = 10;
    var_dump($a); // int 타입임을 알 수 있음.
    $b = 10.5;
    var_dump($b);
    $c = 'apple'; // 영어는 1바이트로 인식한다.
    $d = '사과'; // 한글의 경우는 3바이트로 인식한다.
    var_dump($c);
    echo "<br>";
    var_dump($d);

    $e = 3 < 5;
    $f = 3 > 5;
    var_dump($e);
    var_dump($f);

    $x = array("빨강", "노랑", "파랑");
    var_dump($x);
?>