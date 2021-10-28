<?php
//header("Content-Type: text/html; charset=utf-8");
error_reporting(0);
//通过用户输入的信息来确认用户
 if ( (($_POST['username']))!=NULL && (($_POST['password'])!=NULL)) {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    //从db获取用户信息
    $conn = mysqli_connect("localhost:3306","visitor","helloitsme");
	if (!$conn)
  {
	  echo '请检查网络！';
  die('Could not connect: ' . mysql_error());
  }
    mysqli_select_db($conn,'rentcar');
    $sql = "select account,paswd from usr where account = '$userName' and paswd='$password'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    if	($row['account']!=$userName) {
        echo '账户不存在或者密码错误！';
        
    }
    else if($row['account']==$userName&&$row['paswd']!=$password)
    {
        echo '账户不存在或者密码错误！';
        
    }
    else if($row['account']!=$userName&&$row['paswd']!=$password) {
        echo '账户不存在或者密码错误！';
        
    }
    
    else if($row['account']==$userName&&$row['paswd'] ==$password) {//登陆成功
        
		session_start();
        $_SESSION['username'] = $userName;
		
		$sql2= "select usrtag from usr where account = '$userName' ";
		$res22 = mysqli_query($conn,$sql2);
		$row22 = mysqli_fetch_array($res22);
		if	($row22['usrtag']=='admin') {
			$_SESSION['usrtag'] = 'admin';
        header('Location:adminuse.php');
		}
        else{
			$_SESSION['usrtag'] = 'normal';
			header('Location:booking.php');
		}
    }
	mysqli_free_result($res);
    }
    else {
        echo '请填写完整登录信息！';
        
    }

?>

<!-----
<script>
    // 1.获取按钮
    var btn_add = document.getElementById("btn_add");
    btn_add.onclick = function() {
        // 2.1 获取文本框对象
        var idObject = document.getElementById("id");
        var nameObject = document.getElementById("name");
        var genderObject = document.getElementById("gender");
        // 2.2 获取文本框的内容
        var id = idObject.value;
        var name = nameObject.value;
        var gender = genderObject.value;
 
        //3.创建单元格，赋值单元格的标签体
        // id 的 单元格
        var td_id = document.createElement("td");              // 创建单元格
        var text_id = document.createTextNode(id);             // 赋值给单元格的标签体
        td_id.appendChild(text_id);
        // name 的 单元格
        var td_name = document.createElement("td");
        var text_name = document.createTextNode(name);
        td_name.appendChild(text_name);
        //gender 的 单元格
        var td_gender = document.createElement("td");
        var text_gender = document.createTextNode(gender);
        td_gender.appendChild(text_gender);
        // a标签的单元格
        var td_a = document.createElement("td");
        var ele_a = document.createElement("a");
        ele_a.setAttribute("href","javascript:void(0);");
        ele_a.setAttribute("onclick","delTr(this);");
        var text_a = document.createTextNode("删除");
        ele_a.appendChild(text_a);                         // 为a标签写入文本内容："删除"
        td_a.appendChild(ele_a);                           // 为td标签添加子标签（a标签）
 
        // 4.创建表格行
        var tr = document.createElement("tr");
        // 5.添加单元格到表格行中
        tr.appendChild(td_id);
        tr.appendChild(td_name);
        tr.appendChild(td_gender);
        tr.appendChild(td_a);
        // 6.获取table
        var table = document.getElementsByTagName("table")[1];
        table.appendChild(tr);
    };
 
    // 删除方法
    
 
 
</script>
-->

 <!--
    <CENTER>
<div>
    <input type="text" id="id" placeholder="请输入编号">
    <input type="text" id="name"  placeholder="请输入姓名">
    <input type="text" id="gender"  placeholder="请输入性别">
    <input type="button" value="添加" id="btn_add">
</div>
</CENTER>


    <tr>
        <td>1</td>
        <td>令狐冲</td>
        <td>男</td>
        <td><a href="javascript:void(0);" onclick="deleteTr(this);">删除</a></td>
    </tr>
	
	
	
	
	//window.alert("Hello!");
//var x=document.getElementById("666");
//shtml = "<center><table id='thetable' border='1' width = '1500'><caption><h3>订单信息表</h3></caption>"; 
//shtml +="<tr><td>订单编号</td><td>账户名</td><td>客户身份证</td><td>品牌</td><td>品牌详细资讯</td><td>提车点</td><td>附加用品</td><td>提车时间</td><td>还车时间</td><td>处理进度</td><td>处理结果</td><td>操作</td></tr>"; 
//
//shtml += "</table></center>"; //<a href="javascript:void(0);" onclick="deleteTr(this);">删除</a>
//document.write(shtml);
//x.innerHTML=shtml;

<script language="javascript">
function deleteTr(object) {
         获取table节点
        var table = object.parentNode.parentNode.parentNode;
         获取te节点
        var tr = object.parentNode.parentNode;
         删除（并返回）当前节点的指定子节点。
        table.removeChild(tr);

    }
function click1(self){
        
        alert(self.innerHTML);
    
    }
</script>

<form  action="deleterecord.php" method="post" onsubmit="return enter()">
			<input class="submit" type="submit" name="submit" value="删除！" />
		</form>
-->