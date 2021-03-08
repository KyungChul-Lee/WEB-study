<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="update lictbl set mart_code=' ', alloDate=' ';
  $sql=$sql." where licKey='".$_POST['mart_code']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {
    echo "해제완료!";
  }
  else {

    echo "해제실패!";
    echo mysqli_error($con);
    echo "<br><a href='index.html'>초기화면</a>";
    exit();
  }

  mysqli_close($con);

  echo "<br><br><a href='adminCert.php'>관리자콘솔</a>";
  echo "&nbsp<a href='index.html'>초기화면</a>";






?>
