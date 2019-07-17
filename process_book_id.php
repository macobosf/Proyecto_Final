<?php
$link=include 'Connections/connect_to_db.php';

if (mysqli_connect_errno())
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
$action=$_POST["action"];
if($action=="show_unique_id"){
$book_unique_id = "";
$get_unique_id = mysqli_query($connect_db,"SELECT * FROM book_entry ORDER BY id DESC LIMIT 1") or die(mysqli_error("could not get data in database"));
$check_unique_value = mysqli_fetch_array($get_unique_id);
if($check_unique_value > 0)
{
	echo $book_unique_id = $check_unique_value["id"]+1;
}
else{
	
	 echo $book_unique_id =  1;
}
}
?>