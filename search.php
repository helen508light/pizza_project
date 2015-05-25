<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<link rel="stylesheet" type="text/css" href="style.css"> <title>Selected User</title> 
<!--<link href="css/gallery.css" rel="stylesheet" type="text/css">-->
<link href="css/lightbox.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.lightbox.js"></script>
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
<?php 
require "connect.php"; 
include("head.php");
$sql_select = "SELECT * FROM pizza"; 
$result = mysql_query($sql_select); 
$row = mysql_fetch_array($result); 
/*do 
{ printf("<div id=gallery><a href=".$row["image_link"]." title=".$row["name_piz"]."><img src=".$row['image_link']."></a></div><font color=white><i><br>Название: " .$row['name_piz'] . "<br> 
</br>Цена минимальной порции: " .$row['min_price'] . " руб
<br>Минимальная порция:500 гр <i></br>---------<br/></font>" ); 
} 
while($row = mysql_fetch_array($result)); */
do
{
$id="gallery";
?>
<div id="gallery">
<?php
print("<a href=".$row["image_link"]." title=".$row["name_piz"]."><img src=".$row['image_link']."></a>");


?>
</div>
<?php
printf("<font color=white><i><br>Название: " .$row['name_piz'] . "<br> 
</br>Цена минимальной порции: " .$row['min_price'] . " руб
<br>Минимальная порция:500 гр <br><i>Ингридиенты:<br></font>");
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

$sql_price="select name_size,price_size,weight_size,id_part from sizes_prices where id_piz=".$row["id_piz"]."";
  $result_price=mysql_query($sql_price);
  $row_price=mysql_fetch_array($result_price);  
  print("<br>");
  ?>
  <table class="simple-little-table" width="100" >
  <?php
 print(" <font color=white><tr><td width=20%>Размер пиццы</td><td width=20%>Вес</td><td width=20%>Цена</td><td>Добавить в корзину</td></tr>");
  
  do{
   $alt="Вкорзину";
  $href="dobasket.php?type=1&id_piz=".$row["id_piz"]."&id_part=".$row_price["id_part"];
print("<tr><td>".$row_price["name_size"]."</td><td>".$row_price["weight_size"]." гр.</td><td>".$row_price["price_size"]." руб.</td><td><a title=".$alt." href=".$href." ><img src=image/basket.jpg width=20 height=20/></a></td></tr>");
  	} 
while($row_price=mysql_fetch_array($result_price));
print("</table></br>---------<br/></font>");
}while($row=mysql_fetch_array($result));
?> 
<div class="gallery"><a href="image/large/margo.png" title="Маргарита"><img src="image/small/margo.png" width="70" height="70" alt="Маргарита"></a></div>
<a href="catalog.php">Вернуться к поиску</a><br/><br/> 
 
</body> 
</html>
