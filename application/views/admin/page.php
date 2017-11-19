<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('pageEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/page/'.$page->name) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['en_title']; 
                        } else{
                          echo $page->en_title;
                        } ?>">
               <p class="help-block red"><?=@$errors['en_title']?></p> 
              </div>
             
              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $page->en_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="sp_title">Spanish Title</label>
                <input type="text" class="form-control" name="sp_title" id="sp_title"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['sp_title']; 
                        } else{
                          echo $page->sp_title;
                        } ?>">
               <p class="help-block red"><?=@$errors['sp_title']?></p> 
              </div>
              
              <div class="form-group">
                <label for="sp_description">Spanish Description</label>
                <textarea  class="form-control ckeditor"  name="sp_description"><?php 
                        if(@$_POST){
                          echo @$_POST['sp_description']; 
                        } else{
                          echo $page->sp_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>
      
            <!-- /.box-body --> 
        <div class="clear"></div>
         <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>

        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</section>
