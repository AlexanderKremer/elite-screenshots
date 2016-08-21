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

		<h1>Edit post: <?= $this->e($post['title'])?></h1>

			<form action="index.php?page=edit-post&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">

			  <div class="row align-center">
			    <div class="large-6 columns large-centered">
			    	<input type="text" name="title" value="<?= $post['title']?>"></input>
			  		<textarea name="desc" id="desc" cols="10" rows="3"><?= $post['description'] ?></textarea>
			  		<p><?=  isset($commentError) ? $commentError : '' ?></p>
			    </div>
			    <input type="file" name="image">
			  </div>

			  <img src="img/uploads/stream/<?= $post['image'] ?>" alt="">

			  <input type="submit" name="edit-post" class="submit-button input-group-field" value="Submit your changes">

			</form>
		</div>
	</div>
</div>