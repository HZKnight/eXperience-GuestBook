<?php if(!class_exists('raintpl')){exit;}?>    <p>
        
        <div  id="wellcome" class="round">
            <div id="tb1"><b>Benvenuto in <?php echo $title;?></b></div>
            <div style="background-color: #d6e9fc; flex-direction: row; display:flex; justify-content: space-around;">
                <div style="display:flex;  width:50%; height:20px;">Messaggi nel GuestBook: <?php echo $num_mex;?> in <?php echo $num_pages;?> pagine</div>
                <div style="display:flex; height:20px;"><a href="?job=send">Lasciami un messaggio!</a></div>
            </div>
        </div> 

        <div class="alert alert-primary" role="alert" style="width:80%; margin:auto; margin-top:16px">
            <?php echo $announce;?>
        </div>
        
        <div id="paginatorTop">
            <div style="width:33%; text-align:left;">&nbsp;<?php echo $prev;?></div>
            <div style="width:34%; text-align:center"><b><?php echo $pager;?></b></div>
            <div style="width:33%; text-align:right;"><a href="?job=send"><?php echo $next;?>&nbsp;</a></div>
        </div>

        <?php $counter1=-1; if( isset($posts) && is_array($posts) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?> 
            <div  id="wellcome" class="round" style="margin-bottom:16px">
                <div style="background-color: #a4d3fF; flex-direction: row; display:flex; justify-content: space-around; padding: 5px 10px">
                    <div style="width:50%; height:20px; text-align: left;"><img src="tpl/../img/user.png" alt="Messaggio inviato da:" style="height:22px"/>&nbsp;<b><?php echo $value1["nick"];?></b></div>
                    <div style="width:50%; height:20px; text-align: right;"><?php echo $value1["data"];?>&nbsp;<img src="tpl/../img/calendar.png" alt="Inviato il:" style="height:22px"/></div>
                </div>
                <div style="background-color:#d6e9fc; text-align: justify; padding:10px"><?php echo $value1["messaggio"];?></div>
                <div style="text-align:right; background-color:#c6e1fb; padding: 5px 10px">
                    <?php if( $value1["nazione"] <> '' ){ ?>
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="<?php echo $value1["nazione"];?>">
                            <img src="tpl/../img/nation.png" alt="Nazione:" style="height:22px"/>
                        </a>
                    <?php } ?>
                    <?php if( $value1["mail"] <> '' ){ ?>
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="<?php echo $value1["mail"];?>">
                            <img src="tpl/../img/mail.png" alt="E-mail:" style="height:22px"/>
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)); 
        </script>
        
         <div id="paginatorBottom">
            <div style="width:33%; text-align:left;">&nbsp;<?php echo $prev;?></div>
            <div style="width:34%; text-align:center"><b><?php echo $pager;?></b></div>
            <div style="width:33%; text-align:right;"><a href="?job=send"><?php echo $next;?>&nbsp;</a></div>
        </div>

    </p>
