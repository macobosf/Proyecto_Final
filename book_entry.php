<div id="book_entry_div" style="margin-bottom:400px;">
 <div class="menu_header"><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Registro Libro/s</div><div class="close" onclick="javascript:toggleSlideBox('book_entry_div');">X</div></div>
<div id="select_choice" style="margin:10px; border-radius:4px; text-align:center; padding-top:10px; font-size:16px; font-weight:bold; color:#CCCCCC; background:#008080; height:30px; width:280px; float:left;"> <input type="radio" name="choice" checked="checked" onclick="javascript:choice('one_book')"  />Ingreso libro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="choice" 
onclick="javascript:choice('more_book')" />Ingreso libros</div>
<div id="notice_user" style="margin:10px; border-radius:4px; text-align:center; padding-top:10px; font-size:16px; font-weight:bold;  background:#008080; height:30px; background:none; color:#993333; float:left; width:500px; display:none;">Libros iguales
</div>

<form id="one_book"  method='post' name="one_book_entry"  onsubmit="return validateBookForm()" style="padding-bottom:20px; padding-top:50px; ">
<div style="float:right; font-size:10px; color:#999; margin:20px 50px;"><b style="font-size:16px; color:#000;">*</b> Campos requeridos</div>
<div class="row2" style="border-radius:5px 5px 0 0;  margin-top:15px;"><div class="hello"><div class="first">ID único del libro: </div><div class="second" id="book_unique_id" style="color:#6C0; background:#22C10B; color:#FFF; width:auto; height:25px; 
padding:5px 10px 0 18px; border-radius:6px;">
</div></div></div>
<div class="row1" ><div class="hello"><div class="first" >Nombre del libro: *</div><div class="second" style="margin-top:5px;"><input type='text' id='one_book_name' name="one_book_name"  maxlength="100" placeholder="Ingrese el nombre del Libro" style="height:26px; margin-top:-10px; 
width:260px; border:1px #ABB0F8 solid; border-radius:4px;"/><span id="error_name" class="error_show"></span>
</div></div></div>
 <div class="row2"><div class="hello"><div class="first">Nombre del autor: *</div><div class="second" > <input type="text"
id="oneBook_author" maxlength="100"   name="oneBook_author" placeholder="Escritor de Libro" style="height:26px; margin-top:-30px; width:260px; border:1px #ABB0F8 solid; border-radius:4px;" /><span id="error_author" class="error_show"></span>  </div></div></div>
<div class="row1"><div class="hlw"><div class="first">Idioma: *</div><div class="second"> <select name="OneBooklanguage" id="OneBooklanguage" style="height:25px;    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;">
                <option value="language">Seleccionar el idioma del libro</option>
                <option value="Espanol">Español</option>
                 <option value="English">Inglés</option>
</select><span id="error_language" class="error_show"></span></div></div></div>
<div class="row2"><div class="hello"><div class="first">    Precio del libro: *</div><div class="second" > <input type="text"
  name="OneBookprice" id="OneBookprice" placeholder="$"  style="height:26px; margin-top:-10px; padding-bottom:-10px; width:60px; border:1px #ABB0F8 solid; border-radius:4px;" /><span id="error_price" class="error_show"></span> </div></div></div>
                
<div class="row1"><div class="hello"><div class="first">Número de ISBN: </div>
<div class="second"><input type='text' name='OneBookisbn' id='OneBookisbn'  maxlength="80" placeholder="Numero ISBN " style="height:26px; margin-top:-10px; width:250px; border:1px #ABB0F8 solid; border-radius:4px;"/>
</div>
</div></div>

<div class="row2"><div class="hello"><div class="first">Edición: </div><div class="second">
<select name="onebookedition" style="height:25px;    -moz-border-radius: 3px; 
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;">
	<option value="Unknow">Desconocido</option>
    <option value="1st">1ra</option>
    <option value="2nd">2da</option>
    <option value="3rd">3ra</option>
	<option value="4th">4ta</option>
    <option value="5th">5ta</option>
    <option value="6th">6ta</option>
    <option value="Revised">Revisado</option>
