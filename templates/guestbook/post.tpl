    <p>
        {include="guestbook/header"}

        <div class="alert alert-primary" role="alert" style="width:80%; margin:auto; margin-top:16px">
            {$announce}
        </div>

        <nav id="paginatorTop" aria-laber="top pager" style="text-align:center">
            <div style="display:flex; text-align:center" class="pager">
                <ul class="pagination pagination-sm pager">

                    <li class="page-item {if="$page == 1"}disabled{/if}">
                        <a class="page-link" href="?page={$page-1}" aria-label="Precedente">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    
                    {loop="bpager"}
                        {if="$value == $page"}
                            <li class="page-item  active"><a class="page-link" href="?page={$value}">{$value}</a></li>
                        {else}
                            <li class="page-item"><a class="page-link" href="?page={$value}">{$value}</a></li>
                        {/if}
                    {/loop}

                    <li class="page-item {if="$page == $num_pages"}disabled{/if}">
                        <a class="page-link" href="?page={$page+1}" aria-label="Successivo">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        {loop="posts"} 
            <div  id="wellcome" class="round" style="margin-bottom:16px">
                <div style="background-color: #a4d3fF; flex-direction: row; display:flex; justify-content: space-around; padding: 5px 10px">
                    <div style="width:50%; height:20px; text-align: left;"><img src="img/user.png" alt="Messaggio inviato da:" style="height:22px"/>&nbsp;<b>{$value.nick}</b></div>
                    <div style="width:50%; height:20px; text-align: right;"><img src="img/calendar.png" alt="Inviato il:" style="height:22px"/>&nbsp;{$value.data}</div>
                </div>
                <div style="background-color:#d6e9fc; text-align: justify; padding:10px">{$value.messaggio}</div>
                <div style="text-align:right; background-color:#c6e1fb; padding: 5px 10px">
                    {if="$value.nazione <> ''"}
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{$value.nazione}">
                            <img src="img/nation.png" alt="{$value.nazione}" style="height:22px"/>
                        </a>
                    {/if}
                    &nbsp;
                    {if="$value.mail <> ''"}
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{$value.mail}">
                            <img src="img/mail.png" alt="{$value.mail}" style="height:22px"/>
                        </a>
                    {/if}
                </div>
            </div>
        {/loop}

        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)); 
        </script>
        
         <nav id="paginatorBottom">
            <div style="display:flex; text-align:center" class="pager">
                <ul class="pagination pagination-sm pager">

                    <li class="page-item {if="$page == 1"}disabled{/if}">
                        <a class="page-link" href="?page={$page-1}" aria-label="Precedente">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    
                    {loop="bpager"}
                        {if="$value == $page"}
                            <li class="page-item  active"><a class="page-link" href="?page={$value}">{$value}</a></li>
                        {else}
                            <li class="page-item"><a class="page-link" href="?page={$value}">{$value}</a></li>
                        {/if}
                    {/loop}

                    <li class="page-item {if="$page == $num_pages"}disabled{/if}">
                        <a class="page-link" href="?page={$page+1}" aria-label="Successivo">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

    </p>
