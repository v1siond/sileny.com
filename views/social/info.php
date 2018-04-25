<section class="default-section -animate -admin" id="posts">
  <div class="limited-container -around -admin" data-wow-duration="1s">
    <h4 class="default-title -scorpion -lateral -admin">Redes Sociales</h4>
    <?php foreach ($socialMedia as $social): ?>
      <section class="panel-list-item -dropdown">
        <article class="info">
          <p class="default-text -scorpion -small -admin"><strong>Título: </strong><?php echo $social['name']; ?></p>
          <p class="default-text -scorpion -small -admin"><strong>Link: </strong><span><?php echo $social['link']; ?></span></p>
          <p class="default-text -scorpion -small -admin"><strong>Arroba User: </strong><span><?php echo $social['arroba']; ?></span></p>
          <p class="default-text -scorpion -small -admin"><strong>Icon Name </strong><span><?php echo $social['icon_name']; ?></span></p>
        </article>
        <div class="options">
          <a class="default-button animate-button -panel" href="#social" data-action="<?php echo update . '&id=' . $social['id_red']; ?>">editar</a>
          <a class="default-button animate-button -danger -panel" href="#social" data-action="<?php echo delete . '&id=' . $social['id_red']; ?>" onclick="return confirm("¿Estás Seguro?");">Borrar</a>
        </div>
      </section>
    <?php endforeach?>
  </div>
</section>