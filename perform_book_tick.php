<?PHP
include'Connections/connect_to_db.php';
$output = "";
if(isset($_POST['tickValue']))
{
  if($_POST['tickValue'] && $_POST['mem'] != "")
  {
    $fine = $_POST['fine_cost'];
	$mem = $_POST['mem'];
	$value  = $_POST['tickValue']; 	
	$tick_val = explode(',',$value);
	for($i=0; $i<count($tick_val); $i++)
	{
		if($tick_val[$i] != "null" && $fine == null)
		{
		  $book_query = mysqli_query($connect_db,"UPDATE `book_entry` SET available = 1 WHERE id = '$tick_val[$i]'");	
		  $book_tran = mysqli_query($connect_db,"UPDATE book_transaction SET return_time = now() , return_book = 1 WHERE
		   book_id = '$tick_val[$i]' AND member_id = '$mem' ");
		  $mem_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$mem' LIMIT 1");
		   while($data = mysqli_fetch_array($mem_query))
		   {
			    $list = $data['issue_book'];			  
				$input = $tick_val[$i];
				$array1 = Array($input);
				$array2 = explode(',', $list);
				$array3 = array_diff($array2, $array1);
				
				$output = implode(',', $array3);
			 } /// while loop ends here
			mysqli_query($connect_db,"UPDATE member_entry SET issue_book = '$output' WHERE unique_id = '$mem'");
		  
		}
	
		else if($tick_val[$i] != "null" && $fine > 0)
		{
			$fine_day = 0;
			$recorded_fine = 0;
			$last_fine = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id ='$mem' LIMIT 1");
			$fetch_last_fine = mysqli_fetch_array($last_fine);
			$fine_on_member_acc = $fetch_last_fine['member_fine'];
			
		    $get_setting = mysqli_query($connect_db,"SELECT * FROM setting");
		    $fetch_setting = mysqli_fetch_array($get_setting);
		    $fine_after_day = $fetch_setting['fine_after_day'];
		    $fine_per_day = $fetch_setting['per_day_fine'];
		    $once_take = $fetch_setting['take_book_at_once'];
		    $fine_up = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE member_id = '$mem' AND book_id = 
		  	'$tick_val[$i]' AND return_book = 0 ORDER BY id DESC LIMIT 1");
			if($fine_check = mysqli_num_rows($fine_up) > 0)
			{
			$fetch_fine = mysqli_fetch_array($fine_up);
			$date2 = $fetch_fine['issue_time'];
			$date1 = date("Y-m-d");
			$diff = abs(strtotime($date1) - strtotime($date2));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$tot_day = $years*365+$months*30+$days;
			if($tot_day - $fine_after_day > 0)
			{
				$fine_day = $tot_day - $fine_after_day;
				if($fine_on_member_acc == "" || $fine_on_member_acc == 0)
				{
					$recorded_fine = $fine_day * $fine_per_day;
				}
				else
				{
					$recorded_fine = $fine_on_member_acc + ($fine_day * $fine_per_day);	
				}
				$fine_update = mysqli_query($connect_db,"UPDATE member_entry SET member_fine = '$recorded_fine' WHERE 
				unique_id = '$mem'");
			}	
			
			}
			
		  $book_query = mysqli_query($connect_db,"UPDATE `book_entry` SET available = 1 WHERE id = '$tick_val[$i]'");	
		  $book_tran = mysqli_query($connect_db,"UPDATE book_transaction SET return_time = now() , return_book = 1 WHERE
		   book_id = '$tick_val[$i]' AND member_id = '$mem' ");
		  $mem_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$mem' LIMIT 1");
		   while($data = mysqli_fetch_array($mem_query))
		   {
			    $list = $data['issue_book'];			  
				$input = $tick_val[$i];
				$array1 = Array($input);
				$array2 = explode(',', $list);
				$array3 = array_diff($array2, $array1);
				
				$output = implode(',', $array3);
				

        } /// while loop ends here
		mysqli_query($connect_db,"UPDATE member_entry SET issue_book = '$output' WHERE unique_id = '$mem'");
		  
		}
		
		else if($tick_val[$i] != "null" && $fine == 0)
		{
			$old_fine_Rs = 0;
 			$total_member = 0;
			$mem_co = mysqli_query($connect_db,"SELECT * FROM fine WHERE id= 1");
			$data_get = mysqli_fetch_array($mem_co);
			$total_member_old = $data_get['total_mem'];
			$total_member = $total_member_old + 1;
			$fine_day = 0;
			$recorded_fine = 0;
			$last_fine = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id ='$mem' LIMIT 1");
			$fetch_last_fine = mysqli_fetch_array($last_fine);
			$fine_on_member_acc = $fetch_last_fine['member_fine'];
		    $get_setting = mysqli_query($connect_db,"SELECT * FROM setting");
		    $fetch_setting = mysqli_fetch_array($get_setting);
		    $fine_after_day = $fetch_setting['fine_after_day'];
		    $fine_per_day = $fetch_setting['per_day_fine'];
		    $once_take = $fetch_setting['take_book_at_once'];
		    $fine_up = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE member_id = '$mem' AND book_id = 
		  	'$tick_val[$i]' AND return_book = 0 ORDER BY id DESC LIMIT 1");
			if($fine_check = mysqli_num_rows($fine_up) > 0)
			{
			$fetch_fine = mysqli_fetch_array($fine_up);
			$date2 = $fetch_fine['issue_time'];
			$date1 = date("Y-m-d");
			$diff = abs(strtotime($date1) - strtotime($date2));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$tot_day = $years*365+$months*30+$days;
			
			$fine_record = mysqli_query($connect_db,"SELECT * FROM fine WHERE id = 1");
			if($count = mysqli_num_rows($fine_record) > 0)
			{
			$old_fine_catch = mysqli_fetch_array($fine_record);
			$tot_mem = $old_fine_catch['total_mem'];
			$old_fine_Rs = $old_fine_catch['total_fine_receive'];
			}
			if($tot_day - $fine_after_day > 0)
			{
				$fine_day = $tot_day - $fine_after_day;
				if($fine_on_member_acc == "" || $fine_on_member_acc == 0)
				{
					$recorded_fine = ($fine_day * $fine_per_day)+ $old_fine_Rs;
				}
				else
				{
					$recorded_fine = $old_fine_Rs + $fine_on_member_acc + ($fine_day * $fine_per_day);	
				}
				$fine_update = mysqli_query($connect_db,"UPDATE fine SET total_fine_receive = '$recorded_fine' , total_mem = '$total_member' WHERE 
				id = 1");
			}	
			
			}
			
				mysqli_query($connect_db,"UPDATE fine SET total_mem = '$total_member' WHERE id = 1 ");
			
			$fine_update = mysqli_query($connect_db,"UPDATE member_entry SET member_fine = 0 WHERE 
				unique_id = '$mem'");
		
			
		  $book_query = mysqli_query($connect_db,"UPDATE `book_entry` SET available = 1 WHERE id = '$tick_val[$i]'");	
		  $book_tran = mysqli_query($connect_db,"UPDATE book_transaction SET return_time = now() , return_book = 1 WHERE
		   book_id = '$tick_val[$i]' AND member_id = '$mem' ");
		  $mem_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$mem' LIMIT 1");
		   while($data = mysqli_fetch_array($mem_query))
		   {
			    $list = $data['issue_book'];			  
				$input = $tick_val[$i];
				$array1 = Array($input);
				$array2 = explode(',', $list);
				$array3 = array_diff($array2, $array1);
				
				$output = implode(',', $array3);
				

        } /// while loop ends here
		mysqli_query($connect_db,"UPDATE member_entry SET issue_book = '$output' WHERE unique_id = '$mem'");
		  
		}
	}
  }
  		
  }
  else
  {
echo "No se seleccionó ningún libro para la devolución del libro";
	
}

?>