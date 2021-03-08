<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="select * from mart inner join lictbl on mart.mart_code=lictbl.mart_code";
  $sql=$sql." where mart.mart_code='".$_GET['mart_code']."' and mart.bzno='".$_GET['bzno']."'";

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

  $row=mysqli_fetch_array($ret);

  echo "<h1>", $row['mart_name'], "(", $row['mart_code'], ") 라이선스키 조회 결과</h1>";
  echo "<table border=1>";
  echo "<tr>";
  // echo "<th>*</th><th>마트명</th><th>마트코드</th><th>사업자번호</th><th>주소</th><th>라이선스키</th><th>할당일시</th>";
  echo "<th>*</th><th>라이선스키</th><th>할당일시</th>";
  echo "<tr>";

  $seq=0;

  while ($row=mysqli_fetch_array($ret)) {

    echo "<tr>";
    echo "<td>", $seq+=1, "</td>";
    // echo "<td>", $row['mart_name'], "</td>";
    // echo "<td>", $row['mart_code'], "</td>";
    // echo "<td>", $row['bzno'], "</td>";
    // echo "<td>", $row['addr1'], "</td>";
    echo "<td><a href='lic/", $row['licKey'], "' download>", $row['licKey'], "</a></td>";
    echo "<td>", $row['alloDate'], "</td>";
    echo "</tr>";

  }

  echo "</table>";

  mysqli_close($con);

  echo "<br> <a href='index.html'>초기화면</a>";

?>
