<?php
    $current_time = time(); // 초단위 타임스탬프.
    $time_diff = 60 * 60 * 24 * 2; // 2일
    $before_2day = $current_time - $time_diff;
    $after_2day = $current_time + $time_diff;

    echo "현재 타임스탬프:".$current_time."<br>";
    echo "현재시간:".date("Y-m-d I:m:s", $current_time);

    echo "2일전 타임스탬프: ".$before_2day."<br>";
    echo "2일전 시간:".date("Y-m-d I:m:s", $before_2day);


?>