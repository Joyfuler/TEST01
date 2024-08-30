<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "select * from friend;";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){ // assoc --> select로 검색한 결과 출력. 없을 때까지 반복한다.
        echo "이름:".$row["name"]."<br>";
        echo "전화번호:".$row["tel"]."<br>";
        echo "주소:".$row["address"]."<br>";
        echo "----------------------------";
    }

    mysqli_close($conn);



?>
