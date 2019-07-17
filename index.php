<?PHP
session_start();
$institution_name = $font_color = $backGrColor = "";
$link = "";
$img_link = "";
if(isset($_SESSION['password']))
{
	$link = "destroy.php";
	$img_link = "images/unlock.png";
}
else
{
	$link = "#";
	$img_link = "images/lock.png";
}
	include 'Connections/connect_to_db.php';
	$retrive_setting = mysqli_query($connect_db,"SELECT * FROM setting");
	$fetch_retrive_data = mysqli_fetch_array($retrive_setting);
	$day_to_take_book = $fetch_retrive_data['take_book_at_once'];

	
$get_fine =0;
if(isset($_POST['fname']))
{
$fname = $mname = $lname = $mfaculty = $mprogram = $msemester = $gender = $b_m =$b_d = $b_y = $country = $district = $city = $email = $phone = $member_unique_id= $batch = "";
$fname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["fname"]);
$mname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["mname"]);
$lname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["lname"]);
$gender = preg_replace('#[^a-z]#i', '', $_POST['gender']);
$b_m = preg_replace('#[^0-9]#i', '', $_POST['birth_month']); 
$b_d = preg_replace('#[^0-9]#i', '', $_POST['birth_day']); 
$b_y = preg_replace('#[^0-9]#i', '', $_POST['birth_year']);
$mfaculty = $_POST['mem_faculty'];
$mprogram = $_POST['mem_program'];
$msemester = $_POST['mem_semester'];
$batch = $_POST['batch'];
$combine_dob = "$b_y-$b_m-$b_d";
$country= preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['your_country']);
$district = preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['district']);
$city =  preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['place']);
$email = $_POST['email'];
$email = stripslashes($email); 
$emailCHecker = mysqli_real_escape_string($connect_db,$email);
$emailCHecker = str_replace("`", "", $emailCHecker);
$phone = preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['phone']);
$member_unique_id = $_POST["content1"];

$run_insert_query = mysqli_query($connect_db,"INSERT INTO member_entry(unique_id,firstname, middlename, lastname, faculty , program,semester,batch, gender, dob, country, district, city, email, phone , register_time) 
     VALUES('$member_unique_id','$fname','$mname','$lname','$mfaculty','$mprogram','$msemester','$batch','$gender','$combine_dob','$country','$district','$city','$email', '$phone' ,now())") or die (mysqli_error($connect_db));
	
	 $pid = mysqli_insert_id($connect_db); 
	 $newname = "$pid.jpg";
	 move_uploaded_file( $_FILES['fileField']['tmp_name'], "members_image/$newname");
	 header("location: index.php"); 
     exit();
	 
	
}  //PHP script to record member details in database

if(isset($_POST['Morebook_quantity']))
{
$book_quantity = $book_name = $author_name = $booK_language = $book_price = $book_isbn =$book_edition= "";
$book_quantity = preg_replace('#[^0-9]#i', '', $_POST["Morebook_quantity"]);
$book_name = $_POST["More_book_name"];
$author_name = $_POST["Books_author"];
$booK_language= preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['More_book_language']);
$book_price = preg_replace('#[^0-9]#i', '', $_POST['Books_price']);
$book_isbn =  preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['books_isbn']);
$book_edition = $_POST['books_edition'];

for($i=0; $i<$book_quantity; $i++)
{
	$insert_books = mysqli_query($connect_db,"INSERT INTO book_entry(register_quantity, book_name, author_name, book_language, book_price, book_isbn_number, book_edition, book_registration_time)  VALUES('$book_quantity','$book_name','$author_name','$booK_language','$book_price','$book_isbn','$book_edition',now())")  
     or die (mysqli_error($connect_db));
	header("location:index.php");
}
	
}  //For the record of more book entry in database

if(isset($_POST['one_book_name']))
{
$book_quantity = $book_name = $author_name = $booK_language = $book_price = $book_isbn =$book_edition= "";
$book_quantity = 1;
$book_name = $_POST["one_book_name"];
$author_name = $_POST["oneBook_author"];
$booK_language= preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['OneBooklanguage']);
$book_price = preg_replace('#[^0-9]#i', '', $_POST['OneBookprice']);
$book_isbn =  preg_replace('#[^_A-Za-z0-9]#i', '', $_POST['OneBookisbn']);
$book_edition = $_POST['onebookedition'];
$insert_books = mysqli_query($connect_db,"INSERT INTO book_entry(register_quantity, book_name, author_name, book_language, book_price, book_isbn_number, book_edition, book_registration_time)  VALUES('$book_quantity','$book_name','$author_name','$booK_language','$book_price','$book_isbn','$book_edition',now())")  
     or die (mysqli_error($connect_db));
