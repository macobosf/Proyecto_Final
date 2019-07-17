<?PHP
try{
	
	$bdd = new PDO("mysql:host=localhost;dbname=project","root","");
}
catch(Exception $e){

 die("ERROR:".$e -> getMessage());	
}



if(isset($_POST['UserInput']) && $_POST['UserInput'] != "" )
{
	 $req = $bdd ->prepare("SELECT * FROM member_entry WHERE firstname LIKE :firstname OR lastname LIKE :lastname OR email LIKE :email OR phone LIKE :phone OR unique_id LIKE :unique_id LIMIT 5") or die("connection failed");
	 $req->execute(array('firstname' => '%'.$_POST['UserInput'].'%','lastname'=>'%'.$_POST['UserInput'].'%','email'=>'%'.$_POST['UserInput'].'%','phone'=>'%'.$_POST['UserInput'].'%','unique_id'=>'%'.$_POST['UserInput'].'%'));
	 if($req -> rowCount()==0)
	 {
		?> 
       <div class="line" style="text-align:center;"><?PHP echo"<br/>Ningún miembro encontrado!!!"; ?></div>
        <?PHP 
	 }else
		{
		while($data = $req ->fetch())
			{
			$line_break = " ;   ";
			$book_name = ""; 
			$book_author = "";
			$book_date = "";
			$book_count = 0;
			$id = $data['id']; 
			$book_issue1 = array();
			$book_issue = $data['issue_book'];
			if($book_issue != "" && $book_issue != ',')
			{
			$book_issue1 = explode(',',$book_issue);
			$book_count = count($book_issue1);	
			for($i=0; $i<$book_count; $i++)
			{
			$sql = mysqli_connect('localhost','root','') or die("No se pudo conectar a la base de datos");
			mysqli_select_db($sql,'project');
			$book_d = mysqli_query($sql,"SELECT * FROM book_entry WHERE id = $book_issue1[$i]");
			while($get = mysqli_fetch_array($book_d))
			{
				$book_name[$i] = $get['book_name'];
				$book_author[$i] = $get['author_name'];
				
				
			}
				
			}
			}
			$path = 'members_image/'.$id.'.jpg';
			$default_male = 'members_image/male.png';
			$default_female = 'members_image/female.png';
	
		/////
			if(file_exists($path))
			{
				$img_get = $path;
			}
			else
			{
				if($data['gender'] == "Male")
				{
				$img_get = $default_male;
				}
				else
				{
				$img_get = $default_female;
				}
			}
		 		?>
              
               <div class="line" onclick="javascript:return memDetails('<?PHP echo $book_count; ?>','<?PHP echo $data['unique_id']; ?>','<?PHP echo ucfirst($data['firstname']); ?>','<?PHP echo ucfirst($data['middlename']); ?>','<?PHP echo ucfirst($data['lastname']); ?>','<?PHP echo $data['email']; ?>','<?PHP echo $data['program'];?>','<?PHP echo $data['semester']; ?>')" title="Member ID:<?PHP echo $data['unique_id']; ?>"> <div class="img_style">
             <img src="<?PHP echo $img_get; ?>" height="50" width="50" /></div><div class="search_details" style="width:288px;"><span style="font-size:14px; font-weight:bold;">&nbsp;&nbsp;<?PHP echo ucfirst($data['firstname']); echo ucfirst( $data['middlename']); ?> &nbsp;<?PHP echo  ucfirst($data['lastname']);?></span>&nbsp;&nbsp;<span style="color:#666; font-size:12px;"><?PHP echo $data['program']; ?>&nbsp;[&nbsp;
				<?PHP echo $data['semester']; ?>&nbsp;]</span><div id="other_info">&nbsp;&nbsp;&nbsp;Email:&nbsp;<?PHP echo $data['email']; ?><br />
&nbsp;&nbsp;&nbsp;Number of book issue:&nbsp;<span id="number_color" title="<?PHP for($j=0; $j<$book_count;$j++){ 
echo $book_name[$j]; ?>&nbsp;by&nbsp;<?PHP echo $book_author[$j]; ?><?PHP echo $line_break;}?> " style="height:20px; color:#CCC; text-align:center; background:#333333; border-radius:6px;">
&nbsp; <?PHP echo $book_count; ?>&nbsp;&nbsp;</span></div></div></div>
                
                <?PHP
		
			} 
	 
		 }	
}
else
{
	?>
<div class="line" style="text-align:center;"><?PHP echo"<br/>Ingrese los detalles del miembro!!!"; ?></div>
<?PHP
}
?>