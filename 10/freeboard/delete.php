<?php
   $num = $_GET["num"];
   $conn = mysqli_connect("localhost", "user", "tiger", "sample");
   $sql = "delete from freeboard where num=$num";

   mysqli_query($conn, $sql);
   mysqli_close($conn);

   echo "<script>
        location.href=list.php';
        </script>";
?>