<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page ">
  <div class="form-signin">
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth" class="clearfix form-signin">
      <img class="mb-4" src="./favicon.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Bienvenido</h1>
            <p class="text-center">Iniciar sesión</p>

      <label for="username" class="sr-only">Usuario</label>
      <input type="name" id="username"  name="username" class="form-control" placeholder="Usuario" required autofocus>
<br>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>

        <div class="form-group">
                <button type="submit" class="btn btn-outline-info  btn-block">Entrar</button>
        </div>
 <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date("Y"); ?></p>
    </form>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>
