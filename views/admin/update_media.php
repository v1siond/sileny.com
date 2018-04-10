<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include 'views/layouts/head_common.php';?>
</head>
<body>
  <?php include 'views/layouts/header.php';?>
  <header class="default-section -welcome">
    <div class="limited-container -around">
      <?php include 'panel_admin_opciones.php';?>
    </div>
  </header>
  <div class="default-section" id="update_media">
    <div class="limited-container">
      <form class="default-form -edit" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" name="update_media">
        <input type="hidden" name="id" value="<?php echo $media['id_red'] ?>">
        <h2 class="default-title -scorpion -fullWidth">Editar <?php echo $media['name'] ?></h2>
        <div class="input-container -between">
          <label for="link" class="default-text -scorpion label">link</label>
          <input class="input" type="text" name="link" placeholder="wwww.your-social-media.com/your-link" value="<?php echo $media['link'] ?>">
        </div>
        <div class="input-container -between">
          <label for="arroba" class="default-text -scorpion label">Your @user</label>
          <input class="input" type="text" name="arroba" placeholder="@yourUser" value="<?php echo $media['arroba'] ?>">
        </div>
        <div class="input-container -between">
          <label for="icono" class="default-text -scorpion label">
            Icono
            <span class="default-text -small -scorpion -fullWidth">(Usar <a class="default-link -scorpion -noPadding" href="https://fontawesome.com/icons">FontAwesome</a> para los íconos)</span>
          </label>
          <input class="input" type="text" name="icono" placeholder="envelope-open" value="<?php echo $media['icon_name'] ?>">
        </div>
        <input class="default-button -edit" type="submit" value="Editar Media" name="update_media">
      </form>
    </div>
  </div>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
  <script src="<?php echo route_js; ?>admin.js"></script>
  <script src="<?php echo route_js; ?>editor.js"></script>
</body>
</html>