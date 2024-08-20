<?php
    $score = 53;

    if ($score >=95)
    $grade = "A+";

    elseif ($score >=90)
    $grade = "A";

    elseif ($score >=85)
    $grade = "B+";

    elseif ($score >=80)
    $grade = "B";

    elseif ($score >=75)
    $grade = "C+";

    else
    $grade = "C";

    echo "입력한 점수:".$score."점<br>";
    echo "등급:".$grade."<br>";
?>