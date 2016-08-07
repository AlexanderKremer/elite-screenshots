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
			<form>
			  <div class="row align-center">
			    <div class="large-6 columns large-centered">
			      <label>
			        <input type="text" placeholder="Username" class="input-group-field">
			      </label>

			      <br>

			      <label>
			        <input type="text" placeholder="Password" class="input-group-field">
			      </label>
			      
			      <br>
			    </div>
			  </div>
			  <input type="submit" class="submit-button" class="input-group-field">
			</form>
		</div>
	</div>
</div>