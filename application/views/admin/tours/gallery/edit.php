<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('imageEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/tour/gallery/edit/'.$image->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit image</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?php 
                        if(@$_image){
                          echo @$_image['en_title']; 
                        } else{
                          echo $image->en_title;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 
          <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $image->en_description;
                        } ?> 
              </textarea>
              
              </div>
              
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="sp_title">Spanish Title</label>
                <input type="text" class="form-control" name="sp_title" id="sp_title"  value="<?php 
                        if(@$_image){
                          echo @$_image['sp_title']; 
                        } else{
                          echo $image->sp_title;
                        } ?>">
               
              </div> <div class="form-group">
                <label for="sp_description">Spanish Description</label>
                <textarea  class="form-control ckeditor"  name="sp_description"><?php 
                        if(@$_POST){
                          echo @$_POST['sp_description']; 
                        } else{
                          echo $image->sp_description;
                        } ?> 
              </textarea>
              
              </div>

              </div>
              

        <div class="col-md-6">
       
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$image->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/tour/'.$image->tour_id)?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
  