    <p>
        
        <div  id="wellcome" class="round">
            <div id="tb1"><b>Benvenuto in {$title}</b></div>
            <div style="background-color: #d6e9fc; flex-direction: row; display:flex; justify-content: space-around;">
                <div style="display:flex;  width:50%; height:20px;">Messaggi nel GuestBook: {$num_mex} in {$num_pages} pagine</div>
                <div style="display:flex; height:20px;"><a href="?job=send">Lasciami un messaggio!</a></div>
            </div>
        </div> 

        <div class="alert alert-primary" role="alert" style="width:80%; margin:auto; margin-top:16px">
            {$announce}
        </div>
        
        <div id="paginatorTop">
            <div style="width:33%; text-align:left;">&nbsp;{$prev}</div>
            <div style="width:34%; text-align:center"><b>{$pager}</b></div>
            <div style="width:33%; text-align:right;"><a href="?job=send">{$next}&nbsp;</a></div>
        </div>

        {loop="posts"} 
            <div  id="wellcome" class="round" style="margin-bottom:16px">
                <div style="background-color: #a4d3fF; flex-direction: row; display:flex; justify-content: space-around; padding: 5px 10px">
                    <div style="width:50%; height:20px; text-align: left;"><img src="../img/user.png" alt="Messaggio inviato da:" style="height:22px"/>&nbsp;<b>{$value.nick}</b></div>
                    <div style="width:50%; height:20px; text-align: right;">{$value.data}&nbsp;<img src="../img/calendar.png" alt="Inviato il:" style="height:22px"/></div>
                </div>
                <div style="background-color:#d6e9fc; text-align: justify; padding:10px">{$value.messaggio}</div>
                <div style="text-align:right; background-color:#c6e1fb; padding: 5px 10px">
                    {if="$value.nazione <> ''"}
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{$value.nazione}">
                            <img src="../img/nation.png" alt="Nazione:" style="height:22px"/>
                        </a>
                    {/if}
                    {if="$value.mail <> ''"}
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{$value.mail}">
                            <img src="../img/mail.png" alt="E-mail:" style="height:22px"/>
                        </a>
                    {/if}
                </div>
            </div>
        {/loop}

        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)); 
        </script>
        
         <div id="paginatorBottom">
            <div style="width:33%; text-align:left;">&nbsp;{$prev}</div>
            <div style="width:34%; text-align:center"><b>{$pager}</b></div>
            <div style="width:33%; text-align:right;"><a href="?job=send">{$next}&nbsp;</a></div>
        </div>

    </p>
