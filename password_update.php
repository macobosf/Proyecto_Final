<?PHP
include'Connections/connect_to_db.php';
if(isset($_POST['notePass']))
{
	$note = $_POST['notePass'];
	$setting = $_POST['settingPass'];
	if($note != "0")
	{
		mysqli_query($connect_db,"UPDATE security SET password = '$note' WHERE id = 1");
	}
	if($setting != "0")
	{
		mysqli_query($connect_db,"UPDATE security SET password = '$setting' WHERE id = 2");
	}

}
else
{
	echo "It's not works";	
}
?>