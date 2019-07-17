<?PHP
session_start();
include 'Connections/connect_to_db.php';
if(isset($_SESSION['setting']))
{
	if($_SESSION['setting'] != "")
	{
		$input_password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['setting']);
		$sql_query = mysqli_query($connect_db,"SELECT * FROM security WHERE id = 2 AND password = '$input_password'") or die("Could not interact with system");
		$check = mysqli_num_rows($sql_query);
		if($check == 0)
		{
			//Confirm that user not exist not database
			header("location:setting.php?msg=your_information_are_not_recorded_in_our_system");
			exit;
		}
		else if($check != 1)
		{
			header("location:setting.php?msg=Something_went_wrong");
			
		}
	}
}
else{
	header("location:setting.php?message=your_session_is_expired");
	}
//// fetch data to show on setting 

$retrive = mysqli_query($connect_db,"SELECT * FROM setting WHERE id=1");
$fetch_setting = mysqli_fetch_array($retrive);
$id = $fetch_setting['id'];
$perday_fine = $fetch_setting['per_day_fine'];
$day_after_fine = $fetch_setting['fine_after_day'];
$book_keep = $fetch_setting['take_book_at_once'];
?>
<html>
<head>
<title>Administración</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?PHP include'header.php'; ?>
<div style="height:528px; width:100%; margin-top:6px; border-radius:4px; -webkit-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);-moz-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);  background:#E1E1E1;">
<div style="height:80px; padding:10px;">
	<a href="index.php" style="text-decoration:none;"><div style=" border-radius:4px; color:#CCC; font-weight:bold; height:18px; width:40px; background:#093; padding:8px; margin-right:20px; ">Casa</div>
     </a>
	<div style="height:auto; width:90%;  margin:10px auto; border-radius:4px; border:1px solid #F2F2F2; 
		-webkit-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);-moz-box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);box-shadow: -1px 2px 14px -1px rgba(0,0,0,0.75);  background:#E1E1E1;">
	<div style="margin:10px; font-weight:bold; font-size:14px; color:#660000;">Configuración de actualización para el sistema de gestión de bibliotecas</div>
	<div style="height:120px; width:93%; margin:0 auto; background:#F1F1F1; border-radius:4px; "><div style="height:15px; font-weight:bold;
     border-radius:4px 4px 0 0; width:98%; background:#606060; color:#CCC; 
    padding:8px;">Actualiza contraseña</div><div style="margin:10px;"><form name="passUpdate"><input type="text" name="spass" placeholder="New password for setting"
     style="height:30px; width:210px; border-radius:4px; border:1px solid #999; margin-left:40px;">
    <input type="text" name="npass" placeholder="New password for notes" style="height:30px; width:210px; border-radius:4px; 
   border:1px solid #999; margin:0 50px 0 90px;"><input type="button" onClick="return valid_update();" value="Update" style="height:32px; border-radius:4px; border:1px solid #999;"/><br/><br/>
