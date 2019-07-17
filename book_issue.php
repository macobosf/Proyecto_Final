<?PHP
include 'Connections/connect_to_db.php';
if(isset($_POST['Mem']) && $_POST['Book'] && $_POST['Book_name']  != "" )
{	
$user_alreadyHas_book_name = $_POST['Book_name'];
$user_alreadyHas_book_name = strtolower($user_alreadyHas_book_name);
$today = date('y-m-d');
$member_id = $book_id = "";
$member_id = $_POST['Mem'];
$book_id = $_POST['Book'];
$new_book_id = $book_id ;
$retrive_book_name = "";
$d = 0;
$find = "";
		if($user_alreadyHas_book_name != "")
		{
			$check = mysqli_query($connect_db,"SELECT issue_book FROM member_entry WHERE unique_id = '$member_id'");
			$cou = count($check);
			while($check_book = mysqli_fetch_array($check))
			{	
					$retrive = $check_book['issue_book'];
					if($retrive != null)
					{
					$retrive1 = explode(',',$retrive);
					$d = count($retrive1);
					if($d > 0)
					{
							for($i=0; $i<$d ; $i++)
								{
								$book_d = mysqli_query($connect_db,"SELECT * FROM book_entry WHERE id = $retrive1[$i]");
								while($get = mysqli_fetch_array($book_d))
								{
									$book_name[$i] = $get['book_name'];
									$book_author[$i] = $get['author_name'];
								}
					
					
								}
					}
					}
			}
		if($d > 0)
					{
		for($i=0; $i<$d ; $i++)
		{
			$book_name_get = $book_name[$i];
			$book_name_get = strtolower($book_name_get);
			if(strcmp($user_alreadyHas_book_name,$book_name_get) == 0)
			{
				$find = "match";	
				
			}
			
		}
	}
}
		
				
	if(strcmp($find,"match") == 0)
	{
		echo "This member has already taken this book.";
	}
	else if(strcmp($find,"match") != 0){
	mysqli_query($connect_db,"UPDATE book_entry SET available = 0 WHERE id = '$book_id'") or die("could not insert");
	mysqli_query($connect_db,"INSERT INTO book_transaction(id,member_id,book_id,issue_time)
	VALUES('','$member_id','$book_id','$today')");
	$retrive = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$member_id' LIMIT 1");
	$row = mysqli_fetch_array($retrive);
	$old_data = $row['issue_book'];
	if($old_data != "")
	{
	
	$book_id_array = array($old_data,$book_id);
	$new_book_id = implode(',',$book_id_array);
	$new_book_id = implode(',',$book_id_array);
	mysqli_query($connect_db,"UPDATE member_entry SET issue_book = '$new_book_id' WHERE unique_id = '$member_id' ") or 
	die("Could not established record in database");
	}
	else{
	mysqli_query($connect_db,"UPDATE member_entry SET issue_book = '$new_book_id' WHERE unique_id = '$member_id' ") or 
	die("Could not established record in database");	
	}

}
}

else{
echo "Something went wrong or problem occuring on getting details";	
	
}

?>