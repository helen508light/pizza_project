
<?php
$title="Каталог";
include("head.php");
include("connect.php");
?>
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<link rel="stylesheet" type="text/css" href="style.css"> 

<title>Поиск товара по названию</title> 
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="css/lightbox.css" rel="stylesheet" type="text/css">
<style>
 body, div{
    margin: 0;
	padding:0px;
 }
 .center{
    margin: 0 auto;
    position: relative;
    width: 700px;
 }
 .bigContainer{
    background-color:greenyellow;
    position: relative;
	padding:5px;
	margin:6px;
    width: 230px;
	height:120px;
    left: 0px;
	border-radius:20px;
	
 }
 .smallContainer{
    background-color:  #51CBEE;
    position: relative;
	margin:6px;
	padding:5px;
    width: 350px;
	height:120px;
	border-radius:20px;
 }
 </style>
<!--<style tables type="text/css">
/*styles for the table on this page*/
table {
	border-right: 1px solid #A7A37E;
	border-bottom: 1px solid #A7A37E;
}
td, th {
	font-size: 1.3em;
	padding: 3px;
}
table th {
	font-weight: bold;
	border-bottom: 1px solid #333333;
	background: url(images/th_bg.png) repeat-x;
	border-top: 1px solid #333333;
	padding-top: 4px;
	border-left: 1px solid #A7A37E;
}
td {
	border-left: 1px solid #A7A37E;
}
.even {
	background-color: #E7F7FF;
}
</style>
-->
<Script type="text/javascript" src="../js/jquery.lightbox.js"></script>

<script>
$(document).ready(
function()
{
$('table.striped tr:even').addClass('even');
}
);
</script>
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
</head> 
<body> 
<p>
<font size=5 color= "#191970">Поиск товара по названию и  цене</font><br><br>
<fieldset> 
<form method="post" action="select.php"> 
<label  for="name_piz">Название пиццы:</label><br/> 
<input class="mac" type="text" name="name_piz" size="30"><br/> 
<label for="price">Цена не более чем:</label><br/> 
<input class="mac" type="text" name="price" size="30"><br/> 

<input id="submit" type="submit" class="modern" value="Поиск">
<br/> 
</form> </fieldset> 
<fieldset> 
<form method="post" action="search.php"> 
<input id="submit" type="submit"  class="modern"value="Все товары">
<br/> 
</form> 
</fieldset> 
</br>



<div id="main">
<table border=0>
<tr>
<td >
  <!--<div id="gallery">
  <a href="image/large/margo.png" title="Маргарита"><img src="image/small/margo.png" width="120" height="120" alt="Маргарита"></a>
  <a href="image/large/grib.png" title="Ветчина и грибы"> <img  src="image/small/grib.png" width="120" height="120" alt="Ветчина и грибы"> </a>
  <a href="image/large/grib_chicken.png" title="Курица и грибы"><img src="image/small/grib.png" width="120" height="120" alt="Курица и грибы"> </a>
  <a href="image/large/grib_and_sea.png" title="Морская с грибами"><img src="image/small/grib_and_sea.png" width="120" height="120" alt="Морская с грибами"> </a>
  <a href="image/large/chicken.png" title="Цыпленок с чесноком"><img src="image/small/chicken.png" width="120" height="120" alt="Цыпленок с чесноком"> </a>
  <a href="image/large/chipolla.png" title="Чиполла"><img src="image/small/chipolla.png" width="120" height="120" alt="Чиполла"></a>
  </div>-->
  <div id="gallery">
  <?php
  $sql_piz="select * from pizza";
  $result=mysql_query($sql_piz);
  $row=mysql_fetch_array($result);
  do
  {  
  $string=$row["image_link"];
  $str=substr($string,12);
  $str_res="image/large/".$str;
  //$name=$row["name_piz"];
  //print $name;
  $words = preg_split ('/\s+/' , $row["name_piz"]) ;
  foreach($words as  $value)$name.=$value;
 print("<a href=".$str_res." title=".$name."><img src=".$row["image_link"]." width=120 height=120 alt=".$row["name_piz"]."></a>");
  $name="";
  }
  while($row=mysql_fetch_array($result));
  ?>
  </div>
 </td>
  
  
  <td>
  <?php
  $sql_piz="select * from pizza";
  $result=mysql_query($sql_piz);
  $row=mysql_fetch_array($result);
  do
  {
  ?>
  <div class="bigContainer">
  <?php
  print($row["name_piz"].": ");
  $sql_ingred="select id_ingred,name_ingr from pizza_ingred,ingreds where pizza_ingred.id_piz=".$row["id_piz"]." and pizza_ingred.id_ingred=ingreds.id_ingr ";
  $result2=mysql_query($sql_ingred);
  $row2=mysql_fetch_array($result2);
  do{
  ?>
  <a href="show.php?type=1&id_ingr=<?php print $row2["id_ingred"];?>">
  <?php
  print(" ".$row2["name_ingr"].",</a>");
  }
  while($row2=mysql_fetch_array($result2));
  ?>
  </div>
  <?php
  
  } while($row=mysql_fetch_array($result))
  
  
  ?>
 
  <!--<div class=" bigContainer">Пицца "Маргарита". Ингридиенты:томаты,сыр Моцарелла,Пицца-соус</div>
  <div class=" bigContainer">"Ветчина с грибами". Сыр Моцарелла,пицца-соус,ветчина,шампиньоны</div>
  <div class=" bigContainer">"Курица с грибами". Сыр Моцарелла,пицца-соус,шампиньоны,курица</div>
  <div class=" bigContainer">"Морская с грибами". Шампиньоны,чесночный соус,маринованый лук,лосось,орегано</div>
  <div class=" bigContainer">"Цыпленок с чесноком". Томаты,сыр Моцарелла,курица,чесночный соус,бекон,чеснок</div>
  <div class=" bigContainer">Пицца "Чиполла". Ингридиенты:пицца-соус,фарш говяжий,ветчина,садями,бекон,шампиньоны,маринованый лук,маслины,сыр Моцарелла,свежий болгарский перец</div>
  --></td>
  
  <td>
  <?php 
   
  
  $sql_select="select * from pizza";
  $result=mysql_query($sql_select);
  $row=mysql_fetch_array($result);
  do{
  ?>
  <div class="smallContainer">
  <?php
  $sql_price="select name_size,price_size,weight_size,id_part from sizes_prices where id_piz=".$row["id_piz"]."";
  $result_price=mysql_query($sql_price);
  $row_price=mysql_fetch_array($result_price);
  ?>
  <table  border=0 >
  <?php
 /*print("<table border=0 width=80%> ");*/
do
  {
  print("<tr><td>".$row_price["name_size"]."</td><td>".$row_price["weight_size"]." гр.</td><td>".$row_price["price_size"]." руб.</td> 
  " 
  );
  
 
 
  ?>
 
  <?php
  $alt="Вкорзину";
  $href="dobasket.php?type=1&id_piz=".$row["id_piz"]."&id_part=".$row_price["id_part"];
 
  print("<td><a title=".$alt." href=".$href." ><img src=image/basket.jpg width=20 height=20/></a><br></td></tr> ");
  }  while($row_price=mysql_fetch_array($result_price));
 print("</table>"); ?> 
  
 </div>
  <?php
  
  }  
  while($row=mysql_fetch_array($result));
  
  
  ?>
  
  
 
  </td>
  
  </tr>
 
  
  </table>

</div>

</body> 
</html>
<?php
mysql_close();
?>
