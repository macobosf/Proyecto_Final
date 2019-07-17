<?PHP 
$db_host = "localhost"; 
// Place the username for the MySQL database here 
$db_username = "root";  
// Place the password for the MySQL database here 
$db_pass = "";  
// Place the name for the MySQL database here 
$db_name = "project"; 

// Run the actual connection here  
$connect_db = mysqli_connect($db_host, $db_username, $db_pass);
$conndatabase = mysqli_select_db($connect_db,$db_name);

if(!mysqli_ping($connect_db) || !$conndatabase){ 
    //do something when cant connect 
	
}
else{
header("location:index.php");	
}
if(isset($_POST['finish']))
{

	 $newname = "institution_logo.jpg";
	 move_uploaded_file( $_FILES['logo']['tmp_name'], "images/$newname");
	 header("location: index.php?Welcome_to_LIBRARY_MANAGEMENT_SYSTEM"); 
     exit();
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
</head>
<link rel="icon" type="text/css" href="images/favicon.png"  />
<script src="js/jquery-1.4.3.min.js"> </script>
<style>
#developer{float:right; margin:-10px 10px 0 0; height:52px; width:52px;}
.pic{
	width:50px;
	height:50px;
	border-radius:100px;
	cursor:pointer;
	border:1px solid #069; 
	
}
.picbig{
	position: absolute;
	width:0px;
	-webkit-transition:width 0.3s linear 0s;
	transition:width 0.3s linear 0s;
	z-index:10;
	border-radius:100px;
}
.pic:hover + .picbig{
	width:200px;
}
#developer_info{float:left; margin-left:400px; font-weight:500; display:none;}
#f_show{float:right; margin-right:40px; display:none;}
</style>
<body style="height:100%; width:1300px; background:#E1E1E1;">
<form name="welcome" method="post" enctype="multipart/form-data">
<div style="height:600px; width:1100px; margin:0 auto; background:#C1C1FF; border-radius:4px;">
<div style="padding:20px; text-align:center; font-size:26px;  font-weight:bold; color:#F5F5F5; background:#09C; border-radius:4px 4px 0 0;" >Bienvenido al sistema de gestión de bibliotecas<div id="developer">
	<img class="pic" src="images/developer.jpg" alt="Developer">
    <img class="picbig" src="images/developer.jpg"alt="Developer" style="border-radius:100px;"></div></div>
<div style="padding:10px; font-weight:500; font-size:20px; height:100px;">Esta aplicación web basada en escritorio está desarrollada para que pueda ayudar bibliotecario en cualquier universidad. Solo necesitará agregar su información del instituto y en poco tiempo tendrá su sistema de administración de biblioteca para esa institución particular.
. </div>
<div style="padding:10px; font-weight:600; font-size:26px; color:#009900; margin-left:80px;">Configuración para el sistema de gestión de bibliotecas
 <span style="font-size:14px; color:#CB2001; margin:20px;" id="show_weak"></span></div>
<div  style="height:240px; margin:10px auto; width:1000px; background:#F5F5F5; border-radius:2px; padding:10px;  font-size:20px;">
Nombre de la Institución:  <input type="text"  name="n_name"   placeholder="For EG: Nobel College" style="height:30px; width:280px; border-radius:4px; border:1px solid #999; margin-right:126px;"/>Elige el color de la fuente: <input type="color" name="f_color" value="#FFFFFF"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br /><br />
Elija el color de fondo para la sección de la cabeza: <input type="color" name="ba_color" value="#255F9F" />&nbsp;&nbsp;&nbsp;<span style="font-size:0.7em; color:#666; margin-right:130px;"></span>
Logotipo de la Institución:&nbsp;&nbsp;<input type="file" name="logo" />
<span style="float:right; font-size:11px; margin-right:120px;">El tamaño del logotipo debe ser inferior a 2 MB</span><span style="font-size:12px;  color:#090; margin-left:-60px;">El mejor tamaño: 195 x 74px</span><br /><br />
Número máximo de libros que un miembro puede emitir:&nbsp;&nbsp;<input type="text" name="n_book" style="height:20px; width:40px; border-radius:4px; border:1px solid #999; " /><br />
Cantidad de días que un miembro puede guardar un libro:&nbsp;&nbsp;<input type="text" name="m_keep" style="height:20px; width:40px; border-radius:4px; border:1px solid #999; " /><br />
Cargo por tardanza por día:&nbsp;&nbsp;<input type="text" name="l_fine" style="height:20px; width:40px; border-radius:4px; border:1px solid #999; " /><br />
<br />
Contraseña:&nbsp;&nbsp;<input type="password" name="p_notes" style="height:24px; border:1px solid #999; border-radius:4px;" placeholder="For notes" />&nbsp;&nbsp;&nbsp;<input type="password" name="p_setting" style="height:24px; border:1px solid #999; border-radius:4px;" placeholder="For Setting"/>
<input type="submit" value="GO" onclick="return validate_form();" style="float:right; height:26px; width:40px; border-radius:4px; border:1px solid #999; background:#F7F7F7; cursor:pointer;"/>
</div>
<span style="margin-left:40px; color:#000;  font-size:18px;" id="response_show"></span>
<div id="f_show"><input type="submit" value="Finish" name="finish" id="finish" style="height:30px; cursor:pointer; width:80px;"/>
<input type="text" name="hide_text" id="hide_text" hidden="hidden" /></div>
<br />
<br />
<br />
<span id="developer_info">Desarrollado por: <span style="font-size:15px; font-weight:bold;">Marco, Byron, Gabriel, Vinicio</span> </span>
</form>
</body>
</html> 
<script>
function validate_form()
{
var ins_name = document.forms["welcome"]["n_name"].value;
var f_color = document.forms["welcome"]["f_color"].value;
var b_color = document.forms["welcome"]["ba_color"].value;
var logo = document.forms["welcome"]["logo"].value;
var n_book = document.forms["welcome"]["n_book"].value;
var m_keep = document.forms["welcome"]["m_keep"].value;
var fine = document.forms["welcome"]["l_fine"].value;
var note = document.forms["welcome"]["p_notes"].value;
var pass = document.forms["welcome"]["p_setting"].value;

if(ins_name =="" || ins_name == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese el nombre de su institución";
	document.forms["welcome"]["n_name"].focus();
	return false;
	
}	
if(logo =="" || logo == null)
{
	document.getElementById('show_weak').innerHTML = "Por favor elija el logo de su institución";
	return false;
}
if(n_book =="" || n_book == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese la cantidad máxima de libros que un miembro puede emitir!!!";
	document.forms["welcome"]["n_book"].focus();
	return false;
}
if(m_keep =="" || m_keep == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese el número máximo de días que un miembro puede mantener un libro";
	document.forms["welcome"]["m_keep"].focus();
	return false;
}
if(fine =="" || fine == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese la tarifa por retraso por día";
	document.forms["welcome"]["l_fine"].focus();
	return false;
}
if(note =="" || note == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese su contraseña para notas";
	document.forms["welcome"]["p_notes"].focus();
	return false;
}
if(pass =="" || pass == null)
{
	document.getElementById('show_weak').innerHTML = "Ingrese su contraseña para configurar";
	document.forms["welcome"]["p_setting"].focus();
	return false;
}
	$.ajax({
		type:"post",
		url:"new_record.php",
		data:{name:ins_name , fontColor:f_color , backGroundColor:b_color , bookNum:n_book , bookKeep:m_keep , fine:fine , notePassword:note , settingPassword:pass},
		success: function(res)
		{
		 document.getElementById('hide_text').value = res;
		 return false;	
		}
		
		});
var check = document.getElementById('hide_text').value;
if(check != 1 || check != "1")
{
						var seconds_left = 12;
						var interval = setInterval(function() {
						   document.getElementById('response_show').innerHTML = --seconds_left;
							 if (seconds_left <= 12)
							{
								document.getElementById('response_show').innerHTML = 'Gestión del entorno del sistema...';
								
							}
							 if (seconds_left <= 9)
							{
								document.getElementById('response_show').innerHTML = 'Crear base de datos...';
								
							}
							if (seconds_left <= 8)
							{
								document.getElementById('response_show').innerHTML = 'Crear tabla bajo proyecto...';
							  
							}
							 if (seconds_left <= 7)
							{
								document.getElementById('response_show').innerHTML = 'Grabando su información...';
								
							}
							if (seconds_left <= 6)
							{
								document.getElementById('response_show').innerHTML = 'Implementando su información...';
								
							}  if (seconds_left <= 5)
							{
								document.getElementById('response_show').innerHTML = 'Comprobando el sistema para el primer uso...';
								
							}  if (seconds_left <= 4)
							{
								document.getElementById('response_show').innerHTML = 'Completando la configuración...';
								
							}
							  if (seconds_left <= 3)
							{
								document.getElementById('response_show').innerHTML = 'Finalizando...';
								
							}
							  if (seconds_left <= 1)
							{
								document.getElementById('response_show').innerHTML = 'Listo para usar';
								 clearInterval(interval);
								$('#f_show').show();
								$('#developer_info').slideDown(500);       
							}
						}, 1000);
			}
else{
		document.getElementById('response_show').innerHTML = "<span style='color:red;'>Algo salió mal!!!</span>";
	}
return false;

}
</script>
