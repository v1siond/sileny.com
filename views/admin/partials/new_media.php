<div class="default-section -edit_user -animate" data-wow-duration="1s" id="new_media">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo guardar_media; ?>" method="POST" enctype="multipart/form-data" name="new_media">
      <h2 class="default-title -scorpion -fullWidth">Nueva Oferta</h2>
      <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
      <div class="input-container -between">
        <label for="name" class="default-text -scorpion label">Nombre</label>
        <input class="input" type="text" name="name" placeholder="facebook" required="true">
      </div>
      <div class="input-container -between">
        <label for="link" class="default-text -scorpion label">Link</label>
        <input class="input" type="text" name="link" placeholder="wwww.your-social-media.com/your-link" required="true">
      </div>
      <div class="input-container -between">
        <label for="arroba" class="default-text -scorpion label">Your @user</label>
        <input class="input" type="text" name="arroba" placeholder="@yourUser" required="true">
      </div>
      <div class="input-container -between">
        <label for="icono" class="default-text -scorpion label">
          Nombre de Ícono
          <span class="default-text -small -scorpion -fullWidth">(Usar <a class="default-link -scorpion -noPadding" href="https://fontawesome.com/icons">FontAwesome</a> para los nombres de los íconos)</span>
        </label>
        <input class="input" type="text" name="icono" placeholder="envelope-open" required="true">
      </div>
      <input class="default-button -edit" type="submit" value="Guardar Media" name="new_media">
    </form>
  </div>
</div>