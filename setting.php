<?PHP
include 'Connections/connect_to_db.php';
session_start();
$error_msg = "";

if(isset($_POST['setting']))
{
	if($_POST['set_pass'] == "")
	{
		$error_msg = "Password is required";
	}
	else
	{
	$pass = $_POST['set_pass'];
	
	$sql_query = mysqli_query($connect_db,"SELECT * FROM security WHERE id = 2 AND password = '$pass'") or die("Se produce un problema temporal");
	$check = mysqli_num_rows($sql_query);
	if($check == 0)
	{
		$error_msg = "Password not match";
	}
	else if($check == 1)
	{
		 $_SESSION['setting']= $pass;
	 	 header("Location:setting-admin.php");	
	}
 }
}

?>
<html>
<head><title>Notes Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body style="height:800px;">
<?PHP include 'header.php'; ?>
<div style="-webkit-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);-moz-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);  background:#E1E1E1; width:100%; height:510px; border-radius:0 0 4px 4px; margin-top:6px;">
<div class="menu_header"><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Setting</div><a href="http://localhost/project/index.php"><div class="close">X</div></a></div>
<div style="padding:50px;"> <form method="post" name="nform">
  <div style="margin:0 auto; width:40%; font:19px; background:#E1E1E1; border:1px solid #999999; text-align:center;
   border-radius:6px; font-weight:bold; border:1px #666666 solid;  height:200px; text-align:left;"><div style="border-radius:6px 6px 0 0; padding:10px; height:22px; background:#057E14; color:#FFFFFF;"> Contraseña protegida<div><br />
<input type="password" id="set_pass" name="set_pass" placeholder="Ingresa tu contraseña" style="height:30px; width:240px; border-radius:4px; background:#F8F8F8; border:1px #666666 solid; margin-top:20px;"/><br />
<input type="submit" name="setting" id="setting" value="Login"  style="height:30px; color:#CCC; width:80px; border-radius:4px; margin-top:10px; background:#0A8313; border:1px #1D8B2B solid;" /><br /><br />
<span style="color:#F00; font-size:13px;"><?PHP  echo $error_msg; ?></span></div></form></div>
</div><!--End of note_div from here-->
</body>
</html>