<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Register',
    'desc'=>'Become a member of the Elite: Dangerous screenshots and art community'
  ]);

?>

<body id="register-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">

		<h1>Enlist here</h1>

			<form action="index.php?page=register" method="post">

			  <div class="row align-center">
			    <div class="large-6 columns large-centered">

			        <input type="text" name="username" class="input-group-field" placeholder="Username">
			        <?php if( isset($usernameMessage) ) : ?>
            			<p class="errors"> <?= $usernameMessage ?> </p>
            		<?php endif; ?>

			        <input type="text" name="email" placeholder="Email" class="input-group-field" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
			        <?php if( isset($emailMessage) ) : ?>
            			<p class="errors"> <?= $emailMessage ?> </p>
            		<?php endif; ?>

			      	<input type="password" name="password" class="input-group-field" placeholder="Password">
			      	<?php if( isset($passwordMessage) ) : ?>
           				<p class="errors"> <?= $passwordMessage ?> </p>
           			<?php endif; ?>

			    </div>
			  </div>
			  <input type="submit" name="new-account" class="submit-button input-group-field" value="Sign Up">
			</form>

			<div class="disclaimer">
				<small>Creating an account means you agree with Elite: Screenshot's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></small>
			</div>

		</div>
	</div>
</div>