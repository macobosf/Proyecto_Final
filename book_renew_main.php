<style>
#renew_tick_error_show{float:right; margin:-190px 60px 0 10px; height:20px; padding:5px; display:none; background:#090; color:#FFF; border-radius:4px; font-weight:bold;}

</style>
<div id="book_renew_div">
	<div class="menu_header" ><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Renovar libro / s de miembros</div><div class="close" onclick="javascript:toggleSlideBox('book_renew_div');">X</div></div>

     <div style="height:490px; width:720px; margin:0 auto;  ">
     <div id="book_renew_div_control" style="height:300px; width:600px;  margin:10px;">
     <div id="mem_srh" style="margin:0 auto; width:430px; ">
<div  style="height:305px; width:434px; border-radius:6px;  background:#EFEFEF; padding:2px 0 0 1px; border:1px solid #FFF;">
<input type="text" id="book_renew_search" style="width:430px; border-radius:4px; border:1px solid #999; height:35px;"  placeholder="Enter member details: ID, Name, Email, Phone"/> 
<div id="show_search_renew_book_details"  style="height:300px; width:430px; margin-left:1px;">

</div>
</div>
<div style="height:160px; width:760px; margin-left:-120px;">
<div id="s_r_b_d" style="height:150px; width:760px; display:none;   background:#EFEFEF; border:1px solid #FFF; border-radius:4px; margin-top:10px; " >
<div style="height:90%; width:280px;  margin:10px;  float:left; ">
<div><span id="re_name" style="font-size:16px; font-weight:bold; color:#161616; ">
</span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="re_p_s" style="font-size:12px; color:#3E3E3E; "></span></div>
<div  id="re_email" style="font-size:13px; font-weight:700; color:#383838;"></div>
<div id="re_id" style="font-size:13px; font-weight:700; color:#383838;"></div>
<div style="font-size:13px; font-weight:700; color:#FF0000; margin-top:15px;"></div>
</div>
<div  style="height:96%; border-left:1px #999999 dotted; width:450px; float:right; padding:4px;  ">
<form  method="post"><input type="text" id="re_bid" hidden="hidden" />
<input type="text" id="mem_id_get" hidden="hidden" />
<div id="re_b_show" style="height:70px; width:100%; "></div>
<div style=" float:right;" >
<div style="margin:40px 0 0 -80px; position:fixed;">
<input type="submit" value="Renew" onclick="return renew_tick()" style=" height:30px; width:70px; background:#E9E9E9; border:1px solid #666; border-radius:4px;"/>
</div>
</div>
<div ></div>
</form>
</div>
</div><!--End of member_action_for_renew div from here--->
<div id="renew_tick_error_show">Renew Successful</div>
</div>
</div>
</div>
</div>       
</div><!--End of book_renew_div from here-->
<script>
var checkedValue;
function renew_tick()
{ 
	var mem_id = document.getElementById('mem_id_get').value;
 	 var checkedValue = null; 
	 var inputElements = document.getElementsByClassName('renew_book_Checkbox');
	 for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value+","+checkedValue;

      }
	}
	if(checkedValue == null || checkedValue == "")
	{
		alert("Please choose book/s for renew");
		return false;
	}else{
			   $.ajax({
			   type:"POST",
			   url:"perform_renew_tick.php",
			   data:{RenewtickValue:checkedValue,sentMemDetails:mem_id},
			   success: function(res)
			   {
				 $("#renew_tick_error_show").show(50);
				 setTimeout("location.reload(true);",800);
				 return false;
				
			   }	   
			   });
	}

	return false;	
}
</script>