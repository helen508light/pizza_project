<?php
mysql_connect("localhost","root","0502irina")
or die("Не могу подключиться к серверу!");
mysql_select_db("online_shop") or die ("Не могу подключиться к базе данных!");
mysql_query("SET character_set_client = utf8");
mysql_query("SET character_set_connection = utf8");
mysql_query("SET character_set_results = utf8");
?>