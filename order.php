<?php
if($_SESSION['id_bask']!=""){$id_bask=$_SESSION['id_bask'];}
else
{$id_bask=$_COOKIE["id_bask"];}
//$id_bask=$_COOKIE["id_bask"];
$title="Ваш заказ";
include("head.php");
include("connect.php");
$strsql="select COUNT(*) as count from basket where id_bask='".$id_bask."'";
$result=mysql_query($strsql)or die(mysql_error());
$row=mysql_fetch_array($result);
if($row["count"]==0)
{
?>
print("Ваша корзина пуста!");
<?php
}
else
{
$strSQL1="SELECT image_link,name_piz,count,basket.id_part,id_bask,pizza.id_piz FROM pizza,basket WHERE pizza.id_piz=basket.id_piz and id_bask='".$id_bask."'  ";
$result1=mysql_query($strSQL1) or die(mysql_error());

?>

<table border=1 width="100%" align="center">
<tr>
<td><i>Название:</i></td>
<td><i>Количество:</i></td>
<td><i>Порция</i></td>
<td><i>Вес</i></td>
<td><i>Цена:</i></td>

</tr>
<?php
$sum=0;
while($row=mysql_fetch_array($result1))
{
?>
<tr>
<td><?php print $row["name_piz"]; ?></td>

<td><?php print $row["count"];?>
<?php 
$sql_part="select * from sizes_prices where id_part=".$row["id_part"]." and id_piz=".$row["id_piz"]."";
$res_part=mysql_query($sql_part);
$row_part=mysql_fetch_array($res_part);?>

<td><?php print $row_part["name_size"] ?></td>
<td><?php print $row_part["weight_size"] ?> гр.</td>
<td><?php print $row_part["price_size"] ?> руб.</td>

</tr>
<?php
$sum+=$row["count"]*$row_part["price_size"];
?>

<?php
}

?><tr><td><i>ИТОГО:</i></td><td><?php print $sum; ?> руб.</td>
</tr>
</table>
<table>

</table>

Способ доставки:<table align="center" action="doorder.php" method="post">
<tr><td><input type="radio" value="1" name="delivery" checked>
курьер
<input type="radio" value="2" name="delivery" checked>
лично
<input type="radio" value="3" name="delivery" checked>
в пункте выдачи</td></tr></table>
<br>
<a href="doorder.php"><b>Отправить заказ</b></a>
<?php

}
include("footer.php");
?>