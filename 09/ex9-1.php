<?php
    $servername = "localhost";
    $username = "user";
    $password = "tiger";
    $dbname = "sample";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn){
        die("연결 오류:".mysqli_connect_error()); // die는 메시지를 출력하고 해당 프로그램을 종료한다.
        // die는 mysql 연결시 오류 메시지를 반환한다.
    }

    echo "MYSQL에 성공적으로 연결되었습니다.";



?>
