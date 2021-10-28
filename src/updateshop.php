<?php
error_reporting(0);
//header("Content-Type: text/html; charset=utf-8");
$shopname = ($_POST['shopname']);
$region = trim($_POST['place']);
//$personid = trim($_POST['personalid']);
$opentime = trim($_POST['theopentime']);
$closetime = trim($_POST['theclosetime']);
$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
if (mysqli_errno($conn)) {
	echo '请检查网络！';
    echo mysqli_error($conn);
    exit;
}
mysqli_select_db($conn, 'rentcar');   //选择数据库
//mysqli_set_charset($conn, 'utf8');   //选择字符集

if($_POST['shopname']!=NULL && $_POST['place']!=NULL && $_POST['theopentime']!=NULL && $_POST['theclosetime']!=NULL){
	
		$sql = "insert into shops ( shopname,region,opentime,closetime)  values ('$shopname','$region','$opentime','$closetime')";
		$result = mysqli_query($conn,$sql);//注册
		header("location:upDate.php");
}
else{
	echo '请填写所有需要的数据！';
}

//mysqli_close($conn);
?>