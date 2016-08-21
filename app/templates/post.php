<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Posts',
    'desc'=>'Explore the Elite: Dangerous communities screenshots'
  ]);

?>


<body id="post-page">

<div class="post-container row expanded">
	<div class="picture-container large-9 columns">
		<div class="post-border">

			
		<img src="img/uploads/original/<?= $post['image'] ?>" alt="">	
			<div class="details-container">
				<h2><?= htmlentities($post['title']) ?></h2>
			    <a href="">CMDR <?= htmlentities($post ['username']) ?></a>
			    <p><?= htmlentities($post['description']) ?></p>

			    <?php
			    	if( isset($_SESSION['id']) ){

			    		if( $_SESSION['id'] == $post['user_id'] ) {

			    			?>
			    		<a href=""><small>Delete</small></a>
						<a href="index.php?page=edit-post&id=<?= $_GET['postid'] ?>"><small>Edit</small></a>
							<?php
			    		}

			    	}
			    ?>
<!-- 			    <ul>
			    	<li>Created: <?= $post['created_at'] ?></li>
			    	<li>Updated: <?= $post['updated_at'] ?></li>
			    </ul> -->
			</div>
		</div>
			<form action="index.php?page=post&postid=<?= $_GET['postid'] ?>" method="post">
				<div class="add-comments-container ">
					<textarea name="comment" id="comment" cols="10" rows="3" placeholder="Comment..."></textarea>
				<div class="comment-button">
					<input type="submit" name="new-comment" value="Add Comment" class="submit-button input-group-field">
				</div>
			</form>
		</div>
	</div>

	
	
		<section class="large-3 columns">
				<div class="comments-container">
					<h1>Comments: </h1>

					<?php foreach($allComments as $comment): ?>
						<article>
							<p><?= htmlentities($comment['comment']) ?></p>
							<small>Written by: <?= htmlentities($comment['username']) ?><a href=""></a></small>

							<?php

								if( isset($_SESSION['id']) ) {
									if( $_SESSION['id'] == $comment['user_id'] ) {
										echo '<a href=""><small>Delete</small></a>';
										echo '<a href="index.php?page=edit-comment&id='. $comment['id'].'"><small>Edit</small></a>';
									}
								}

							?>

						</article>
					<?php endforeach ?>

				</div>
		</section>	


<!-- 	<section class="large-3 columns">
			<div class="comments-container">
				<h1>Comments: </h1>
				<article>
					<p>Test Comment</p>
					<small>Written by: <a href="">Test</a></small>
				</article>
			</div>
	</section> -->

</div>