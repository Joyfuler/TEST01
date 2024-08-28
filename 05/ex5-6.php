<?php
    $string = "<h3> mysql은 php와 같이 많이 사용된다. </h3>";
    echo $string;

    $string2 = htmlspecialchars($string); // html 태그를 그대로 표시하는 용도로 사용한다.
    echo $string2;
?>