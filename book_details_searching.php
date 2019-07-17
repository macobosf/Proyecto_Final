<?PHP
try{
	
	$bdd = new PDO("mysql:host=localhost;dbname=project","root","");
}
catch(Exception $e){

 die("ERROR:".$e -> getMessage());	
}


$book_avai = "";
if(isset($_POST['Usersrh']) && $_POST['Usersrh'] != "" )
{
	 $req = $bdd ->prepare("SELECT * FROM book_entry WHERE book_name LIKE :book_name OR author_name LIKE :author_name OR book_isbn_number LIKE :book_isbn_number OR id LIKE :id LIMIT 6") or die("connection failed");
	 $req->execute(array('book_name'=>'%'.$_POST['Usersrh'].'%','author_name'=>'%'.$_POST['Usersrh'].'%','book_isbn_number'=>'%'.$_POST['Usersrh'].'%','id'=>'%'.$_POST['Usersrh'].'%'));
	 if($req -> rowCount()==0)
	 {
		?> 
       <div class="line" style="text-align:center; width:379px;" ><?PHP echo"<br/>No Book Found !!!"; ?></div>
        <?PHP 
	 }else
		{
		while($data = $req ->fetch())
			{
			$id = $data['id']; 
			$book_img_get = 'book_image/book.png';
			if($data['available'] == 0)
			{
			  	$book_avai = "No";
			}
			else if($data['available'] == 1){
				$book_avai = "Yes";
				}
			else
			{
			   $book_avai = "Unknow";	
			}
		 		?>
               <div class="line" style="width:379px;" onclick="javascript:return book_srh_Details('<?PHP echo $id ?>','<?PHP echo  ucfirst($data['book_name']); ?>','<?PHP echo $data['author_name']; ?>','<?PHP echo $data['register_quantity']; ?>','<?PHP echo $book_avai; ?>','<?PHP echo $data['book_language']; ?>','<?PHP echo $data['book_price']; ?>','<?PHP echo $data['book_edition']; ?>','<?PHP echo $data['book_registration_time']; ?>','<?PHP echo $data['book_isbn_number'];?>')" title="Edition: &nbsp;<?PHP echo $data['book_edition']; ?>"> <div class="img_style">
             <img src="<?PHP echo $book_img_get; ?>" height="50" width="50" /></div><div class="search_details" style="width:288px;"><span style="font-size:14px; font-weight:bold;">&nbsp;&nbsp;<?PHP echo ucfirst($data['book_name']); ?></span>&nbsp;&nbsp;&nbsp;
                <span style="color:#666; font-size:12px;">by&nbsp;<?PHP  echo $data['author_name']; ?></span><div id="other_info">&nbsp;&nbsp;&nbsp;ISBN:&nbsp;<?PHP echo $data['book_isbn_number']; ?><br />&nbsp;&nbsp;&nbsp;Register time:
<?PHP echo $data['book_registration_time']; ?></div></div></div>
                
                <?PHP
		
			} 
	 
		 }	
}
else
{
	?>
<div class="line" style="text-align:center;  width:379px;"><?PHP echo"<br/>Enter Book's Details !!!"; ?></div>
<?PHP
}
?>