</select>
</div></div></div>
<div class="row1" style="border-radius: 0 0 5px 5px; height:60px;"><div class="hlw"><div class="first"></div><div class="second"><input type="submit"  name="Guardar" value="Guardar"  style="height:35px; width:90px; border:1px #666666 solid; background:#F2F2F2; border-radius:5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div></div></div>
</form>


<form id="more_book"  method='post' name="More_book_entry_form" onsubmit="return validateMoreBookForm()" style="padding-bottom:20px;  padding-top:50px; 
display:none;">
<div style="float:right; font-size:10px; color:#999; margin:20px 50px;"><b style="font-size:16px; color:#000;">*</b>Campos requeridos</div>
<div class="row2" style="border-radius:5px 5px 0 0;  margin-top:15px;"><div class="hello"><div class="first">Cantidad de libros: *</div><div class="second"><input type="text" name='Morebook_quantity' id='Morebook_quantity'  maxlength="6" title="Enter the quantity of same books." style="height:26px;  width:40px; border:1px #ABB0F8 solid; border-radius:4px;"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Identificación única:&nbsp;&nbsp;&nbsp;&nbsp;
<span class="show_id" id="quantity_check_and_response"></span> <span class="error_show" id="error_msg_quantity" 
style="float:right;"></span>
</div>
</div></div>

<div class="row1" ><div class="hello"><div class="first" >Nombre del libro: *</div><div class="second" style="margin-top:5px;"><input type='text' id='More_book_name' name="More_book_name"  maxlength="100" placeholder="Ingrese Nombre" style="height:26px; margin-top:-10px; 
width:260px; border:1px #ABB0F8 solid; border-radius:4px;"/> <span class="error_show" id="error_msg_name"></span>
</div></div></div>
 <div class="row2"><div class="hello"><div class="first">Nombre del autor: *</div><div class="second" > <input type="text"
id="Books_author" maxlength="100"   name="Books_author" placeholder="Nombre Autor" style="height:26px; margin-top:-30px; width:260px; border:1px #ABB0F8 solid; border-radius:4px;" /><span class="error_show" id="error_msg_author"></span>  </div></div></div>
<div class="row1"><div class="hlw"><div class="first">Idioma: *</div><div class="second"> <select name="More_book_language" id="More_book_language" style="height:25px;    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;" />
                <option value="language">Seleccionar el idioma del libro</option>
                
                <option value="Español">Español</option>
                 <option value="English">Inglés</option>
</select><span class="error_show" id="error_msg_language"></span></div></div></div>


                
 <div class="row2"><div class="hello"><div class="first">Precio de cada libro: *</div><div class="second" > <input type="text"
  name="Books_price" id="Books_price" placeholder="$"  style="height:26px; margin-top:-10px; padding-bottom:-10px; width:60px; border:1px #ABB0F8 solid; border-radius:4px;" /> <span class="error_show" id="error_msg_price"></span> </div></div></div>
                
<div class="row1"><div class="hello"><div class="first">Número de ISBN: </div>
<div class="second"><input type='text' name='books_isbn' id='books_isbn'  maxlength="80" placeholder="Numero ISBN" style="height:26px; margin-top:-10px; width:250px; border:1px #ABB0F8 solid; border-radius:4px;"/>
</div>
</div></div>

<div class="row2"><div class="hello"><div class="first">Edición: </div><div class="second">
<select style="height:25px;    -moz-border-radius: 3px; 
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;" name="books_edition" id="books_edition">
	<option value="Unknow">Desconocido</option>
    <option value="1st">1ra</option>
    <option value="2nd">2da</option>
    <option value="3rd">3ra</option>
	<option value="4th">4ta</option>
    <option value="5th">5ta</option>
    <option value="6th">6ta</option>
    <option value="Revised">Revisado</option>
</select>
</div></div></div>
<div class="row1" style="border-radius: 0 0 5px 5px; height:60px;"><div class="hlw"><div class="first"></div><div class="second"><input type="submit"  name="Guardar" value="Guardar"  style="height:35px; width:90px; border:1px #666666 solid; background:#F2F2F2; border-radius:5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div></div></div>
</form>
</div><!--End of book_entry_div from here-->