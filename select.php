<?php

  $con=mysqli_connect("localhost", "root", "test1234", "licdb") or die("DB서버 접속실패!");

  $sql="select * from mart where mart_code='".$_GET['mart_code']."' and bzno='".$_GET['bzno']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {

    $count=mysqli_num_rows($ret);

      if($count==0) {
        echo "등록된 마트 없음!"."<br>";
        echo "<br><a href='index.html'>초기화면</a>";
        exit();
      }
  }
  else {

    echo "DB 조회실패!";
    echo mysqli_error($con);
    echo "<br><a href='index.html'>초기화면</a>";
    exit();
  }

  $sql="select * from lictbl where mart_code='".$_GET['mart_code']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {

  }
  else {

    echo "DB 조회실패!";
    echo mysqli_error($con);
    echo "<br><a href='index.html'>초기화면</a>";
    exit();
  }

  echo "<h1>라이선스 조회 결과</h1>";
  echo "<table border=1>";
  echo "<tr>";
  echo "<th>라이선스키</th><th>마트코드</th>";
  echo "<tr>";

  while ($row=mysqli_fetch_array($ret)) {

    echo "<tr>";
    echo "<td>", $row['licKey'], "</td>";
    echo "<td>", $row['mart_code'], "</td>";
    echo "</tr>";

  }

  echo "</table>";

  mysqli_close($con);

  echo "<br> <a href='index.html'>초기화면</a>";

?>
