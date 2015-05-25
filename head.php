<?php
header("Cache-control:no-cache");
include("connect.php");
if(session_id()=='')session_start();
if(isset($_GET['login']))
{
$login=$_GET['login'];
$_SESSION['login']=$login;
$strsql="select id_bask from customers where login='".$login."'";
$res=mysql_query($strsql) or die(mysql_error());
$row=mysql_fetch_array($res);
$id_bask=$row["id_bask"]  ;
$_SESSION['id_bask']=$id_bask;
}
elseif(isset($_SESSION['login']))
{$login=$_SESSION['login'];
$strsql="select * from customers where login='".$login."'";
$res=mysql_query($strsql) or die( mysql_error());
$row=mysql_fetch_array($res);
$id_bask=$row["id_bask"];
$_SESSION['id_bask']=$id_bask;
}
else{
$id_bask=$_COOKIE["id_bask"];
if(!isset($id_bask))
{
$uniq_ID=uniqid("ID",true);
setcookie("id_bask",$uniq_ID,time()+60*60*24*14);//create cookie key for basket
}
else
setcookie("id_bask",$id_bask,time()+60*60*24*14);//recreate cookie and delay deadline for 2 weeks
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/php4/strict.dtd">

<php>
<head>
	<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css"> 
	<script type="text/javascript" src="superfish/superfish.js"></script>
	<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src=" smail/smail.js"></script>
<link href="superfish/horz_menu_ie.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="style.css"> 
<link rel="stylesheet" type="text/css" href="css/main_style.css">
<!--
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="css/lightbox.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../js/jquery.lightbox.js></script>-->
<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="superfish/superfish.js"></script>
<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<script type="text/javascript">
  /* <![CDATA[ */
   function externalLinks() {
    links = document.getElementsByTagName("a");
    for (i=0; i<links.length; i++) {
      link = links[i];
      if (link.getAttribute("href") && link.getAttribute("rel") == "external")
      link.target = "_blank";
    }
   }
   window.onload = externalLinks;
  /* ]]> */ 
 </script>
 
 <script>
function newMyWindow(e) {
  var h = 500,
      w = 500;
  window.open(e, '', 'scrollbars=1,height='+Math.min(h, screen.availHeight)+',width='+Math.min(w, screen.availWidth)+',left='+Math.max(0, (screen.availWidth - w)/2)+',top='+Math.max(0, (screen.availHeight - h)/2));
}
</script>
<script>
function newMyWindow1(href) {
  var d = document.documentElement,
      h = 500,
      w = 500,
      myWindow = window.open(href, 'myWindow', 'scrollbars=1,height='+Math.min(h, screen.availHeight)+',width='+Math.min(w, screen.availWidth)+',left='+Math.max(0, ((d.clientWidth - w)/2 + window.screenX))+',top='+Math.max(0, ((d.clientHeight - h)/2 + window.screenY)));

      // абзац для Chrome
      if (myWindow.screenY >= (screen.availHeight - myWindow.outerHeight)) {myWindow.moveTo(myWindow.screenX, (screen.availHeight - myWindow.outerHeight))};
      if (myWindow.screenX >= (screen.availWidth - myWindow.outerWidth)) {myWindow.moveTo((screen.availWidth - myWindow.outerWidth), myWindow.screenY)};

}
</script>

  <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<title>Пример</title>
<style type="text/css">
body {				
		margin:0;		
		padding:0px;
		background-color:#FFFFFF;
		<!--background-image:url("image/back.jpg");-->
		
	}

   table {
   
    width: 100%; /* Ширина таблицы */
   }
   td {
    padding: 4px; /* Поля в ячейках */
    vertical-align: top; /* Выравнивание по верхнему краю ячеек */
   }
   
div {

border:solid 0.5px 
padding:10px;
} 
	
#header  {	

position:absolute;
top:10px;
left:150px;
padding:5px;
text-align:bottom;	
z-index:2;	
		min-height:100px;
		max-height:200px;
		max-width:950px;
		background-color:#AA2200;
		border-radius:5px;
		-moz-border-radius: 5px; /* Для Firefox 3 */
     
	}
	#menu{
	position:absolute;
	z-index:2;

	top:180px;
	left:150px;
	padding:5px;
	text-align:bottom;		
		height:30px;
		max-width:950px;
		background-color:#AA2200;
		border-radius:5px;
		-moz-border-radius: 5px; /* Для Firefox 3 */
    -webkit-border-radius: 5px; 
	}
	
	#gallery
	{
	}
