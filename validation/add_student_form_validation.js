function validateForm() {
    if(document.forms["myForm"]["fname"].value == "" || document.forms["myForm"]["fname"].value == null) 
   {
        alert("You can't leave first name field!!!\n\n");
		fname.focus()
        return false;
    }
	if(document.forms["myForm"]["lname"].value == "" || document.forms["myForm"]["lname"].value == null) 
	{
		alert("You can't leave last name field!!!\n\n");
		lname.focus()
        return false;
	}
	if(document.forms["myForm"]["mem_faculty"].value == "faculty" ) 
	{
		document.getElementById('error_faculty').innerHTML=" required *";
		mem_faculty.focus();
        return false;
	}
	if(document.forms["myForm"]["mem_program"].value == "program" ) 
	{
		document.getElementById('error_program').innerHTML=" required *";
		mem_program.focus();
        return false;
	}
	if(document.forms["myForm"]["mem_semester"].value == "semester" ) 
	{
		document.getElementById('error_semester').innerHTML=" required *";
		mem_semester.focus();
        return false;
	}
	if(document.forms["myForm"]["batch"].value == "year" ) 
	{
		document.getElementById('error_batch').innerHTML=" Select member's batch *";
		batch.focus();
        return false;
	}
	if(document.forms["myForm"].gender[0].checked == false && document.forms["myForm"].gender[1].checked == false ) 
	{
		document.getElementById('error_gender').innerHTML=" required *";
		return false;
	}
	if(document.forms["myForm"]["birth_day"].value == "Day" ) 
	{
		document.getElementById('error_dob').innerHTML=" required *";
		birth_day.focus();
        return false;
	}
	if(document.forms["myForm"]["birth_month"].value == "Month" ) 
	{
		document.getElementById('error_dob').innerHTML=" required *";
		birth_month.focus();
        return false;
	}
	if(document.forms["myForm"]["birth_year"].value == "Year" ) 
	{
		document.getElementById('error_dob').innerHTML=" required *";
		birth_year.focus();
        return false;
	}
	if(document.forms["myForm"]["your_country"].value == "country" )
	{
		document.getElementById('error_country').innerHTML=" required *";
		your_country.focus();
        return false;
	}
	
	if(document.forms["myForm"]["district"].value == "" || document.forms["myForm"]["district"].value == null)
	{
		document.getElementById('error_district').innerHTML=" required *";
		district.focus();
        return false;
	}
	if(document.forms["myForm"]["place"].value == "" || document.forms["myForm"]["place"].value == null)
	{
		document.getElementById('error_place').innerHTML=" required *";
		place.focus();
        return false;
	}
		if(document.forms["myForm"]["email"].value == "" || document.forms["myForm"]["email"].value == null)
	{
		document.getElementById('error_email').innerHTML=" required *";
		email.focus();
        return false;
	}
	if(document.forms["myForm"]["phone"].value == "")
	{
		document.getElementById('error_phone').innerHTML=" required *";
		phone.focus();
        return false;
	}
		 if(document.forms["myForm"]["phone"].value.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)) 
        {  
     		  
        }  
      else  
        {  
        document.getElementById('error_phone').innerHTML="  Invalid"; 
		return false;  
        } 
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))  
 		 {  
   			  return true;
 		 }
		 else{  
   			 document.getElementById('error_email').innerHTML="  Invalid";
			 email.focus();
  			  return false;  
		}  

}
