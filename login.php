<?php
header("Content-Type:text/html;charset=gbk");
//exit();
$name= $_POST['username'];
$pass= $_POST['password'];
$filename="login.txt";
$myfile=file($filename);


if(rtrim($myfile[0])==$name and rtrim($myfile[1])==$pass)
{
	setcookie("admin","1",time()+30);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="refresh" content="2;url=show.php">
</head>
<body bgcolor="#EEF3F7">
<?php
echo "��½�ɹ�!2��󷵻ء�";
//echo "<br>";
//echo "�û���Ϊ:".$name;
//echo "<br/>";
//echo "����Ϊ��".$pass;
?>
</body>
</html>
<?php
}
else
{
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
	<meta http-equiv="refresh" content="2;url=show.php">
	</head>
	<body bgcolor="#EEF3F7">��½ʧ�ܣ�2��󷵻ء�
	</body>
</html>
<?php
}
?>

