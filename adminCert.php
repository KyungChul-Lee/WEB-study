<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="select * from user";
  $sql=$sql." where email='".$_GET['email']."' and des_decrypt(unhex(pw), 'ToBz1130')='".$_GET['pw']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {

    $count=mysqli_num_rows($ret);

      if($count==0) {
        echo "등록된 관리자 없음!"."<br>";
        echo "<br><a href='adminSign.php'>관리자콘솔로그인</a>";
        exit();
      }
  }
  else {

    echo "DB 조회실패!";
    echo mysqli_error($con);
    echo "<br><a href='adminSign.php'>관리자콘솔로그인</a>";
    exit();
  }

  $row=mysqli_fetch_array($ret);
    echo "<h1>관리자 콘솔</h1>";
    echo "마지막접속일시 : ", $row['logindt'], "<br>";

  $sql="update user set logindt=now()";
  $sql=$sql." where email='".$_GET['email']."'";

  $ret=mysqli_query($con, $sql);

  mysqli_close($con);

  echo "<br><a href='unallocateList.php'>할당</a>";
  echo "&nbsp<a href='adminUnallo.php'>해제</a>";
  echo "&nbsp<a href='adminSign.php'>관리자콘솔로그인</a>";
  echo "&nbsp<a href='index.html'>초기화면</a>";


?>
