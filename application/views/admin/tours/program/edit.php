<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('dayEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/tour/program/edit/'.$day->id) ?>" method="post" enctype="multipart/form-data">

        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit day</h3>

           </div>

           <!-- form start -->
           <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?php 
                if(@$_POST){
                  echo @$_POST['en_title']; 
                } else{
                  echo $day->en_title;
                } ?>">

              </div>
              <p class="help-block red"><?=@$errors['en_title']?></p> 


              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                if(@$_POST){
                  echo @$_POST['en_description']; 
                } else{
                  echo $day->en_description;
                } ?> 
              </textarea>
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="sp_title">Arabic Title</label>
              <input type="text" class="form-control" name="sp_title" id="sp_title"  value="<?php 
              if(@$_POST){
                echo @$_POST['sp_title']; 
              } else{
                echo $day->sp_title;
              } ?>">

            </div>
            <p class="help-block red"><?=@$errors['sp_title']?></p> 


            <div class="form-group">
              <label for="sp_description">Spanish Description</label>
              <textarea  class="form-control ckeditor"  name="sp_description"><?php 
              if(@$_POST){
                echo @$_POST['sp_description']; 
              } else{
                echo $day->sp_description;
              } ?> 
            </textarea>

          </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">
            <label for="image">Day Image(s)</label>
            <input type="file" multiple  class="multi with-preview" name="image[]"/>
          </div>
          <?php 
          $i=0;

          foreach ($images as $image) { $i++ ?>
          <div class="gal galimg" id="<?= $image['id']?>">
           <img class="minimge deletable"  src="<?= base_url('uploads/'.$image['image'] )?>" />  
           <span class="deleteOverlay"></span>
           <a href=""data-toggle="modal" data-target="#deleteModal" ><span data-id="<?= $image['id']?>" class="trash trashimg overlaylink label label-danger">Delete  <i class="fa fa-trash "></i></span></a>

         </div>
         <?php } ?>
         <?php if($i > 0){?>
         <a class="deleteallimages" href=""data-toggle="modal" data-target="#deleteAllModal" ><span data-id="<?= $day->id?>" class="trashallimg trashall label label-danger">Delete All Images <i class="fa fa-trash "></i></span></a>
         <?php } ?>



             <div class="form-group">
            <label for="video">Day Video(s)</label>
            <input type="file" multiple  class="multi with-preview" name="video[]"/>
          </div>
          <?php 
          $i=0;

          foreach ($videos as $video) { $i++ ?>
          <div class="gal galvid" id="<?= $video['id']?>">
            <video class="minimge deletable"   src="<?= base_url('uploads/'.$video['video'] )?>"></video>
           <span class="deleteOverlay"></span>
           <a href=""data-toggle="modal" data-target="#deleteModalVideo" ><span data-id="<?= $video['id']?>" class="trash trashvid overlaylink label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
           
         </div>
         <?php } ?>
         <?php if($i > 0){?>
         <a class="deleteallvideos" href=""data-toggle="modal" data-target="#deleteAllVideosModal" ><span data-id="<?= $day->id?>" class="trashallvid trashall label label-danger">Delete All Images <i class="fa fa-trash "></i></span></a>
         <?php } ?>

       </div>
       <!-- /.box-body --> 
       <div class="clear"></div>
       <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>

       <div class="text-center">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?php echo base_url('admin/tour/'.$day->tour_id)?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>

<div id="deleteModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Image</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Image?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="" type="button" type="submit" class="btn btn-danger" id="deleteButton">Delete</a>
      </div>
    </div>
  </div>
</div>

<div id="deleteModalVideo" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Video</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this video?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="" type="button" type="submit" class="btn btn-danger" id="deleteButtonVid">Delete</a>
      </div>
    </div>
  </div>
</div>


<div id="deleteAllModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete All Tour's Images</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete all tour's images?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="" type="button" type="submit" class="btn btn-danger" id="deleteAllButtonImg">Delete</a>
      </div>
    </div>
  </div>
</div>

<div id="deleteAllVideosModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete All Tour's Videos</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete all tour's videos?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="" type="button" type="submit" class="btn btn-danger" id="deleteAllButtonVid">Delete</a>
      </div>
    </div>
  </div>
</div>
<script>  

$('.trashimg').click(function(e){
    var id=$(this).data('id');
    $('#deleteButton').attr({'href':'<?php echo base_url("admin/tours/deleteDayImage")?>/'+id,'rowid':id});
  });

$('.trashvid').click(function(e){
    var id=$(this).data('id');
    $('#deleteButtonVid').attr({'href':'<?php echo base_url("admin/tours/deleteDayVideo")?>/'+id,'rowid':id});
  });
$("#deleteButton").click(function(e){
       e.preventDefault(); 
       var href = $(this).attr("href");
       var id = $(this).attr("rowid");
       $.ajax({
        type: "POST",
        url: href,
        success:function(response){
                        //on success, hide  element user wants to delete.
                        $('#deleteModal').modal('hide');

                        $("#" + id).fadeTo("slow",0.7, function(){
                          $(this).remove();
                        })

                      },
                      error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                      }

                    });

     });
$("#deleteButtonVid").click(function(e){
       e.preventDefault(); 
       var href = $(this).attr("href");
       var id = $(this).attr("rowid");
       $.ajax({
        type: "POST",
        url: href,
        success:function(response){
                        //on success, hide  element user wants to delete.
                        $('#deleteModalVideo').modal('hide');

                        $("#" + id).fadeTo("slow",0.7, function(){
                          $(this).remove();
                        })

                      },
                      error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                      }

                    });

     });
$('.trashallimg').click(function(e){
    var id=$(this).data('id');

    $('#deleteAllButtonImg').attr({'href':'<?php echo base_url("admin/tours/deleteAllDayImages")?>/'+id,'rowid':id});
  });

$('.trashallvid').click(function(e){
    var id=$(this).data('id');

    $('#deleteAllButtonVid').attr({'href':'<?php echo base_url("admin/tours/deleteAllDayVideos")?>/'+id,'rowid':id});
  });
$("#deleteAllButtonImg").click(function(e){
       e.preventDefault(); 
       var href = $(this).attr("href");
       var id = $(this).attr("rowid");

       $.ajax({
        type: "POST",
        url: href,
        success:function(response){
                        //on success, hide  element user wants to delete.
                        $('#deleteAllModal').modal('hide');

                        $('.galimg').fadeTo("slow",0.7, function(){
                          $(this).remove();
                        })
                        $('.deleteallimages').hide();
                      },
                      error:function (xhr, ajaxOptions, thrownError){
                        //On error, we alert user
                        alert(thrownError);
                      }

                    });

     });


$("#deleteAllButtonVid").click(function(e){
       e.preventDefault(); 
       var href = $(this).attr("href");
       var id = $(this).attr("rowid");

       $.ajax({
        type: "POST",
        url: href,
        success:function(response){
                        $('#deleteAllVideosModal').modal('hide');

                        $('.galvid').fadeTo("slow",0.7, function(){
                          $(this).remove();
                        })
                        $('.deleteallvideos').hide();
                      },
                      error:function (xhr, ajaxOptions, thrownError){
                        //On error, we alert user
                        alert(thrownError);
                      }

                    });

     });
</script>