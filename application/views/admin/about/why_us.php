<!-- Main content -->
<section class="content">
 <?=@$this->session->flashdata('dataAdded') ?>
 <di class="row">
   <div class="col-md-12">
    <div class="box box-primary">
     <div class="box-header">
      <h3 class="box-title">Why Us</h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="data-table" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Title</th>
         <th>Icon</th>
         <th>Actions</th>
       </tr>
     </thead>
     <tbody>
      <?php foreach ($data as $item): ?>
      <tr id="<?php echo $item['id']  ?>">
       <td>  <?php echo $item['en_title']  ?></td>
       <td>  <img class="minimge" src="<?= base_url('uploads/'.$item['image'] )?>" /></td>
       <td>
        <a href="<?php echo base_url('admin/why_us/edit/'.$item['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
