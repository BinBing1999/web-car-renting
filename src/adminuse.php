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
    $sql = "select * from bookrecord where result='passed'";
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
<center><table id='thetable' border='1' width = '1500'><caption><h3>已确认的订单信息表</h3></caption>
    
        <tr><td>订单编号</td><td>账户名</td><td>客户身份证</td><td>品牌</td><td>品牌详细资讯</td><td>提车点</td><td>附加用品</td><td>提车时间</td><td>还车时间</td><td>处理进度</td><td>操作</td></tr>
    <?php foreach($records as $row) : ?>
    <tr id="id<?php echo $row['idbookrecord'];?>">
        <td><?php echo $row['idbookrecord'];?></td>
        <td><?php echo $row['usrid'];?></td>
        <td><?php echo $row['personalid'];?></td>
        <td><?php echo $row['carband'];?></td>
        <td><?php echo $row['banddetail'];?></td>
        <td><?php echo $row['getcarplace'];?></td>
        <td><?php echo $row['appendixname'];?></td>
		 <td><?php echo $row['starttime'];?></td>
		  <td><?php echo $row['endtime'];?></td>
		   <td><?php echo $row['result'];?></td>
		    
			 <td >
			 <form action = "deleterecord.php" method = "post"> 
			 <input type="hidden" name="thevalue" value="<?php echo $row['idbookrecord'];?>">
				<input type="submit" name="submit" value="删除" /> 
				</form> 
		
		</td>
   </tr>
 <?php endForeach;?>

</table></center>
</div>
</center>

 <div id="division">
 </div>
 
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
<script>
  //  function func1(self){
 //       //alert(self.innerHTML);
		
//		location.reload();
		
  //  }
  //a onclick="func1(this)">删除/a
	//$('#delete_button').click(function(){ 
//		var comment_id = $(this).attr('id');//you should use the id of the comment as id for the delete button for this to work. 
//		$.post('delete.php', {'comment_id' : comment_id}, function(){ 
	//	$(this).parent('div').remove(); //hide the comment from the user 
	//	}); 
//	});

</script>

</body>
</html>

