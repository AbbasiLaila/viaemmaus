<section class="content">
   <div class="col-md-12">
      <h4>Contact information </h4>
      <table class="table">
         <tr>
            <td class="col-md-2" >Email Address</td>
            <td class="col-md-4"><a class="editable_contact"  id="email"  data-name="email" data-type="email" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->email; ?> </a></td>
         </tr>
       
         <tr>
            <td class="col-md-2">Fax</td>
            </td>
            <td class="col-md-4"><a class="editable_contact"  id="fax"  data-name="fax"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->fax; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Phone Number</td>
            </td>
            <td class="col-md-4"><a class="editable_contact"  id="phone"  data-name="phone"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->phone; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Latitude</td>
            </td>
            <td class="col-md-4"><a class="editable_contact"  id="latitude"  data-name="latitude"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->latitude; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Longitude</td>
            </td>
            <td class="col-md-4"><a class="editable_contact"  id="longitude"  data-name="longitude"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->longitude; ?> </a></td>
         </tr>
           <hr>
           <tr>
            <td class="col-md-2" >Contact Form Email Address</td>
            <td class="col-md-4"><a class="editable_contact"  id="contactFormEmail"  data-name="contactFormEmail" data-type="email" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->contactFormEmail; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2" >Service Inquiry Form Email Address</td>
            <td class="col-md-4"><a class="editable_contact"  id="servicesFormEmail"  data-name="servicesFormEmail" data-type="email" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->servicesFormEmail; ?> </a></td>
         </tr>
      </table>
    
      <div class="clear"></div>
   </div>
   <hr>
   <div class="social col-md-12">
      <h4>Social links </h4>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-facebook-f"></i></dt>
         <dd><a class="editable_contact"  id="facebook"  data-name="facebook"  data-type="text" data-pk="1"> <?php echo $contact->facebook; ?></a> </dd>
      </dl>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-twitter"></i></dt>
         <dd><a class="editable_contact"  id="twitter"  data-name="twitter"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->twitter; ?></a> </dd>
      </dl>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-tripadvisor"></i></dt>
         <dd><a class="editable_contact"  id="tripadvisor"  data-name="tripadvisor"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->tripadvisor; ?></a> </dd>
      </dl>
   </div>
   <div class="clear"></div>
   </div>
</section>
<script>
   $(document).ready(function() {
      
   
   
    $('.editable_contact').editable({
   
      type: 'text',
   
      title: 'Edit Field',
   
      url: '<?php echo base_url('admin/update_contact')?>',
   
      placement: 'right',
   
    });
   
   
   });
   
   
</script>