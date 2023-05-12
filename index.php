<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Balon</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/inireg.css">

</head>

<body>
<?php 
    require_once ('models/conexion.php');
    $pg = isset($_GET['pg']) ? $_GET['pg']:NULL;
?>
    <div class="container">
        <div class="forms">
        <?php
            if($pg!=202){
                require_once "views/vini.php";
            }
        ?>
        </div>
    </div>
</body>
</html>