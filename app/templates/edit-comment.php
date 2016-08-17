<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Posts',
    'desc'=>'Explore the Elite: Dangerous communities screenshots'
  ]);

?>

<body id="edit-comment-page">

<div class="center-container">
	<div class="row align-center large-5 text-center">
		<div class="border-container">
		<h1>Edit your comment</h1>
			<form action="index.php?page=edit-comment" method="post">
			  <div class="row align-center">
			    <div class="large-6 columns large-centered">

			  		<textarea name="comment" id="comment" cols="10" rows="3"><?= $comment ?></textarea>
		        	      
			    </div>
			  </div>
			  <input type="submit" name="edit-comment" class="submit-button input-group-field" value="Submit your changes">
			</form>
		</div>
	</div>
</div>