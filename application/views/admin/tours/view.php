<!-- Main content -->
<section class="content">
  <div class="row">

   <div class="col-md-12">

      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-body">
            <div class="col-md-6">
             <h4>English Data</h4>
             <dl class="dl-horizontal">
              <dt>Title</dt>
              <dd><?= $tour->en_title ?></dd>
              <dt>Description</dt>
              <dd><?= $tour->en_description ?></dd>
             
            </dl>
          </div>  
          <div class="col-md-6">
              <h4>Spanish Data</h4>
             <dl class="dl-horizontal">
              <dt>Title</dt>
              <dd><?= $tour->sp_title ?></dd>
              <dt>Description</dt>
              <dd><?= $tour->sp_description ?></dd>
             
            </dl>
          </div>  
          <dl>
            <dt>Thumbnail</dt>
            <dd><img class="minimge" src="<?= base_url('uploads/'.$tour->thumbnail )?>" /></dd>
          </dl>
       <div class="text-center"><a href="<?php echo base_url('admin/tours/edit/'.$tour->id)?>"><span class="label label-primary">Edit Tour Information</span></a>
</div>
            <di class="row">
   <div class="col-md-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">Tour Program</h3>
            <div class="text-center">
               <a href="<?php echo base_url('admin/tour/program/add/'.$tour->id)?>" class="btn btn-primary">Add Tour Day</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($tourDays as $day): ?>
                  <tr id="<?php echo $day['id']  ?>">
                     <td>  <?php echo $day['en_title']  ?></td>
                     <td>
                        <a href="<?php echo base_url('admin/tour/program/edit/'.$day['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
                        <a href="" data-toggle="modal" data-target="#deleteModal" ><span data-id="<?php echo $day['id']?>"  class="trash trashday label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>


   <div class="col-md-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">Tour Old Images</h3>
            <div class="text-center">
               <a href="<?php echo base_url('admin/tour/gallery/add/'.$tour->id)?>" class="btn btn-primary">Add Image</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Image</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($tourImages as $image): ?>
                  <tr id="<?php echo $image['id']  ?>">
                     <td>  <?php echo $image['en_title']  ?></td>
                     <td>  <img class="minimge" src="<?= base_url('uploads/'.$image['image'] )?>" /></td>
                     <td>
                        <a href="<?php echo base_url('admin/tour/gallery/edit/'.$image['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
                        <a href="" data-toggle="modal" data-target="#deleteModalImage" ><span data-id="<?php echo $image['id']?>"  class="trash trashimg label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>



   </div>

        



      </div><!-- /.box -->

      <!-- Form Element sizes -->

    </div><!--/.col (left) -->
  </div>




</div>
</section>

<div id="deleteModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Delete day program</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this day?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" type="button" type="submit" class="btn btn-danger" id="deleteButton">Delete</a>
         </div>
      </div>
   </div>
</div>

<div id="deleteModalImage" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Delete tour image</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this image?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" type="button" type="submit" class="btn btn-danger" id="deleteButtonImage">Delete</a>
         </div>
      </div>
   </div>
</div>
<script>  
   $('.trashday').click(function(e){
       var id=$(this).data('id');   
   
       $('#deleteButton').attr({'href':'<?php echo base_url("admin/tours/delete_day")?>/'+id,'rowid':id});
   });
    $("#deleteButton").click(function(e){
            e.preventDefault(); 
            var href = $(this).attr("href");
            var id = $(this).attr("rowid");
   
           $.ajax({
             type: "POST",
             url: href,
             success:function(response){
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

      $('.trashimg').click(function(e){
       var id=$(this).data('id');   
   
       $('#deleteButtonImage').attr({'href':'<?php echo base_url("admin/tours/delete_img")?>/'+id,'rowid':id});
   });
    $("#deleteButtonImage").click(function(e){
            e.preventDefault(); 
            var href = $(this).attr("href");
            var id = $(this).attr("rowid");
   
           $.ajax({
             type: "POST",
             url: href,
             success:function(response){
           $('#deleteModalImage').modal('hide');
           
            $("#" + id).fadeTo("slow",0.7, function(){
               $(this).remove();
           })
   
           },
           error:function (xhr, ajaxOptions, thrownError){
               alert(thrownError);
           }
   
                });
   
      });
</script>