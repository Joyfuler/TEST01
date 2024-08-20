<?php
    echo "---------------<br>";
    echo "마일|킬로미터 <br>";
    echo "---------------<br>";

    $mile = 10;
    while ($mile <=50){
        $km = $mile * 1.609344;
        $km = round($km, 2); // 킬로미터를 소숫점 두자리 반올림.
        echo $mile." &nbsp;|&nbsp;&nbsp;" .$km."<br>";
        $mile += 10;
    }
    echo "------------------";


?>