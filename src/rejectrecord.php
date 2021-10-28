<?php
$comment_id = $_POST['thevalue2']; 

$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
	if (!$conn)
  {
	  echo '请检查网络！';
  die('Could not connect: ' . mysql_error());
  }
    mysqli_select_db($conn,'rentcar');
    $sql = "UPDATE bookrecord SET result = 'denied'
WHERE idbookrecord = '$comment_id'";
    $res = mysqli_query($conn,$sql);
  echo $res;
    header('Location:tobedeal.php');
	

?>