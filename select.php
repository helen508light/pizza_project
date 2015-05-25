<?php 
require "connect.php"; 
include ("head.php");
$name_piz = trim($_REQUEST['name_piz']); 
$price = trim($_REQUEST['price']); 
$sql_select = "SELECT * FROM pizza WHERE name_piz='$name_piz' && min_price<='$price'"; 
$result = mysql_query($sql_select); 
$row = mysql_fetch_array($result); 

if($row) 
{ 
printf("<img src=".$row['image_link']."><font color=white><p><i>Название товара:</i> " .$row['name_piz']. "</p>
<p><i>Цена минимальной порции:" .$row['min_price']."руб</i></p> 
<p><i>Минимальная порция:500 гр</i></p><i>Ингридиенты:<br> </font>
" ); 
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

} 
else{echo ("Данного товара нет в базе<br/><br/>");
} 
?> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"> 
<link rel="stylesheet" type="text/css" href="style.css"> 
<title>Selected User</title> 
</head> 
<body> 
<a href="search.php">Поиск</a><br/>
<br/> 
 
</body> 
</html>

