    <p>
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
                                        <td width="50%" align="left">Messaggi nel GuestBook: {$num_mex} in {$num_pages} pagine</b></td>
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
         {$announce}
        </div>
        <br/>
        <table width="760px" align="center" border="0" cellpadding="0" cellspacing="0" >
            <tr>
                <td width=33% bgcolor=#85b0e4 height=16 align='left'>{$prev}</td>
                <td align=center width=34% bgcolor=#85b0e4 height=16 ><b>{$pager}</b></td>
                <td align=right width=33% bgcolor=#85b0e4 height=16>{$next}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan=3 valign=top>
                    <br>
                                      
                    {loop="posts"} 
                        <table width='100%' border='0' cellpadding='0' cellspacing='1' bgcolor='#85b0e4'>
                            <tr>
                                <td>
                                    <table class=msg  width='100%' valign=top align=center  cellpadding=2 cellspacing=0>
                                        <tr>
                                            <td width="50%" bgcolor=#a4d3ff><img src="../img/user.png" alt="Messaggio inviato da:"/>&nbsp;<b>{$value.nick}</b></td>
                                            <td width="50%" bgcolor=#a4d3ff style="text-align: right;">{$value.data}&nbsp;<img src="../img/calendar.png" alt="Inviato il:"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2 align=justify bgcolor=#d6e9fc><p class=margin>{$value.messaggio}</p></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor=#c6e1fb></td>
                                            <td bgcolor=#c6e1fb style="text-align: right;">{if="$value.nazione <> ''"}<img src="../img/nation.png" alt="Nazione:" title="{$value.nazione}"/>{/if}{if="$value.mail <> ''"}<img src="../img/mail.png" alt="E-mail:" title="{$value.mail}"/>{/if}</td>
                                        </tr>
                                    </table>    
                                </td>
                            </tr>
                        </table>
                        <br>
                    {/loop}
                </td>
            </tr>
            <tr>
                <td width=33% bgcolor=#85b0e4 height=16 align='left'>{$prev}</td>
                <td align=center width=34% bgcolor=#85b0e4 height=16><b>{$pager}</b></td>
                <td align=right width=33% bgcolor=#85b0e4 height=16>{$next}</td>
            </tr>
        </table>
    </p>
