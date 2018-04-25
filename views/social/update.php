<div class="default-section -edit_user -animate" data-wow-duration="1s" id="update_media">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo route_media; ?>" data-action="update" method="POST" enctype="multipart/form-data" name="update_media">
      <input type="hidden" value="<?php echo $social['id_red']; ?>" name="id">
      <h2 class="default-title -scorpion -fullWidth">Nueva Red Social</h2>
      <div class="input-container -between">
        <label for="name" class="default-text -scorpion label">Nombre</label>
        <input class="input" type="text" name="name" placeholder="facebook" required="true" value="<?php echo $social['name']; ?>">
      </div>
      <div class="input-container -between">
        <label for="link" class="default-text -scorpion label">Link</label>
        <input class="input" type="text" name="link" placeholder="wwww.your-social-media.com/your-link" required="true" value="<?php echo $social['link']; ?>">
      </div>
      <div class="input-container -between">
        <label for="arroba" class="default-text -scorpion label">Your @user</label>
        <input class="input" type="text" name="arroba" placeholder="@yourUser" required="true" value="<?php echo $social['arroba']; ?>">
      </div>
      <div class="input-container -between">
        <label for="icono" class="default-text -scorpion label">
          Nombre de Ícono
          <span class="default-text -small -scorpion -fullWidth">(Usar <a class="default-link -scorpion -noPadding" href="https://fontawesome.com/icons">FontAwesome</a> para los nombres de los íconos)</span>
        </label>
        <input class="input" type="text" name="icono" placeholder="envelope-open" required="true" value="<?php echo $social['icon_name']; ?>">
      </div>
      <input class="default-button -edit" type="submit" value="Guardar Red" name="update_media">
    </form>
  </div>
</div>





