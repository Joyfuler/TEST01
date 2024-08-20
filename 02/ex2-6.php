<?php      
    $pay = 5000;
    $price = 1000;
    $num = 3;

    $change = $pay - ($price * $num);
    echo "지불금액: $pay<br>";
    echo "물건가격: $price<br>";
    echo "구매갯수: $num<br>";
    echo "- 거스름돈: $change<br>";

?>