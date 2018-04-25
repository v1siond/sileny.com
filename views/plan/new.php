<div class="default-section -edit_user -animate" data-wow-duration="1s" id="new_plan">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo route_plans; ?>" data-action="new" method="POST" enctype="multipart/form-data" name="new_plan">
      <h2 class="default-title -scorpion -fullWidth">Nuevo Plan</h2>
      <div class="input-container -between">
        <label for="titulo" class="default-text -scorpion label">Nombre de la oferta</label>
        <input class="input" type="text" name="titulo" placeholder="Online" required="true">
      </div>
      <div class="input-container -between">
        <label for="price" class="default-text -scorpion label">Precio</label>
        <input class="input" type="text" name="price" placeholder="$60" required="true">
      </div>
      <div class="input-container -between">
        <label for="region" class="default-text -scorpion label">Precio</label>
        <select name="region" id="region" class="input">
          <option value="0">Internacional</option>
          <option value="1" selected>Venezuela</option>
        </select>
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
<script src="<?php echo route_js; ?>addDeleteFeatures.js"></script>

