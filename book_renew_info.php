<?PHP
include'Connections/connect_to_db.php';
if(isset($_POST['book_renew']) != "")
{
	$mem_id = $_POST['book_renew'];
	$sql = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE unique_id = '$mem_id' LIMIT 1");
	while($get_data = mysqli_fetch_array($sql))
	{
		$get_book_details = $get_data['issue_book'];
		if($get_book_details == "")
		{
		 echo 'El miembro no tomó ningún libro';	
		}
		else
		{
			$get_book_details = explode(',',$get_book_details);
			$count_book = count($get_book_details);
			for($j=0; $j<$count_book; $j++)
			{
				$srch = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE book_id = '$get_book_details[$j]' AND return_book = 0 ORDER BY id DESC");
				$fetch_srch_result = mysqli_fetch_array($srch);
				$srch_book = mysqli_query($connect_db,"SELECT * FROM book_entry WHERE id = '$get_book_details[$j]'");
				$fetch_srch_book_result = mysqli_fetch_array($srch_book);
				$book_name = $fetch_srch_book_result['book_name'];
				$book_author_name = $fetch_srch_book_result['author_name'];
				$book_isbn = $fetch_srch_book_result['book_isbn_number'];
				$book_register = $fetch_srch_book_result['book_registration_time'];
				$book_id[$j] = $fetch_srch_book_result['id'];				
				$book_issue_on = $fetch_srch_result['issue_time'];
			 
			 	$get_setting = mysqli_query($connect_db,"SELECT * FROM setting");
				$fetch_setting = mysqli_fetch_array($get_setting);
				$day_after_fine = $fetch_setting['fine_after_day'];
				$per_day_fine = $fetch_setting['per_day_fine'];
				$color="";
				$tot_day = "";
				$show = "";
				$fine_cost = "";
				
				$fine_query = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE member_id = '$mem_id' AND 
				book_id = '$book_id[$j]' AND return_book = 0 ORDER BY id DESC");
				if(mysqli_num_rows($fine_query) > 0)
				{
				$fine_fetch = mysqli_fetch_array($fine_query);
				
				$date2= $fine_fetch['issue_time'];
				$date1 = date("Y-m-d");
				$diff = abs(strtotime($date1) - strtotime($date2));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$tot_day = $years*365+$months*30+$days;
				$color = "#949494";
				$show = "";
				$fine_cost = "";
				if($tot_day == 1)
				{
					$show =" day ago";
				}
				else if($tot_day > 1)
				{
                    $show = "days ago";
				}
				if($tot_day > $day_after_fine)
				{
					$fine_cost = "| Rs. ";
					$fine_cost .= ($tot_day - $day_after_fine ) * $per_day_fine ;	
					$color = "#f00";
				}
				if($tot_day == 0)
				{
					$tot_day  = "Recently taken";	
				}
				}
				
				if($fine_cost > 0 || $fine_cost != "")
				{
					$result = '<div style=" width:100%;"><span style="color:#666; margin-left:25px;">'.$book_name.'</span>&nbsp;&nbsp;<img src="images/help.png" height="15" width="15" 
					title="Miembro tiene multa en este libro por lo que debe devolver este libro primero:
Book Name: '.$book_name.'
Writer: '.$book_author_name.'
ISBN Number: '.$book_isbn.'
Book ID: '.$book_id[$j].'
Issue Date: '.$date2.'"/><span style="float:right; margin:0; padding-top:6px; color:'.$color.'; font-size:0.7em;">'.$tot_day.' '.$show.'&nbsp;&nbsp;'.$fine_cost.'</span></div>';
				}
				else{
				$result = '<form><div style="width:100%;"><input type="checkbox" class="renew_book_Checkbox"  value="'.$book_id[$j].'" title="ISBN NO.'.$book_isbn.' , Issue On: '.$date2.'"/> '.$book_name.'<span style="color:#444; font-size:10px; font-weight:600;">&nbsp;by&nbsp;'.$book_author_name.'</span><span style="float:right; margin:0; padding-top:6px; color:'.$color.'; font-size:0.7em;">'.$tot_day.' '.$show.'&nbsp;&nbsp;'.$fine_cost.'</span></div></form>';
				}
				echo $result;
				
			}
		
			
		}
	}
		
}
?>