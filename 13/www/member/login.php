<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    
    include "../include/db_connect.php";
    $sql = "select * from _mem where id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    $num_match = mysqli_num_rows($result); // id 검색에 해당하는 결과를 리턴한다. 만일 결과가 없다면 존재하지 않는 아이디.
    if (!$num_match){
      echo "<script>
              window.alert('등록되지 않은 아이디입니다.');
            </script>";            
    } else {
      $row = mysqli_fetch_assoc($result);
      $db_pass = $row["pass"];

      mysqli_close($conn);

      if ($pass != $db_pass){
        echo "<script>
                window.alert('비밀번호가 틀립니다!');
                history.go(-1)
              </script>";
              exit;
      } else{
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row["level"];

        echo "<script>
                location.href = '../main/index.php';
              </script>";
      }
    }
?>
