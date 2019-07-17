<?PHP
include'Connections/connect_to_db.php';
if(isset($_POST['program']))
{
	$check = $_POST['program'];
	if($check != null || $check != 0 || $check != "undefiend")
	{
		$select_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE program like '%$check%'");
		while($fetch_finding = mysqli_fetch_array($select_query))
		{
			$old_sem = $id = $uid = "";
			$old_sem = $fetch_finding['semester'];
			$id = $fetch_finding['id'];
			$uid = $fetch_finding['unique_id'];
			// Convert roman letter into binary interger number
			$romans = array(
			'x' => 10,
			'ix' => 9,
			'v' => 5,
			'iv' => 4,
			'i' => 1, );
			$roman = $old_sem;
			$result = 0;
			foreach ($romans as $key => $value) {
				while (strpos($roman, $key) === 0) {
					$result += $value;
					$roman = substr($roman, strlen($key));
				}
			}
			$new_sem = $result+1;
			if($new_sem <= 8)
			{
			// Now convert interger value into romon letter
			 $integer = intval($new_sem);
			 $result = '';
			 
			 // Create a lookup array that contains all of the Roman numerals.
			 $lookup = array(
			 'x' => 10,
			 'ix' => 9,
			 'v' => 5,
			 'iv' => 4,
			 'i' => 1);
			 
			 foreach($lookup as $roman => $value){
			  // Determine the number of matches
			  $matches = intval($integer/$value);
			 
			  // Add the same number of characters to the string
			  $result .= str_repeat($roman,$matches);
			 
			  // Set the integer to be the remainder of the integer and the value
			  $integer = $integer % $value;
			 }
			}else
			{
				$result = "Passout";
			}
			 // The Roman numeral should be built, and store in $result variable now update it
			 mysqli_query($connect_db,"UPDATE member_entry SET semester = '$result' WHERE id = '$id' AND unique_id = '$uid'");
			 
				
		}
	}
}
else if(isset($_POST['semester']))
{
	$check = $_POST['semester'];
	if($check != null || $check != 0 || $check != "undefiend")
		{
			// Now convert interger value into romon letter
			 $integer = intval($check);
			 $choose = '';
			 // Create a lookup array that contains all of the Roman numerals.
			 $lookup = array(
			 'x' => 10,
			 'ix' => 9,
			 'v' => 5,
			 'iv' => 4,
			 'i' => 1);
			 
			 foreach($lookup as $roman => $value)
			 {
			  // Determine the number of matches
			  $matches = intval($integer/$value);
			 
			  // Add the same number of characters to the string
			  $choose .= str_repeat($roman,$matches);
			 
			  // Set the integer to be the remainder of the integer and the value
			  $integer = $integer % $value;
			 }
			  $select_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE semester = '$choose'");
			  while($fetch_finding = mysqli_fetch_array($select_query))
				{
					$old_sem = $id = $uid = "";
					$old_sem = $fetch_finding['semester'];
					$id = $fetch_finding['id'];
					$uid = $fetch_finding['unique_id'];
					// Convert roman letter into binary interger number
					$romans = array(
					'x' => 10,
					'ix' => 9,
					'v' => 5,
					'iv' => 4,
					'i' => 1, );
					$roman = $old_sem;
					$result = 0;
					foreach ($romans as $key => $value) 
					{
						while (strpos($roman, $key) === 0) 
						{
							$result += $value;
							$roman = substr($roman, strlen($key));
						}
					}
				$new_sem = $result+1;
				if($new_sem <= 8)
				{
				// Now convert interger value into romon lettera
				$interger = '';
			    $integer = intval($new_sem);
				$result = '';			 
				foreach($lookup as $roman => $value)
				{
				 // Determine the number of matches
				$matches = intval($integer/$value);
				 
			    // Add the same number of characters to the string
		        $result .= str_repeat($roman,$matches);
				 
				  // Set the integer to be the remainder of the integer and the value
				  $integer = $integer % $value;
			   	}
				}
				else
				{
					$result = "Passout";
				}
			 // The Roman numeral should be built, and store in $result variable now update it
			 mysqli_query($connect_db,"UPDATE member_entry SET semester = '$result' WHERE id = '$id' AND unique_id = '$uid'");
			 
			
		}
	}
}
else if(isset($_POST['batch']))
{
	$check = $_POST['batch'];
	if($check != null || $check != 0 || $check != "undefiend")
	{
		$select_query = mysqli_query($connect_db,"SELECT * FROM member_entry WHERE batch = '$check'");
		while($fetch_finding = mysqli_fetch_array($select_query))
		{
			$old_sem = $id = $uid = "";
			$old_sem = $fetch_finding['semester'];
			$id = $fetch_finding['id'];
			$uid = $fetch_finding['unique_id'];
			// Convert roman letter into binary interger number
			$romans = array(
			'x' => 10,
			'ix' => 9,
			'v' => 5,
			'iv' => 4,
			'i' => 1, );
			$roman = $old_sem;
			$result = 0;
			foreach ($romans as $key => $value) {
				while (strpos($roman, $key) === 0) {
					$result += $value;
					$roman = substr($roman, strlen($key));
				}
			}
			$new_sem = $result+1;
			if($new_sem <= 8)
			{
			// Now convert interger value into romon letter
			 $integer = intval($new_sem);
			 $result = '';
			 
			 // Create a lookup array that contains all of the Roman numerals.
			 $lookup = array(
			 'x' => 10,
			 'ix' => 9,
			 'v' => 5,
			 'iv' => 4,
			 'i' => 1);
			 
			 foreach($lookup as $roman => $value){
			  // Determine the number of matches
			  $matches = intval($integer/$value);
			 
			  // Add the same number of characters to the string
			  $result .= str_repeat($roman,$matches);
			 
			  // Set the integer to be the remainder of the integer and the value
			  $integer = $integer % $value;
			 }
			}else
			{
				$result = "Passout";
			}
			 // The Roman numeral should be built, and store in $result variable now update it
			 mysqli_query($connect_db,"UPDATE member_entry SET semester = '$result' WHERE id = '$id' AND unique_id = '$uid'");
				
		}
	}
}

?>