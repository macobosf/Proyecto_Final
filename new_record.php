<?PHP
$check = '';
if(isset($_POST['name']))
{
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "project";
		
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			$check = 0;
		} 
		$sql = "CREATE DATABASE IF NOT EXISTS project";
		if ($conn->query($sql) === TRUE) {
			echo "Base de datos creada con éxito";
		} else {
			$check = 0;
		}
		$conn->close();
		
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
    	$check = 0;
		}
				$table = "CREATE TABLE IF NOT EXISTS `book_entry` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `register_quantity` varchar(45) NOT NULL DEFAULT '',
			  `available` int(1) NOT NULL DEFAULT '1',
			  `book_name` varchar(200) NOT NULL DEFAULT '',
			  `author_name` varchar(100) NOT NULL DEFAULT '',
			  `book_language` varchar(45) NOT NULL DEFAULT '',
			  `book_price` varchar(45) NOT NULL DEFAULT '',
			  `book_isbn_number` varchar(200) NOT NULL DEFAULT '',
			  `book_edition` varchar(45) NOT NULL DEFAULT '',
			  `book_registration_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
			  PRIMARY KEY (`id`));";
				if ($connection->query($table) === TRUE) {
					echo "Tabl book_entry creado";
				} else {
					$check = 0;
				}
		$connection->close();
		
		$connection_one = new mysqli($servername, $username, $password, $dbname);
		if ($connection_one->connect_error) {
    	$check = 0;
		}
				$table_one = "CREATE TABLE IF NOT EXISTS `book_transaction` (
							  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
							  `member_id` varchar(100) NOT NULL DEFAULT '',
							  `book_id` varchar(45) NOT NULL DEFAULT '',
							  `issue_time` date NOT NULL DEFAULT '0000-00-00',
							  `return_time` date NOT NULL DEFAULT '0000-00-00',
							  `return_book` int(11) NOT NULL DEFAULT '0',
							  `remove_details` int(1) NOT NULL DEFAULT '0',
							  `renew_count` int(3) NOT NULL DEFAULT '0',
							  `RenewAfterDaysOfIssue` varchar(1000) NOT NULL DEFAULT '0',
							  PRIMARY KEY (`id`));";
				if ($connection_one->query($table_one) === TRUE) {
					echo "Tabla book_transaction creada";
				} else {
					$check = 0;
				}
		$connection_one->close();
		
		$connection_two = new mysqli($servername, $username, $password, $dbname);
		if ($connection_two->connect_error) {
    	$check = 0;
		}
				$table_two ="CREATE TABLE IF NOT EXISTS `member_entry` (
									  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
									  `unique_id` varchar(50) NOT NULL,
									  `issue_book` varchar(100) NOT NULL,
									  `firstname` varchar(45) NOT NULL DEFAULT '',
									  `middlename` varchar(45) NOT NULL DEFAULT '',
									  `lastname` varchar(45) NOT NULL DEFAULT '',
									  `faculty` varchar(45) NOT NULL,
									  `program` varchar(45) NOT NULL,
									  `semester` varchar(45) NOT NULL,
									  `batch` varchar(6) NOT NULL,
									  `gender` varchar(10) NOT NULL DEFAULT '',
									  `dob` date NOT NULL DEFAULT '0000-00-00',
									  `country` varchar(45) NOT NULL DEFAULT '',
									  `district` varchar(45) NOT NULL DEFAULT '',
									  `city` varchar(45) NOT NULL DEFAULT '',
									  `email` varchar(100) NOT NULL DEFAULT '',
									  `phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
									  `register_time` varchar(45) NOT NULL DEFAULT '',
									  `member_fine` int(11) NOT NULL DEFAULT '0',
									  PRIMARY KEY (`id`));"; 
				if ($connection_two->query($table_two) === TRUE) {
					echo "Tabla member_entry creada";
				} else {
					$check = 0;
				}
		$connection_two->close();
		
		$connection_three = new mysqli($servername, $username, $password, $dbname);
		if ($connection_three->connect_error) {
    	$check = 0;
		}
				$table_three ="CREATE TABLE IF NOT EXISTS `notes` (
								  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
								  `Title` varchar(100) NOT NULL DEFAULT '',
								  `note` varchar(1000) NOT NULL DEFAULT '',
								  `note_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
								  PRIMARY KEY (`id`));"; 
								  
				if ($connection_three->query($table_three) === TRUE) {
					echo "Tabla notes creada";
				} else {
					$check = 0;
				}
		$connection_three->close();
		
		$connection_four = new mysqli($servername, $username, $password, $dbname);
		if ($connection_four->connect_error) {
    	$check = 0;
		}
				$table_four = "CREATE TABLE IF NOT EXISTS `security` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
								  `password` varchar(45) NOT NULL DEFAULT '',
								  PRIMARY KEY (`id`));"; 
								  
				if ($connection_four->query($table_four) === TRUE) {
					echo "Tabla security creada";
				} else {
					$check = 0;
				}
		$connection_four->close();
		
		$connection_five = new mysqli($servername, $username, $password, $dbname);
		if ($connection_five->connect_error) {
    	$check = 0;
		}
				$table_five = "CREATE TABLE IF NOT EXISTS `setting` (
								  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
								  `fine_after_day` int(10) unsigned NOT NULL DEFAULT '15',
								  `per_day_fine` int(10) unsigned NOT NULL DEFAULT '1',
								  `take_book_at_once` int(11) NOT NULL DEFAULT '3',
								  `institution_name` varchar(45) NOT NULL DEFAULT '',
								  `header_color` varchar(45) NOT NULL DEFAULT '',
								  `font_color` varchar(45) NOT NULL DEFAULT '',
								  PRIMARY KEY (`id`));";								  
				if ($connection_five->query($table_five) === TRUE) {
					echo "Table setting creada";
				} else {
					$check = 0;
				}
		$connection_five->close();
		
		$connection_six = new mysqli($servername, $username, $password, $dbname);
		if ($connection_six->connect_error) {
    	$check = 0;
		}
				$table_six = "CREATE TABLE IF NOT EXISTS `fine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_fine_receive` int(10) unsigned NOT NULL DEFAULT '0',
  `total_mem` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);";
								  
				if ($connection_six->query($table_six) === TRUE) {
					
					echo "Table fine creada";
				} else {
					$check = 0;
				}
		$connection_six->close();
		
		require_once 'Connections/connect_to_db.php';
		$ins_name = $fColor = $bColor = $b_num = $b_keep = $fine = $nPass = $sPass = "";
		$ins_name = $_POST['name'];
		$ins_name = strtoupper($ins_name);
		$fColor = $_POST['fontColor'];
		$bColor = $_POST['backGroundColor'];
		$b_num =  $_POST['bookNum'];
		$b_keep = $_POST['bookKeep'];
		$fine = $_POST['fine'];
		$nPass = $_POST['notePassword'];
		$sPass = $_POST['settingPassword'];
		
		$update = mysqli_query($connect_db,"INSERT INTO setting(id,fine_after_day,per_day_fine,take_book_at_once,
		institution_name,header_color,font_color) VALUES('','$b_keep','$fine','$b_num','$ins_name','$bColor','$fColor');");
		
		mysqli_query($connect_db,"INSERT INTO security(id,password) VALUES('','$nPass')");
		mysqli_query($connect_db,"INSERT INTO security(id,password) VALUES('','$sPass')");
		mysqli_query($connect_db,"INSERT INTO fine(id,total_fine_receive,total_mem) VALUES('1','0','0')");
		
		echo $check;
}
else
{
	$check = 0;
	echo $check;
}
?>