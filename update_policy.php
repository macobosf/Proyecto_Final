<?PHP
include'Connections/connect_to_db.php';
if(isset($_POST['maximum_book']))
{
	$max_book = $_POST['maximum_book'];
	$max_day = $_POST['maximum_day'];
	$max_fee = $_POST['maximum_fee'];
	if($max_day != null && $max_day != 0)
	{
		mysqli_query($connect_db,"UPDATE setting SET fine_after_day = '$max_day' WHERE id =1");
	}
	if($max_book != null && $max_book != 0)
	{
		mysqli_query($connect_db,"UPDATE setting SET take_book_at_once = '$max_book' WHERE id =1");
	}

	if($max_fee != null && $max_fee != 0)
	{
		mysqli_query($connect_db,"UPDATE setting SET per_day_fine = '$max_fee' WHERE id =1");	
	}
 	
}
else
{
	echo "It is not pass";	
}

?>