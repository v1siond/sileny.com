<?php $pagina = numeroPaginas($blog_config['post_por_pagina'], $conexion);?>
<ul class="limited-container pagination-container">
  <?php if (paginaActual() === 1): ?>
      <li class="pg-arrow -disabled"><i class="fas fa-angle-left" aria-hidden="true"></i></li>
  <?php else: ?>
      <li class="pg-arrow"><a href="?p=<?php echo paginaActual() - 1 ?>"><i class="fas fa-angle-left"></i></a></li>
  <?php endif;?>
  <?php
for ($i = 1; $i <= $pagina; $i++) {
	if (paginaActual() === $i) {
		echo "<li class='pg-number -disabled'>$i</li>";
	} else {
		echo "<li class='pg-number'><a href='?p=$i'>$i</a></li>";
	}
}
?>
  <?php if (paginaActual() == $pagina): ?>
      <li class="pg-arrow -disabled"><i class="fas fa-angle-right" aria-hidden="true"></i></li>
  <?php else: ?>
      <li class="pg-arrow"><a href="?p=<?php echo paginaActual() + 1 ?>"><i class="fas fa-angle-right"></i></a></li>
  <?php endif;?>
</ul>