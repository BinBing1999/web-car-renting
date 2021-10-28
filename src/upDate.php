<?php

//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if ($_SESSION['usrtag'] === 'admin') {
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
    mysqli_select_db($conn,'rentcar');
    $sql = "select * from shops";
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
    <title>后台管理</title>
	
<style type="text/css">
 *{margin:0;padding:0;}
 body{background-color:#CCC;}
 .clear{clear:both;}
 #container{
 background-color:#BBBBFF;
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
 <table width="1500" border="1">
  <tbody>
    <tr>
      <td width="50" height="30" align="center"><a href="adminuse.php">订单情况</a></td>
	  <td width="50" align="center"><a href="tobedeal.php">待处理订单</a></td>
      <td width="50" align="center"><a href="upDate.php">商品数据更新</a></td>
	  <td width="50" align="center"><a href="allusr.php">已注册用户资料</a></td>
    </tr>
  </tbody>
</table>
  <div id="label">
   
  </div>
 </div>
 <div id="division">
 <hr></hr>
 </div>


 <center>
<div id="666">
<center><table id='firsttable' border='1' width = '1300'><caption><h3>商店信息表</h3></caption>
    
        <tr><td>商店序号</td><td>商店名称</td><td>地区</td><td>开门时间</td><td>关门时间</td></tr>
    <?php foreach($records as $row) : ?>
    <tr id="id<?php echo $row['idshops'];?>">
	<td><?php echo $row['idshops'];?></td>
        <td><?php echo $row['shopname'];?></td>
        <td><?php echo $row['region'];?></td>
        <td><?php echo $row['opentime'];?></td>
        <td><?php echo $row['closetime'];?></td>
	    
   </tr>
 <?php endForeach;?>
</table></center>
</div>
<form  action="updateshop.php" method="post" onsubmit="return enter()">
			<label><input class="text" type="text"  placeholder="商店名称" name="shopname" />
			<input class="text" type="text"  placeholder="地区" name="place" />
			<input class="text" type="text"  placeholder="开门时间" name="theopentime" />
			<input class="text" type="text"  placeholder="关门时间" name="theclosetime" />
			<input class="submit" type="submit" name="submit" value="更新" />
			</label>
			
			
		</form>
</center>
 <div id="division">
 </div>
<center>

<?php

    $sql2 = "select * from cars";
    $res2 = mysqli_query($conn,$sql2);
    
	$records2=array();
    while( $row2 = mysqli_fetch_array($res2)){
      $records2[]=$row2;
}
?>
<center>
<div id="666">
<center><table id='secondtable' border='1' width = '1000'><caption><h3>车辆信息表</h3></caption>
    
     <tr><td>车辆序号</td><td>车辆类型</td><td>核载人数</td><td>颜色</td><td>厂牌</td><td>详细品牌</td></tr>
    <?php foreach($records2 as $row2) : ?>
    <tr id="id<?php echo $row2['idcar'];?>">
	<td><?php echo $row2['idcar'];?></td>
        <td><?php echo $row2['structure'];?></td>
        <td><?php echo $row2['peoplenum'];?></td>
        <td><?php echo $row2['color'];?></td>
        <td><?php echo $row2['band'];?></td>
	    <td><?php echo $row2['banddetail'];?></td>
   </tr>
 <?php endForeach;?>
</table>
<form  action="updatecar.php" method="post" onsubmit="return enter()">
			<label><input class="text" type="text"  placeholder="车辆类型" name="cartype" />
			<input class="text" type="text"  placeholder="核载人数" name="peoplenum" />
			<input class="text" type="text"  placeholder="颜色" name="color" />
			<input class="text" type="text"  placeholder="厂牌" name="band" />
			<input class="text" type="text"  placeholder="详细品牌" name="banddetail" />
			<input class="submit" type="submit" name="submit" value="更新" />
			</label>
			
		</form>
</center>
</div>
</center>
 <div id="division">
 </div>
<center>
<?php

    $sql3 = "select * from appendix";
    $res3 = mysqli_query($conn,$sql3);
    
	$records3=array();
    while( $row3 = mysqli_fetch_array($res3)){
      $records3[]=$row3;
}
?>

<center>
<div id="666">
<center><table id='thirdtable' border='1' width = '400'><caption><h3>附加品信息表</h3></caption>
    <tr><td>物品序号</td><td>物品名称</td><td>日租</td></tr>
    <?php foreach($records3 as $row3) : ?>
    <tr id="id<?php echo $row3['idappendix'];?>">
	<td><?php echo $row3['idappendix'];?></td>
        <td><?php echo $row3['appendixname'];?></td>
        <td><?php echo $row3['priceperday'];?></td>
        
       
   </tr>
 <?php endForeach;?>
</table>

<form  action="updateappendix.php" method="post" onsubmit="return enter()">
			<label><input class="text" type="text"  placeholder="物品名称" name="appendixname" />
			<input class="text" type="text"  placeholder="日租" name="priceperday" />
			<input class="submit" type="submit" name="submit" value="更新" />
			</label>
			
		</form>
</center>
</div>
</center>
 <div id="division">
 </div>
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
<!--<td>
			<form action = "delusr.php" method = "post"> 
			<input type="hidden" name="value0" value="<?php echo $row['account'];?>">
			<input type="submit" name="submit" value="删除用户" /> 
			</form>
		</td>
		-->
		
