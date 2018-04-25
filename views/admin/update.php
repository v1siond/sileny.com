<div class="default-section -edit_user -edit -animate wow fadeInRight" data-wow-duration="1s" id="edit_user">
	<div class="limited-container">
		<form class="default-form -edit" action="<?php echo route_admin; ?>" data-action="update" method="POST" enctype="multipart/form-data" name="edit_user">
			<input type="hidden" value="<?php echo $admin['id']; ?>" name="id">
			<h2 class="default-title -scorpion -fullWidth">Edit Info</h2>
      <div class="input-container -between">
				<label for="first_name" class="default-text -scorpion label">Nombre</label>
	      <input class="input" type="text" name="first_name" value="<?php echo $admin['first_name']; ?>">
      </div>
			<div class="input-container -between">
			  <label for="last_name" class="default-text -scorpion label">Apellido</label>
			  <input class="input" type="text" name="last_name" value="<?php echo $admin['last_name']; ?>">
			</div>
			<div class="input-container -between">
			  <label for="email" class="default-text -scorpion label">Email</label>
			  <input class="input" type="email" name="email" value="<?php echo $admin['email']; ?>">
			</div>
			<div class="input-container -between">
			  <label for="phone" class="default-text -scorpion label">Teléfono</label>
			  <input class="input" name="phone" value="<?php echo $admin['phone']; ?>">
			</div>
			<div class="input-container -between">
			  <label for="skype" class="default-text -scorpion label">Skype</label>
			  <input class="input" name="skype" value="<?php echo $admin['skype']; ?>">
			</div>
			<div class="input-container">
			  <label for="bio" class="default-text -scorpion label -fullWidth -center">Biografía</label>
			  <textarea class="input -fullWidth" name="bio"><?php echo $admin['bio']; ?></textarea>
			</div>
			<div class="input-container -between">
	      <label for="new_avatar" class="default-text -scorpion label">Avatar</label>
				<input type="file" name="new_avatar" class="default-button -input">
				<input type="hidden" name="old_avatar" value="<?php echo $admin['avatar']; ?>">
			</div>
			<div class="input-container -between">
				<label for="pass_v" class="default-text -scorpion label">Contraseña Actual</label>
				<input type="password" class="input" name="pass_v" id="pass_v" placeholder="**********" value="">
			</div>
			<div class="input-container -between">
				<label for="pass_n" class="default-text -scorpion label">Contraseña Nueva</label>
				<input type="password" class="input" name="pass_n" id="pass_n" placeholder="**********" value="">
			</div>
			<div class="input-container -between">
				<label for="pass_c" class="default-text -scorpion label">Repetir Contreseña</label>
				<input type="password" class="input" name="pass_c" id="pass_c" placeholder="************" value="">
			</div>
			<input class="default-button -edit" type="submit" value="Editar" name="edit_user">
		</form>
	</div>
</div>