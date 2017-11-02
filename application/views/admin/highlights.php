
<script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap-multiselect.js')?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap-multiselect.css')?>">

        <!-- Main content -->

        <section class="content">

            <?php

        if($this->session->flashdata('highlightsEdited')){

            echo'

                <div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

'.$this->session->flashdata('highlightsEdited').'</div>

            

            ';

        }

        



     ?>

          <div class="row">



       <div class="col-md-12">



        <form role="form"  action="<?php echo base_url('admin/services/highlights/') ?>" method="post" enctype="multipart/form-data">



            <!-- left column -->

            <div class="col-md-6">

              <!-- general form elements -->

              <div class="box box-primary">

             
              <div class="box-header with-border">

              <h3 class="box-title">Highlighted Services</h3>

            </div>

                <!-- form start -->

                  <div class="box-body">

                    <div class="form-group">
                    <select  id="multiselect" multiple="multiple" size="4">
                    <?php foreach ($services as $service){?>
                        <option value="<?=$service['id']?>"><?=$service['en_title']?></option>
                     <?php } ?>
					</select>
					</div>	
                   <div class="help-block red"><?=@$req?></div> 

                 <input type="text" id="selectedc" name="selectedc" hidden="hidden">    

                  
                  </div><!-- /.box-body -->



             

              </div><!-- /.box -->


          

        <div class="clear"></div>

            <div class="text-center">

                  <button type="submit" class="btn btn-primary">Save</button>

                </div>

                </form>

                 </div> 



        </div>

    </section>

 
	<script>

  
  $('#multiselect').multiselect({
	maxHeight: 400,
	enableFiltering: true,
  onChange: function(option, checked) {
    // Get selected options.

    var selectedOptions = $('#multiselect option:selected');

      if (selectedOptions.length >= 4) {
        // Disable all other checkboxes.
        var nonSelectedOptions = $('#multiselect option').filter(function() {
          return !$(this).is(':selected');
        });

        var dropdown = $('#multiselect').siblings('.multiselect-container');
        nonSelectedOptions.each(function() {
          var input = $('input[value="' + $(this).val() + '"]');
          input.prop('disabled', true);
          input.parent('li').addClass('disabled');
        });
      }
      else {
        // Enable all checkboxes.
        var dropdown = $('#multiselect').siblings('.multiselect-container');
        $('#multiselect option').each(function() {
          var input = $('input[value="' + $(this).val() + '"]');
          input.prop('disabled', false);
          input.parent('li').addClass('disabled');
        });
      }
	  	   $('#selectedc').val($('#multiselect').val()) ;

    }
  });
  
  
	$(document).ready(function(){
		var data = '<?php echo $carray;?>';
        var valArr = data.split(",");
        var i = 0, size = valArr.length;
        for (i; i < size; i++) {
            $('#multiselect').multiselect('select', valArr[i]);
		}
		$('#selectedc').val(data) ;
		    var selectedOptions = $('#multiselect option:selected');

      
      if (selectedOptions.length >= 4) {
        // Disable all other checkboxes.
        var nonSelectedOptions = $('#multiselect option').filter(function() {
          return !$(this).is(':selected');
        });

        var dropdown = $('#multiselect').siblings('.multiselect-container');
        nonSelectedOptions.each(function() {
          var input = $('input[value="' + $(this).val() + '"]');
          input.prop('disabled', true);
          input.parent('li').addClass('disabled');
        });
      }


});

    </script>
     