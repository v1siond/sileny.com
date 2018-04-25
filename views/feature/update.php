<div class="default-section -edit_user -animate" data-wow-duration="1s" id="update_feature">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo route_feature; ?>" data-action="update" method="POST" enctype="multipart/form-data" name="update_feature">
      <h2 class="default-title -scorpion -fullWidth">Actualizar Característica</h2>
      <input type="hidden" value="<?php echo $feature['id_feature']; ?>" name="id">
      <div class="input-container -between">
        <label for="description" class="default-text -scorpion label">Descripción</label>
        <input class="input" type="text" name="description" value="<?php echo $feature['description']; ?>" required="true">
      </div>
      <input class="default-button -edit" type="submit" value="Actualizar" name="update_plan">
    </form>
  </div>
</div>

