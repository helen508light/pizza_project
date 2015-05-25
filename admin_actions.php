<?php
$login=$_POST["login"];
$pass=$_POST["pass"];
$subscribe=$_POST["subscribe"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$name=$_POST["name"];
$address=$_POST["address"];
$ID=$_POST["ID"];
include("admin.php");
include("css/main_style.css");
$Admin=new admin("Helen is admin","0505");
print "this is login".$login;
if(trim($login))print "empty";
if(!empty($login)&&!empty($pass)&&!empty($subscribe)&&!empty($email)&&!empty($phone)&&!empty($name)&&!empty($address))
{print "is not empty";
//print $Admin->create_new_user($login,$pass,$subscribe,$email,$phone,$name,$address);
//print $Admin->saw_users();
}
else print "error!";

?>