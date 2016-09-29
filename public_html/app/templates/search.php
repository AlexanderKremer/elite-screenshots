<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Search',
    'desc'=>'Explore the Elite: Dangerous communities screenshots'
  ]);

?>


<body id="search-page">

<!-- <div class="center-container">
	<div class="row align-center large-10 text-center">
		<h1>Search Results</h1>
	</div>
</div> -->

<div class="center-container">
	<div class="row align-center large-10">
		<div class="border-container">
			<?php if(strlen($searchTerm) > 0): ?>

				<?php if($searchResults > 0): ?>

					<?php foreach($searchResults as $Result): ?>

						<h3><a href="index.php?page=post&postid=<?= $Result['id'] ?>"><?= $Result['score_title'] ?></a></h3>

						<p><?= $Result['score_description'] ?></p>
						<hr>

					<?php endforeach; ?>

				<?php else: ?>

					<p>There was no results for "<i><?= $this->e($searchTerm) ?></i>"</p>

				<?php endif; ?>

			<?php else: ?>

				<p>Please put something into the search bar</p>

			<?php endif; ?>
		</div>
	</div>
</div>