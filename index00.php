<?php
header("Cache-control:no-cache");
include_once("connect.php");
if(session_id()=='')session_start();
	if(isset($_GET['login']))
	{
	$login=$_GET['login'];
	$_SESSION['login']=$login;
	$strsql="select id_bask from customers where login='".$login."'";
	$res=mysql_query($strsql);
	$row=mysql_fetch_array($res);
	$id_bask=row["id_bask"]  ;

	}
	elseif(isset($_SESSION['login']))
	{$login=$_SESSION['login'];
	$strsql="select id_bask from customers where login='".$login."'";
	$res=mysql_query($strsql);
	$row=mysql_fetch_array($res);
	$id_bask=$row["id_bask"]  ;
	$_SESSION['id_bask']=$id_bask;
	}
	else
	{

	$id_bask=$_COOKIE["id_bask"];
		if(!isset($id_bask))
		{
		$uniq_ID=uniqid("ID",true);
		setcookie("id_bask",$uniq_ID,time()+60*60*24*14);//create new key
		}
		else 
		setcookie("id_bask",$id_bask,time()+60*60*24*14);//recreate key with same value
	}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css"> 
	<script type="text/javascript" src="superfish/superfish.js"></script>
	<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/main_style.css">

<link href="superfish/horz_menu_ie.css" rel="stylesheet" type="text/css">

<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="superfish/superfish.js"></script>
<script type="text/javascript" src="superfish/complete_siteJS.js"></script>

<script type="text/javascript">
all_images = new Array (
"image/main1.jpg",
"image/pizza_2.jpg",
"image/pizza_3.jpg",
"image/pizza_4.jpg");
var ImgNum = 0;
var ImgLength = all_images.length - 1;
var delay = 2500;
var lock = false;
var run;

function chgImg(direction) {
 if (document.images) {
  ImgNum = ImgNum + direction;
  if (ImgNum > ImgLength) { ImgNum = 0; }
  if (ImgNum < 0) { ImgNum = ImgLength; }
  document.slide_show.src = all_images[ImgNum];
 }
}

function auto() {
 if (lock == true) {
  lock = false;
  window.clearInterval(run);
 }
 else if (lock == false) {
  lock = true;
  run = setInterval("chgImg(1)", delay);
 }
}
</script>

<script type="text/javascript" >
var newPhoto=new Image();
newPhoto.src='pizza_2.jpg';
var photo=document.getElementById('photo');
photo.src=newPhoto.src;
photo.width=newPhoto.width;
photo.height=newPhoto.height;


</script>

  <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
<title>Пример</title>
<style type="text/css">
body {				
		margin:0;		
		padding:0px;
		
		background-color:#FFFFFF;
		
		background-repeat:round;
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
		min-height:100px;
		max-height:150px;
		max-width:950px;
		background-color:#AA2200;
		border-radius:5px;
		-moz-border-radius: 5px; /* Для Firefox 3 */
     
	}
	#menu{
	z-index:2;
	position:absolute;
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
	
#box {
max-width:950px
min-width:900px;
}
	
#column1 {		
position:absolute;
top:220px;
	left:150px;	
		width:150px;
		height:500px;
		overflow:auto;
		background-color:#AAAAAA;
 text-align:top;
		float:left 	;
		border-radius:10px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
   
	}
	
#column2 {	

opacity: 1;
position:absolute;
top:220px;
left:150px;
width:800px;
padding:5px;
overflow:auto;
		text-align:top;
		height:500px;
		background-color:#AA2200;
		margin-left:150px;
		border-radius:5px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
	}
	
#footer  {		
position:fixed;
opacity:0.8;
top:auto;
clear:both;
left:150px;
bottom:10px;

padding:5px;
		max-height:50px;
		max-width:950px;
		min-width:900px;
		background-color:#100110
		border-radius:5px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
	}
</style>

</style></head>
<body alink="#FFFFFF" vlink="red" link="#000000">



<div text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" id="header">

<table border=0>
<tr><td><img src="image/banner1.png" width=300px height=100px>
</td><td><img src="image/logo.png" width:500 height:100></td><td>
<div id="auto">
<form action="testreg.php" method="post">
<table><tr><td>Логин</td><td><input type="text" class="mac" placeholder="Введите логин" name="login" style="width:150; height:20;" ></td></tr>
<tr><td>Пароль</td><td><input type="password" class="mac" placeholder="Введите пароль" name="password" style="width:150; height:20;"></td></tr>
<tr><td><input class="modern" type="submit" value=ok style="width:60;"></td><td><a class="inline-link-3" href="reg.php">Регистрация</a></td></tr></table></form>
</div>
<tr><td>
<?php
if(isset($HTTP_SESSION_VARS["login"]))
{
print $HTTP_SESSION_VARS["login"];
print "<a href=cabinet.php>Личный кабинет</a>";
}
?>
<?php
if(empty($_SESSION['login'])or empty($_SESSION['id']))
{
echo "Вы вошли на сайт,как гость";
}
else
{
echo "Пользователь ".$_SESSION['login']."  ";
?>
<a href="exit.php">Выход</a>
<?php
echo "<br>";
}
?>




</td></tr>

</table>


</div>

<div id="menu"  text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" >

<ul class="nav" valign="buttom">
    <li><a href="index00.php">Главная</a></li>
	<li><a href="forum.php">Форум</a>
	</li>
 <li><a href="catalog.php">Каталог</a>
      <ul>
       <li><a href="pages/books.html">Виды пиццы</a>
        <ul>
        <li><a href="pages/used.html">Итальянская</a></li>
        <li><a href="pages/new.html">Американская</a></li>
		<li><a href="pages/new.html">Французская</a></li>

        </ul></li> 
        <li><a href="products.html">Наши продукты</a></li>
        <li><a href="history.php">История</a></li>
		 
      </ul>
    </li>
    <li><a href="about.html">О нас</a><ul>
        <li><a href="contact.html">Контакты</a>        </li>
        <li><a href="driving.html">Наши направления</a></li>
      </ul>
    </li> 
	<li><a href="basket.php">Корзина</a>
	</li>
	<li><a href="order.php">Заказ</a>
	</li>
    </ul>


<!--<table align="bottom" border=0 width=950>
<tr><td width=20%><a alink="red" vlink="black" href="catalog.php">Каталог</a></td><td width=20%><a href="order.php">Заказ</a></td><td><a href="basket.php">Корзина</a></td><td><a href="reg.php">Регистрация</a></td><td><a href="enter.php">Вход</a></td></tr>
</table>-->

</div>

<!--<script type="text/javascript">
$(document).ready(function() {
var start_pos=$('#menu').offset().top;
 $(window).scroll(function(){
  if ($(window).scrollTop()>=start_pos) {
      if ($('#menu').hasClass()==false) $('#menu').addClass('to_top');
  }
  else $('#menu').removeClass('to_top');
 });
});
</script>-->
<div style="margin-left:auto; margin-right:auto;width:80%" id="box">
	<div id="column1">
	<h2>Новости
	</div>
	
<div  id="column2" >
	<img  id="photo" src="image\main1.jpg" name="slide_show" width=797 height=500>
	</div>
</div>
<script type="text/javascript">
 auto();
</script>
<div style="width:80%" id="footer">
	<h4 style="color:#FFFFFF; text-align:center">© Helen,2015
</div>
</body></html>
