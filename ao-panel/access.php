<?php
if(isset($_POST["acceder"])) {
  if($_POST["inputPassword"] == "pyv1102") {
    setcookie("aoline", "pyv1102", time()+3600*24);
    header("Location: index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acceso administración</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/admin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin col-xs-12 col-md-4" method="POST">
        <h2 class="form-signin-heading">Acceso administración</h2>
        <label for="inputPassword" class="sr-only">Clave acceso</label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="acceder" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
