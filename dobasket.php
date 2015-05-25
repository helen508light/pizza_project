<?php
$type=$_GET["type"];
$id_piz=$_GET["id_piz"];
if($_SESSION['id_bask']!=""){$id_bask=$_SESSION['id_bask'];}
else {$id_bask=$_COOKIE["id_bask"];}
$id_part=$_GET["id_part"];
$mes=$id_bask;
include("connect.php");
if($type==1)//keep  basket or count+=1
{

if( $id_bask=="")echo "null";
$strSQL="SELECT *FROM basket where id_piz='".$id_piz."' and id_bask='".$id_bask."' and id_part='".$id_part."'";
$result=mysql_query($strSQL) or die(mysql_error());
	if($row=mysql_fetch_array($result))
	{
	$strSQL="UPDATE basket SET count=count+1 where id_piz='".$id_piz."' and id_bask='".$id_bask."' and id_part='".$id_part."'";

	}
	else
	{
	$mes="insert";
	
	
	$strSQL="INSERT into basket(id_bask,id_piz,date_bask,count,id_part) values ('".$id_bask."','".$id_piz."',curdate(),1,'".$id_part."')";
	}
mysql_query($strSQL);

}

else 

	if($type==2)//count-=1
	{
	$strSQL="select * from basket where id_piz='".$id_piz."' and id_bask='".$id_bask."' and id_part='".$id_part."'";
	$result=mysql_query($strSQL) or die(mysql_error());
	if($row=mysql_fetch_array($result))
	{	if($row["count"]>1)
		{ $strSQL="UPDATE basket SET count=count-1 where id_piz='".$id_piz."' and  id_bask='".$id_bask."' and id_part='".$id_part."'";
		}
		else 
		{
		$strSQL="DELETE from basket where id_piz='".$id_piz."' and id_bask='".$id_bask."' and id_part='".$id_part."'";
		}
		
	}

mysql_query($strSQL);
}
else
	if($type==3)//delete
	{
	$strSQL="delete from basket where id_piz='".$id_piz."' and id_bask='".$id_bask."' and id_part='".$id_part."'";
	mysql_query($strSQL);
	}
else if($type==4)//clear
{ $strSQL="delete from basket where id_bask='".$id_bask."'";
mysql_query($strSQL);
}
include("basket.php");
print $mes;

?>