<?php

  $con=mysqli_connect("localhost", "root", "test1234", "togetherbiz") or die("DB서버 접속실패!");

  $sql="select * from lictbl where licKey='".$_GET['licKey']."'";

  $ret=mysqli_query($con, $sql);

  if($ret) {

  }
  else {

    echo "DB 조회실패!";
    echo mysqli_error($con);
    echo "<br><a href='index.html'>초기화면</a>";
    exit();
  }
  $row=mysqli_fetch_array($ret);

  $lickey=$row['licKey'];
  $mart_code=$row['mart_code'];

?>

<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<body>

  <form method="post" action="allocateResult.php">
    라이선스키 : <input type="text" name="licKey" style="width:300px" readonly value=<?php echo $lickey ?>><br>
    마트코드 : <input type="text" name="mart_code" maxlength="6"><br>

    <br><input type="submit" value="할당">

  </form>

</body>

</html>
