<?php
include("head_ex.php");
?>
<form action="reg.php" method="post">
<tr><td>
<small><i><font color="white">*Звездочками отмечены специальные поля</font></i></small>
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
<td><input type="password" name="pass">*</td></tr>
<tr><td align="right" width="50%"><i>Повторно введите пароль</i></td>
<td><input type="password" name="pass2">*</td></tr>
<tr><td></td><td>
<input type="checkbox" value="1" name="subscribe">
<i>Подписаться на  рассылку новостей</i></td></tr>
<input type="hidden" value="1" name="type">
<tr><td align="right"></td>
<td><input type="submit" name="submit" value="Отправить"></td></tr>
</table></form>
</td></tr>
<?php
include("footer.php");
?>