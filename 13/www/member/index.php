<?php
    $type = $_GET["type"];

    include "../include/header.php"; // 헤더는 그대로 사용.
    include $type.".php"; // 패러미터로 들어온 type에 따라 다른 화면을 표시한다. 
?>