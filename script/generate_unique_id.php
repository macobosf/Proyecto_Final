<?php
include_once "../Connections/connect_to_db.php"; // <<---- Connect to database here
$quantity = preg_replace('#[^0-999]#i', '', $_POST['sendit']);
$initial = 0;
$sql_uname_check = mysqli_query($connect_db,"SELECT * FROM book_entry ORDER BY id DESC LIMIT 1") or die(mysqli_error("could not get data in database"));
$get_unique_value = mysqli_fetch_array($sql_uname_check);
if($get_unique_value > 0)
{
	$initial = $get_unique_value["id"]+1;
}
else{
	$initial = 1;	
}
$final = $initial + $quantity-1;

if (strlen($quantity) < 0) {
	echo '<span style="background: #FDD; border:#900 1px solid; border-radius:3px; padding:4px;">Enter number of Books</span>';
	exit();
}
if(strlen($quantity) > 3)
{
		echo '<span style="background: #FDD; border:#900 1px solid; border-radius:3px; padding:4px;">Maximum: 999</span>';
	exit();
}

if ($quantity == "" || $quantity == " ") {
	echo '<span style="background: #FDD; border:#900 1px solid; padding:4px; border-radius:3px;">Not valid</span>';
	exit();
}
if($quantity == 1){
	echo '<span style="background:#16D62F; color:#FFF; border:#169304 1px solid; padding:4px; border-radius:3px;"><strong>'.$initial.'</strong></span>';
	exit();
	}
	elseif($quantity == 0)
	{
		echo '<span style="background: #FDD; border:#900 1px solid; padding:4px; border-radius:3px;">O < Quantity < 1000</span>';
	exit();
	}

		else{
			echo '<span style="background: #16D62F; color:#FFF; border:#169304 1px solid; padding:4px; border-radius:3px;">
			<strong>'.$initial.' to '.$final.'</strong></span>';
			exit();
		}

?>
