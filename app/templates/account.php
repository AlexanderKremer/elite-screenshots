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
			<h1>Create new post</h1>
			<form action="index.php?page=account" method="post" enctype="multipart/form-data">
				<div>
					<input type="text" name="title" id="title" placeholder="Title" class="input-group-field">
					<p><?=  isset($titleMessage) ? $titleMessage : '' ?></p>
				</div>

				<div>
					<textarea name="desc" id="desc" cols="30" rows="5" placeholder="Description" class="input-group-field"></textarea>
					<p><?=  isset($descMessage) ? $descMessage : '' ?></p>
				</div>

				<div>
					<label for="file" name="image" class="custom-file-upload input-group-field">Choose image</label>
					<input type="file" name="image" id="file">
					<p><?=  isset($imageMessage) ? $imageMessage : '' ?></p>
				</div>

				<input type="submit" name="new-upload" value="Submit" class="submit-button input-group-field">
				<p><?=  isset($uploadMessage) ? $uploadMessage : '' ?></p>

			</form>
		</div>
	</div>

</div>