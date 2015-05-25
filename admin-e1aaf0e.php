<?php 
 class print_smth
{
	static function  printing($param)
		{
		print $param."<br>";
		}
	static function print_query($header,$body)
		{
		$count=func_num_args();
		$arg_list=func_get_args();
		include("css/main_style.css");
		include("js/scripts.js");
		//<link rel="stylesheet" type="text/css" href="css/main_style.css">
		
		print "<table border=1 width=gdw() height=gdh() class=\"simple-little-table\">";
		print "<tr>";
		foreach($header as $value)
		{
		print "<td>".strtoupper($value)."</td>";
		}
		print "</tr>";
		foreach($body as $value)
		{
		print "<tr>";
		foreach($value as $key=>$val)
		{
		print "<td>".$val."</td>";
		
		}
		print"</tr>";
		}
		print "</tr></table>";
				
		}
	static function print_table()
		{
		$count=func_num_args();
		$arg_list=func_get_args();				
		include("css/main_style.css");
		print "<table border=1 class=\"simple-little-table\">";
		print "<th>";
			
		print "</th><tr>";
		
			for($i=1;$i<$count;$i++)
			{
			print "<td>".$arg_list[$i]."</td>";
			}
		print "</tr></table>";
		
		}
		
}
class admin
{
 private $name;
 private $password;
 
	 function change_password($new_pass)
		 {
		 $this->password=$new_pass;
		 }
	function admin($name,$password)
		{
		$this->name=$name;
		$this->password=$password;
		}
	public function saw_users()
		{
		print "<br>by admin \"".$this->name."\"</br>";
		include("connect.php");
		$result=mysql_query("select * from customers");
		mysql_list_fields($online_shop,$customers);
			while($field=mysql_fetch_field($result))
			{
				$names_fields[]=$field->name;
			}			
			while($row=mysql_fetch_assoc($result))
			{
			$fields[]=$row;	
	//foreach($row as $key=>$value)print $value." ".$key;	
			//print_smth::printing($row["name_cust"]);			
			//print_smth::print_table($row["name_cust"],$row["email"],$row["login"]);
			}			
			print_smth::print_query($names_fields,$fields);
		}
		function delete_user($ID)
		{
		include_once("connect.php");
		$res=mysql_query("select * from customers where id_cust='".$ID."'");
		if($row=mysql_fetch_array($res)){} else return "Такого пользователя не существует!";
		$result=mysql_query("delete  from customers where id_cust='".$ID."'")or die(mysql_error());
		if($result)
		{$mess= "Пользователь удален";
		}
		else $mess= "";
		return $mess;
		
		//mysql_close();
		}

	 function create_new_user($login,$pass,$subscribe,$email,$phone,$name,$address)
		{
		if(strtoupper($login)=="ADMIN"or strtoupper($login)=="ADMINISTRATOR"){return "It is not allowed!";break;}
			else
			{
			print "pass is".$pass;
			if($login=="")return "please,enter your login";
			if($pass==""){return "please,enter your password";print "empty pass";}
			include_once("connect.php");
			$strSQL1="SELECT * FROM customers 
						where login='".$login."'";
						$result1=mysql_query($strSQL1)
						or die("Could not connect: " . mysql_error());
							if($row=mysql_fetch_array($result1))
							return  "This login is already exists";
							else
							{$uniq_ID=uniqid("ID",true);
							$strSQL1="INSERT INTO customers(login,pass,subscribe,email,phone,name_cust,address,id_bask)
							values('".$login."','".$pass."','".$subscribe."','".$email."','".$phone."','".$name."','".$address."','".$uniq_ID."')";
							$result1=mysql_query($strSQL1)
							or die("Could not connect: " . mysql_error());
							mysql_close();
							return "you're succesfully registered";
							}
			}
		}
	protected function change_user($login,$pass,$subscribe,$email,$phone,$name_cust,$address)
		{
		if(strtoupper($login)=="ADMIN"or strtoupper($login)=="ADMINISTRATOR"){return "It is not allowed!";break;}
			else
			{
			if($login=="")return "please,enter your login";
			if($password=="")return "please,enter your password";
			include_once("connect.php");
			$strSQL1="SELECT id_cust FROM customers 
						where login='".$login."'";
						$result1=mysql_query($strSQL1)
						or die("Could not connect: " . mysql_error());
							if($row=mysql_fetch_array($result1))
							return "This login is already exists";
							else
							{							
							$strSQL1="UPDATE customers SET name_cust='".$name_cust."',address='".$address."',pass='".$pass."',phone='".$phone."',email='".$email."',subscribe='".$subscribe."' WHERE login='".$login."' ";
							$result1=mysql_query(strSQL1) or die(mysql_error());
							return "you're succesfully registered";
							}
			}
		}

}


?>
