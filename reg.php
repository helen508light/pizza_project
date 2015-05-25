
<?php
$success=false;
$message="";
if(isset($_POST['submit']))
		{
		$name=$_POST['name'];
		$login=$_POST['login'];
		$login=stripslashes($login);
		$login=htmlspecialchars($login);
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$subscribe=$_POST['subscribe'];
		$pass=$_POST['pass'];
		$pass=stripcslashes($pass);
		$pass=htmlspecialchars($pass);
		$pass2=$_POST['pass2'];
		$pass2=stripcslashes($pass2);
		$pass2=htmlspecialchars($pass2);
		$type=$_POST['type'];
					if($name!=""&&$login!=""&&$address!=""&&$phone!=""&&$email!=""
				&&$subscribe!=""&&$pass!=""&&$pass2!="")
					{
						if($pass!=$pass2)
						{$message="<tr><td bgcolor='#ff9999' align='center'><b>
						<h4>Поля пароля и повтора пароля не совпадают!!!</h4></b></td></tr>";
						}
						else
						{
						include_once("connect.php");
						$strSQL1="SELECT id_cust FROM customers 
						where login='".$login."'";
						$result1=mysql_query($strSQL1)
						or die("Could not connect: " . mysql_error());
							if($row=mysql_fetch_array($result1))
							{
							$message="<tr><td bgcolor='#ff9999' align='center'>
							<b><h4>Такой логин уже существует!Выберите другой логин</h4></b></td></tr>";
							
							}
							else
							{
							$id_bask=$_COOKIE["id_bask"];
								if(!isset($id_bask))
								{
								$uniq_ID=uniqid("ID",true);
								$new_uniq=uniqid("ID",true);
								setcookie("id_bask",$new_uniq,time()+60*60*24*14);
								}
								else
								{$uniq_ID=$_COOKIE["id_bask"];
								}
							
							$strSQL1="INSERT INTO customers(login,pass,subscribe,email,phone,name_cust,address,id_bask)
							values('".$login."','".$pass."','".$subscribe."','".$email."','".$phone."','".$name."','".$address."','".$uniq_ID."')";
							$result1=mysql_query($strSQL1)
							or die("Could not connect: " . mysql_error());
							
							$message="<tr><td bgcolor='66cc66' align='center'>
							<b><h4>Вы успешно зарегистрированы</h4></b></td></tr>";
							$success=true;		
							mysql_close();
							}
						}
					}
		else 
			$message="<tr><td bgcolor='ff9999' align='center'>
			<b><h4>Не все поля заполнены!!!</h4></b></td></tr>";
		}
include("head.php");
print $message;

	if(!$success)
	{
	?>

	<meta charset="utf-8">

	<form action="reg.php" method="post">
	<tr><td>
	<small><i><font color="white">*Все поля обязательны для ввода,кроме рассылки</font></i></small>
	<table border="0" width="100%" align="left">
	<tr><td align="right" width="50%"><i>ФИО</i></td>
	<td><input type="text" class="mac" placeholder="Ваше имя" name="name"></td></tr>
	<tr><td align="right" width="50%"><i>Логин</i></td>
	<td><input type="text"class="mac" placeholder="Ваш логин" name="login"></td></tr>
	<tr><td align="right" width="50%"><i>Телефон</i></td>
	<td><input type="text"class="mac" placeholder="Ваш телефон" name="phone"></td></tr>
	<tr><td align="right" width="50%"><i>E-mail</i></td>
	<td><input type="text"class="mac" placeholder="Ваше E-mail" name="email"></td></tr>
	<tr><td align="right" width="50%"><i>Адрес</i></td>
	<td><input type="text"class="mac" placeholder="Ваш адрес" name="address"></td></tr>
	<tr><td align="right" width="50%"><i>Введите пароль</i></td>
	<td><input type="password" class="mac" placeholder="Ваш пароль"name="pass"></td></tr>
	<tr><td align="right" width="50%"><i>Повторно введите пароль</i></td>
	<td><input type="password" class="mac" placeholder="Повторите пароль" name="pass2"></td></tr>
	<tr><td></td><td>
	<input type="checkbox" value="1" name="subscribe">
	<i>Подписаться на  рассылку новостей</i></td></tr>
	<input type=hidden value="1" name="type">
	<tr><td align="right"></td>
	<td><input type="submit" name="submit" value="Отправить"></td></tr>
	</table></form>
	</td></tr>

	<?php
	}
include("footer.php");
?>
