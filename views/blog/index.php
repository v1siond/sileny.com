<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include 'views/layouts/head_common.php';?>
</head>
<body>
  <?php include 'views/layouts/header.php';?>
  <header class="default-section -banner -blog">
    <h2 class="default-title -white -big -fullWidth">Blog</h3>
    <h3 class="default-text -white -center">Consejos, tips, información, recursos y estrategias para ser más feliz</h3>
    <figure class="section-bg -blog"></figure>
  </header>
  <div class="default-section">
    <div class="limited-container -between -post">
      <section class="posts-container">
        <?php foreach ($entradas as $entrada): ?>
          <article class="post-wrapper">
            <div class="post-image-media">
              <img class="image" src="<?php echo route_images . '/posts/' . $entrada['imagen_entrada']; ?>" alt="color:#F5F5F5">
              <div class="post-social-media" id="post_<?php echo $entrada['id_post']; ?>">
                <a class="icon" href="#google"><img src="<?php echo route_images; ?>google.png" alt="" class="image"></a>
                <a class="icon" href="#skype"><img src="<?php echo route_images; ?>skype.png" alt="" class="image"></a>
                <a class="icon" href="#whatsapp"><img src="<?php echo route_images; ?>whatsapp.png" alt="" class="image"></a>
              </div>
            </div>
            <div class="post-title-share">
              <h4 class="default-title -scorpion -post"><a href="<?php echo route_ver_post . '&id=' . $entrada['id_post']; ?>"><?php echo $entrada['title']; ?></a></h4>
              <div class="share-button" id="post_<?php echo $entrada['id_post']; ?>">
                <span class="bullet"></span>
                <span class="bullet"></span>
                <span class="bullet"></span>
              </div>
              <a class="read-button" href="<?php echo route_ver_post . '&id=' . $entrada['id_post']; ?>"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="post-autor-date">
              <div class="autor">
                <figure class="post-avatar"><img src="<?php echo $entrada['title']; ?>" alt="Z"></figure>
                <p class="default-text -scorpion"><?php echo $entrada['first_name'] . ' ' . $entrada['last_name']; ?></p>
              </div>
            </div>
          </article>
        <?php endforeach?>
      </section>
      <aside class="autor-bio">
        <figure class="post-avatar"><img src="<?php echo route_images . '/' . $admin['avatar']; ?>" alt="Z"></figure>
        <h3 class="default-text -scorpion -fullWidth -center"><?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?></h3>
        <p class="default-text -scorpion -aside">
          <?php echo $admin['bio']; ?>
        </p>
        <h2 class="default-title -scorpion -fullWidth">Ultimos Post</h2>
        <hr class="line-div -scorpion">
        <?php foreach ($entradas_last as $last_post): ?>
          <a class="default-link -scorpion -fullWidth -left" href="ver_post.php?id=<?php echo $last_post['id_post']; ?>"><?php echo $last_post['title']; ?></a>
        <?php endforeach?>
      </aside>
  	</div>
  </div>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
</body>
</html>