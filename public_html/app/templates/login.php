<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Login',
    'desc'=>'Login to Elite: Screenshots'
  ]);

?>

<body id="login-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">
		<h1>Requesting CMDR details</h1>
			<form action="index.php?page=login" method="post">
			  <div class="row align-center">
			    <div class="large-6 columns large-centered">

			        <input type="text" name="username" placeholder="Username" class="input-group-field">
			  		<?php if( isset($usernameMessage) ) : ?>
            			<p class="errors"> <?= $usernameMessage ?> </p>
            		<?php endif; ?>

			        <input type="password" name="password" placeholder="Password" class="input-group-field">
			      	<?php if( isset($passwordMessage) ) : ?>
           				<p class="errors"> <?= $passwordMessage ?> </p>
           			<?php endif; ?>
			      
			    </div>
			  </div>
			  <input type="submit" name="login" class="submit-button input-group-field" value="Sign In">
			</form>
		</div>
	</div>
</div>