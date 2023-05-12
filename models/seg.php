<?php
    session_start();
    if(session_status()!=2 or $_SESSION['aut']!='Gru/75%132¨ñ,.@'){
        session_destroy();
        header("location: index.php");
        exit();
    }
?>