<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="update lictbl set mart_code='".$_POST['mart_code']."', alloDate=now()";
  $sql=$sql." where licKey='".$_POST['licKey']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {
    echo "할당완료!";
  }
  else {

    echo "할당실패!";
    echo mysqli_error($con);
    echo "<br><a href='index.html'>초기화면</a>";
    exit();
  }

  mysqli_close($con);

  echo "<br><br><a href='unallocateList.php'>미할당라이선스키화면</a>";
  echo "&nbsp<a href='index.html'>초기화면</a>";






?>
