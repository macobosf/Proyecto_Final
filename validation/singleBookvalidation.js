function validateBookForm() {
if(document.forms["one_book_entry"]["one_book_name"].value == "" || document.forms["one_book_entry"]["one_book_name"].value == null) 
   {
        document.getElementById('error_name').innerHTML=" required *";
		one_book_name.focus()
        return false;
    }
if(document.forms["one_book_entry"]["oneBook_author"].value == "" || document.forms["one_book_entry"]["oneBook_author"].value == null) 
   {
       document.getElementById('error_author').innerHTML=" required *";
		oneBook_author.focus()
        return false;
    }
if(document.forms["one_book_entry"]["OneBooklanguage"].value == "language" ) 
	{
		document.getElementById('error_language').innerHTML=" required *";
		OneBooklanguage.focus()
        return false;
	}
if(document.forms["one_book_entry"]["OneBookprice"].value == ""  || document.forms["one_book_entry"]["OneBookprice"].value == null ) 
	{
		document.getElementById('error_price').innerHTML=" required *";
		OneBookprice.focus()
        return false;
	}

}