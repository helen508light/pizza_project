<?php 
$login=$_SESSION["login"];
$id=$_SESSION["id"];
//$id_bask=$_COOKIE["id_bask"];
	if($_SESSION['id_bask']!=""){$id_bask=$_SESSION['id_bask'];}
	else
	{$id_bask=$_COOKIE["id_bask"];}
$delivery=$_POST["delivery"];


$delivery="courier";
$bonus="24";//echo ("<br>".$login."  ".$id." ".$delivery." ".$bonus."<br> ");
$title="Ваш заказ";
include("connect.php");
	if(!isset($login))
	{$message="Вы не авторизованы!!!";
	}
else
	{
	$strsql="select COUNT(*) as count from basket where id_bask='".$id_bask."'";
	$result=mysql_query($strsql) or die(mysql_error());
	$row=mysql_fetch_array($result);
		if($row["count"]==0)$message="Ваша корзина пуста!!!";
		else
		{
		$order=uniqid("OR");

		$strsql="INSERT into `order` (`id_ord`,`date_ord`,`id_cust`,`delivery`,`bonus`) values ('".$order."',curdate(),'".$id."','".$delivery."','".$bonus."')";
		mysql_query($strsql)or die(mysql_error());
		$strsql="select * from basket where id_bask='".$id_bask."'";
		$result=mysql_query($strsql)or die(mysql_error());
			while($row=mysql_fetch_array($result))
			{
			$strsql="insert into order_items(id_ord,id_piz,count,id_part) values('".$order."',".$row["id_piz"].",".$row["count"].",".$row["id_part"].")";
			mysql_query($strsql)or die(mysql_error());

			}
		$strsql="delete from basket where id_bask='".$id_bask."'";
		mysql_query($strsql) or die (mysql_error());
		$uniq_ID=uniqid("ID");
		setcookie("id_bask",$uniq_ID,time()+60*60*24*14);
		$message="Ваш заказ отправлен";
		}
}
include("head.php");

print $message;
include("footer.php");
?>
