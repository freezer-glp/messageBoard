<?php
header("Content-Type:text/html;charset=gbk");
if($_COOKIE[admin]=="1")
{
	$id=$_GET["id"];
	$filename="text.txt";
	$myfile=file($filename);
	$z=$myfile[0];
	$temp=explode("||",$myfile[$z-$id]);
	for($i=0;$i<($z-$id);$i++)
	{
		$temp2=explode("||",$myfile[$i]);
		$temp2[0]--;
		$text2=$text2.$temp2[0]."||".$temp2[1]."||".$temp2[2]."||".$temp2[3]."||".$temp2[4];
	}
	for($i=($z-$id+1);$i<$z;$i++)
	{
		$text1=$text1.$myfile[$i];
	}
	$fp=fopen($filename,"w");
	fwrite($fp,$text2);
	fwrite($fp,$text1);
	fclose($fp);

?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=show.php">
<meta http-equiv="Content-Type" content="text/html charset=gbk">
<title>ɾ���ɹ�</title>
</head>
<body bgcolor="#EEF3F7">ɾ���ɹ���2��󷵻�
</body>
</html>
<?php
}
else
{
?>
	<html>
<head>
<meta http-equiv="refresh" content="2;url=login.html">
<meta http-equiv="Content-Type" content="text/html charset=gbk">
<title>�����µ�¼</title>
</head>
<body bgcolor="#EEF3F7">�����µ�¼��2��󷵻ء�
</body>
</html>
<?php
}
?>