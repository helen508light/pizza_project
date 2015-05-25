<?php
if(isset($_SESSION["login"]))
$login=$_SESSION["login"];
else 
$login="Guest";
//$login=strip_tags(stripcslashes(substr($_POST['data']['0'],0,20)));
$whom=strip_tags(stripcslashes(substr($_POST['data']['1'],0,20)));
$text=strip_tags(stripcslashes(substr($_POST['data']['2'],0,200)));
print $login;
print $text;
if($_POST['add']!="")
{
	if($login!="")
	{
		if($whom=="")$whom="всем пользователям";
		//{
			if($text!="")
			{
			include("connect.php");
			$query="insert into gbook values (NULL,'".$login."','".$text."','".$whom."',0,NOW())";
			if(mysql_query($query))print "Сообщение отправлено";
			}else print "no text";
		//}else print"не выбран получатель";
	} else print"кто вы?";
}
print("<a href=forum.php>На форум</a>");
?>