header("location:index.php");
	
}
?>  <!--For the record of one book entry in database-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>     
<link rel="icon" type="image/png" href="images/favicon.png"  />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type='text/javascript' src='js/fg_moveable_popup.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Gestión Bibliografica</title>
<script src="validation/add_student_form_validation.js" type="text/javascript"></script>
<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="validation/MoreBooksValidation.js" type="text/javascript"></script>
<script src="validation/singleBookvalidation.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">    <!--Page css link and javascript link are here--->

function toggleSlideBox(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(50)
		} else {
			$('#'+x).slideUp(100);
							
		}
}  <!---Function for slide the menu associated div-->
  
var book_action_name = "";
$(document).ready(function(){
    function showRoom(){
        $.ajax({
            type:"POST",
            url:"process.php",
            data:{action:"show_unique_id"},
            success:function(data){
            $("#content").text(data);
				 
            $("#content1").val(data);
				 
				
            } 
        });
    }
    showRoom();
});  // For getting the unique id of member 
  
var book_action_name = "";
$(document).ready(function(){
    function showRoom(){
        $.ajax({
            type:"POST",
            url:"process_book_id.php",
            data:{action:"show_unique_id"},
            success:function(data){
            $("#book_unique_id").text(data);	
            } 
        });
    }
    showRoom();
});  // For getting the unique id of book in only one book case


function choice(x)
{	
if(x == "more_book"){
	if ($('#'+x).is(":hidden")) {
			$('#one_book').hide();
			$('#'+x).show();
			$('#notice_user').show(1400);
		}	
}
if(x == "one_book")
{
	
	if ($('#'+x).is(":hidden")) {
			$('#more_book').hide();
			$('#notice_user').hide(200);
			$('#'+x).show();
		}
	}
}  // Single or Multiple book choose option for slide different page 

$(document).ready(function() {
	$("#Morebook_quantity").blur(function() {
		$("#quantity_check_and_response").removeClass().text('Checking...').fadeIn(1000);
		$.post("script/generate_unique_id.php",{ sendit:$(this).val() } ,function(data) {
		  	$("#quantity_check_and_response").fadeTo(900,0.1,function() { 
			  $(this).html(data).fadeTo(900,1);	
			});
        });
	});
});  // For getting unique id of more books 

$(document).ready(function() {
	$("#input").keyup(function()
	{
		var user_input_data = $("#input").val();
		$.ajax({
			type:"POST",
			url:"member_searching.php",
			data:{UserInput:user_input_data},
			success: function(result)
			{
					
				$("#show_result").html(result);
			}
			
			
		});
	
	});
    
});  // Ajax for search member connected with member_searching.php

$(document).ready(function() {
	$("#mem_search_input").keyup(function()
	{
		var user_input_data = $("#mem_search_input").val();
		$.ajax({
			type:"POST",
			url:"book_return_searchEngine.php",
			data:{memberInput:user_input_data},
			success: function(result)
			{					
				$("#show_search_details").html(result);
			}
			
			
		});
	
	});
    
});  // Ajax for search book for book_return case connected with book_return_searchEngine.php

$(document).ready(function() {
	$("#book_renew_search").keyup(function()
	{
		var renew_select = $("#book_renew_search").val();
		$.ajax({
			type:"POST",
			url:"book_renew_searchEngine.php",
			data:{renew_book:renew_select},
			success: function(show_this)
			{
					
				$("#show_search_renew_book_details").html(show_this);
			}
			
			
		});
	
	});
    
});  // Ajax for search book for book_renew case connected with book_renew_searchEngine.php

$(document).ready(function() {
	$("#book_input").keyup(function()
	{
		var book_data = $("#book_input").val();
		$.ajax({
			
			type:"POST",
			url:"searching_book.php",
			data:{Userbook:book_data},
			success: function(response)
			{
					
				$("#book_show").html(response);
			}
			
			
		});
	
	});
    
});  // Ajax for search book in the case of issue connected with searching_book.php


function bookDetails(id,name,author,isbn)
{
	var get_id = id;
	var book_name = name;
	var get_author = author;
	var get_isbn = isbn;
	$("#book_action").show(200);
	document.getElementById('book_name').innerHTML=book_name;
	document.getElementById('book_author').innerHTML="by "+get_author;
	document.getElementById('show_id').innerHTML="Unique ID: "+get_id;
	document.getElementById('book_isbn').innerHTML="ISBN Number: "+get_isbn;
	document.getElementById('book_action_id').value = get_id;
	book_action_name = book_name;	
	
}  //Javascript to show the book information after search and select the book in the case of book issue for book searching

