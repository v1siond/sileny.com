<?php if (!isset($adminLayout)): ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include 'views/layouts/head_common.php';?>
</head>
<body>
  <?php include 'views/layouts/header.php';?>
  <header class="default-section -banner -blog">
    <h2 class="default-title -white -big -fullWidth"><?php echo $post['title']; ?></h3>
    <figure class="section-bg -blog" style="background: url('<?php echo route_images . '/posts/' . $post['imagen_entrada']; ?>')fixed no-repeat center center/cover" ></figure>
  </header>
<?php endif?>

  <div class="default-section">
    <div class="limited-container -between -post">
      <section class="posts-container">
        <div class="post-container">
          <header class="blog-content">
            <h4 class="default-title -post"><?php echo $post['title']; ?></h4>
            <p class="default-text -small -scorpion -date"><?php echo $post['created_at'] . ' por ' . $post['first_name'] . ' ' . $post['last_name']; ?></p>
            <figure><img src="<?php echo route_images . 'posts/' . $post['imagen_entrada']; ?>" alt=""></figure>
          </header>
          <article class="markdown-typography">
            <?php echo $parsedown->text(nl2br($post['body'])); ?>
          </article>
        </div>
        <div class="prev-next">
          <?php if (!empty($prev_post)): ?>
            <a class="default-link -prev" href="<?php echo route_ver_post . '&id=' . $prev_post['id_post']; ?>">
              <i class="fas fa-arrow-left"></i>
              <h3 class="name"><?php echo $prev_post['title'] ?></h3>
              <figure class="post-avatar -next-prev">P</figure>
            </a>
          <?php endif?>
          <?php if (!empty($next_post)): ?>
            <a class="default-link -next" href="<?php echo route_ver_post . '&id=' . $next_post['id_post']; ?>">
              <figure class="post-avatar -next-prev">N</figure>
              <h3 class="name"><?php echo $next_post['title'] ?></h3>
              <i class="fas fa-arrow-right"></i>
            </a>
          <?php endif?>
        </div>
      </section>
      <aside class="autor-bio">
        <figure class="post-avatar"><img src="<?php echo route_images . '/' . $post['avatar']; ?>" alt="Z"></figure>
        <h3 class="default-text -scorpion -fullWidth -center"><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></h3>
        <p class="default-text -scorpion -aside">
          <?php echo $post['bio']; ?>
        </p>
        <h2 class="default-title -scorpion -fullWidth">Ultimos Post</h2>
        <hr class="line-div -scorpion">
        <?php foreach ($entradas_last as $last_post): ?>
          <a class="default-link -scorpion -fullWidth" href="<?php echo route_ver_post . '&id=' . $last_post['id_post']; ?>"><?php echo $last_post['title']; ?></a>
        <?php endforeach?>
      </aside>
    </div>
  </div>
<?php if (!isset($adminLayout)): ?>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
</body>
</html>
<?php endif?>

