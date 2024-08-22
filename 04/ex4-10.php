<?php
    $score = array(70,85,93,72,92);
    echo $score[0]."<br>";
    echo $score[1]."<br>";
    echo $score[2]."<br>";
    echo $score[3]."<br>";
    echo $score[4]."<br><br>";
    
    for ($i=0; $i<5; $i++){
        echo "인덱스".$i.":".$score[$i]."<br>";
    }

?>