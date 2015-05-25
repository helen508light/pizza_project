<?php
$name=$_POST['name'];
$email=$_POST['email'];
$subscribe=$_POST['subscribe'];
$address=$_POST['address'];
$id=$HTTP_SESSION_VARS['id'];
$title="Change_own_data";
include("connect.php");
if($name!=""&&$address!=""&&$email!="")
{
$strSQL1="UPDATE customers SET name_cust='".$name."',
address='".$address."',email='".$email."',subscribe='".$subscribe."' WHERE id_cust='"$id"' ");
$result1=mysql_query(strSQL1) or die(mysql_error());
//$HTTP_SESSION_VARS["login"]=$name;!!!login
$message="Изменения данных выполнены";
}
else
$message="Не все поля заполнены!";

include("header.php");
print $message;
include("footer.php");

?>