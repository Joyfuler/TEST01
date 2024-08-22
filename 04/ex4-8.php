<?php
    function circle_area($r){
        $result = $r * $r * 3.14;

        return $result;
    }

    $radius = 10;
    $area = circle_area($radius);

    echo "반지름이 ".$radius."인 원의 넓이는 : ".$area;
?>