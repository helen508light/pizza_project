<?php
$success=false;
if(isset($_POST['login']))
{$login=$_POST['login'];
if($login=='')unset($login);
}
if(isset($_POST['password']))
{$password=$_POST['password'];
if($password=='')unset($password);
}
if(empty($login) or empty($password))
{
exit("Не все поля заполнены!");
}
$login = stripslashes($login);
   $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);

//удаляем лишние пробелы 
   $login = trim($login);
    $password = trim($password);
include("connect.php");
$result=mysql_query("select * from customers where login='".$login."' and pass='".$password."'");

if($row=mysql_fetch_array($result))
{
//echo $row['pass'],"<br>";
$start=session_start();
$_SESSION['login']=$row['login'];
$_SESSION['id']=$row["id_cust"];
$_SESSION['id_bask']=$row["id_bask"];
$message="you successfully logged in!";
$success=true;
}
else
{$message="<b> Введенный вами логин или пароль неверный</b>";
//exit("null Введенный вами логин или пароль неверный");
}
if($success)
{//include("head.php");
include("cabinet.php");
//include("footer.php");
}
else
{
include("head.php");
print $message;
include("footer.php");
}
?>
