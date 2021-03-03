<?php
  $con = mysqli_connect("localhost", "root", "test1234") or die("DB서버 접속실패");
  phpinfo();
  mysqli_connect($con);

?>
