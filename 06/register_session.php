<?php
    // 세션을 사용하는 페이지에서 session_start() 실행 필요
    session_start();
    $_SESSION["username"] = "홍길동";

    echo "세션 등록 완료";

?>