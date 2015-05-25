<?php
include("head.php");
$log=$_SESSION['login'];
$id=$_SESSION['id'];
?>
<?php
if(!isset($login))
{
$success=false;
$message="<b>Вы не авторизованы!!!";
print $message;
}
else
{	$success=true;
	//include("head.php");
	print $message;
	if($success)
	{	include("connect.php");
	$strSQL="select * from customers where id_cust='".$id."'";
	$result=mysql_query($strSQL)
	or die("Не могу выполнить запрос!");
	if($row=mysql_fetch_array($result))
	{
	?>
	
	<form action="change.php" method="post">
	<tr><td>
	<h2>Ваши личные данные</h2>
	<table border="0" width="60%" align="left">
	<tr><td align="left"><i>Имя:</i></td>
			<td><input class="mac" type="text" name="name" value="<?php print $row["name_cust"]?>"></td>

	</td></tr>
	<tr>
	<td align="left"><i>Адрес:</i></td>
	<td><input type="text" class="mac" name="address" value="<?php print $row["address"]?>"></td>
	</tr><tr>
	<td align="left"><i>E-mail:</i></td><td>
	<input type="text" class="mac" name="email" value="<?php print $row["email"]?>"></td>
	</tr>
	<tr><td align="left" >
	<i>Подписка на рассылку</i>
	<td><input type="checkbox" value="1" name="subscribe"


<?php  if($row["subscribe"]==1)print "checked";   ?>
></td>
</tr>
<tr><td align="center" colspan="2">
<input type="submit" class="modern" value="Сохранить изменения"></td></tr>
</table>
</form>
</td></tr>
<tr><td>
<h2>Ваши заказы</h2>
<?php

$strSQL1="SELECT `id_ord`, `date_ord`, `id_cust`, `delivery`, `bonus` FROM `order` WHERE id_cust='".$id."'";
$result1=mysql_query($strSQL1)or die (" lkjhНе могу выполнить запрос!");
$count_of_orders=0;
$counts_of_orders_new=0;
if($counts_of_orders_new>$count_of_orders)
{$count_of_orders=$count_of_orders_new;}
while($row1=mysql_fetch_array($result1))
{	$order=$row1["id_ord"];
if($count_of_orders_new>$count_of_orders)
{
?>
</table>
<?php
}
?>
<tr><td>
<hr>
<b> Заказ № <?php print $order?>
	от <?php print $row1["date_ord"]?><br></b>
	<p>Доставка:<?php print $row1['delivery']; ?>
	<p>Бонус в рублях:<?php print $row1['bonus']; ?></p>
<?php
		$count_of_orders_new+=1;
		$strSQL3="SELECT `count`,`id_piz`,`id_part` from
`order_items` where id_ord='".$order."'";

$result3=mysql_query($strSQL3) or die("3".mysql_error());
$count_of_parts=0;
$sum=0;
while($row3=mysql_fetch_array($result3))
{
$count_of_parts+=1;
$id_part=$row3["id_part"];
$id_piz=$row3["id_piz"];

$strSQL2="SELECT `name_piz`,`image_link` from `pizza` where id_piz='".$id_piz."'";
$result2=mysql_query($strSQL2) or die(mysql_error());
$row2=mysql_fetch_array($result2);

$name=$row2["name_piz"];
$strSQL4="SELECT `name_size`,`price_size`,`weight_size` from `sizes_prices` where id_piz='".$id_piz."'&&id_part='".$id_part."' ";
$result4=mysql_query($strSQL4) or die(mysql_error());
$row4=mysql_fetch_array($result4);
if($count_of_parts==1)
{
?>

	<table  class="features-table"cellspacing='0' align="center" width="200">
	<thead><tr><td class="grey" align="center" width="30%" ><i>Название:</i></td>
	<td class="green" align="center" width="20%" ><i>Изображение</i></td>
	<td class="grey" align="center" width="10%" ><i>Порция</i></td>
	<td class="green" align="center" width="10%"><i>Цена порции в рублях</i></td>
		<td class="grey" align="center" width="10%"><i>Вес в граммах</i></td>	
	<td class="green" align="center"  ><i>Количество</i></td>
	</tr>
	</thead>
<?php
}
$sum+=$row4['price_size']*$row3['count'];

{
?>
<tbody>
<tr height="80" >
<td class="grey"><?php print $name ?></td>
<td class="green"><img src="<?php print $row2["image_link"]?>" width="140" height="100"/></td>
<td class="grey"><?php print $row4["name_size"] ?></td>
<td class="green"><?php print $row4["price_size"] ?></td>
<td class="grey"><?php print $row4["weight_size"] ?></td>
<td class="green"><?php print $row3["count"]?></td>

</tr>	
</tbody>
<?php


}

} 
print "Общая стоимость заказа в рублях:";
$sum-=$row1["bonus"];
print $sum;
	
	}}}}
		
	


?>