	<p>

		{include="guestbook/header"}

		{if="$show_success"}
			<div class="alert alert-success" role="alert" style="width:80%; margin:auto; margin-top:16px">
				{$info}
			</div>
		{/if}

		{if="$show_error"}
			<div class="alert alert-warning" role="alert" style="width:80%; margin:auto; margin-top:16px">
				{$info}
			</div>
		{/if}

		<div id="send" class="round" style="margin-top:16px; margin-bottom:16px">
			<div id="tb1"><b>Inserisci un nouvo messaggio!</b></div>
			<form action='?job=send' method='POST' name=guest>
				<div style="background-color: #d6e9fc; flex-direction: column; display:flex; padding:10px; text-align: left">
			
					<p>
						Scrivi un messaggio poi premi Invia per inserirlo nel GuestBook!! I campi contrassegnati con l'asterisco sono obbligatori.
					</p>
                    
					<p>
						<div class="row">

							<div class="col">
								<div class="mb-3">
									<label for="nick" class="form-label">Nome o Nick*</label>
									<input type='text' class="form-control" id="nick" name='name' value='{$name}' required />
								</div>

								<div class="mb-3">
									<label for="place" class="form-label">Nazione</label>
									<input type='text' class="form-control" id="place" name='place' value='{$place}' />
								</div>								
							</div>

							<div class="col">
								<label for="email" class="form-label">E-mail</label>
								<input type='email' class="form-control" id="email" name='email' value='{$email}' aria-describedby="emailHelp" />
								<div id="emailHelp" class="form-text">Non sei obbligato ad inserire il tuo indirizzo email, ma se lo inserisci controlla che sia corretto!</div>
							</div>

						</div>

						<div class="mb-3">
    						<label for="message" class="form-label">Messaggio*</label>
							<textarea cols='43' rows='10' name="message" class="form-control" id="message" name='message'>{$message}</textarea>
						</div>

						<div class="mb-3">
							<label for="emojin" class="form-label" aria-describedby="emojinHelp">Emojin</label>
							<span id="rmojinHelp" class="form-text"> (Chicca sulle emojin per inserirle nel messaggio)</span>
							
							<div id="emojin">
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
								<a href="javascript:setSmile(' :) ')"><img src="./assets/images/smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-D ')"><img src="assets/images/bigsmile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-O ')"><img src="assets/images/omg.png" border="0"/></a>
								<a href="javascript:setSmile(' :P ')"><img src="assets/images/toung.png" border="0"/></a>
								<a href="javascript:setSmile(' ;) ')"><img src="assets/images/wink.png" border="0"/></a>
								<a href="javascript:setSmile(' :( ')"><img src="assets/images/sad_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-S ')"><img src="assets/images/confused.png" border="0"/></a>
								<a href="javascript:setSmile(' :| ')"><img src="assets/images/what_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :_( ')"><img src="assets/images/cry_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-$ ')"><img src="assets/images/red_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' (H) ')"><img src="assets/images/shades_smile.png" border="0"/></a>
								<a href='javascript:setSmile(" :-@ ")'><img src="assets/images/angry_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-# ')"><img src="assets/images/47_47.png" border="0"/></a>
								<a href="javascript:setSmile(' 8o| ')"><img src="assets/images/48_48.png" border="0"/></a>
								<a href="javascript:setSmile(' 8-| ')"><img src="assets/images/49_49.png" border="0"/></a>
								<a href="javascript:setSmile(' ^o) ')"><img src="assets/images/50_50.png" border="0"/></a>
								<a href="javascript:setSmile(' +o( ')"><img src="assets/images/52_52.png" border="0"/></a>
								<a href="javascript:setSmile(' :^| ')"><img src="assets/images/71_71.png" border="0"/></a>
								<!-- br/ -->
								<a href="javascript:setSmile(' *-) ')"><img src="assets/images/72_72.png" border="0"/></a>
								<a href="javascript:setSmile(' 8-) ')"><img src="assets/images/75_75.png" border="0"/></a>
								<a href="javascript:setSmile(' |-) ')"><img src="assets/images/77_77.png" border="0"/></a>
								<a href="javascript:setSmile(' (A) ')"><img src="assets/images/angel_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' (6) ')"><img src="assets/images/devil_smile.png" border="0"/></a>
								<a href="javascript:setSmile(' :-* ')"><img src="assets/images/51_51.png" border="0"/></a>
								<a href="javascript:setSmile(' <:o) ')"><img src="assets/images/74_74.png" border="0"/></a>
								<a href='javascript:setSmile(" (@) ")'><img src="assets/images/cat.png" border="0"/></a>
								<a href="javascript:setSmile(' (&) ')"><img src="assets/images/dog.png" border="0"/></a>
								<a href="javascript:setSmile(' (S) ')"><img src="assets/images/moon.png" border="0"/></a>
							</div >														
						</div>				
					</p>
					
                </div>	
				
				<div style="background-color: #c6e1fb; flex-direction: row; display:flex; justify-content:flex-end; padding:10px; text-align: right">
					<input type='submit' name='submit' class='btn btn-primary btn-sm' value='Invia!'>&nbsp;&nbsp;
					<input type='reset' name='reset' class='btn btn-secondary btn-sm' value='Cancella'>
				</div>
				
			</form>
		</div>   

	</p>