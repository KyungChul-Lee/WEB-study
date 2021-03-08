<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="select * from lictbl where mart_code is null or mart_code=' '";

  $ret=mysqli_query($con, $sql);

  if($ret) {

    $count=mysqli_num_rows($ret);

      if($count==0) {
        echo "미할당 라이선스키 없음!"."<br>";
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

  echo "<h1>미할당 라이선스키</h1>";
  echo "<table border=1>";
  echo "<tr>";
  echo "<th>*</th><th>라이선스키</th><th>할당</th>";
  echo "<tr>";

  $seq=0;

  while ($row=mysqli_fetch_array($ret)) {

    echo "<tr>";
    echo "<td>", $seq+=1, "</td>";
    echo "<td>", $row['licKey'], "</td>";
    echo "<td>", "<a href='allocate.php?licKey=", $row['licKey'], "'>할당</a></td>";
    echo "</tr>";

  }

  echo "</table>";

  mysqli_close($con);

  echo "<br><a href='index.html'>초기화면</a>";
