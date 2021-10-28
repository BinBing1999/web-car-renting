<?php
error_reporting(0);
//header("Content-Type: text/html; charset=utf-8");
$username = ($_POST['username']);
$realname = trim($_POST['realname']);
$personid = trim($_POST['personalid']);
$drivercard = trim($_POST['driverlicense']);
$password = trim($_POST['password']);
$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
if (mysqli_errno($conn)) {
	echo '请检查网络！';
    echo mysqli_error($conn);
    exit;
}
mysqli_select_db($conn, 'rentcar');   //选择数据库
//mysqli_set_charset($conn, 'utf8');   //选择字符集

if($_POST['username']!=NULL && $_POST['realname']!=NULL && $_POST['personalid']!=NULL && $_POST['driverlicense']!=NULL && $_POST['password']!=NULL){
	$sql1 = "select account from usr where account = '$username' ";
	$sql2 = "select idpersonal from usr where idpersonal = '$personid' ";
	$sql3 = "select driverlicense from usr where driverlicense = '$drivercard' ";
	$res21 = mysqli_query($conn,$sql1);
	$res22 = mysqli_query($conn,$sql2);
	$res23 = mysqli_query($conn,$sql3);
	$row1 = mysqli_fetch_array($res21);
	$row2 = mysqli_fetch_array($res22);
	$row3 = mysqli_fetch_array($res23);
	if($row1['account']!=NULL){
		echo '账户名已存在！';
	}
	else if($row2['idpersonal']!=NULL){
		echo '身份证号码已存在！';
	}
	else if($row3['driverlicense']!=NULL){
		echo '驾驶证号码已存在！';
	}
	else{
		$sql = "insert into usr ( account,paswd,name,idpersonal,driverlicense,usrtag)  values ('$username','$password','$realname','$personid','$drivercard','normal' )";
		$result = mysqli_query($conn,$sql);//注册
		echo'注册成功！请返回主页面登录！';
	}
}
else{
	echo '请填写所有注册需要的数据！';
}

//mysqli_close($conn);
?>