var number_of_book = 0;
function memDetails(Nbook,mem_id,mem_name,mname,lname,email,program,sem)
{
	number_of_book = Nbook;
	if(number_of_book < <?PHP echo $day_to_take_book; ?>)
	{
	var mem_id = mem_id;
	var mem_name = mem_name;
	var m = mname;
	var l = lname;
	var mem_email = email;
	var program = program;
	var sem = sem;
	$("#member_action").show(200);
	document.getElementById('mem_name').innerHTML=mem_name+" "+m+" "+l;
	document.getElementById('program').innerHTML=" "+program + " [ "+ sem+" ]";
	document.getElementById('mem_email').innerHTML="Email ID: "+mem_email;
	document.getElementById('mem_u_id').innerHTML="Unique ID: "+mem_id;
	document.getElementById('member_action_id').value = mem_id;	
	}
	else
	{
		alert("Este miembro ya ha tomado la cantidad máxima de libros.");
	}
}  // Show member details after search and select and also check that the member can already take 
   //maximum book or not for book issue case

function validate_mem_book()
{

	if($("#member_action_id").val() == "")
	{
		document.getElementById('member_error_show').innerHTML = "Select a member";
		return false();
	}
	if($("#book_action_id").val() == "")
	{
		document.getElementById('book_error_show').innerHTML = "Select a book";
		return false();
	}
	if($("#member_action_id").val() && $("#book_action_id").val() != "")
	{
		var mem_id = $("#member_action_id").val();
		var book_id = $("#book_action_id").val();
		var book_name = book_action_name;
		$.ajax(
			{
				type:"POST",
				url:"book_issue.php",
				data:{Mem:mem_id,Book:book_id,Book_name:book_action_name},
				success: function(response)
				{
					$("#member_action").slideUp(200);
					document.getElementById("member_action").innerHTML = "";
					$("#book_action").slideUp(200);
					document.getElementById("book_action").innerHTML = "";
					setTimeout("location.reload(true);",800);
				   if(response!= "")
				   {
					   alert(response);
				   }
				   else{
					   $("#sucess_show").slideDown(50);
				   }
				}
				
		});
		
	}

	
}  // Validate user select both book and member or not if he choose then perform book issue operation in book_issue.php


var fine_cost = 0;
var book_number = 0;
function memDetailsReturn(Nbook,mem_id,mem_name,mname,lname,email,program,sem,count,fine,old_fine)
{   
    document.getElementById('hide_fine').value = "";
	document.getElementById('old_fine_return').innerHTML = "";	
	book_number = Nbook;
	var mem_id = mem_id;
	member_id = mem_id;
	fine_cost = fine;
	old_fine_cost = old_fine;
	var fine_function = "";
	if(old_fine_cost != 0 && fine_cost !=0)
	{
		fine_function = "( Including old fine: Rs. "+old_fine_cost+")";
		fine_cost = parseInt(old_fine_cost,10) + parseInt(fine_cost);
	}
	else if(old_fine_cost != 0 && fine_cost == 0)
	{
		document.getElementById('old_fine_return').innerHTML = "Old fine: Rs. "+old_fine_cost;	
	}
		document.getElementById('retrive_and_show').value = mem_id;	
		var mem_details = (document.getElementById('retrive_and_show').value );
		$.ajax({
			type:"post",
			url:"book_return_info.php",
			data:{details:mem_details},
			success: function(get_result)
			{
					$('#book_return_select').html(get_result);
			}
	});
	
	var mem_name = mem_name;
	var m = mname;
	var l = lname;
	var mem_email = email;
	var program = program;
	var sem = sem;
	var fine = fine;

	document.getElementById('return_fine').innerHTML="Total fine: Rs. "+fine_cost +"<span style='color:#F63; font-size:10px;'> "+ fine_function +"</span></br><input type='radio' onClick='r_fix();' id='fine1' name='fine'/><span style='font-size:12px; color:#093;'>Clear all fine</fine></br><input type='radio' id='fine2' name='fine' onClick='r_fix();'/><span style='color:#F65;'>Add on Account</span>";
		
	if(fine!=0)
	{
		$("#return_fine").show(200);
		$("#rt_btn").hide(200);
	}
	else
	{
		$("#return_fine").hide(200);
		$("#rt_btn").show(200);
		
	}
	
	$("#member_action_for_return").show(200);
	document.getElementById('mem_name_return').innerHTML=mem_name+" "+m+" "+l;
	document.getElementById('program_return').innerHTML=" "+program + " [ "+ sem+" ]";
	document.getElementById('mem_email_return').innerHTML="Email ID: "+mem_email;
	document.getElementById('mem_u_id_return').innerHTML="Unique ID: "+mem_id;
	document.getElementById('member_action_id_return').value = mem_id;
	
	
}  //perform book return operation on page book_return_info.php and fine check operation


