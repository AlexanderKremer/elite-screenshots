<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Edit comment',
    'desc'=>'Edit your comments'
  ]);

?>

<body id="edit-comment-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">

		<h1>Edit your comment</h1>

			<form action="index.php?page=edit-comment&id=<?= $_GET['id'] ?>" method="post">

			  <div class="row align-center">
			    <div class="large-10 columns large-centered">

			  		<textarea name="comment" id="comment" cols="10" rows="3" class="input-group-field"><?= $comment ?></textarea>
			  		<p><?=  isset($commentError) ? $commentError : '' ?></p>
			    </div>
			  </div>
			  <input type="submit" name="edit-comment" class="submit-button input-group-field" value="Submit your changes">

			</form>
		</div>
	</div>
</div>