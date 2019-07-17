<?php
$link=include 'Connections/connect_to_db.php';

if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
$action=$_POST["action"];
if($action=="show_unique_id"){
$member_unique_id = "";
$digits = 3;
$rand_data = rand(pow(10, $digits-1), pow(10, $digits)-1);
$temp = 1 . $rand_data;
$get_unique_id = mysqli_query($connect_db,"SELECT * FROM member_entry ORDER BY id DESC LIMIT 1") or die(mysqli_error("could not get data in database"));
$check_unique_value = mysqli_fetch_array($get_unique_id);
if($check_unique_value > 0)
{
	echo $member_unique_id = $check_unique_value["id"]+1 . $rand_data;
}
else{
	
	 echo $member_unique_id =  $temp;
}
}
?>