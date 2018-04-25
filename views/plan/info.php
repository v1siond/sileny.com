<section class="default-section -animate -admin" id="posts">
  <div class="limited-container -around -admin" data-wow-duration="1s">
    <h4 class="default-title -scorpion -lateral -admin">Planes</h4>
    <?php foreach ($offers as $offer): ?>
      <section class="panel-list-item -dropdown">
        <article class="info">
          <p class="default-text -scorpion -small -admin"><strong>Título: </strong><?php echo $offer['title']; ?></p>
          <p class="default-text -scorpion -small -admin"><strong>Price: </strong><span><?php echo $offer['price']; ?></span></p>
          <p class="default-text -scorpion -small -admin"><strong>Región: </strong><span><?php if ($offer['region'] == 1) {echo 'Venezuela';} else {echo 'Internacional';}?></span></p>
        </article>
        <div class="options">
          <a class="default-button animate-button -panel" href="#plan" data-action="<?php echo update . '&id=' . $offer['id_price']; ?>">editar</a>
          <a class="default-button animate-button -danger -panel" href="#plan" data-action="<?php echo delete . '&id=' . $offer['id_price']; ?>" onclick="return confirm("¿Estás Seguro?");">Borrar</a>
        </div>
        <div class="panel-list-item -hidden">
        <?php $planFeatures = $features->getFeatures($offer['id_price']);
foreach ($planFeatures as $feature): ?>
          <article class="panel-list-item -child">
            <div class="info">
              <p class="default-text -scorpion -smaller -admin"><strong>Cracterística ID: </strong><?php echo $feature['id_feature']; ?></p>
              <p class="default-text -scorpion -smaller -admin"><strong>Plan: </strong><?php echo $offer['title']; ?></p>
              <p class="default-text -scorpion -smaller -admin"><strong>Descripción: </strong><span><?php echo $feature['description']; ?></span></p>
            </div>
            <div class="options">
              <a class="default-button animate-button -panel" href="#feature" data-action="<?php echo update . '&id=' . $feature['id_feature']; ?>">editar</a>
              <a class="default-button animate-button -danger -panel" href="#feature" data-action="<?php echo delete . '&id=' . $feature['id_feature']; ?>" onclick="return confirm("¿Estás Seguro?");">Borrar</a>
            </div>
          </article>
        <?php endforeach?>
        </div>
      </section>
    <?php endforeach?>
  </div>
</section>
<script src="<?php echo route_js; ?>dropdown.js"></script>