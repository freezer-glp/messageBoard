<?php
header("Content-Type:text/html;charset=gbk");
//exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>留言板</title>
<style type="text/css">
body{
	margin:0px;
	padding:0px;
	border:1px solid black;
}
.linkarea{
	border:1px solid black;
	margin:10px auto;
	padding:0px;
	width:250px;
	font-size:20px;
	text-align:center;
	
}
.textarea{
	border:1px solid black;
	margin:0px auto;
	padding:0px;
	width:800px;
	
}
.titlearea{
	border:1px solid black;
	margin:10px auto;
	padding:0px;
	width:800px;
	font-size:50px;
	text-align:center;
}
</style>
</head>
<body bgcolor="#EEF3F7">

<div class="titlearea">欢迎光临，请您留言！</div>
<div class="linkarea">
<a href="text.html">签写留言</a>&nbsp;&nbsp;&nbsp;<a href="login.html">管理员登陆</a>
</div>
<div class="textarea">
<?php

$filename="text.txt";
if(!file_exists($filename))
{
	$fp=fopen($filename,"w");
	fclose($fp);
}
$myfile=file($filename);
if($myfile[0]=="")
	echo "没有记录，欢迎您留言";
else
{
	$temp=explode("||",$myfile[0]);
	echo "共有".$temp[0]."条留言";
	echo "<br/>";
	echo "<table border='1' align='center'>";
	$totaltext=$temp[0];
	for($i=0;$i<$totaltext;$i++)
	{
		$temp=explode("||",$myfile[$i]);
		//$temp[3]=str_replace("^&*","<br/>",$temp[3]);
		echo "<tr>";
			echo  "<td>第".$temp[0]."条留言</td>";
			echo "<td>昵称：".$temp[1]."</td>";
			echo "<td>写于".$temp[4];
			if($_COOKIE[admin]=="1")
			{
				echo "&nbsp;&nbsp;";
				echo "<a href='delete.php?id=".$temp[0]."'>删除";
			}
		echo "</tr>";
			echo "<tr>";
			echo "<td colspan='3'>主题：".$temp[2]."</td>";
		echo "</tr>";
			echo "<tr>";
			echo "<td colspan='3'>内容：<br/>".$temp[3]."</td>";
		echo "</tr>";
		echo "</tr>";
			echo "<tr>";
			echo "<td colspan='3'><hr/'/></td>";
		echo "</tr>";
	}
}
?>
</div>
</body>
</html>