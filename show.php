<?php
$id_ingr=$_GET["id_ingr"];
$type=$_GET["type"];
include("connect.php");include("head.php");

if($type==1)
{

$strSQL1="select name_ingr from ingreds where id_ingr=".$id_ingr."";
$result=mysql_query($strSQL1)or die(mysql_error());
if($row=mysql_fetch_array($result))
{
$title=$row["name_ingr"];
print ("<font color=white>Продукты,содержащие ".$row["name_ingr"]."<br></font>");
$strSQL2="SELECT * FROM `pizza_ingred` WHERE `id_ingred`=".$id_ingr."";
$result2=mysql_query($strSQL2) or die(mysql_error());
$row2=mysql_fetch_array($result2);
do
{
$strSQL3="select * from pizza where id_piz=".$row2["id_piz"]."";
$result3=mysql_query($strSQL3) or die(mysql_error());
$row3=mysql_fetch_array($result3);
do{
print("<a href=".$row3["image_link"]." title=".$row3["name_piz"]."><img src=".$row3['image_link']."></a>");
printf("<font color=white><i><br>Название: " .$row3['name_piz'] . "<br> 
</br>Цена минимальной порции: " .$row3['min_price'] . " руб
<br>Минимальная порция:500 гр <br><i>Ингридиенты:<br></font>");
 $sql_ingred="select id_ingred,name_ingr from pizza_ingred,ingreds where pizza_ingred.id_piz=".$row3["id_piz"]." and pizza_ingred.id_ingred=ingreds.id_ingr ";
  $result4=mysql_query($sql_ingred);
  $row4=mysql_fetch_array($result4);
  do{
  ?>
  <a href="show.php?type=1&id_ingr=<?php print $row4["id_ingred"];?>">
  <?php
  print(" ".$row4["name_ingr"].",</a>");
  }
  while($row4=mysql_fetch_array($result4));

$sql_price="select name_size,price_size,weight_size,id_part from sizes_prices where id_piz=".$row3["id_piz"]."";
  $result_price=mysql_query($sql_price);
  $row_price=mysql_fetch_array($result_price);  
  print("<br>");
  ?>
  <table class="simple-little-table" width="100" >
  <?php
 print(" <font color=white><tr><td width=20%>Размер пиццы</td><td width=20%>Вес</td><td width=20%>Цена</td><td>Добавить в корзину</td></tr>");
  
  do{
   $alt="Вкорзину";
  $href="dobasket.php?type=1&id_piz=".$row2["id_piz"]."&id_part=".$row_price["id_part"];
print("<tr><td>".$row_price["name_size"]."</td><td>".$row_price["weight_size"]." гр.</td><td>".$row_price["price_size"]." руб.</td><td><a title=".$alt." href=".$href." ><img src=image/basket.jpg width=20 height=20/></a></td></tr>");
  	} 
while($row_price=mysql_fetch_array($result_price));
print("</table></br>---------<br/></font>");


}
while($row3=mysql_fetch_array($result3));

}while($row2=mysql_fetch_array($result2));
/*
print("<table border=1 width=80% align="center">");
while($row1=mysql_fetch_array($result1)) 
{
?>
<tr><td align="center"><img src="images/<?php print $row1["image_link"]; ?>"
alt="<?php $row["name_piz"]; ?>" border=0>
<a href="dobasket.php?type=1&id_piz=<?php print $row1["id_piz"]?>">
Положить в корзину </a></td>

<td>
<table>
<tr><td><i>Название</i></td>
<td><?php print $row1["name_piz"]; ?></td>
<td><i>Минимальная цена</i></td>
<td><?php print $row1["min_price"];?></td>
</tr>
</table>
<?php
}
print("</table>");
}
*/
?>


<?php
}
}
//include("footer.php");
?>