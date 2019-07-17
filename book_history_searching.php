<?PHP
include 'Connections/connect_to_db.php';
$table_title =  '<tr >
        <td class="heading" width="10%"  style="border-left:1px solid #333;"><strong>Mem. ID</strong></td>
        <td class="heading"  width="30%"><strong>Member Name</strong></td>
        <td class="heading"  width="20%"><strong>Issue On</strong></td>
        <td class="heading"  width="20%"><strong>Return On</strong></td>
      </tr>';
echo $table_title;
$book_history = "";
$mem = "";
$count_result = 0;
if(isset($_POST['book_activities']) && $_POST['book_activities'] != "" )
{
	$book_id = $_POST['book_activities'];
	
	$get_srh_res = mysqli_query($connect_db,"SELECT * FROM book_transaction WHERE book_id = '$book_id' ORDER BY id DESC LIMIT 5");
	$count_result = mysqli_num_rows($get_srh_res);
	if($count_result == 0)
	{
	$book_history .= '<tr class="t" id="show_b_his"><td colspan="4" >No any history found of this book yet</td></tr>';
	echo $book_history;				
	}
	else
	{
	  while($data = mysqli_fetch_array($get_srh_res))
	  {
		 
		$book_history .= '<tr class="t" id="show_b_his"><td colspan="4" >'.$data['member_id'].'</td></tr>';  
		echo $book_history; 
		
	  }
	}
}
?>