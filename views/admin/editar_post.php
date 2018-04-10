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
  <div class="default-section post-editor-container">
    <div class="limited-container">
    <form class="default-form -edit -post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="edit_post" enctype="multipart/form-data" id="editar_post">
      <input type="hidden" value="<?php echo $post['id_post']; ?>" name="id">
      <h2 class="default-title -scorpion -fullWidth">Editar Artículo</h2>
      <div class="input-container -between">
        <label for="titulo" class="default-text -scorpion label">Titulo del Artículo</label>
        <input class="input" type="text" name="titulo" placeholder="Titulo del Artículo" value="<?php echo $post['title']; ?>">
      </div>
      <div class="input-container -between">
        <label for="blog_img" class="default-text -scorpion label">Imagen del Banner</label>
        <input type="file" name="blog_img" class="default-button -input upload-image">
        <input type="hidden" name="old_img" value="<?php echo $post['imagen_entrada']; ?>">
      </div>
      <div class="input-container -editor-panel">
        <label for="bio" class="default-text -scorpion label -fullWidth -center">Cuerpo del Artículo</label>
        <div class="input -editor-panel">
          <a href="#title" class="mini-button">
            <i class="fas fa-heading"></i>
          </a>
          <a href="#bold" class="mini-button">
            <i class="fas fa-bold"></i>
          </a>
          <a href="#italic" class="mini-button">
            <i class="fas fa-italic"></i>
          </a>
          <a href="#strikethrough" class="mini-button">
            <i class="fas fa-strikethrough"></i>
          </a>
          <a href="#link" class="mini-button">
            <i class="fas fa-link"></i>
          </a>
          <a href="#image" class="mini-button">
            <i class="fas fa-camera"></i>
          </a>
          <a href="#ul" class="mini-button">
            <i class="fas fa-list"></i>
          </a>
          <a href="#ol" class="mini-button">
            <i class="fas fa-list-ol"></i>
          </a>
          <a href="#blockquote" class="mini-button">
            <i class="fas fa-quote-right"></i>
          </a>
        </div>
        <textarea class="input -fullWidth text-editor postBody" name="texto" placeholder=""><?php echo $post['body']; ?></textarea>
      </div>
      <a class="default-button -edit" href="javascript:{}" onclick="document.getElementById('editar_post').submit();">Actualizar Articulo</a>
    </form>
    </div>
  </div>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
  <script src="<?php echo route_js; ?>admin.js"></script>
  <script src="<?php echo route_js; ?>editor.js"></script>
</body>
</html>