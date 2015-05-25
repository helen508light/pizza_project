

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
else
{
$name='null';
echo 'Гость'.
"<br/>\n";
}
echo 'Пользователь' .$name;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/php4/strict.dtd">

<php>
<head>
	<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css"> 
	<script type="text/javascript" src="superfish/superfish.js"></script>
	<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<link href="superfish/horz_menu_ie.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="style.css"> 

<!--
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="css/lightbox.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../js/jquery.lightbox.js></script>-->
<link href="superfish/horz_menu.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="superfish/superfish.js"></script>
<script type="text/javascript" src="superfish/complete_siteJS.js"></script>
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="css/lightbox.css" rel="stylesheet" type="text/css">

<Script type="text/javascript" src="../js/jquery.lightbox.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#gallery a').lightBox(
	
	{	//imageLoading='images/lightbox-ico-loading.gif',
	imageBtnClose: 'images/close-button.gif',
	containerREsizeSpeed:100
		}
	
	);
	$('#gallery img').each(function() {
		var imgFile = $(this).attr('src');
		var preloadImage = new Image();
		preloadImage.src = imgFile.replace('.','_h.');
			
		$(this).hover(
			function() {
				$(this).attr('src', preloadImage.src);
			},
			function () {
				$(this).attr('src', imgFile);
			}
		); // end hover
	}); // end each
}); // end ready()
</script>

  <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<title>Пример</title>
<style type="text/css">
body {				
		margin:0;		
		padding:0px;
		background:#000000
		
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
left:200px;
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
	left:200px;
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
max-width:950px
min-width:900px;
}
	
#column1 {		
position:absolute;
top:230px;
	left:200px;	
		width:150px;
		min-height:210px;
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
top:230px;
left:200px;
width:800px;
padding:5px;
		text-align:top;
		min-height:200px;
		background-color:#AA2200;
		margin-left:150px;
		border-radius:5px;
		-moz-border-radius: 10px; /* Для Firefox 3 */
    -webkit-border-radius: 10px;
	}
	
#footer  {		
position:absolute;
left:200px;
top:700px;
bottom:10px;
		max-height:80px;
		max-width:950px;
		min-width:900px;
		background-color:#100110
		
	}

</style>
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
    <li><a href="index00.php">Главная</a></li>
 <li><a href="products.php">Наши продукты</a>
      <ul>
       <li><a href="pages/books.php">Виды пиццы</a>
        <ul>
        <li><a href="pages/used.php">Итальянская</a></li>
        <li><a href="pages/new.php">Американская</a></li>
		<li><a href="pages/new.php">Французская</a></li>

        </ul></li> 
        <li><a href="catalog.php">Каталог</a></li>
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
	<h2>Новости
	</div>
	
<div  id="column2" >

<fieldset> 
<form method="post" action="select.php"> 
<label for="name_piz">Название пиццы:</label><br/> 
<input type="text" name="name_piz" size="30"><br/> 
<label for="price">Цена не более чем:</label><br/> 
<input type="text" name="price" size="30"><br/> 

<input id="submit" type="submit" value="Поиск">
<br/> 
</form> </fieldset> 
<fieldset> 
<form method="post" action="search.php"> 
<input id="submit" type="submit" value="Все товары">
<br/> 
</form> 
</fieldset> 
  <div id="gallery">
  <a href="image/large/chicken.png" title="Цыпленок"><img src="image/small/chicken.png" width="70" height="70" alt="Blue"></a>
  <a href="image/large/margo.png"> <img src="image/small/margo.png" width="70" height="70" alt="Yellow"> </a>
  <a href="image/large/chipolla.png"><img src="image/small/chipolla.png" width="70" height="70" alt="Green"> </a>
  <a href="image/large/chicken.png"><img src="image/small/chicken.png" width="70" height="70" alt="Orange"> </a>
  <a href="image/large/purple.jpg"><img src="image/small/purple.jpg" width="70" height="70" alt="Purple"> </a>
  <a href="image/large/red.jpg"><img src="image/small/red.jpg" width="70" height="70" alt="Red"></a>
  </div>
  </div>
	

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lightbox Gallery</title>-->


<!--</head>
<body <!--id="twoCol" class="simple">
<div id="container">
  <div id="banner"><img src="../images/banner.png" alt="JavaScript: The Missing Manual" width="760" height="65"><span id="badge"><a href="http://www.sawmac.com/missing/js/"></a></span></div>
  
  <div id="contentWrap">
  <div id="main">
  <h1>Lightbox Gallery</h1>-->
  
 <!-- <p class="credit">Photos by <a href="http://www.morguefile.com/forum/profile.php?username=alin">Alin Nan</a></p>
  
</div>
  <div id="sidebar">
    <h2>Script 7.3</h2>
</div>
  </div>
  <div id="footer"><em>&#8220;Building Interactive Web Sites with JavaScript&#8221;</em></div>
</div>
</body>
</html>-->
