<?php
if(isset($_SESSION["login"]))
$login=$_SESSION["login"];
else 
$login="Guest";
include("connect.php");
$res=mysql_query("select* from gbook order by ID desc");
function Time_To_Show($value){
                $montharray = array('01' => 'Января','02' => 'Февраля','03' => 'Марта','04' => 'Апреля','05' => 'Мая','06' => 'Июня','07' => 'Июля','08' => 'Августа','09' => 'Сентября','10' => 'Октября','11' => 'Ноября','12' => 'Декабря');
                $time           = explode(' ',$value);
                $date = $time[0];
                        $dateconvert = explode('-',$date);
                        $year  = $dateconvert[0];
                        $month = $montharray[($dateconvert[1])];
                        $day   = $dateconvert[2];
                $time = $time[1];
        return $day." ".$month." ".$year." ".$time;
        }      
while($row=mysql_fetch_array($res))
{

?>
<div class="dialog_parent">
<div class="dialog_header">
<?php 

$date=$row["data"];
//$data=DATE_FORMAT($date,'d-m-Y H:i:s');


print "From:".$row[login]."  To:".$row["whom"]." ".Time_To_Show($row["data"]);
?>
</div>
<div class="dialog_body">
<?php

$words = preg_split ('/\s+/' , $row["text"]) ;
print "Текст сообщения:</br>";
foreach($words as $value)
{
	switch($value)
	{case ":-))":
	{
	print "<img src=smail/big_grin.png>";break;
	}
	
	case ":-)":
	{
	print "<img src=smail/happy.png>";
	break;
	}
	case ":-|":
	{
	print "<img src=smail/dumbfounded.png>";
	break;
	}
	case "8-P":
	{
	print "<img src=smail/crazy.png>";
	break;
	}
	case ":-]":
	{
	print "<img src=smail/appalled.png>";
	break;
	}
	case ";-(":
	{
	print"<img src=smail/evil.png>";
	break;
	}
	case ":-o":
	{
	print"<img src=smail/pipe.png>";
	break;
	}
	case":sleep:":
	{
	print"<img src=smail/sleep.png>";
	break;
	}
	default:
	print $value." ";

	}
}
print "<br>";
?>
</div>
<button class="modern"><a href=dolike.php?type=1&ID=<?php print $row["ID"];?>><img  height=30 width=30 src="image/like.jpg"></a></button>
<button class="modern"><a href=dolike.php?type=2&ID=<?php print $row["ID"];?>><img height=30 width=30 src="image/dislike.png"></a></button>
<button  class="modern"><?php print $row["likes"]?></button>
<?php
if($login==$row["login"])
{
?>
<button class="modern"><a href=dolike.php?type=3&ID=<?php print $row["ID"]; ?>>Удалить</a></button>

<?php
 
}
else {
?>
<button class="modern" ><a href=dolike.php?type=0&ID=<?php print $row["ID"];?>>Ответить</a></button>
<?php
}
?>
</div>
<?php
print"<br>";
}
?>