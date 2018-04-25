<div class="default-section -edit_user -animate" data-wow-duration="1s" id="new_plan">
  <div class="limited-container">
    <form class="default-form -edit" action="<?php echo route_plans; ?>" data-action="update" method="POST" enctype="multipart/form-data" name="new_plan">
      <h2 class="default-title -scorpion -fullWidth">Actualizar Oferta</h2>
      <input type="hidden" value="<?php echo $offer['id_price']; ?>" name="id">
      <div class="input-container -between">
        <label for="titulo" class="default-text -scorpion label">Nombre de la oferta</label>
        <input class="input" type="text" name="titulo" placeholder="Online" value="<?php echo $offer['title']; ?>" required="true">
      </div>
      <div class="input-container -between">
        <label for="price" class="default-text -scorpion label">Precio</label>
        <input class="input" type="text" name="price" placeholder="$60" value="<?php echo $offer['price']; ?>" required="true">
      </div>
      <div class="input-container -between">
        <label for="region" class="default-text -scorpion label">Precio</label>
        <select name="region" id="region" class="input">
          <?php if ($offer['region'] == 0) {?>
            <option value="0" selected>Internacional</option>
            <option value="1">Venezuela</option>
          <?php } else {?>
            <option value="0">Internacional</option>
            <option value="1" selected>Venezuela</option>
          <?php }?>

        </select>
      </div>
      <input class="default-button -edit" type="submit" value="Actualizar" name="update_plan">
    </form>
  </div>
</div>
<script src="<?php echo route_js; ?>addDeleteFeatures.js"></script>

