<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $conn = mysqli_connect("localhost", "user", "tiger", "sample");
    $sql = "delete from memberboard where num = $num";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo "<script>
            location.href = 'list.php?page=$page';
          </script>";


?>