<!doctype html> 
<html lang="it">

    <head>
        <title>{$title} - {$slogan}</title>
        <META content=".:: eXperience GuestBook ::." name="title">
        <META content="Sito dedicato al modellismo ferroviario realizzaro per esperti e non." name="description">
        <META content="ferrovia, ferrovie, binari, binario, traversine, traversina, modellismo, modellismo ferroviario, ferroviario, fermodellismo, vagoni, vagone, locomotori, locomotore, immagini, download" name="keywords">
        <META content="1 Days" name="revisit-after">
        <LINK rev="made" href="mailto:info@modeltreno.tk" />
        <META content="lucliscio" name="author">
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
        <LINK href="tpl/hzgrid.css" type="text/css" rel="stylesheet" />
        <LINK href="tpl/stile.css" type="text/css" rel="stylesheet" />

        <script src="../js/clock.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </head>

    <body onload="loadtime()">

        <div id="topbar" class="shadow">
            <div class="minilogo">
                <img src="../img/guestbook.png" alt=""/>
            </div>
            <div class="content">
                <img src="../img/calentario20x20.png" alt=""/>
                <span id="clock"></span>
            </div>
        </div>
        
        <div class="hzgrid-container page">

            <br/>
            {$content}
            <br/>           
        
                 

            <footer class="hzrow">
                <div class="hzrow">
                    <section id="copy">
                        <div class="credits col-24">
                            <strong>&copy;2022 {$copy}</strong> - Tutti i diritti sono riservati | Powered by  eXperience GuestBook Ver.: {$ver} <br/>
                            Tutti i marchi registrati e i diritti d’autore in questa pagina appartengono ai rispettivi proprietari
                        </div>
                    </section>
                </div>
            </footer>
        </div>
        
        <span class = "small">
           Pagina generata in {$time} secondi
        </span>
        
   
    </body>

</html>
