<?php
  $tel = "010-1234-5678";
  $arr = explode("-", $tel);

  $tel2 = $arr[0].$arr[1].$arr[2]; // split과 동일한 기능. 해당 문자열을 기준으로 배열 생성.
  echo $tel2;
?>