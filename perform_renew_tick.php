<?PHP
include'Connections/connect_to_db.php';
$output = "";
if(isset($_POST['RenewtickValue']))
{
  if($_POST['RenewtickValue'] && $_POST['sentMemDetails'] != "")
  {
	  
	$mem = $_POST['sentMemDetails'];
	$value  = $_POST['RenewtickValue'];
	$tick_val = explode(',',$value);
	for($i=0; $i<count($tick_val); $i++)
	{
		if($tick_val[$i] != "null")
		{
			
			$take = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE book_id = '$tick_val[$i]' AND
			 member_id = '$mem' ORDER BY id DESC LIMIT 1");
			$fetching_data = mysqli_fetch_array($take);
			$last_value = $fetching_data['renew_count'];
			$new_value = $last_value + 1;
			$date1 = date("Y-m-d");
			$date2 = $fetching_data['issue_time'];
			
				$diff = abs(strtotime($date1) - strtotime($date2));
				
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$tot_day = $years*365+$months*30+$days;
			    $list = $fetching_data['RenewAfterDaysOfIssue'];
				if($list == 0 )
				{
					$output = $tot_day;
				}
				else{
					$output = $list." , ".$tot_day;
				}
			 $book_tran = mysqli_query($connect_db,"UPDATE book_transaction SET issue_time = now() , return_time = '0' , 
		  renew_count = '$new_value',RenewAfterDaysOfIssue = '$output' WHERE book_id = '$tick_val[$i]' AND member_id = '$mem' ORDER BY id DESC LIMIT 1 ") or die("algo salió mal");		  
		}
	}
  }
	
  }
  else
  {
echo "No se seleccionó ningún libro para la devolución del libro";
	
}

?>