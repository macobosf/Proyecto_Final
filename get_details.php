<?PHP $m_image_path = ""; ?>
<script>
$(document).ready(function() {
	$("#get_srh").keyup(function()
	{
		if(document.forms["srh_form"]["get_srh_details"].value == "book")
		{
		var user_input_data = $("#get_srh").val();
		$.ajax({
			type:"POST",
			url:"book_details_searching.php",
			data:{Usersrh:user_input_data},
			success: function(result)
			{
					
				$("#get_srh_result_for_show").html(result);
			}
			
			
		});
	}
	else if(document.forms["srh_form"]["get_srh_details"].value == "member")
		{
		var user_input_data = $("#get_srh").val();
		$.ajax({
			type:"POST",
			url:"member_details_searching.php",
			data:{Usersrh:user_input_data},
			success: function(result)
			{
					
				$("#get_srh_result_for_show").html(result);
			}
			
			
		});
	}	
			
	
	});
    
});  // Ajax for search member connected with member_searching.php
function book_srh_Details(b_id,b_name,b_au,b_r_q,b_avia,b_lang,b_price,b_edi,b_r_time,b_isbn)
	{
		$('#show_details_member').hide(800);
		$('#show_details').slideDown(1000);
		document.getElementById('b_id').innerHTML = "Book Unique ID: "+b_id;
		document.getElementById('b_name').innerHTML = "Book Name: "+b_name;
		document.getElementById('b_price').innerHTML = "Book Price: "+b_price;
		document.getElementById('au_name').innerHTML = "Author Name: "+b_au;
		document.getElementById('b_avi').innerHTML = "Book Available: "+b_avia;
		document.getElementById('b_re_qu').innerHTML = "Registered Book's Quantity: "+b_r_q;
		document.getElementById('b_isbn').innerHTML = "Book ISBN Number: "+b_isbn;
		document.getElementById('b_lan').innerHTML = "Language: "+b_lang;
		document.getElementById('b_r_time').innerHTML = "Registered Time: "+b_r_time;
		document.getElementById('b_edition').innerHTML = "Book Edition: "+b_edi;
		var book_id = b_id;
		$.ajax({
			type:"POST",
			url:"book_history_searching.php",
			data:{book_activities:book_id},
			success: function(show_tran)
			{
			 document.getElementById('show_b_his').innerHTML = show_tran;
			}
			
			});
		
	}
