<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "delete from friend where name = '박성찬';";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "삭제 완료!";
    } else{
        echo "삭제 오류:".mysqli.error($conn);
    }

    mysqli_close($conn);
?>
