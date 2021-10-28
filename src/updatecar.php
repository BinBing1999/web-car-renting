<?php
error_reporting(0);
//header("Content-Type: text/html; charset=utf-8");
$cartype = ($_POST['cartype']);
$peoplenum = trim($_POST['peoplenum']);
$color = trim($_POST['color']);
$band = trim($_POST['band']);
$banddetail = trim($_POST['banddetail']);
$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
if (mysqli_errno($conn)) {
	echo '请检查网络！';
    echo mysqli_error($conn);
    exit;
}
mysqli_select_db($conn, 'rentcar');   //选择数据库

if($_POST['cartype']!=NULL && $_POST['peoplenum']!=NULL && $_POST['color']!=NULL && $_POST['band']!=NULL&& $_POST['banddetail']!=NULL){
	
		$sql = "insert into cars (structure,peoplenum,color,band,banddetail)  values ('$cartype','$peoplenum','$color','$band','$banddetail')";
		$result = mysqli_query($conn,$sql);//注册
		header("location:upDate.php");
}
else{
	echo '请填写所有需要的数据！';
}

//mysqli_close($conn);
?>