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

			<form action="index.php?page=home" method="post">

			  <div class="row align-center">
			    <div class="large-6 columns large-centered">

			        <input type="text" placeholder="Username" class="input-group-field">
			        <?php if( isset($usernameMessage) ) : ?>
            			<p> <?= $usernameMessage ?> </p>
            		<?php endif; ?>

			      <br>

			        <input type="text" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" class="input-group-field">
			        <?php if( isset($emailMessage) ) : ?>
            			<p> <?= $emailMessage ?> </p>
            		<?php endif; ?>

			      <br>

			      	<input type="password" name="password" placeholder="Password" class="input-group-field">
			      	<?php if( isset($passwordMessage) ) : ?>
           				<p> <?= $passwordMessage ?> </p>
           			<?php endif; ?>

			      <br>
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