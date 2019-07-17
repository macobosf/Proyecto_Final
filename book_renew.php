<?PHP
include'Connections/connect_to_db.php';
if(isset($_POST['details']) != "")
{
	$mem_id = $_POST['details'];
	$sql = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$mem_id' LIMIT 1");
	while($get_data = mysqli_fetch_array($sql))
	{
		$get_book_details = $get_data['issue_book'];
		if($get_book_details == "")
		{
		 echo 'Member did not take any book';	
		}
		else
		{
			$get_book_details = explode(',',$get_book_details);
			$count_book = count($get_book_details);
			for($j=0; $j<$count_book; $j++)
			{
				$srch = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE book_id = '$get_book_details[$j]'");
				$fetch_srch_result = mysqli_fetch_array($srch);
				$srch_book = mysqli_query($connect_db,"SELECT * FROM book_entry WHERE id = '$get_book_details[$j]'");
				$fetch_srch_book_result = mysqli_fetch_array($srch_book);
				$book_name = $fetch_srch_book_result['book_name'];
				$book_author_name = $fetch_srch_book_result['author_name'];
				$book_isbn = $fetch_srch_book_result['book_isbn_number'];
				$book_register = $fetch_srch_book_result['book_registration_time'];
				$book_id[$j] = $fetch_srch_book_result['id'];				
				$book_issue_on = $fetch_srch_result['issue_time'];
				
				// $convertedTime = ($timeAgoObject -> convert_datetime($book_issue_on)); // Convert Date Time
				// $when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time

				$result = '<form onsubmit="return get_tick_value('.$book_id[$j].');" name="check_tick" id="check_tick"><div name="check_tick_value" id="check_tick_value"><input type="checkbox" name="'.$book_id[$j].'" id="'.$book_id[$j].'"   value="'.$book_id[$j].'" title="ISBN NO.'.$book_isbn.' , Register On: '.$book_register.'"/> '.$book_name.'<span style="color:#444; font-size:10px; font-weight:bold;">&nbsp;by&nbsp;'.$book_author_name.'</span> &nbsp;&nbsp;&nbsp;<span style="color:#444; font-size:12px; font-weight:bold;">&nbsp;&nbsp;&nbsp;'.$book_issue_on.'</span></div></form>';
				echo $result;
			}
		
			
		}
	}
		
}
?>