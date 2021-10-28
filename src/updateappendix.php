<?php
error_reporting(0);
//header("Content-Type: text/html; charset=utf-8");
$appendixname = ($_POST['appendixname']);
$priceperday = trim($_POST['priceperday']);

$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
if (mysqli_errno($conn)) {
	echo '请检查网络！';
    echo mysqli_error($conn);
    exit;
}
mysqli_select_db($conn, 'rentcar');   //选择数据库

if($_POST['appendixname']!=NULL && $_POST['priceperday']!=NULL ){
	
		$sql = "insert into appendix (appendixname,priceperday)  values ('$appendixname','$priceperday')";
		$result = mysqli_query($conn,$sql);//注册
		header("location:upDate.php");
}
else{
	echo '请填写所有需要的数据！';
}

//mysqli_close($conn);
?>