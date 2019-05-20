<?php include('admin_header.php'); ?>
<div class="container">
<div class="row justify-content-end">
  <div class="col-lg-6">
  <?php echo anchor('admin/add_article', 'Add Article', array('class'=>'btn btn-lg btn-info float-right')); ?>
  </div>
</div>
<?php if($feedback = $this->session->flashdata('feedback')):
      $feedback_class = $this->session->flashdata('feedback_class');
   ?>
<div class="row justify-content-center">
  <div class="col-lg-6">
  <div class="alert <?php echo $feedback_class ?>" role="alert">
  <?php echo $feedback; ?>
</div>
  </div>
</div>
<?php endif; ?>
   <table class="table">
      <thead>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>Action</th> 
      </thead>
      <tbody>
      <?php if(count($articles)): ?>
      <?php $count = $this->uri->segment(3, 0); ?>
      <?php foreach($articles as $article): ?>
          <tr>
            <td>
            <?php echo ++$count; ?>
            </td>
            <td>
            <?php echo $article->title ?>
            </td>
            <td>
            <div class="row">
              <div class="col-lg-2">
              <?php echo anchor("admin/edit_article/$article->id", 'Edit', array('class'=>'btn btn-primary')); ?>
              </div>
              <div class="col-lg-2">
              <?php echo form_open('admin/delete_article'),
                         form_hidden('article_id', $article->id),
                         form_submit(array('name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger')),
                         form_close();?>
              </div>
            </div>
              
              <!-- <a href="" class="btn btn-primary">Edit</a> -->
              
              <!-- <a href="" class="btn btn-danger">Delete</a> -->
            </td>
          </tr>
      <?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="3">
No Records Found.
</td>
</tr>
<?php endif; ?>
      </tbody>
   </table>
     <ul class="pagination pagination-md justify-content-center">
   <?php echo $this->pagination->create_links(); ?>
   </ul>
<?php include('admin_footer.php'); ?>

