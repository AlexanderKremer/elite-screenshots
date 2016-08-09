<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots - My Account',
    'desc'=>'View account details'
  ]);

?>

<body id="account-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">
		<h1>CMDR details</h1>
			<form action="index.php?page=home" method="post">
			  <div class="row align-center">
			    <div class="large-5 columns">
			      <label>
			        <input type="text" placeholder="Username" class="input-group-field">
			      </label>
			      <label>
			        <input type="text" placeholder="Email" class="input-group-field">
			      </label>
			      <label>
			        <input type="text" placeholder="Password" class="input-group-field">
			      </label>
			    </div>
			  </div>
			  <input type="submit" class="submit-button" class="input-group-field">
			</form>
		</div>
	</div>
</div>