<?php
$type=$_GET["type"];
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
function create_user_form()
{print"<form method=\"post\" type=\"submit\" action=\"doadmin.php\">
<table><tr><td><Label>Login</Label></td><td><input id=\"login\" class=\"mac\" name=\"login\" type=\"text\" placeholder=\"your login\">
</td></tr><tr><td><label>Pass</label></td><td><input id=\"pass\" class=\"mac\" name=\"pass\" type=\"text\" placeholder=\"your password\">
</td></tr><tr><td><label>Subscribe</label></td><td><input id=\"subscribe\" class=\"mac\" name=\"subscribe\" type=\"text\" placeholder=\"subscribe\">
</td></tr><tr><td><label>Email</label></td><td><input id=\"email\" class=\"mac\" name=\"email\" type=\"text\" placeholder=\"your e-mail\">
</td></tr><tr><td><label>Phone</label></td><td><input id=\"phone\" class=\"mac\" name=\"phone\" type=\"text\" placeholder=\"your phone\">
</td></tr><tr><td><label>Name</label></td><td><input id=\"name\" class=\"mac\" name=\"name\" type=\"text\" placeholder=\"your name\">
</td></tr><tr><td><label>Address</label></td><td><input id=\"address\" class=\"mac\" name=\"address\" type=\"text\" placeholder=\"your address\">
</td></tr><tr></tr><tr></tr>
<tr rowspan><td ></td><td>
<input name=\"submit_create\"id=\"submit\" type=\"submit\" class=\"modern\" value=\"Create new user!\">
</td></tr></table></form>";
}
function change_user_form($Admin)
{
print "<form method=\"post\" type=\"submit\"  action=\"doadmin.php\">
<tr><td>ID of user you want to change</td>
<td><input id=\"ID\" class=\"mac\" name=\"ID\" type=\"text\" value=\" \"></td></tr>
<tr><td></td><td><input id=\"submit\" type=\"submit\" class=\"modern\" value=\"Change user with this ID!\">
</td></tr></form>";
print "<a href=doadmin.php?type=4&ID='".$ID."'></a>";
	print $ID;
print $Admin->saw_users();
}
function delete_user_form($Admin)
{
print "<form method=\"post\" type=\"submit\"  action=\"doadmin.php\">
<tr><td>ID of user you want to delete</td>
<td><input id=\"ID\" class=\"mac\" name=\"ID\" type=\"text\" value=\" \"></td></tr>
<tr><td></td><td><input id=\"submit\" type=\"submit\" class=\"modern\" name=\"submit_delete\" value=\"Change user with this ID!\">
</td></tr></form>";
print $Admin->saw_users();

}
if($type==11)$Admin->saw_users();
if($type==1)create_user_form();
if($type==2)change_user_form($Admin);
if($type==3)delete_user_form($Admin);

if($type==5)
{
$Admin->delete_user($ID);
}

if(isset($_POST["submit_delete"]))
{
if(!empty($ID))
{
print $Admin->delete_user($ID);
$Admin->saw_users();
}
else print "Выберите id ";

}

if(isset($_POST["submit_create"]))
{
if(!empty($login)&&!empty($pass)&&!empty($subscribe)&&!empty($email)&&!empty($phone)&&!empty($name)&&!empty($address))
{
$login=trim($login);
$subscribe=trim($subscribe);
$email=trim($email);
$phone=trim($phone);
$address=trim($address);
$name=trim($name);
$pass=md5($pass);
print "is not empty";
print $Admin->create_new_user($login,$pass,$subscribe,$email,$phone,$name,$address);
print $Admin->saw_users();
}
else print "Не все поля заполнены!";
create_user_form();
}

?>