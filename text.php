<?php
header("Content-Type:text/html;charset=gbk");
//exit();
$name=htmlspecialchars($_POST['name']);
$ideal=htmlspecialchars($_POST['main_ideal']);
$content=htmlspecialchars($_POST['content']);
$time=htmlspecialchars(date(Y��m��d��));
//echo "�ǳ�Ϊ��".$name;
//echo "����Ϊ��".$ideal;
//echo "����Ϊ��".$content;
//echo "����ʱ�䣺".$time;

$content=str_replace(chr(10),"<br/>",$content);
$content=str_replace("n",'',$content);
//echo "����Ϊ��".$content;
$s=$name."||".$ideal."||".$content."||".$time."\n";
$filename="text.txt";
$myfile=file($filename);
if($myfile[0]=="")
{
	$fp=fopen($filename,"a+");
	fwrite($fp,"1||".$s);
	fclose($fp);
}
else
{	
	$temp=explode("||",$myfile[0]);
	$temp[0]++;
	$fp=fopen($filename,"r");
	$text_has=fread($fp,filesize("$filename"));
	fclose($fp);
	$fp=fopen($filename,"w");
	fwrite($fp,$temp[0]."||".$s);
	fwrite($fp,$text_has);
	fclose($fp);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>���Գɹ�</title>

<meta http-equiv="refresh" content="2;url='show.php'">

</head>
<body>
���Գɹ�������󷵻ء�
</body>
</html>