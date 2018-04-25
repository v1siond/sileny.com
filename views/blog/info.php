<section class="default-section -animate -admin" id="posts">
	<div class="limited-container -around -admin" data-wow-duration="1s">
		<h4 class="default-title -scorpion -lateral -admin">Artículos</h4>
		<?php foreach ($entradas as $post): ?>
			<article class="panel-list-item">
			  <div class="info">
			    <p class="default-text -scorpion -small -admin"><strong>Título: </strong><a href="<?php echo route_ver_post . '&id=' . $post['id_post']; ?>"><?php echo $post['title']; ?></a></p>
			    <p class="default-text -scorpion -small -admin"><strong>Fecha: </strong><span><?php echo $post['created_at']; ?></span></p>
			    <p class="default-text -scorpion -small -admin"><strong>Editado: </strong><span><?php echo $post['updated_at']; ?></span></p>
			  </div>
			  <div class="options">
			    <a class="default-button -panel" href="<?php echo route_ver_post . '&id=' . $post['id_post']; ?>">ver</a>
			    <a class="default-button animate-button -panel" href="#blog" data-action="<?php echo update . '&id=' . $post['id_post']; ?>">editar</a>
			    <a class="default-button animate-button -danger -panel" href="#blog" data-action="<?php echo delete . '&id=' . $post['id_post']; ?>" onclick="return confirm("¿Estás Seguro?");">Borrar</a>
			  </div>
			</article>
		<?php endforeach?>
	</div>
</section>
