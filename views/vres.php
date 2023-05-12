<?php 
require_once 'controllers/cres.php';
?>

    <div class="header">
         <p>Inicio</p>
</div>
<br>

<div id="reservas" class="reservas">
  <div class="reserva">
    <div class="content">
      <div class="calendar dark">
        <div class="calendar_plan">        
  </div>
        
            <div class="calendar_events">
              <div class="fecha"><?php $diares=date("m-d-Y",time());
          echo $diares;
?></div>
<br>
              <p class="ce_title">Horarios disponibles</p>

</div>
              <div class="fecha">

              <?php
                if($dat){
                  foreach($dat AS $d){
              ?> 
</div>

              <div class="event_item">
                <?php if($d['actres']==1){?>
                  <div class="bar">
                  <a href="home.php?pg=<?=$pag;?>&actres=2&idres=<?=$d['idres'];?>" class="event">
                  

                    <div class="ei_Dot dot_active"></div>
                    <div class="ei_Title">                    
                      <?=$d['fecini'];?> - <?=$d['fecend'];?>
                    </div>
                  
                <?php }else{ ?>
                  <div  class="mm">
                  <a href="home.php?pg=<?=$pag;?>&actres=1&idres=<?=$d['idres'];?>" class="event" >
                  

                    <div class="ei_Dot"></div>
                    <div class="ei_Title">                    
                      <?=$d['fecini'];?> - <?=$d['fecend'];?>
                    </div>
                  
                <?php } ?>
                <?php
                  if($datUsu){
                    foreach($datUsu AS $dtu){
                ?>
                <div class="ei_Copy">
                  <?=$dtu['nomusu'];?> <?=$dtu['apeusu']?>
                </div>
                </a>
                </div>
                <?php
                    }
                }
              ?> 
              
              </div>

              <?php
                    }
                }
              ?>  
            </div>
      </div>
    </div>
  </div>
</div>
