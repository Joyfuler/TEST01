<?php
  // 로그아웃을 위해 먼저 세션을 불러온다.
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);

  echo "
       <script>
          location.href = '../main/index.php';
         </script>
       ";
?>