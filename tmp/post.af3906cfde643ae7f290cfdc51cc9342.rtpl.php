<?php if(!class_exists('raintpl')){exit;}?>    <p>
        <table width="760px" border="0" cellpadding="0" cellspacing="0"  bgcolor="#85b0e4" align="center">
            <tr>
                <td>
                    <table border="0" cellspacing="1" cellpadding="0" width="760px">
                        <tr>
                            <td id="tb1" width="100%"><b>Benvenuto in .:: Modeltreno.Tk - GuestBook ::.</b></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" width="760px" bgcolor="#d6e9fc">
                                    <tr>
                                        <td width="50%" align="left">Messaggi nel GuestBook: <?php echo $num_mex;?> in <?php echo $num_pages;?> pagine</b></td>
                                        <td width="50%" align="right"><a href="?job=send">Lasciami un messaggio!</a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br/>
        <div id="annuncio">
         <?php echo $announce;?>
        </div>
        <br/>
        <table width="760px" align="center" border="0" cellpadding="0" cellspacing="0" >
            <tr>
                <td width=33% bgcolor=#85b0e4 height=16 align='left'><?php echo $prev;?></td>
                <td align=center width=34% bgcolor=#85b0e4 height=16 ><b><?php echo $pager;?></b></td>
                <td align=right width=33% bgcolor=#85b0e4 height=16><?php echo $next;?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan=3 valign=top>
                    <br>
                                      
                    <?php $counter1=-1; if( isset($posts) && is_array($posts) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?> 
                        <table width='100%' border='0' cellpadding='0' cellspacing='1' bgcolor='#85b0e4'>
                            <tr>
                                <td>
                                    <table class=msg  width='100%' valign=top align=center  cellpadding=2 cellspacing=0>
                                        <tr>
                                            <td width="50%" bgcolor=#a4d3ff><img src="tpl/../img/user.png" alt="Messaggio inviato da:"/>&nbsp;<b><?php echo $value1["nick"];?></b></td>
                                            <td width="50%" bgcolor=#a4d3ff style="text-align: right;"><?php echo $value1["data"];?>&nbsp;<img src="tpl/../img/calendar.png" alt="Inviato il:"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2 align=justify bgcolor=#d6e9fc><p class=margin><?php echo $value1["messaggio"];?></p></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor=#c6e1fb></td>
                                            <td bgcolor=#c6e1fb style="text-align: right;"><?php if( $value1["nazione"] <> '' ){ ?><img src="tpl/../img/nation.png" alt="Nazione:" title="<?php echo $value1["nazione"];?>"/><?php } ?><?php if( $value1["mail"] <> '' ){ ?><img src="tpl/../img/mail.png" alt="E-mail:" title="<?php echo $value1["mail"];?>"/><?php } ?></td>
                                        </tr>
                                    </table>    
                                </td>
                            </tr>
                        </table>
                        <br>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td width=33% bgcolor=#85b0e4 height=16 align='left'><?php echo $prev;?></td>
                <td align=center width=34% bgcolor=#85b0e4 height=16><b><?php echo $pager;?></b></td>
                <td align=right width=33% bgcolor=#85b0e4 height=16><?php echo $next;?></td>
            </tr>
        </table>
    </p>
