        <table border="0" cellspacing="1" cellpadding="0" width="760px" align="center" bgcolor="#85b0e4">
		<tr>
			<td id="tb1" width="100%"><b>Inserisci un nouvo messaggio!</b></td>
		</tr>
	</table>
	<table width="760px" cellpadding=4 cellspacing=1 border=0 height=250  bgcolor="#85b0e4" align="center">
		<tr>
			<td width=50% align="left" bgcolor="#c6e1fb">
                            <form action='?job=send' method='POST' name=guest>
                                <br><b>Nome o Nick:</b>*<br><input type='text' name='name' value='{$name}' required/>
				<br><b>E-mail:</b><br><input type='text' name='email' value='{$email}'>
				<br><b>Nazione:</b><br><input type='text' name='place' value='{$place}'>
				<br><b>Messaggio:</b>*<br>
				<textarea cols='43' rows='10' name=message required>{$message}</textarea><br><br>
				<input type='submit' name='submit' class='submit' value='Invia!'>
				<input type='reset' name='reset' class='submit' value='Cancella'>
                            </form>
			</td>
			
                        <td valign=top width=50% bgcolor="#d6e9fc">
				<table width=100% border=0 cellpadding=0 cellspacing=0 height=100%>
					<tr>
						<td valign=top height=50% align=center>
							I campi contrassegnati con l'asterisco sono obbligatori. <br><b>N.B.</b>:Non sei obbligato ad inserire il tuo indirizzo email, ma se lo inserisci controlla che sia corretto!
							<hr id="sep" style="background-color:#85b0e4; border:none;" color="#85b0e4" size="2">
							<br>
							<br>
                                                        {$info}
              					</td>
					</tr>
					<tr>
						<td height=50% align=center valign=top>
							<br><br>
							<hr id="sep" style="background-color:#85b0e4; border:none;" color="#85b0e4" size="2">
							<b>Smileys:</b><br><br>
							<script language="JavaScript" src="../script.js" type="text/javascript"></script>
							<script language="JavaScript" type="text/javascript">
							<!--
								function setSmile(str)
								{
									obj = document.guest.message;
									obj.focus();
									obj.value =	obj.value + str;
								}
							//-->
							</script>
							<a href="javascript:setSmile(' :) ')"><img src="../img/smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-D ')"><img src="../img/bigsmile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-O ')"><img src="../img/omg.png" border="0"/></a>
							<a href="javascript:setSmile(' :P ')"><img src="../img/toung.png" border="0"/></a>
							<a href="javascript:setSmile(' ;) ')"><img src="../img/wink.png" border="0"/></a>
							<a href="javascript:setSmile(' :( ')"><img src="../img/sad_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-S ')"><img src="../img/confused.png" border="0"/></a>
							<a href="javascript:setSmile(' :| ')"><img src="../img/what_smile.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' :_( ')"><img src="../img/cry_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-$ ')"><img src="../img/red_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' (H) ')"><img src="../img/shades_smile.png" border="0"/></a>
							<a href='javascript:setSmile(" :-@ ")'><img src="../img/angry_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-# ')"><img src="../img/47_47.png" border="0"/></a>
							<a href="javascript:setSmile(' 8o| ')"><img src="../img/48_48.png" border="0"/></a>
							<a href="javascript:setSmile(' 8-| ')"><img src="../img/49_49.png" border="0"/></a>
							<a href="javascript:setSmile(' ^o) ')"><img src="../img/50_50.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' +o( ')"><img src="../img/52_52.png" border="0"/></a>
							<a href="javascript:setSmile(' :^| ')"><img src="../img/71_71.png" border="0"/></a>
							<a href="javascript:setSmile(' *-) ')"><img src="../img/72_72.png" border="0"/></a>
							<a href="javascript:setSmile(' 8-) ')"><img src="../img/75_75.png" border="0"/></a>
							<a href="javascript:setSmile(' |-) ')"><img src="../img/77_77.png" border="0"/></a>
							<a href="javascript:setSmile(' (A) ')"><img src="../img/angel_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' (6) ')"><img src="../img/devil_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-* ')"><img src="../img/51_51.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' <:o) ')"><img src="../img/74_74.png" border="0"/></a>
							<a href='javascript:setSmile(" (@) ")'><img src="../img/cat.png" border="0"/></a>
							<a href="javascript:setSmile(' (&) ')"><img src="../img/dog.png" border="0"/></a>
							<a href="javascript:setSmile(' (S) ')"><img src="../img/moon.png" border="0"/></a>
							<br><br>
							<a href="index.php">[Torna al GuestBook]</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>