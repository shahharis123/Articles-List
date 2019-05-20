<?php include_once('admin_header.php'); ?>
<div class="container">
<!-- <form action="store_article" method="post"> -->
<?php echo form_open('admin/store_article'); ?>
<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
<?php echo form_hidden('created_at', date('l jS \of F Y h:i:s A')) ; ?>
<legend>Add Article</legend>
<div class="row col-lg-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Article Title</label>
    <?php echo form_input(array("type"=>"text", "name"=>"title", "class"=>"form-control", "id"=>"exampleInputEmail", "aria-describedby"=>"emailHelp", "placeholder"=>"Article Title", "value"=>set_value('title'))); ?>
    <!--<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">-->
  </div>
  </div>
  <div class="row col-lg-6">
  <?php echo form_error('title'); ?>
  </div>
  <div class="row col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Article Body</label>
    <?php echo form_textarea(array("type"=>"", "name"=>"body", "class"=>"form-control", "id"=>"exampleInputPassword1", "placeholder"=>"Article Body", "value"=>set_value('body'))); ?>
    <!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
  </div>
  </div>
  <div class="row col-lg-6">
  <?php echo form_error('body'); ?>
  </div>
  <?php echo form_reset(array("name"=>"reset", "value"=>"Reset", "class"=>"btn btn-default")); ?>
  <!--<button type="reset" class="btn btn-default">Cancel</button>-->
  <?php echo form_submit(array("name"=>"submit", "value"=>"Submit", "class"=>"btn btn-primary")); ?>
  <!--<button type="submit" class="btn btn-primary">Submit</button>-->
<?php echo form_close(); ?>
<!-- </form> -->
</div>
<?php include_once('admin_footer.php'); ?>