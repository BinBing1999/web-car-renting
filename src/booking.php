<?php

//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if ($_SESSION['usrtag'] === 'normal') {
    //echo "您已经成功登陆";
} else {
    die("您无权访问");
}
$conn = mysqli_connect("localhost:3306","visitor","helloitsme");
	if (!$conn)
  {
	  echo '请检查网络！';
  die('Could not connect: ' . mysql_error());
  }
   $user=$_SESSION['username'];
    mysqli_select_db($conn,'rentcar');
    $sql = "select * from usr where account='$user'";
    $res = mysqli_query($conn,$sql);
	$records=array();
    while( $row = mysqli_fetch_array($res)){
      $records[]=$row;
}
$sql2 = "select * from bookrecord where usrid='$user'";
    $res2 = mysqli_query($conn,$sql2);
	$records2=array();
    while( $row2 = mysqli_fetch_array($res2)){
      $records2[]=$row2;
}


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>租车预约</title>
<style type="text/css">
 *{margin:0;padding:0;}
 body{background-color:#CCC;}
 .clear{clear:both;}
 #container{
 background-color:#F0BBBC;
 height:510px;
 width:1500px;
 margin:auto;}
 #picture{height:470px; margin:0px;}
 #label{background-color:#CEDDEC； height:30px;}
 #container2{
 background-color:#E6ECCC;
 width:800px;
 height:340px;
 margin:20px auto;
 }
 #content{
 background-color:#CCC;
 width:1000px;
 height:100px;
 margin:20px auto;
 }
 a {
 color: #F3ADAE;
}
a:link {
 color: #0B0B0B;
 text-decoration: none;
}
a:visited {
 color: #0B0B0B;
 text-decoration: none;
}
a:hover {
 color: #17E515;
 text-decoration: none;
}
a:active {
 text-decoration: none;
}
#division{
 background-color:#CCC;
 width:800px;
 height:70px;
 margin:20px auto;
 }
</style>
</head>
<body>
<div id="container">
 <div id="picture"><img src="pics/shoppic.jpg" width="1500" height="471" alt=""/></div>
  <div id="label">
   <table width="1500" border="1">
  <tbody>
    <tr>
      <td width="50" height="30" align="center"><a href="booking.php">用户首页</a></td>
      <td width="50" align="center"><a href="carInfo.php">车辆资讯</a></td>
      <td width="50" align="center"><a href="rentPlace.php">店铺</a></td>
      <td width="50" align="center"><a href="appendix.php">可选附件资料</a></td>
      <td width="50" align="center"><a href="myOrder.php">下订单</a></td>
    </tr>
  </tbody>
</table>
  </div>
 </div>
 <div id="division">
 <hr></hr>
 </div>
 


 <center>
<div id="666">
<center><table id='firsttable' border='1' width = '1300'><caption><h3>我的账户</h3></caption>
    <tr><td>账户名</td><td>姓名</td><td>身份证</td><td>驾照号码</td><td>用户级别</td></tr>
    <?php foreach($records as $row) : ?>
    <tr id="id<?php echo $row['account'];?>">
	<td><?php echo $row['account'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['idpersonal'];?></td>
        <td><?php echo $row['driverlicense'];?></td>
        <td><?php echo $row['usrtag'];?></td>
	    
   </tr>
 <?php endForeach;?>
</table></center>
</div>
</center>
 <div id="division">
 </div>
<center>

<center>
<div id="666">
<center><table id='secondtable' border='1' width = '1000'><caption><h3>我的订单</h3></caption>
    <tr><td>订单编号</td><td>账户名</td><td>客户身份证</td><td>品牌</td><td>品牌详细资讯</td><td>提车点</td><td>附加用品</td><td>提车时间</td><td>还车时间</td><td>处理进度</td></tr>
    <?php foreach($records2 as $row2) : ?>
    <tr id="id<?php echo $row2['idbookrecord'];?>">
        <td><?php echo $row2['idbookrecord'];?></td>
        <td><?php echo $row2['usrid'];?></td>
        <td><?php echo $row2['personalid'];?></td>
        <td><?php echo $row2['carband'];?></td>
        <td><?php echo $row2['banddetail'];?></td>
        <td><?php echo $row2['getcarplace'];?></td>
        <td><?php echo $row2['appendixname'];?></td>
		 <td><?php echo $row2['starttime'];?></td>
		  <td><?php echo $row2['endtime'];?></td>
		   <td><?php echo $row2['result'];if($row2['result']=="booking"){echo '<form action = "deletethisone.php" method = "post"> 
			 <input type="hidden" name="thevalue" value="';echo $row2['idbookrecord'];echo '"/>
				<input type="submit" name="submit" value="取消" /> 
				</form> ';}?></td>
		    
   </tr>
 <?php endForeach;?>
</table></center>
</div>
</center>
 <div id="division">
 </div>
<center>


</center>
 
<center>
<div>
<form  action="logOut.php" method="post" onsubmit="return enter()">
<label><input class="submit" type="submit" name="logout" value="登出账户" /></label>
</form>
</div>
</center>
<div id="division">
<hr></hr>
 </div>

 <div id="content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
 88租车公司版权所有©2020-2021  
 
 杭州启力有限公司运营：浙网文[2021] 1xxx-0号

违法和不良信息举报电话：ABCD-88948917778 举报邮箱：88car@eighttwice.net

工业和信息化部备案管理系统网站  浙公网安备 abcdefghijklmn号
</div>

</body>
</html>