<?PHP
try{
	
	$bdd = new PDO("mysql:host=localhost;dbname=project","root","");
}
catch(Exception $e){

 die("ERROR:".$e -> getMessage());	
}

$au = "none";

if(isset($_POST['Userbook']) && $_POST['Userbook'] != "" )
{
	 $req = $bdd ->prepare("SELECT * FROM book_entry WHERE book_name LIKE :book_name AND available = 1  OR author_name LIKE :author_name AND available = 1  OR book_isbn_number LIKE :book_isbn_number AND available = 1  OR id LIKE :id AND available = 1 LIMIT 5") or die("connection failed");
	 $req->execute(array('book_name'=>'%'.$_POST['Userbook'].'%','author_name'=>'%'.$_POST['Userbook'].'%','book_isbn_number'=>'%'.$_POST['Userbook'].'%','id'=>'%'.$_POST['Userbook'].'%'));
	 if($req -> rowCount()==0)
	 {
		?> 
       <div class="line" style="text-align:center;"><?PHP echo"<br/>No Book Found !!!"; ?></div>
        <?PHP 
	 }else
		{
		while($data = $req ->fetch())
			{
			$id = $data['id']; 
			$book_img_get = 'book_image/book.png';
			$au = $data['author_name'];
		 		?>
               <div class="line" onclick="javascript:return bookDetails('<?PHP echo $id; ?>','<?PHP echo  ucfirst($data['book_name']); ?>','<?PHP echo $data['author_name']; ?>','<?PHP echo $data['book_isbn_number'];?>')" title="Edition: &nbsp;<?PHP echo $data['book_edition']; ?>"> <div class="img_style">
             <img src="<?PHP echo $book_img_get; ?>" height="50" width="50" /></div><div class="search_details" 
             style="width:288px;"><span style="font-size:14px; font-weight:bold; width:288px;">&nbsp;&nbsp;<?PHP echo ucfirst($data['book_name']); ?></span>&nbsp;&nbsp;&nbsp;
                <span style="color:#666; font-size:12px; overflow:hidden;">by&nbsp;<?PHP  echo $data['author_name']; ?></span><div id="other_info">&nbsp;&nbsp;&nbsp;ISBN:&nbsp;<?PHP echo $data['book_isbn_number']; ?><br />&nbsp;&nbsp;&nbsp;Register On:
<?PHP echo strftime("%b %d, %Y", strtotime($data["book_registration_time"])); ?></div></div></div>
                
                <?PHP
		
			} 
	 
		 }	
}
else
{
	?>
<div class="line" style="text-align:center;"><?PHP echo"<br/>Ingrese los detalles de los libros !!!"; ?></div>
<?PHP
}
?>