function r_fix()
{
if(document.getElementById('fine2').checked == true) 
{ 
  $('#rt_btn').show(200); 
  document.getElementById('hide_fine').value = fine_cost; 
}
if(document.getElementById('fine1').checked == true) 
{
  $('#rt_btn').show(200);
  document.getElementById('hide_fine').value = 0;
}

}  /// Passing fine value or not to add in member account


function memDetailsReturnfor_renew(Nbook,mem_id,mem_name,mname,lname,email,program,sem,count)
{   
	book_number = Nbook;
	var mem_id = mem_id;
	document.getElementById('re_bid').value = mem_id;
	member_id = mem_id;
	var mem_name = mem_name;
	var m = mname;
	var l = lname;
	var mem_email = email;
	var program = program;
	var sem = sem;
	$("#s_r_b_d").show(200);
	document.getElementById('re_name').innerHTML=mem_name+" "+m+" "+l;
	document.getElementById('re_p_s').innerHTML=" "+program + " [ "+ sem+" ]";
	document.getElementById('re_email').innerHTML="Email ID: "+mem_email;
	document.getElementById('re_id').innerHTML="Unique ID: "+mem_id;
	document.getElementById('mem_id_get').value=mem_id;
	mem_details = document.getElementById('re_bid').value;
	$.ajax({
		type:"POST",
		url:"book_renew_info.php",
		data:{book_renew:mem_details},
		success: function(resp)
		{
			document.getElementById('re_b_show').innerHTML=resp;	
		}
		});
} 

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('info.php', load_data,  function(data) 
	 {
	$('#colum1').html(data);
						

 		});
	}, 1000);

</script>
</head>
<body>
<?PHP 
include 'header.php'; 
 include 'book_renew_main.php'; 
  include 'book_return_main.php'; 
   include 'book_issue_main.php'; 
    include 'edit_mem_book.php'; 
     include 'book_entry.php';
      include 'member_entry.php';  
		include 'get_details.php';
?>
<div id="Main_container">
<div id="controller">
<div id="colum1">

</div>
<div class="row">
				<div id="book_renew" onclick="javascript:toggleSlideBox('book_renew_div');" >	
                	<div class="img"><img src="images/home_icons (1).png" height="60" width="81" style="margin:40px;"/></div>
                    	<div class="name"> Renovar Libro</div>
                </div>
				<div id="book_return" onclick="javascript:toggleSlideBox('book_return_div');">
 					 <div class="img">	
                     	<img src="images/stick_figure_carrying_book_load_400_clr_6351.png" height="75" 
                        	width="80" style="margin:35px;"/>	
                     </div>
               			 <div class="name">Devolución</div>
                </div>
			    <div id="book_issue" onclick="javascript:toggleSlideBox('book_issue_div');">
               		<div class="img"><img src="images/emblem_library.png" height="55" width="75" style="margin:42px;"/></div>
                    <div class="name">Adquirir libro</div>
                </div>
</div>
<div class="row">
				<div id="remove" onclick="javascript:toggleSlideBox('bs_remove_div');"><div class="img"><img src="images/e1.png" height="60" width="62" style="margin:44px 0 0 56px;"/></div>
											<div class="name" style="margin-top:-12px; line-height:0.9em;">Edit<br />
                                            Miembro / Libro</div>
				</div>
				<div id="new_student" onclick="javascript:toggleSlideBox('member_entry_div');"><div class="img"><img src="images/picture-of-school-pupil-9.png" height="60" width="60" 
                							style="margin:45px 48px;"/>
                                       </div><div class="name">Crear miembro</div>
                </div>
                <div id="new_book" onclick="javascript:toggleSlideBox('book_entry_div');"><div class="img"><img src="images/Address-book-new.png" height="54" width="57" 
                                                        style="margin:45px;"/>
                                   </div><div class="name">Crear libro</div>
                </div>
</div>
<div class="row">
			    <div id="setting">
                		<a href="setting.php">
                        		<div class="img"><img src="images/setting.png" height="50" width="50" 
                                style="margin:40px 40px 40px 52px ;"/></div>
                       </a>
					   <div class="name">&nbsp;&nbsp;Ajustes</div>
                </div>
               <div style="float:right; margin:4px; height:16px; width:16px;"> 
                </div>
				 <div id="notice" onclick="javascript:toggleSlideBox('get_details');" >
                	<div class="img"><img src="images/details.png" height="60" width="60" style="margin:45px;"/></div>
                    	<div class="name" >Obtén detalles</div>
                </div>
</div><!--Colum2 Div ends from here--->
</div><!--End of controller div from here-->
</div><!--Main_container Div ends from here-->
 </body>
</html>