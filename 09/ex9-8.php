<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "update friend set name = '김길동' where num = 1;";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "수정 완료!";
    } else{
        echo "수정 오류:".mysqli_error($conn);
    }

    mysqli_close($conn);



?>
