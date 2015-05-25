<?php
if($_SESSION['id_bask']!=""){$id_bask=$_SESSION['id_bask'];}
else
{$id_bask=$_COOKIE["id_bask"];}
$title="Ваша корзина";
include("head.php");
include("connect.php");

$strSQL1="SELECT COUNT(*) as count FROM basket WHERE id_bask='".$id_bask."'";
$result1=mysql_query($strSQL1) or die(mysql_error());
$row=mysql_fetch_array($result1);

if($row["count"]==0)
{
echo "<b>Ваша корзина пуста!</b>";

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
<td></td>
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
<td>
<a href="dobasket.php?type=1&id_piz=<?php print $row["id_piz"];?>&id_part=<?php print $row["id_part"]?>"
title="увеличить">[ + ]</a>
<a href="dobasket.php?type=2&id_piz=<?php print $row["id_piz"];?>&id_part=<?php print $row["id_part"] ?>"
title="уменьшить">[ - ]</a>
<a href="dobasket.php?type=3&id_piz=<?php print $row["id_piz"] ?>&id_part=<?php print $row["id_part"] ?>">
Удалить</a></td>
</tr>
<?php
$sum+=$row["count"]*$row_part["price_size"];
?>

<?php
}
}
?><tr><td><i>ИТОГО:</i></td><td><?php print $sum; ?> руб.</td>
</tr>
</table>
<table>

</table>
<tr><td align="center"><a href=dobasket.php?type=4>
<b>Очистить корзину</b></a></td>
</tr>
<tr><td align="center"><a href="order.php">Оформить заказ</a></td></tr>
<?php
include("footer.php");
?>
