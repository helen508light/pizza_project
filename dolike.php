<?php
$type=$_GET["type"];
$ID=$_GET["ID"];

include("connect.php");
if($type==1)//plus like
{
$res=mysql_query("select* from gbook where ID='".$ID."'");
	if($row=mysql_fetch_array($res))
	{	
	$query="update gbook set likes=likes+1 where ID='".$ID."'";
	}
mysql_query($query);
}
if($type==2)//minus like
{
$res=mysql_query("select* from gbook where ID='".$ID."'");
	if($row=mysql_fetch_array($res))
	{	
	$query="update gbook set likes=likes-1 where ID='".$ID."'";
	}
mysql_query($query);
}
if($type==0)//answer to message
{
}
if($type==3)//delete message
{
mysql_query("delete  from gbook where ID='".$ID."'")or die("can't");

}


include("forum.php");
?>