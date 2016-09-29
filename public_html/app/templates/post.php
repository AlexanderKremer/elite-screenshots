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

			    		if( $_SESSION['id'] == $post['user_id'] || $_SESSION['privilege'] == 'admin' ) {

			    			?>

			    		<button id="delete-post"><small>Delete</small></button>

			    		<div id="delete-post-options">
			    			<a href="<?= $_SERVER['REQUEST_URI'] ?>&delete"><small>Yes</small></a> <button><small>No</small></button>
			    		</div>

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

			<?php if (!isset($_SESSION['id'])): ?>
				<div class="add-comments-container ">
					<p>Must be logged in to comment</p>
				</div>
			<?php endif; ?>

			<?php if (isset($_SESSION['id'])): ?>
			<form action="index.php?page=post&postid=<?= $_GET['postid'] ?>" method="post">
				<div class="add-comments-container clearfix">
				
					<textarea name="comment" id="comment" cols="10" rows="3" placeholder="Comment..."></textarea>
					<p><?=  isset($commentMessage) ? $commentMessage : '' ?></p>
					<div class="comment-button">
						<input type="submit" name="new-comment" value="Add Comment" class="submit-button input-group-field">
					</div>
				</div>
			</form>
			<?php endif; ?>
		<!-- </div> -->
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
									if( $_SESSION['id'] == $comment['user_id'] || $_SESSION['privilege'] == 'admin' ) {

										?>
										<button class="delete-comment"><small>Delete</small></button>

							    		<div class="delete-comment-options">
							    			<a href="<?= $_SERVER['REQUEST_URI'] ?>&delete-comment=<?= $comment['id'] ?>"><small>Yes</small></a> <button><small>No</small></button>
							    		</div>

										<?php
										echo '<a href="index.php?page=edit-comment&id='. $comment['id'].'"><small>Edit</small></a>';
									}
								}

							?>

						</article>
					<?php endforeach ?>

				</div>
		</section>

</div>

<script>
	
	$(document).ready(function(){

		$('#delete-post, #delete-post-options button').click(function(){

			$('#delete-post-options').toggle();

		});

		$('.delete-comment').click(function(){
			$(this).parent().children('.delete-comment-options').toggle();
		});

		$('.delete-comment-options button').click(function(){
			
			// $(this)
			
			
			$(this).parent().toggle();
			// console.log($(this).parent().children('.delete-comment'));
			// $(this).children().parent('.delete-comment-options').toggle();
		});


	});

</script>