<span style="margin-left:40px; color:#FB5644; font-weight:bold;" id="error_update"></span><span id="success_see" style="float:right; margin-right:10px; color:#090; font-weight:bold; display:none;">Actualización de contraseña</span></form></div></div>
    
	<div style="height:150px; width:93%; margin:10px auto; background:#F1F1F1; border-radius:4px; "><div style="height:15px; font-weight:bold;
     border-radius:4px 4px 0 0; width:98%; background:#606060; color:#CCC; 
    padding:8px;">Actualizar otra</div><div style="margin:10px;">
    <style>
	.show{height:30px; color:#444; font-weight:bold;}
	.show input{height:28px; width:60px; border-radius:2px; border:1px solid #999;}
	#up_img{float:left; margin:8px 0 0 200px; display:none; }
	</style>
   <form name="other_update" method="post"> <table>
    <tr class="show"><td>Número máximo de libros que un miembro puede emitir:</td><td><input type="text" value="" name="mx_book" placeholder="  <?PHP echo $book_keep; ?>"/></td></tr>
    <tr class="show"><td>Cantidad de días que un miembro puede guardar un libro:</td><td><input type="text" value="" name="mx_day" placeholder="  <?PHP echo $day_after_fine ?>" /></td></tr>
    <tr class="show"><td>Cargo por tardanza por día:</td><td><input type="text" name="mx_fee" value="" placeholder="  <?PHP echo $perday_fine; ?>" /></td></tr>
    </table><div style="height:100px; width:300px; float:right; margin-top:-100px;">
    <span style="float:right; font-size:0.7em; color:#666;">Se aplican nuevas configuraciones a partir de ahora</span><br>
<div style="color:#C00; font-size:1em; height:20px; " id="change_show"></div>
<div style="height:40px; width:100%;  margin-top:20px;">
<input type="submit" onClick="return check_and_validate();" value="Update" style="float:right; height:30px; margin-top:6px; border-radius:4px; background:#060; color:#CCC; border:1px solid #FFF;"/></div>
    </div>
    </form>
    
    </div></div>
  <div style="height:120px; width:93%; margin:10px auto; background:#F1F1F1; border-radius:4px; "><div style="height:15px; font-weight:bold;
     border-radius:4px 4px 0 0; width:98%; background:#606060; color:#CCC; 
    padding:8px;">Semestre de actualización</div>
    <style>
	#show_by_selection{height:40px; width:96%; background:#99FFCC; border:1px solid #0C0; margin:0 auto; border-radius:4px; display:none;}
	</style>
       <div style="margin:10px 0 0 10px;height:30px; color:#444; font-weight:bold;">Actualizar el Semestre con la ayuda de:&nbsp;&nbsp;
       <select style="height:26px; border-radius:4px;" onChange="selection();" name="basis" id="basis">
                    <option value="choose">Elige uno</option>
                    <option value="sem">Semestre</option>
                    <option value="batch">Lote</option>
                    <option value="program">Programa</option>
                    </select></div>
         <div id="show_by_selection"></div>
    </div>
</div>
</div>
</body>
</html>
<script type="text/javascript" src="js/jquery-1.4.3.min.js" ></script>
<script>
function selection()
{
	if(document.getElementById('basis').value == "choose")
	{
		$('#show_by_selection').slideUp(200);
	}
	else
	{
		$('#show_by_selection').slideDown(200);
	}
	if(document.getElementById('basis').value == "sem")
	{
		document.getElementById('show_by_selection').innerHTML = "<form name='slec_form'><div  style='margin:10px;'><span style='color:#444; font-weight:bold;'>Choose Semester:</span>&nbsp;&nbsp;<select name='select_change'  style='height:20px; border-radius:4px;'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#444; font-weight:bold;'>Choose Action:</span>&nbsp;&nbsp;<select  style='height:20px; border-radius:4px;'><option>+1</option></select>&nbsp;&nbsp;&nbsp;<input type='submit' name='action' onClick='work_sem();' value='Update Semester' style='height:28px; margin-top:-4px; color:#FDD; font-weight:bold; width:150px; background:#093; float:right; border:1px solid #0C0; border-radius:3px; cursor:pointer;' /></div></form>";
	}
	if(document.getElementById('basis').value == "batch")
	{
		document.getElementById('show_by_selection').innerHTML = "<form name='slec_form'><div  style='margin:10px;'><span style='color:#444; font-weight:bold;'>Choose Batch:</span>&nbsp;&nbsp;<select name='select_change'  style='height:20px; border-radius:4px;'><option value='2010'>2010</option><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#444; font-weight:bold;'>Choose Action:</span>&nbsp;&nbsp;<select  style='height:20px; border-radius:4px;'><option>+1</option></select>&nbsp;&nbsp;&nbsp;<input type='submit' name='action' onClick='work_batch();' value='Update Semester' style='height:28px; margin-top:-4px; color:#FDD; font-weight:bold; width:150px; background:#093; float:right; border:1px solid #0C0; border-radius:3px; cursor:pointer;' /></div></form>";
	}
	if(document.getElementById('basis').value == "program")
	{
		document.getElementById('show_by_selection').innerHTML = "<form name='slec_form'><div  style='margin:10px;'><span style='color:#444; font-weight:bold;'>Choose Program:</span>&nbsp;&nbsp;<select name='select_change'  style='height:20px; border-radius:4px;'><option value='bcis'>BCIS</option><option value='bhcm'>BHCM</option><option value='bba'>BBA</option><option value='bph'>BPH</option><option value='BSc.Nursing'>BSc. Nursing</option><option value='other'>Other</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#444; font-weight:bold;'>Choose Action:</span>&nbsp;&nbsp;<select  style='height:20px; border-radius:4px;'><option>+1</option></select>&nbsp;&nbsp;&nbsp;<input type='submit' onClick='work_program()' name='action' value='Update Semester' style='height:28px; margin-top:-4px; color:#FDD; font-weight:bold; width:150px; background:#093; float:right; border:1px solid #0C0; border-radius:3px; cursor:pointer;' /></div></form>";
	}
}
function work_program()
{	
 var check = document.forms["slec_form"]["select_change"].value;
	$.ajax({
		type:"POST",
		url:"update_semester.php",
		data:{program:check},
		success: function()
		{
			
		}
		});
}
function work_batch()
{
 var check = document.forms["slec_form"]["select_change"].value;
		$.ajax({
		type:"POST",
		url:"update_semester.php",
		data:{batch:check},
		success: function()
		{
			
			
		}
		});

}
function work_sem()
{
 var check = document.forms["slec_form"]["select_change"].value;
 alert(check);
		$.ajax({
		type:"POST",
		url:"update_semester.php",
		data:{semester:check},
		success: function()
		{
		
		}
		});

}
function show(x)
{
	if($('#'+x).is(":hidden"))
	{
		$('#'+x).slideDown(200);
	}
	else
	{
		$('#'+x).slideUp(200);
	}
	
}
function valid_update()
{
	var sent_s=0;
	var sent_n = 0;
	var n = document.forms["passUpdate"]["npass"].value;
	var s = document.forms["passUpdate"]["spass"].value;
	if(n == "" && s == "")
	{
		document.getElementById('error_update').innerHTML = "Enter new password for notes or setting";
		return false;
	}
	if(n=="" && s != "")
	{
	sent_s = s;
	}
	if(s=="" && n!= "")
	{
	 sent_n = n;	
	}
	if(s != "" && n!= "")
	{
		sent_n = n;
		sent_s = s;
		
	}
	if(sent_s != 0 || sent_n != 0)
	{
	$.ajax({
		type:"POST",
		url:"password_update.php",
		data:{notePass:sent_n , settingPass:sent_s},
		success: function()
		{
			document.forms["passUpdate"]["npass"].value="";
			document.forms["passUpdate"]["spass"].value="";
			$(document.getElementById('success_see')).show(400);
			$(document.getElementById('success_see')).slideUp(600);
		}
		});
	}
}

function check_and_validate()
{	var m_b=0;
	 var m_d=0;
	 var m_f=0;
	var mx_book = document.forms["other_update"]["mx_book"].value;
	var mx_day =  document.forms["other_update"]["mx_day"].value;
   	var mx_fee =  document.forms["other_update"]["mx_fee"].value;
	if(mx_book == "" && mx_day == "" && mx_fee == "")
	{
		document.getElementById('change_show').innerHTML = "Nothing to change";
		return false;
	}
	if(mx_book != null)
	{
		m_b = mx_book;

	}
	if(mx_day != null)
	{
		m_d = mx_day;
	}
	if(mx_fee != null)
	{
		m_f = mx_fee;
	}
	if(m_b != 0 || m_d != 0 || m_f != 0)
	{
		$.ajax({
			type:"POST",
			url:"update_policy.php",
			data:{maximum_book:m_b , maximum_day:m_d , maximum_fee:m_f},
			success: function(res)
			{
				alert(res);
			}
			});
			
	}
}
</script>