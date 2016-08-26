<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Edit Post',
    'desc'=>'Edit your posts'
  ]);

?>

<body id="edit-post-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">

		<h1>Edit post: <?= $this->e($originalTitle) ?></h1>

			<form action="index.php?page=edit-post&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">

			  <div class="row align-center">
			    <div class="large-10 columns large-centered">
			    	<input type="text" name="title" class="input-group-field" value="<?= $post['title'] ?>"></input>
			    	<p><?=  isset($titleError) ? $titleError : '' ?></p>

			  		<textarea name="description" id="desc" cols="10" rows="3" class="input-group-field"><?= $post['description'] ?></textarea>
			  		<p><?=  isset($descError) ? $descError : '' ?></p>
			    </div>
			  </div>

			  <img src="img/uploads/stream/<?= $post['image'] ?>" alt="">

			  <label for="file" name="image" class="custom-file-upload input-group-field">Choose image</label>

			  <input type="file" name="image" id="file">
			  <p><?=  isset($imageMessage) ? $imageMessage : '' ?></p>

			  <input type="submit" name="edit-post" class="submit-button input-group-field" value="Submit your changes">
			  <p><?= isset($updateMessage) ? $updateMessage : '' ?></p>

			</form>
		</div>
	</div>
</div>