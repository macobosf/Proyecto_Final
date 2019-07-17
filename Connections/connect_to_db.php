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
	header("location:welcome.php");
}
?>