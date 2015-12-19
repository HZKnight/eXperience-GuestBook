<!doctype html> 
<html lang="it">

    <head>
        <title>{$title} - {$slogan}</title>
        <META content=".:: MODELTRENO.TK ::. - Un viaggio nel mondo del modellismo ferroviario" name="title">
        <META content="Sito dedicato al modellismo ferroviario realizzaro per esperti e non." name="description">
        <META content="ferrovia, ferrovie, binari, binario, traversine, traversina, modellismo, modellismo ferroviario, ferroviario, fermodellismo, vagoni, vagone, locomotori, locomotore, immagini, download" name="keywords">
        <META content="1 Days" name="revisit-after">
        <LINK rev="made" href="mailto:info@modeltreno.tk" />
        <META content="lucliscio" name="author">
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <LINK href="tpl/stile.css" type="text/css" rel="stylesheet" />
        <script src="../js/clock.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <script>
           $(function() {
            $( document ).tooltip({
              position: {
                my: "center bottom-20",
                at: "center top",
                using: function( position, feedback ) {
                  $( this ).css( position );
                  $( "<div>" )
                    .addClass( "arrow" )
                    .addClass( feedback.vertical )
                    .addClass( feedback.horizontal )
                    .appendTo( this );
                }
              }
            });
          });   
        </script>
    </head>

    <body onload="loadtime()">
        
        <!-- TESTATA -->
	<div id="testata">
            
            <div class="riga1">
		<div class="colonna1"><span id="clock"></span>
		</div>
		<div class="colonna2">Benvenuto su {$title}
		</div>
            </div>
            
            <div class="riga2">
                <div class="colonna1"><IMG height="90" alt="{$title} - {$slogan}" src="img/logo.png" width="256">
		</div>
		<div class="colonna2">
                    
		</div>
            </div>
	
            <hr>
	
            <div class="riga3">
		<div class="colonna1">GUESTBOOK</div>
		<div class="colonna2">&nbsp;&nbsp;<A class="tool" href="../main/index.php">Home</A>|<img src="../img/transparent.gif" border="0" name="m1" id="m1" height="0" width="0"><A class="tool" href="../download/index.html" >Download</A>|Regolamenti|Manuale|Curiosit&agrave;|<img src="../img/transparent.gif" border="0" name="m2" id="m2" height="0" width="0"><a class="tool" href="#">Comunity</a>|<A class="tool" href="../main/vetrina.html">Vetrina</A>|<A class="tool" href="../main/link.html">Link</A>
		</div>
		<div class="colonna3">
                    <A class="tool" href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.modeltreno.tk');"><IMG height="16" alt="Imposta .::MODELTRENO.TK::. come home page." src="img/home.gif" width="20" align="absMiddle" border="none"></A>
                    <A class="tool" href="javascript:addbookmark()"><IMG height="16" alt="Aggiungi ai preferiti .::MODELTRENO.TK::." src="img/preferiti.gif" width="20" align="absMiddle" border="none"></A>
                    <A class="tool" href="#"><IMG height="16" alt="Untenti on-line su .::MODELTRENO.TK::." src="img/utenti.gif" width="15" align="absMiddle" border="none"></A>
                </div>
            </div>
	
        </div>
        
        <div id="corpo">
            <br>

                {$content}

            <br>
        </div>
        <div id='down'>
            <strong>&copy;2014 {$copy}</strong> - Tutti i diritti sono riservati <small>(HZGuestBook Ver.: {$ver}) - Pagina generata in {$time} secondi.</small>
            <br>
        </div>
    
        <br>
   
    </body>

</html>
