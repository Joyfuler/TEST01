<?php
    $type = $_GET["type"];

    include "../include/board_setup.php"; // 어떤 게시판인지를 표시하기 위한 페이지 기능
    include "../include/header.php"; // 인덱스와 동일한 헤더. 로그인과 로그아웃 상태가 서로 다르게 표시됨.
    include $type.".php";
?>