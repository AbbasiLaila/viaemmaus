<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/gallery/albums/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Album</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?=@$_POST['en_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

               
                <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['en_description']?>" name="en_description"><?=@$_POST['en_description']?>
                </textarea>
               
              </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                <label for="sp_title">Spanish Title</label>
                <input type="text" class="form-control" name="sp_title" id="sp_title"  value="<?=@$_POST['sp_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['sp_title']?></p> 

          
                <div class="form-group">
                <label for="sp_description">Spanish Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['sp_description']?>" name="sp_description"><?=@$_POST['sp_description']?>
                </textarea>
                
              </div>
              </div>
              
             
              

              <div class="form-group">
                <label for="image">Thumbnail</label>
                <input type="file" name="image" id="image">
                
              <p class="help-block red"><?=@$required?></p> 
              <p class="help-block red"><?=@$upload_response?></p> 
              </div>
            

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          
      <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?php echo base_url('admin/gallery')?>" class="btn btn-info">Back</a> </div>
        </div>
      </form>
    </div>
  </div>
</section>
