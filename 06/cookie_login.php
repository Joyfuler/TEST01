<?php
    // 60 * 60 * 24 = 24시간
    setcookie("userid", "hong123", time() + 24 * 60 * 60 * 30); // 30일 후 쿠키만료
    
    echo "<script>
        location.href = 'cookie_page.php';
        </script>";

?>