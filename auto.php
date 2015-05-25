<?php
$success=false;
$message="";

$pass=$_POST['pass'];
$login=$_POST['login'];
include("connect.php");

$strSQL1="Select * from customers where login='".$login."' and pass='".$pass."'" ;
$result1=mysql_query($strSQL1)
or die("Не могу выполнить запрос!");
if($row=mysql_fetch_array($result1))
{
$start=session_start();
session_register("log");
$HTTP_SESSION_VARS["log"]=$row["name"];
sesion_register("id");
$HTTP_SESSION_VARS["id"]=$row["id_cust"];
$message="<tr><td bgcolor='#66cc66' align="center"><b>
ВЫ успешно авторизованы
</b></td></tr>";
$success=true;
}
else
{
$message="<tr><td bgcolor='#ff9999' align="center"><b>
<font color="white"><h3>Таких логина\пароля не существует</h3></font></b></td></tr>";

}
mysql_close();
if($success)
{
include("cabinet.php");
}
else
{
include("head.php");
print $message;
include("footer.php");
}


?>