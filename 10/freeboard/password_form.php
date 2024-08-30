<?php
    if (isset($_GET["mode"]))
        $mode = $_GET["mode"]; // get을 통해 mode 패러미터를 받았다면 해당 패러미터를 mode에 대입한다.
    else 
        $mode = "";

    if (isset($_GET["num"]))
        $num = $_GET["num"];
    else 
        $num = "";

    if (isset($_GET["error"]))
        $error = $_GET["error"];
    else
        $error = "";
   ?>

   <!DOCTYPE html>
    <head>
    <meta charset="utf-8"> 
    </head>
    <body>
        <h3> 글 작성시 비밀번호 입력해 </h3>
        <?php
            if ($error == "y")
                echo "<p>※비밀번호가 다릅니다. 다시 입력해주세요!</p>";
        ?>

    <form action = "password.php?mode=<?=$mode?>&num=<?=$num?>" method="post">
        비밀번호: <input type = "password" name = "pass">
        <button type = "submit"> 확인 </button>
    </form>
</body>
</html>
