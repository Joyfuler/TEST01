<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);

  echo("
    <script>
      location.href = 'index.php';
    </script>  
  ")
  // 세션을 종료한 뒤 index page로 이동한다. 
?>