<?php
    $id = $_GET["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $conn = mysqli_connect("localhost", "user", "tiger", "sample");
    $sql = "update members set pass = '$pass', name = '$name', email = '$email' ";
    $sql .= "where id = '$id'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo "<script>
            location.href = 'index.php';
          </script>";


?>