#box {
min-height:400px;
max-width:950px
min-width:900px;
}
#admintool
{
position:fixed;
top:10px;
	left:0px;	
		width:150px;
		min-height:800px;
		background-color:#AACCFF;
 text-align:top;
		float:left 	;
		border-radius:10px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
}
	
#column1 {		
position:absolute;
top:230px;
	left:150px;	
		width:150px;
		min-height:400px;
		background-color:#AAAAAA;
 text-align:top;
		float:left 	;
		border-radius:10px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
   
	}
	
#column2 {	

<!--opacity: 1;-->
position:absolute;
top:230px;
left:150px;
width:800px;
padding:5px;
		text-align:top;
		min-height:400px;
		background-color:#AA2200;
		margin-left:150px;
		border-radius:5px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
	}
	
#footer  {		
position:absolute;
left:150px;
top:700px;
bottom:10px;
		max-height:80px;
		max-width:950px;
		min-width:900px;
		background-color:#100110
		
	}

</style>
</head>
<body vlink="#51CBEE" link="#FFFFFF" ><!--  link="#000000">-->



<div text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" id="header">

<table border=0 style="vertical-align:top;">
<tr><td><img src="image/banner1.png" width=300px height=100px>
</td><td><img src="image/logo.png" width:500 height:100></td><td>
<div id="auto">

<form action="testreg.php" method="post">
<table  border=0 width=200>
<?php
if(empty($_SESSION['login'])or empty($_SESSION['id']))
{?>
<tr><td>Логин</td><td><input class="mac" placeholder="Введите логин" type="text" name="login" size=20 style="width=100; height:20;" ></td></tr>
<tr><td>Пароль</td><td><input class="mac" placeholder="Введите пароль" type="password" size=20 name="password" style="width=100; height:20;"></td></tr>
<tr><td><input type="submit" class="modern" value=ok style="width:60;"></td><td><a class="inline-link-3" href="reg.php">Регистрация</a></td></tr>
<tr><td colspan=2>
<?php
echo "Пользователь: Гость";
}
else
{
?>
<tr><td colspan=2>
<?php
echo "Пользователь ".$_SESSION['login']." ";
?>
<a href="exit.php"> Выход</a> <a href="cabinet.php">Личный кабинет</a>
<?php

}
?>
<?php
if(isset($_SESSION["login"]))
{

//print $_SESSION["login"];
//print "<a href=testreg.php>Личный кабинет</a>";
}

?>
</td></tr>

</table></form>


</div>
<tr><td colspan=3 >


</td></tr>

</table>


</div>

<div id="admintool">
<div class="admin_menu" ><a  href="doadmin.php?type=11" onclick="window.open(this.href, '', 'scrollbars=1,height='+Math.min(500, screen.availHeight)+',width='+Math.min(500, screen.availWidth)); return false;" >show users</a></div>
<div class="admin_menu" ><a href="doadmin.php?type=1" onclick="newMyWindow1(this.href); return false;">create new user</a></div>
<div class="admin_menu" ><a  href="doadmin.php?type=2" onclick="newMyWindow1(this.href); return false;">change users</a></div>
<div class="admin_menu" ><a href="doadmin.php?type=3" onclick="newMyWindow1(this.href); return false;">delete user</a></div>
</div>

<div id="menu"  text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" >

<ul class="nav" valign="buttom">
    <li><a href="index00.php">Главная</a></li>
	    <li><a href="forum.php">Форум</a></li>
 <li><a href="catalog.php">Каталог</a>
      <ul>
       <li><a href="pages/books.php">Виды пиццы</a>
        <ul>
        <li><a href="pages/used.php">Итальянская</a></li>
        <li><a href="pages/new.php">Американская</a></li>
		<li><a href="pages/new.php">Французская</a></li>

        </ul></li> 
        <li><a href="catalog.php">Наши продукты</a></li>
        <li><a href="history.php">История</a></li>
		 
      </ul>
    </li>
    <li><a href="about.php">О нас</a><ul>
        <li><a href="contact.php">Контакты</a>        </li>
        <li><a href="driving.php">Наши направления</a></li>
      </ul>
    </li> 
	<li><a href="basket.php">Корзина</a>
	</li>
	<li><a href="order.php">Заказ</a>
	</li>
    </ul>

</div>


<div style="margin-left:auto; margin-right:auto;width:80%" id="box">
	<div id="column1">
	
	<script src="http://widgetsmonster.com/w1423507749-calendar5&153&172"></script>
	<h2>Новости</div>
	
<div  id="column2" >

	