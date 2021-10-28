<?php
error_reporting(0);

$account = ($_POST['username']);
$paswd = ($_POST['password']);
$name = ($_POST['realname']);
$idpersonal = ($_POST['personalid']);
$driverlicense = ($_POST['driverlicense']);
$usrtag = ($_POST['usrtag']);


$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
if (mysqli_errno($conn)) {
	echo '请检查网络！';
    echo mysqli_error($conn);
    exit;
}
mysqli_select_db($conn, 'rentcar');   //选择数据库


if($_POST['username']!=NULL && $_POST['password']!=NULL && $_POST['realname']!=NULL&& $_POST['personalid']!=NULL&& $_POST['driverlicense']!=NULL&& $_POST['usrtag']!=NULL){
	
	$sql1 = "select account from usr where account = '$account' ";
	$sql2 = "select idpersonal from usr where idpersonal = '$idpersonal' ";
	$sql3 = "select driverlicense from usr where driverlicense = '$driverlicense' ";
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
			$sql = "insert into usr (account,paswd,name,idpersonal,driverlicense,usrtag)  values ('$account','$paswd','$name','$idpersonal','$driverlicense','$usrtag')";
		$result = mysqli_query($conn,$sql);//注册
		header("location:allusr.php");
	}
}
else{
	echo '请填写所有需要的数据！';
}

?>