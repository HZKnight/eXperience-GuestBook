<?php if(!class_exists('raintpl')){exit;}?>        <table border="0" cellspacing="1" cellpadding="0" width="760px" align="center" bgcolor="#85b0e4">
		<tr>
			<td id="tb1" width="100%"><b>Inserisci un nouvo messaggio!</b></td>
		</tr>
	</table>
	<table width="760px" cellpadding=4 cellspacing=1 border=0 height=250  bgcolor="#85b0e4" align="center">
		<tr>
			<td width=50% align="left" bgcolor="#c6e1fb">
                            <form action='?job=send' method='POST' name=guest>
                                <br><b>Nome o Nick:</b>*<br><input type='text' name='name' value='<?php echo $name;?>' required/>
				<br><b>E-mail:</b><br><input type='text' name='email' value='<?php echo $email;?>'>
				<br><b>Nazione:</b><br><input type='text' name='place' value='<?php echo $place;?>'>
				<br><b>Messaggio:</b>*<br>
				<textarea cols='43' rows='10' name=message required><?php echo $message;?></textarea><br><br>
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
                                                        <?php echo $info;?>
              					</td>
					</tr>
					<tr>
						<td height=50% align=center valign=top>
							<br><br>
							<hr id="sep" style="background-color:#85b0e4; border:none;" color="#85b0e4" size="2">
							<b>Smileys:</b><br><br>
							<script language="JavaScript" src="tpl/script.js" type="text/javascript"></script>
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
							<a href="javascript:setSmile(' :) ')"><img src="tpl/../img/smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-D ')"><img src="tpl/../img/bigsmile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-O ')"><img src="tpl/../img/omg.png" border="0"/></a>
							<a href="javascript:setSmile(' :P ')"><img src="tpl/../img/toung.png" border="0"/></a>
							<a href="javascript:setSmile(' ;) ')"><img src="tpl/../img/wink.png" border="0"/></a>
							<a href="javascript:setSmile(' :( ')"><img src="tpl/../img/sad_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-S ')"><img src="tpl/../img/confused.png" border="0"/></a>
							<a href="javascript:setSmile(' :| ')"><img src="tpl/../img/what_smile.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' :_( ')"><img src="tpl/../img/cry_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-$ ')"><img src="tpl/../img/red_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' (H) ')"><img src="tpl/../img/shades_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-" ')@><img src="tpl/../img/angry_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-# ')"><img src="tpl/../img/47_47.png" border="0"/></a>
							<a href="javascript:setSmile(' 8o| ')"><img src="tpl/../img/48_48.png" border="0"/></a>
							<a href="javascript:setSmile(' 8-| ')"><img src="tpl/../img/49_49.png" border="0"/></a>
							<a href="javascript:setSmile(' ^o) ')"><img src="tpl/../img/50_50.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' +o( ')"><img src="tpl/../img/52_52.png" border="0"/></a>
							<a href="javascript:setSmile(' :^| ')"><img src="tpl/../img/71_71.png" border="0"/></a>
							<a href="javascript:setSmile(' *-) ')"><img src="tpl/../img/72_72.png" border="0"/></a>
							<a href="javascript:setSmile(' 8-) ')"><img src="tpl/../img/75_75.png" border="0"/></a>
							<a href="javascript:setSmile(' |-) ')"><img src="tpl/../img/77_77.png" border="0"/></a>
							<a href="javascript:setSmile(' (A) ')"><img src="tpl/../img/angel_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' (6) ')"><img src="tpl/../img/devil_smile.png" border="0"/></a>
							<a href="javascript:setSmile(' :-* ')"><img src="tpl/../img/51_51.png" border="0"/></a>
							<br>
							<a href="javascript:setSmile(' <:o) ')"><img src="tpl/../img/74_74.png" border="0"/></a>
							<a href="javascript:setSmile(' (") ')@><img src="tpl/../img/cat.png" border="0"/></a>
							<a href="javascript:setSmile(' (&) ')"><img src="tpl/../img/dog.png" border="0"/></a>
							<a href="javascript:setSmile(' (S) ')"><img src="tpl/../img/moon.png" border="0"/></a>
							<br><br>
							<a href="index.php">[Torna al GuestBook]</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>