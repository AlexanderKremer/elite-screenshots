<?php 

  $this->layout('master', [
    'title'=>'Elite: Screenshots Homepage',
    'desc'=>'The latest screenshots and art from the Elite: Dangerous community'
  ]);

?>


<body id="home-page">

  <div id="grid" class="large-12">

    <?php foreach($allUploads as $item): ?>
      <article class="grid-item">
        <a href="index.php?page=post&postid=<?= $item['id'] ?>">
          <img src="img/uploads/stream/<?= $item['image'] ?>" alt="">
        </a>
        <div class="upload-container">
          <h1>
            <a href="index.php?page=post&postid=<?= $item['id'] ?>">
              <?= htmlentities($item['title']) ?>
            </a>
          </h1>
          <a href="">CMDR <?= htmlentities($item['username']) ?></a>
        </div>
      </article>
    <?php endforeach ?>

    <!-- <article class="grid-item">
      <a href="index.php?page=post">
        <img src="img/test1.jpg" alt="">
      </a>
        <div class="upload-container">
          <h1>
              <a href="#">test</a>
          </h1>
          <a href="">CMDR test</a>
        </div>

    </article>

    <article class="grid-item">
      <a href="index.php?page=post&postid=<?= $item['id'] ?>">
        <img src="img/uploads/stream/<?= $item['image'] ?>" alt="">
      </a>
      <div class="upload-container">
        <h1>
          <a href="index.php?page=post&postid=<?= $item['id'] ?>">
            <?= htmlentities($item['title']) ?>
          </a>
        </h1>
        <a href="">CMDR <?= $item['user_id'] ?></a>
      </div>

    </article> -->



  </div>