<!doctype html>
<html>
<head>
	<title>留言板(sql)</title>
	<meta charset="UTF-8">
	<script>
	var a=true;
		function fun0(){
			if(a){
				document.getElementById('t1').value='';
				a=false;
			}
		}
		function fun1(){
			var cc=document.getElementById('t1').value;
			var x=cc.length;
			if(x>30){
				alert('您输入的文字已经大于30个字符！');
				return false;
			}else if(x<=0){
				alert('您还没有输入文字');
				return false;
			}else if(a){
				alert('您还没有输入文字');
				return false;
			}
			else{
				return true;
			}

		}
		function de(n){
			if(confirm('确定删除吗！')){
			location.href='ldelete.php?did='+n;
			}
		}
	</script>
	<style>
		body,input{
			text-align:center;
		}
		#b1{
			border:none;
			background:#000;
			width:200px;
			height:40px;
			color:#fff;
			font-size:30px;
			padding-top:0px;
			border-radius:5px;
			
		}
		textarea{
			resize:none;
			border-radius:5px;
			font-size:20px;
			height:200px;
			width:1000px;
		}
		table{
			width:1000px;
			text-align:center;
			margin:0 auto;

		}
		table,tr,td,th{
			border:1px solid black;
			border-collapse: collapse;
		}
		tr,.bu1{
			height:40px;
		}
		.td,.bu1{
			width:50px;
		}
		.left{
			text-align:left;
		}
		td{
			height:100px;
		}
		.right{
			text-align:right;
			float:right;
		}
	</style>
</head>
<body>
	<?php
		@mysql_connect('127.0.0.1:3306','sqlname','sqlpw') or die(mysql_error());
		@mysql_select_db('database name');
		mysql_query('set name utf8');
		$do=mysql_query('select * from table name');
		if($_POST['b1']){
			$tt=$_POST['t1'];
			$sql='insert into t1 (neirong) values ("'.$tt.'");';
			if(mysql_query($sql)){
				echo"留言成功!";
				echo"<script>location.href='luntan.php';</script>";
			}else{
			//echo $sql; 调试
			echo"留言失败!";
			}
		}
	
	?>
	<br><br>
	<table>
		<tr>
			<th class="td">用户</th>
			<th>留言内容</th>
			<th class="td">删除</th>
		</tr>
		<tr>
			<td colspan="3" class="left">中国建设集团三一重工公司研讨会</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2" class="left">
				中国建筑工程总公司，简称中建总公司、中国建筑，正式组建于1982年，
				其前身为原国家建工总局，是为数不多的不占有大量的国家投资，
				不占有国家的自然资源和经营专利，以从事完全竞争性的建筑业和地产业
				为核心业务而发展壮大起来的国有重要骨干企业。
				<button class="right">删除</button>
			</td>
		</tr>
	<?php
		while($docu=mysql_fetch_assoc($do)){
			echo"<tr>";
			echo"<td class='td'>".$docu['id']."</td>";
			echo"<td colspan='2'>".$docu['neirong']."<button class='right' onclick='de(".$docu['id'].")'>删除</button></td>";
			echo"</tr>";
	}
	?>
	</table>
	<form name="f" method="POST" action=" " onSubmit="return fun1()"/>
			<textarea name="t1" id="t1" onclick="fun0()">请输入的内容小于30个字符！</textarea><br>
			<input type="submit" name="b1" id="b1" value="留言">
	</form>
</body>
</html>