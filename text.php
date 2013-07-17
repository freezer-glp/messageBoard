<?php
header("Content-Type:text/html;charset=gbk");
//exit();
$name=htmlspecialchars($_POST['name']);
$ideal=htmlspecialchars($_POST['main_ideal']);
$content=htmlspecialchars($_POST['content']);
$time=htmlspecialchars(date(Y年m月d日));
//echo "昵称为：".$name;
//echo "主题为：".$ideal;
//echo "留言为：".$content;
//echo "留言时间：".$time;

$content=str_replace(chr(10),"<br/>",$content);
$content=str_replace("n",'',$content);
//echo "留言为：".$content;
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
<title>留言成功</title>

<meta http-equiv="refresh" content="2;url='show.php'">

</head>
<body>
留言成功，两秒后返回。
</body>
</html>