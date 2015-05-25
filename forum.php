<?php
$id=$_SESSION["id"];
if(isset($_SESSION["login"]))
$login=$_SESSION["login"];
else 
$login="Guest";
print $login;
include("head.php");

?>
<html>
<head>

<script>

function x () {return;}

	function doanswer(login)
{
alert(login);
document.getElementById("who").value=login;
return;
}
function DoSmilie(addSmilie) {
//alert(document.getElementById("comment0").value);
document.getElementById("comment0").value+=addSmilie;   
    return;
}

</script>
</head><body>
<form name="forma" action="add.php" method="post">
<table>
<!--<tr><td>Ваше имя</td><td><input class="mac" name="data[0]" type="text" value=""></td></tr>-->
<tr><td>Кому</td><td><input id="who" class="mac" name="data[1]" type="text" value=""></td></tr>
<tr><td>Сообщение</td><td><textarea class="mac" name="data[2]" rows=5 cols=40 id="comment0" wrap="on"></textarea></td></tr>
<tr ><td></td><td >
<a href="javascript:%20x()" onclick="DoSmilie(' :-)) ');"><img src="smail/big_grin.png" alt="Очень доволен" title="Очень доволен"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' :-) ');"><img src="smail/happy.png" alt="Улыбается" title="Улыбается"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' :-| ');"><img src="smail/dumbfounded.png" alt="Грустный" title="Грустный"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' 8-P ');"><img src="smail/crazy.png" alt="Ржу" title="Ржу"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' :-] ');"><img src="smail/appalled.png" alt="Озадачен" title="Озадачен"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' ;-( ');"><img src="smail/evil.png" alt="Недоволен" title="Недоволен"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' :-o ');"><img src="smail/pipe.png" alt="Не причем" title="Не причем"></a>
<a href="javascript:%20x()" onclick="DoSmilie(' :sleep: ');"><img src="smail/sleep.png" alt="Сплю" title="Сплю"></a>

</td></tr>
</table>
<input type="submit" name="add" class="modern" value="Отправить"> 
</form>


</body>
<?php include("read.php");?>