<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "select name, tel from friend where name = '홍길동';
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row["name"]."의 전화번호:".$row["tel"]."<br>";
    mysqli_close($conn);

?>