var m_image_path = "";
function mem_srch_Detail_show(b_cou,m_id,m_dob,m_f_n,m_m_n,m_l_n,m_gen,m_email,m_cou,m_pro,m_sem,m_ac,phone,m_dis,m_pla,m_img_path)
{		$('#show_details').hide(800);
		$('#show_details_member').slideDown(1000);
		document.getElementById('mem_book_details').innerHTML = "Number of Books: "+b_cou;
		document.getElementById('mem_id').innerHTML = "Member ID: "+m_id;
		document.getElementById('m_dob').innerHTML = "Date Of Birth: "+m_dob;
		document.getElementById('mem_name_details').innerHTML = "Name: "+m_f_n+" "+m_m_n+" "+m_l_n;
		document.getElementById('mem_sex_details').innerHTML = "Gender: "+m_gen;
		document.getElementById('mem_email_details').innerHTML = "Email ID: "+m_email;
		document.getElementById('mem_cou_details').innerHTML = "Country: "+m_cou;
		document.getElementById('mem_pro_details').innerHTML = "Program: "+m_pro;
		document.getElementById('mem_sem_details').innerHTML = "Semester: "+m_sem;
		document.getElementById('mem_ac_details').innerHTML = "Account Registered On: "+m_ac;
		document.getElementById('mem_con_details').innerHTML = "Contact Number: "+phone;
		document.getElementById('mem_dis_details').innerHTML = "District: "+m_dis;
		document.getElementById('mem_pla_details').innerHTML = "Place: "+m_pla;
		document.getElementById('img_path').src = m_img_path;
		
		var mem_u_id = m_id;
		$.ajax({
			type:"POST",
			url:"mem_history_searching.php",
			data:{mem_activities:mem_u_id},
			success: function(show_tran)
			{
			 document.getElementById('show_m_his').innerHTML = show_tran;
			}
			
			});
}
</script>
<div id="get_details" >
<div class="menu_header"><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Obtener miembros o detalles del libro</div><div class="close" onclick="javascript:toggleSlideBox('get_details');">X</div></div>
<div style="height:490px; border-radius:0 0 4px 4px; width:100%; ">
 <div style="height:480px;  border-right:1px #B9B9B9 ridge; width:44%;  float:left;">
 	<div style=" margin:10px; text-align:center; font-size:16px; font-weight:bold; color:#333;"><div style="float:left; 
    margin:3px 0 10px 110px;">Detalles de&nbsp;&nbsp;</div>
    <div style="float:left;"><form name="srh_form"><select style="height:24px; width:90px; border-radius:4px;" name="get_srh_details"><option  value="book">Libro</option><option value="member">miembro</option></select></form></div>
        </div>
    <div style="text-align:center;"> <input style="height:30px; width:380px; border:1px #999999 solid; border-radius:4px; " placeholder="Search and select" type="text" name="get_srh"  id="get_srh"/> </div>
    <div style="height:480px; width:96%; text-align:center;  margin:0 auto;"  id="get_srh_result_for_show">   
    </div>
  </div>
 <style>
 .a{height:20px; width:100%; background:#E2E2E2; padding:5px; font-size:12px; font-weight:600;}
 .b{height:20px; width:100%; background:#D7D7D7;  padding:5px; font-size:12px; font-weight:600;}
 table .heading{background:#333; color:#CCC; border-right:1px solid #000;}
 .t{background:#FEFAE0; }
 .d{border-bottom:1px solid #333; border-right:1px solid #333;}
 #show_m_his tr{font-size:12px; }

 </style> 
 <div style="height:490px; width:55%;  float:left; cursor:not-allowed;">
 <div id="show_details" style="height:480px; width:98%; margin:0 auto; display:none; cursor:pointer;">
 <div class="a"><div id="b_id" style="float:left;"></div>
 	<div id="b_re_qu" style="float:right; margin-right:40px; text-align:left;"></div></div>
  <div class="b"><div  id="b_name" style="float:left;"></div>
 	<div id="b_price" style="float:right; margin-right:40px; text-align:left;"></div></div>
    <div class="a" ><div id="au_name"style="float:left;"></div>
 	<div id="b_avi" style="float:right; margin-right:40px; text-align:left;"></div></div>
  <div class="b"><div id="b_isbn" style="float:left;"></div>
 	<div id="b_lan" style="float:right; margin-right:40px; text-align:left;"></div></div>
  <div class="a"><div id="b_r_time" style="float:left;"></div>
 	<div id="b_edition" style="float:right; margin-right:40px; text-align:left;"></div></div>
  <div class="b" style="height:324px; background:#AEAEAE; border-radius:0 0 4px 4px;">
  
 <!--
  <div style="height:20px; width:475px; border-radius:4px 4px 0 0;
   border-bottom:1px solid #000; color:#FEFAE0; padding:5px; background:#333;">Book's History</div>
      <table width="100%"  cellspacing="0" cellpadding="6" id="show_b_his">
     </table>
     -->
 </div> 

  </div>
  <div id="show_details_member" style="height:480px; width:98%; margin:0 auto; display:none;  cursor:pointer;">
 		<div style="float:right; height:110px; width:106px; border:1px solid #999; background:#D8D8D8; border-radius:2px; margin-top:30px;" >
        <img id="img_path" height="110" width="106"/>
 		</div>
<div class="a" ><span id="mem_id"></span><span id="m_dob" style="float:right; margin-right:-100px;"></span></div>
<div class="b"><span  id="mem_name_details"></span><span id="mem_sex_details" style="float:right; margin-right:20px;"></span></div>
<div class="a"><span id="mem_email_details"></span><span id="mem_cou_details" style="float:right; margin-right:20px;"></span></div>
<div class="b"><span id="mem_pro_details"></span><span id="mem_sem_details" style="float:right; margin-right:20px;"></span></div> <div class="a"><span id="mem_ac_details"></span><span id="mem_book_details" style="float:right; margin-right:20px;"></span></div>
<div class="b"><span id="mem_con_details"></span><span id="mem_dis_details" style="margin-left:60px;"></span><span id="mem_pla_details" style="float:right; margin-right:15px;"></span></div>
  <div style="height:304px; width:496px; background:#AEAEAE; border-radius:0 0 4px 4px;">  
 <!--
   <div style="height:20px; width:475px; margin-left:4px; border-radius:4px 4px 0 0;
   border-bottom:1px solid #000; color:#FEFAE0; padding:5px; background:#333;">Member's History</div>
      <table width="485px"  cellspacing="0" cellpadding="6" id="show_m_his" style="margin-left:4px;">
     </table>
     -->
	</div> 
    
    </div>
     </div>
 </div>
</div><!--End of notice_div from here-->