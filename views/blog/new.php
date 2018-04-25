<div class="default-section post-editor-container -animate">
  <div class="limited-container">
  <form class="default-form -edit -post" id="new_post" action="<?php echo route_blog_index; ?>" data-action="new" method="POST" name="post" enctype="multipart/form-data">
    <h2 class="default-title -scorpion -fullWidth">Nuevo Artículo</h2>
    <div class="input-container -between">
      <label for="titulo" class="default-text -scorpion label">Titulo del Artículo</label>
      <input class="input" type="text" name="titulo" placeholder="Titulo del Artículo" required="true">
    </div>
    <div class="input-container -between">
      <label for="blog_img" class="default-text -scorpion label">Imagen del Banner</label>
      <input type="file" name="blog_img" class="default-button -input upload-image" required />
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
      <textarea class="input -fullWidth text-editor postBody" name="texto" placeholder="" required="true"></textarea>
    </div>
    <input class="default-button -edit" type="submit" value="Crear Articulo" name="new_post">
  </form>
  </div>
</div>
<script src="<?php echo route_js; ?>editor.js"></script>
