<?PHP
	include 'Connections/connect_to_db.php';
	$retrive_setting = mysqli_query($connect_db,"SELECT * FROM setting");
	$fetch_retrive_data = mysqli_fetch_array($retrive_setting);
	$day_to_take_book = $fetch_retrive_data['take_book_at_once'];
	$institution_name = $fetch_retrive_data['institution_name'];
	$font_color = $fetch_retrive_data['font_color'];
	$backGrColor = $fetch_retrive_data['header_color'];	
	
	/// Setting details ends from here
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<div id="main_container">
	<div id="logo_section" style="background:<?PHP echo $backGrColor; ?>">
			<div id="logo" ></div>
            <div id="college" style="color:<?PHP echo $font_color; ?>">&nbsp;&nbsp;<?PHP echo $institution_name; ?></div>
            <div id="header">&nbsp;&nbsp;&nbsp;Gestión Bibliografica
</div>
 
	</div><!--End of logo Section Div--->
