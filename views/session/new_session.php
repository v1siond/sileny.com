<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include 'views/layouts/head_common.php';?>
</head>
<body>
  <?php include 'views/layouts/header.php';?>
  <?php
if (isset($flash_message)) {
	echo $flash_message;
}
?>
  <header class="default-section -banner -blog">
    <h2 class="default-title -white -big -fullWidth">Ingreso al Sistema</h3>
    <figure class="section-bg"></figure>
  </header>
  <section class="default-section -login">
    <div class="limited-container">
      <form class="default-form -login" action="?view=session" method="POST" name="login" enctype="multipart/form-data">
        <div class="user-draw">
          <span class="head"></span>
          <span class="body"></span>
        </div>
        <div class="input-container">
          <input class="input" type="text" name="usuario" required placeholder="Usuario O Email">
          <input class="input" type="password" name="contra" required placeholder="Contraseña">
        </div>
        <div class="input-container">
          <input class="default-button -golden" type="submit" value="Entrar" id="boton" class="shadow" name="contacto">
        </div>
      </form>
    </div>
  </section>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
</body>
</html>