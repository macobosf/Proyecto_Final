<div id="book_issue_div" style="height:500px;">
  <div class="menu_header"><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Prestamo Libro</div><div class="close" onclick="javascript:toggleSlideBox('book_issue_div');">X</div></div>
  
  
<div id="container">
<div id="search_box">
<input type="text" id="input" name="input" class="input_text" placeholder="Miembro Detalles: ID, Nombre, Email, Telefono"/>
<input type="text"  id="book_input" name="book_input" class="input_text" placeholder="Detalles Libro: Autor, ID, Nombre, ISBN"/>
</div>
<div id="show_result">
</div>
<div id="book_show"></div>
</div>
<div id="run_action" style="height:99px; width:100%;">
<div id="member_action" style="height:90px;  float:left; display:none; margin-left:100px;  width:340px; background:#E1E1E1;
 border:1px solid #999999; border-radius:4px;">
<div id="mem_name" style="padding:10px 6px 0 10px; font-size:16px; font-weight:bold; float:left; "></div>
<div id="program" style="float:left; padding:13px 0 0 0; font-size:12px; color:#666; font-size:600;"></div>
<div id="mem_email" style="height:20px; font-size:14px; font-size:700; color:#666; margin:36px 0 0 10px;"></div>
<div id="mem_u_id" style="height:20px; font-size:14px; font-size:700; color:#666; margin-left:10px;"></div>
<input type="text" id="member_action_id" name="run_action_id" hidden="hidden" />
</div>
<div id="issue_confirm" style="float:right;">
<input type="submit" name="book_mem_fix" onclick="return validate_mem_book()" id="issue_fix" value="Confirm" style="height:32px;  margin:30px 16px 0 0; border-radius:4px; border:1px solid #999; " />
</div>
<div id="book_action" style="height:90px; float:right; display:none;  width:345px; margin-right:22px; background:#E1E1E1; border:1px solid #999999; border-radius:4px;">
<div id="book_name" style="padding:10px 6px 0 10px; font-size:16px; font-weight:bold; float:left; "></div>
<div id="book_author" style="float:left; padding:13px 0 0 0; font-size:13px; color:#666; font-weight:bold;"></div>
<div id="book_isbn" style="height:20px; font-size:14px; font-weight:bold; color:#666; margin:36px 0 0 10px;"></div>
<div id="show_id" style="height:20px; font-size:14px; font-weight:bold; color:#666; margin-left:10px;"></div>
<input type="text" id="book_action_id" name="run_book_id" hidden="hidden" />
</div>
</div>
<div style=" width:750px; margin-left:140px; height:40px;">
<div style="width:340px; float:left; color:#E96025; font-size:16px; font-weight:bold;" id="member_error_show">&nbsp;
</div><div style="width:200px; float:left; color:#E96025; font-size:16px; font-weight:bold;" id="book_error_show">&nbsp;</div>
<div style="width:180px; font-size:16px; font-weight:bold; float:left; display:none; color:#FFFFFF; height:20px; background:#057A0C; border-radius:4px; padding:5px;" id="sucess_show">&nbsp;Datos archivados con éxito</div></div>
</div><!--End of book_issue_div from here-->