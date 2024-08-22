<?php
    for ($i=1; $i<=9; $i++){
        for ($j=1; $j<=$i; $j++){
            echo "*";
        }
        echo "<br>";
    }

    echo "<br><br>";


    for ($i=9; $i>=1; $i--){
        for ($j=1; $j<=$i; $j++){
            echo "*";
        }

        echo "<br>";
    }

    for ($i=1; $i<=9; $i++){
        for ($j=1; $j<= 9 - $i; $j++){
            echo "&nbsp;";              
        }

        for ($j=1; $j<=$i; $j++){
            echo "<br>";
        }
    }
?>