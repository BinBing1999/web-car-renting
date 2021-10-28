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
    $sql = "select * from cars";
    $res = mysqli_query($conn,$sql);
	$records=array();
    while( $row = mysqli_fetch_array($res)){
      $records[]=$row;
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
<center>
<div id="666">
<center><table id='secondtable' border='1' width = '1000'><caption><h3>车辆信息表</h3></caption>
    
     <tr><td>车辆序号</td><td>车辆类型</td><td>核载人数</td><td>颜色</td><td>厂牌</td><td>详细品牌</td></tr>
    <?php foreach($records as $row) : ?>
    <tr id="id<?php echo $row['idcar'];?>">
	<td><?php echo $row['idcar'];?></td>
        <td><?php echo $row['structure'];?></td>
        <td><?php echo $row['peoplenum'];?></td>
        <td><?php echo $row['color'];?></td>
        <td><?php echo $row['band'];?></td>
	    <td><?php echo $row['banddetail'];?></td>
   </tr>
 <?php endForeach;?>
</table>
</center>
</div>
</center>
 <div id="division">
 </div>
<center>


</center>
 
<center>

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