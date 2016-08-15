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
				<p>
			        <?= $post['title']?>
			    </p>
			    <a href="">CMDR <?= $post ['username']?></a>
			    <p><?= $post['description'] ?></p>
			    <ul>
			    	<li>Created: <?= $post['created_at'] ?></li>
			    	<li>Updated: <?= $post['updated_at'] ?></li>
			    </ul>
			</div>
		</div>
			<div class="add-comments-container ">
				<textarea name="comment" id="comment" cols="10" rows="3" placeholder="Comment..."></textarea>
			<div class="comment-button">
				<input type="submit" class="button" name="new-comment" value="Add Comment">
			</div>
		</div>
	</div>


	<section class="large-3 columns">
			<div class="comments-container">
				<h1>Comments: </h1>
				<article>
					<p>Test Comment</p>
					<small>Written by: <a href="">Test</a></small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>
				<article>
					<p>Test Comment</p>
					<small>Written by: Test</small>
				</article>

			</div>
	</section>

</div>