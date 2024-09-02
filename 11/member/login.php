<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    $conn = mysqli_connect("localhost", "user", "tiger", "sample");
    $sql = "select * from members where id = '$id'";
    $result = mysqli_query($conn, $sql);

    $num_match = mysqli_num_rows($result); // 결과로 출력된 줄수

    if (!$num_match){
      echo "<script>
        window.alert('등록되지 않은 아이디입니다!');
        history.go(-1)
        </script>";
    } else {
      $row = mysqli_fetch_assoc($result);
      $db_pass = $row["pass"];
      mysqli_close($conn);

      if ($pass != $db_pass){
        echo "<script>
          window.alert('비밀번호가 틀렸습니다!')
          history.go(-1)
          </script>";
          exit;
      }

      else {
        session_start(); // db에서 가져온 id와 이름을 session에 저장한다.
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["username"];

        echo "<script>
            location.href= 'index.php';
            </script>";

      }
    }
?>