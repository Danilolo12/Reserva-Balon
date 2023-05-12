<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FamachApp</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/inireg.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="container">
        <div class="forms1">
            <div class="form login">
                <div class="imgini">
                    <img class="famimg" src="img/futbol logo.png"><br><br>
                    <span class="title">Reserva Balòn</span>
                </div>

                <form id="login1" tabindex="500" action="models/ctrlm.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Nombre" name="usu" required>
                        <i class="bx bx-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Apellido" name="usu" required>
                        <i class="bx bx-user-check icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="Correo Electrónico" name="usu" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="number" placeholder="Numero de Documento" name="usu" required>
                        <i class='bx bx-hash icon'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Contraseña" name="pas" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="submit">
                        <button class="input-field button">Registrar</button>
                        <!-- <div class="input-field button">
                            <input type="button" value="Login" action="home.php">
                        </div> -->
                    </div>
                    <br>
                    <?php
                    $error = isset($_GET['error']) ? $_GET['error']:NULL;
                    if($error=="ok"){
                        echo "Datos invalidos. Vuelve a intentarlo.";
                        echo "<script>alert('Datos invalidos. Vuelve a intentarlo.');</script>";
                    }
                ?>
                </form>

                <div class="login-signup">
                    <span class="text">Ya tiene cuenta?
                        <a href="index.php" class="text signup-link">Iniciar Sesión</a>

                    </span>
                </div>
                
            </div>
        </div>
    </div>
</body>