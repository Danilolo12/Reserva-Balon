<?php require_once("models/seg.php"); ?>
<?php require_once("models/conexion.php"); ?>
<?php require_once("controllers/optimg.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Balon</title>
    <link type="text/css" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/tabla.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/reservar.css">
    <link rel="shortcut icon" href="img/balon.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/css" src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"></script>
    <script type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body" class="body">

</div>
    <?php $pg = isset($_GET['pg']) ? $_GET['pg'] : false; ?>
    <?php $ope = isset($_GET['ope']) ? $_GET['ope'] : false; ?>
    <header>
        <?php require_once ("views/vmen.php"); ?>
        <script src="js/menu.js"></script>
    </header>

<main>
    <div class="texto">
        <?php
        $rut = validar($pg);
        if ($rut) {
            $icono = substr($rut[0]['icopag'], 3);
            require_once($rut[0]['rutpag']);
        } else {
            echo "<script>window.location='home.php?pg=1008';</script>";
        }
        ?>
    </div>
</main>

</body>
</html>