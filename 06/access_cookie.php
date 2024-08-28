<?php
    if(isset($_COOKIE["username"])){
        echo $_COOKIE["username"]."님 환영합니다.<br>";
    } else {
        echo "username 쿠키가 없습니다.<br>";
    }
?>