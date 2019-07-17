function validateMoreBookForm() {
if(document.forms["More_book_entry_form"]["Morebook_quantity"].value == "" || document.forms["More_book_entry_form"]["Morebook_quantity"].value == null) 
   {
        document.getElementById('error_msg_quantity').innerHTML=" required *";
		Morebook_quantity.focus()
        return false;
    }
if(document.forms["More_book_entry_form"]["More_book_name"].value == "" || document.forms["More_book_entry_form"]["More_book_name"].value == null) 
   {
        document.getElementById('error_msg_name').innerHTML=" required *";
		More_book_name.focus()
        return false;
    }
if(document.forms["More_book_entry_form"]["Books_author"].value == "" || document.forms["More_book_entry_form"]["Books_author"].value == null) 
   {
        document.getElementById('error_msg_author').innerHTML=" required *";
		Books_author.focus()
        return false;
    }
if(document.forms["More_book_entry_form"]["More_book_language"].value == "language" ) 
	{
		document.getElementById('error_msg_language').innerHTML=" required *";
		More_book_language.focus()
        return false;
	}
if(document.forms["More_book_entry_form"]["Books_price"].value == ""  || document.forms["More_book_entry_form"]["Books_price"].value == null ) 
	{
		document.getElementById('error_msg_price').innerHTML=" required *";
		Books_price.focus()
        return false;
	}


}
