<div class="form login">
    <div class="imgini">
        <img class="famimg" src="img/futbol logo.png"><br><br>
        <span class="title">Reserva Balón</span>
    </div>

    <form id="login1" tabindex="500" action="models/ctrlm.php" method="POST">
        <div class="input-field">
            <input type="email" placeholder="Enter your email" name="usu" required>
            <i class="uil uil-envelope icon"></i>
        </div>
        <div class="input-field">
            <input type="password" class="password" placeholder="Enter your password" name="pas" required>
            <i class="uil uil-lock icon"></i>
        </div>

        <div class="submit">
            <button class="input-field button">Login</button>
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
        <span class="text">No tienes cuenta?
            <a href="vreg.php" class="text signup-link">Registrate</a>
        </span>
    </div>
    
</div>