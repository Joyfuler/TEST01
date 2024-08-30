<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "tiger";                // 비밀번호
    $dbname = "sample";                 // DB명

    // MySQL 연결하기
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn){
      die("연결 오류:".mysqli_connect_error());
    }

    $sql = "create table friend(
    num int not null auto_increment,
    name char(10) not null,
    tel char(15) not null,
    address char(80),
    primary key(num)    
    );";

    $result = mysqli_query($conn, $sql); // 해당 쿼리를 실행하고, 그것이 반환하는 열을 가져오거나 성공 / 실패를 가져온다.

    if ($result){
      echo "friend 테이블 생성 완료!";
    } else {
      echo "테이블 생성 오류:".mysqli_error($conn);
    }

    mysqli_close($conn); // 성공적으로 연결이 끊어지면 true를 반환한다.

?>
