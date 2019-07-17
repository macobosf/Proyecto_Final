<div id="member_entry_div" style="background:#E1E1E1;  padding-bottom:20px;">
<div class="menu_header"><div style="height:30px; width:auto; font-weight:bold; padding:4px 10px 0 10px; border-radius:5px; color:#FFF; font:1.4em; float:left; ">Registrar Nuevo Miembro</div><div class="close" onclick="javascript:toggleSlideBox('member_entry_div');">X</div></div>
<form   method='post' name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
<div style="float:right; font-size:10px; color:#999; margin-right:50px;"><b style="font-size:16px; color:#000;">*</b> Campos requeridos</div>
<div class="row2" style="border-radius:5px 5px 0 0;  margin-top:15px;"><div class="hello"><div class="first">ID único del miembro: </div><div class="second" style="color:#6C0; background:#22C10B; color:#FFF; width:auto; height:25px; 
padding:5px 10px 0 18px; border-radius:6px;">
<div id="content" ></div>
<input type="hidden" name="content1" id="content1" />
</div></div></div>
<div class="row1" ><div class="hello"><div class="first" >Nombre: *</div><div class="second" style="margin-top:5px;"><input type='text' id='fname' name="fname"  maxlength="13" placeholder="" style="height:26px; margin-top:-10px; width:110px; border:1px #ABB0F8 solid; border-radius:4px;"/>
<input type="text" name="mname" maxlength="10"  placeholder="" style="height:26px; margin-top:-10px; 
width:90px; border:1px #ABB0F8 solid; border-radius:4px;"/>
<input type="text" name="lname" id="lname" placeholder="" maxlength="13" style="height:26px; margin-top:-10px; width:110px; border:1px #ABB0F8 solid; border-radius:4px;"/></div></div></div>

<div class="row2" style="">
	<div class="hello" style=" width:100%;">
    <div class="first" >Género: *</div>
    <div class="second" style="margin-top:5px; width:250px;">
<input  type="radio" name="gender" id="gender" value="Male"/>Masculino&nbsp;&nbsp;&nbsp;<input type="radio" name="gender"value="Female"  />
Femenino<span class="error_show" id="error_gender" ></span>
</div>
Fecha de nacimiento: * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="birth_day"
 style="height:25px;    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;" class="formFields" id="birth_day">
<option value="Day">Dia</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> 
        <select name="birth_month" style="height:25px;     -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;" class="formFields" id="birth_month">
<option value="Month" >Mes</option>
<option value="01">enero</option>
<option value="02">febrero</option>
<option value="03">marzo</option>
<option value="04">abril</option>
<option value="05">Mayo</option>
<option value="06">junio</option>
<option value="07">Julio</option>
<option value="08">agosto</option>
<option value="09">septiembre</option>
<option value="10">octubre</option>
<option value="11">noviembre</option>
<option value="12">diciembre</option>
</select> 
<select name="birth_year" style="height:25px;    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -khtml-border-radius: 3px;
    border-radius: 3px;"  class="formFields" id="birth_year">
<option value="Year">Año</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
</select><span class="error_show" id="error_dob" ></span>
</div>
</div>
<div class="row1" style="">
	<div class="hello" style=" width:100%;">
    <div class="second" style="margin-top:1px; width:250px;">
            
               
                </select><span class="error_show" id="error_country" ></span>
</div>

<span class="error_show" id="error_district" ></span>

</div>
</div>
<div class="row2" style="">
	<div class="hello" style=" width:100%;">
    
    <div class="second" style="margin-top:-3px; width:250px;">
            <span class="error_show" id="error_place" ></span>       
</div>
          Número de teléfono móvil: *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='phone' 
id='phone' maxlength="80" placeholder="Member's Phone No." style="height:26px; margin-top:-4px;  width:150px; border:1px #ABB0F8 solid; border-radius:4px;"/><span class="error_show" id="error_phone" ></span>
</div>
</div>


<div class="row1" style="">
	<div class="hello" style=" width:100%;">
    <div class="first" >Correo electrónico: *</div>
    <div class="second" style="margin-top:-4px; width:500px;">
            <input type='text' name='email' id='email'  maxlength="80" placeholder="Member's Email ID" style="height:26px; 
            width:250px; border:1px #ABB0F8 solid; border-radius:4px;"/><span class="error_show" id="error_email" ></span>       
</div></div></div>
<div class="row2" style="">
	<div class="hello" style=" width:100%;">
    <div class="first" >Foto :</div>
    <div class="second" style="margin-top:5px; width:250px;">
          <input type="file" name="fileField" id="fileField" />     
</div>
</div>
</div>


<div class="row1" style="border-radius: 0 0 5px 5px; height:60px;"><div class="hlw"><div class="first"></div><div class="second"><input type="submit"  name="Guardar" value="Guardar"   style="height:35px; width:90px; border:1px #666666 solid; background:#F2F2F2; border-radius:5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div></div>
</form>
</div><!--End of member_entry div from here-->