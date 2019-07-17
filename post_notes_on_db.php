<?PHP
include 'Connections/connect_to_db.php';
if(isset($_POST['note_title']))
{
	if($_POST['note_title'] != "" && $_POST['note_body'] != "")
	{
	
	$note_title = $_POST['note_title'];
	$note_body = $_POST['note_body'];
	$insert_note = mysqli_query($connect_db,"INSERT INTO notes(id,Title,note,note_time) 
	VALUES('','$note_title','$note_body',now())") or die("No se pudo grabar sus datos");	

	}

}

?>