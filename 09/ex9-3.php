<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명

    // MySQL 연결하기
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // friend 테이블에 데이터 삽입
    $sql = "insert into friend (name, tel, address)
    values ('홍길동', '01012345678', '경기도 권선구');
    ";
        
    $result = mysqli_query($conn, $sql); // insert / create / select 모두 mysqli_query를 사용한다.

    if ($result){
      echo "데이터 삽입 완료!";
    } else {
      echo "데이터 삽입 오류:".mysqli_error($conn);
    }

?>
