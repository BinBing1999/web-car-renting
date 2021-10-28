<?php
//  启动会话，这步必不可少
error_reporting(0);

session_start();
//  判断是否登陆
if ($_SESSION['usrtag'] === 'normal') {
    //echo "您已经成功登陆";
} else {
    die("您无权访问");
}

$band = $_POST['band'];
$banddetail = $_POST['banddetail'];
$carplace = $_POST['carplace'];
$appendix = $_POST['appendixname'];
$starttime = $_POST['startdate'];
$returntime = $_POST['returndate'];



$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
	if (!$conn)
  {
	  echo '请检查网络！';
  die('Could not connect: ' . mysql_error());
  }
   $user=$_SESSION['username'];
   mysqli_select_db($conn,'rentcar');
	
	if (strtotime($returntime)-strtotime($starttime)<=0)
  {
	  //echo '时间不正确！请填写正确时间！';
  die('时间不正确！请填写正确时间！');
  }

	
	
if($band!=NULL && $banddetail!=NULL && $carplace!=NULL  && $starttime!=NULL && $returntime!=NULL ){
	$sql = "select banddetail from cars where band = '$band' and banddetail='$banddetail'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
	//echo $row['banddetail'];/////
    if	($row['banddetail']!=$banddetail) {
        //echo '厂牌与详细品牌不匹配！';
   die('厂牌与详细品牌不匹配！');
    }
	
$sql2 = "select * from usr where account='$user'";
$res2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($res2);
$usrid=$row2['account'];
$personalid=$row2['idpersonal'];
$result="booking";


	
   $sql3 = "insert into bookrecord ( usrid,personalid,carband,banddetail,getcarplace,appendixname,starttime,endtime,result)  values ('$usrid','$personalid','$band','$banddetail','$carplace','$appendix','$starttime','$returntime','$result' )";
    $res3 = mysqli_query($conn,$sql3);

	header("location:booking.php");//--------------------------
}
else{
	echo '请填写所有需要的数据！';
}
	

//echo $starttime;
?>