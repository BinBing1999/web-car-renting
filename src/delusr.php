<?php
$comment_id = $_POST['value0']; 
$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
	if (!$conn)
  {
	  echo '请检查网络！';
  die('Could not connect: ' . mysql_error());
  }
    mysqli_select_db($conn,'rentcar');
    $sql = "DELETE FROM usr WHERE account = '$comment_id'";
    $res = mysqli_query($conn,$sql);
  echo $res;
    header('Location:allusr.php');
	

?>