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
			  <input type="submit" class="submit-button input-group-field">
			</form>
		</div>
	</div>

	<div class="row align-center large-5 text-center">
		<div class="border-container">
			<h1>Create new post</h1>
			<form action="index.php?page=account" method="post" enctype="multipart/form-data">
				<div>
					<label for="title">Title: </label>
					<input type="text" name="title" id="title" placeholder="Title" class="input-group-field">
					<?=  isset($titleMessage) ? $titleMessage : '' ?>
				</div>

				<div>
					<label for="desc">Description: </label>
					<textarea name="desc" id="desc" cols="30" rows="5" placeholder="Description" class="input-group-field"></textarea>
					<?=  isset($descMessage) ? $descMessage : '' ?>
				</div>

				<div>
					<label for="image">Image: </label>
					<input type="file" name="image" id="image" class="input-group-field">
					<?=  isset($imageMessage) ? $imageMessage : '' ?>
				</div>

				<input type="submit" name="new-upload" value="Submit" class="submit-button input-group-field">
				<?=  isset($uploadMessage) ? $uploadMessage : '' ?>

			</form>
		</div>
	</div>

</div>