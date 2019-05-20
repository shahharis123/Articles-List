
<?php include_once('public_header.php'); ?>
<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1>
          <?php echo $article->title; ?>
        </h1>
      </div>
      <div class="col-lg-6">
        <span class="pull-right">
          <?php echo $article->created_at; ?>
        </span>
      </div>
  </div>
  <hr>
  <p>
    <?php echo $article->body; ?>
  </p>
</div>
<?php include_once('public_footer.php'); ?>