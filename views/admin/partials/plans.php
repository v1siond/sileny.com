<section class="default-section -animate -admin" id="plans">
  <div class="limited-container -around">
    <?php foreach ($plans as $plan): ?>
      <ul class="pricing-features">
        <li class="feature -name"><?php echo $plan['title']; ?></li>
        <li class="feature -price"><h3 class="default-title -big -scorpion -fullWidth"><?php echo $plan['price']; ?></h3></li>
        <?php $features = obtenerFeatures($conexion, $plan['id_price']);foreach ($features as $feature): ?>
          <li class="feature"><?php echo $feature['description']; ?></li>
        <?php endforeach?>
        <li class="feature">
            <a class="default-button -panel -danger" href="<?php echo route_borrar_plan . '/?id=' . $plan['id_price']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a>
        </li>
      </ul>
    <?php endforeach?>
  </div>
</section>