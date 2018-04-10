<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include 'views/layouts/head_common.php';?>
</head>
<body>
  <?php include 'views/layouts/header.php';?>
  <aside class="user-data">
    <figure class="post-avatar"><img src="<?php echo route_images . $admin['avatar']; ?>" alt="Z"></figure>
    <h3 class="default-title -aside -admin -scorpion -fullWidth">
      <?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?>
    </h3>
    <hr class="line-div -scorpion">
    <p class="default-text -scorpion -aside -fullWidth"><strong>Email: </strong><?php echo $admin['email']; ?></p>
    <p class="default-text -scorpion -aside -fullWidth"><strong>Teléfono: </strong><?php echo $admin['phone']; ?></p>
    <p class="default-text -scorpion -aside -fullWidth"><strong>User: </strong><?php echo $admin['username']; ?></p>
    <p class="default-text -scorpion -aside -fullWidth"><strong>Skype: </strong><?php echo $admin['skype']; ?></p>
  </aside>
  <div class="default-section -admin">
    <?php include 'panel_admin_opciones.php';?>
      <?php if (isset($flash_message)): ?>
        <div class="limited-container -admin"><?php echo $flash_message; ?></div>
      <?php endif?>
    <div class="result"></div>
  </div>
  <?php include 'views/layouts/footer.php';?>
  <?php include 'views/layouts/foot_common.php';?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>