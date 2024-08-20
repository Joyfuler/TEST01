<?php
    $height = 170;
    $weight = 40;
    $standardWeight = ($height - 100) * 0.9; // 표준체중

    echo ('키:'.$height."<br>");
    echo ('몸무게:'.$weight."<br>");
    if ($weight >$standardWeight){
        echo ("다이어트 필요");
    } else {
        echo ("다이어트 불필요");
    }
?>