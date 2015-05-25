<?php
include("admin.php");
$Admin=new admin("Helen is admin","0505");
$Admin->saw_users();
print $Admin->create_new_user("new_user","new_pass","subscrib","email","phone","name_cust","address");
$Admin->saw_users();
?>