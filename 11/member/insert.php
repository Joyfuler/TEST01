<?php
  $id = $_POST["id"];
  $pass = $_POST["pass"];
  $name = $_POST["name"];
  $email = $_POST["email"];

  $regist_day = date("Y-m-d (H:i)");
  $conn = mysqli_connect("localhost", "user", "tiger", "sample");
  $sql = "insert into members (id, pass, name, email, regist_day, level, point) ";
  $sql .= "values ('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo "<script>
    location.href='login_form.php';
    </script>";

    
?>