<section class="default-section -animate -admin visible" id="social_media">
  <div class="limited-container -around">
    <?php foreach ($social_media as $media): ?>
      <div class="pricing-features">
        <li class="feature -name data-media"><div class="icon-media"><i class="fas fa-<?php echo $media['icon_name']; ?>"></i></div></li>
        <li class="feature -price "><h3 class="default-title -admin -scorpion -fullWidth"><?php echo $media['name']; ?></h3></li>
        <li class="feature "><a class="default-link -scorpion" href="<?php echo $media['link']; ?>"><?php echo $media['link']; ?></a></li>
        <li class="feature "><a class="default-link -scorpion" href="<?php echo $media['link']; ?>"><?php echo $media['arroba']; ?></a></li>
        <li class="feature "><a class="default-link -scorpion" href="<?php echo $media['link']; ?>"><?php echo $media['icon_name']; ?></a></li>
        <li class="feature">
          <a class="default-button -panel" href="<?php echo update_media . '/?id=' . $media['id_red']; ?>">Editar</a>
          <a class="default-button -panel -danger" href="<?php echo borrar_media . '/?id=' . $media['id_red']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a>
        </li>
      </div>
    <?php endforeach?>
  </div>
</section>
