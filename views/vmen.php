<?php include('controllers/cmen.php'); ?>

<div class="menu__side" id="menu_side">

    <div class="toggle">
        <i class="bx bx-chevron-right"></i>
    </div>
    <div class="scrollbar">
        <nav>

            <div class="nav-title">
                ReserveSite
            </div>
                <?php 
                if($dat){
                    foreach ($dat as $dt) {
                ?> 
                    <ul>
                        <li class="nav-item">
                            <a href="home.php?pg=<?=$dt['idpag'];?>">
                            <i class="<?=$dt['icopag'];?>"></i>
                            <span><?=$dt['nompag'];?></span>
                            </a>
                        </li>
                    </ul>
                    <?php 
                            }
                        }
                    ?>
                    <hr>
                    <div class="down">
                        <div class="nav-title2">
                            
                        </div>
            
                        <ul>
                            <li class="nav-item">
                                <a href="views/vsal.php">
                                <i class="bx bxs-exit"></i>
                                <span>Salir</span>
                                </a>
                            </li>
                        </ul>
                    </div>

        </nav>
    </div>
</div>