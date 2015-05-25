<?php
 header("Content-Type: text/html; charset=windows-1251");?>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<?php
include("head.php");
?>

<meta http-equiv="content-type" content="text/html" charset="utf-8" />

<h3>Добро пожаловать!</h3>

<form action="register.php" method="post" chatset="windows-1251">

<small>Звездочками отмечены специальные поля</small>
<table border="0" width="100%" align="right">
<tr><td align="right" width="50%"><i>ФИО</i></td>
<td><input type="text" name="name">*</td></tr>

<tr><td align="right" width="50%"><i>Логин</i></td>
<td><input type="text" name="login">*</td></tr>

<tr><td align="right" width="50%"><i>Телефон</i></td>
<td><input type="text" name="phone">*</td></tr>

<tr><td align="right" width="50%"><i>E-mail</i></td>
<td><input type="text" name="email">*</td></tr>

<tr><td align="right" width="50%"><i>Адрес</i></td>
<td><input type="text" name="address">*</td></tr>


<tr><td align="right" width="50%"><i>Введите пароль</i></td>
<td><input type="text" name="pass">*</td></tr>

<tr><td align="right" width="50%"><i>Повторно введите пароль</i></td>
<td><input type="text" name="pass2">*</td></tr>
<tr><td></td><td>
<input type=""checkbox" value="1" name="subscribe">
<i>Подписаться на  рассылку новостей</i></td></tr>
<input type="hidden" value="1" name="type">
<tr><td align="right"></td>
<td><input type="submit" value="Отправить"></td></tr>
</table></form>



<?php
include ("footer.php");
?>