<?php
if(session_id()=='')session_start();
if(isset($_GET['name']))
{
$name=$_GET['name'];
$_SESSION['name']=$name;

}
elseif(isset($_SESSION['name']))
{$name=$_SESSION['name'];
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css"> 
	<script type="text/javascript" src="superfish/superfish.js"></script>
	<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<link href="superfish/horz_menu_ie.css" rel="stylesheet" type="text/css">
<link href="css/main_style.css" rel="stylesheet" type="text/css">

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
<title>Pizzzzza:)</title>




</head>
<body alink="#FFFFFF" vlink="red" link="#000000">



<div text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" id="header">

<table border=0 style="vertical-align:top;">
<tr><td><img src="image/banner1.png" width=300px height=100px>
</td><td><img src="image/logo.png" width:500 height:100></td><td>
<div id="auto">

<form action="testreg.php" method="post">
<table  border=0 width=200>
<!--<tr><td>Логин</td><td><input type="text" name="login" size=20 style="width=100; height:20;" ></td></tr>
<tr><td>Пароль</td><td><input type="password" size=20 name="pass" style="width=100; height:20;"></td></tr>
<tr><td><input type="submit" value=ok style="width:60;"></td><td><a href="reg.php">Регистрация</a></td></tr>
<tr><td colspan=2>-->
<?php
if(empty($_SESSION['login'])or empty($_SESSION['id']))
{?>
<tr><td>Логин</td><td><input type="text" name="login" size=20 style="width=100; height:20;" ></td></tr>
<tr><td>Пароль</td><td><input type="password" size=20 name="pass" style="width=100; height:20;"></td></tr>
<tr><td><input type="submit" value=ok style="width:60;"></td><td><a href="reg.php">Регистрация</a></td></tr>
<tr><td colspan=2>
<?php
echo "Пользователь: Гость";
}
else
{
?>
<tr><td colspan=2>
<?php
echo "Пользователь ".$_SESSION['login']."<br>";

}
?>

</td></tr>

</table></form>


</div>
<tr><td colspan=3 >
<?php
if(isset($HTTP_SESSION_VARS["login"]))
{
print $HTTP_SESSION_VARS["login"];
print "<a href=cabinet.php>Личный кабинет</a>";
}

?>

</td></tr>

</table>


</div>


<div id="menu"  text-align:bottom valign="center" style="margin-left:auto; margin-right:auto;width:80%" >

<ul class="nav" valign="buttom">
    <li><a href="index00.html">Главная</a></li>
 <li><a href="products.html">Наши продукты</a>
      <ul>
       <li><a href="pages/books.html">Виды пиццы</a>
        <ul>
        <li><a href="pages/used.html">Итальянская</a></li>
        <li><a href="pages/new.html">Американская</a></li>
		<li><a href="pages/new.html">Французская</a></li>

        </ul></li> 
        <li><a href="catalog.php">Каталог</a></li>
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
<!--<div style="margin-left:auto; margin-right:auto;width:80%" id="footer">
	<h4 style="color:#FFFFFF; text-align:center">© Helen,2015
</div>-->
</body></html>
