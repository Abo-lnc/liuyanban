<!doctype html>
<html>
<head>
	<title>delete</title>
	<meta charset="UTF-8">
	<script type="text/javascript">
	</script>
	<style>
		

	</style>
</head>
<body>
<?php
	$did=$_GET['did'];
	@mysql_connect('127.0.0.1:3306','sqlname','sqlpw') or die(mysql_error());
	@mysql_select_db('liuyan');
	mysql_query('set name utf8');
	$sql="delete from t where id=$did";
	if(mysql_query($sql)){
		header('location:liuyan.php');
	}else{
		echo('error 1064!');
	}
	
?>

</body>
</html>
