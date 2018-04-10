<div class="default-section -edit_user -animate" data-wow-duration="1s" id="new_plan">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo guardar_plan; ?>" method="POST" enctype="multipart/form-data" name="new_plan">
      <h2 class="default-title -scorpion -fullWidth">Nueva Oferta</h2>
      <div class="input-container -between">
        <label for="first_name" class="default-text -scorpion label">Nombre de la oferta</label>
        <input class="input" type="text" name="name" placeholder="Online" required="true">
      </div>
      <div class="input-container -between">
        <label for="last_name" class="default-text -scorpion label">Precio</label>
        <input class="input" type="text" name="price" placeholder="$60" required="true">
      </div>
      <div class="input-container new-features-container">
      </div>
      <div class="input-container">
        <a class="default-button -golden" name="add_feature" id="add_feature">Agregar Característica</a>
      </div>
      <input class="default-button -edit" type="submit" value="Guardar Oferta" name="new_plan">
    </form>
  </div>
</div>