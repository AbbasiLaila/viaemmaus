<li class="header">MAIN NAVIGATION</li>
<li class="active"><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<?php if ($this->ion_auth->in_group('super')){?>
<li><a href="<?php echo base_url('admin/users')?>"><i class="fa fa-users"></i> <span>CMS Users</span></a></li>
<?php } ?>



<li class="treeview"> <a href="#"> <i class="fa fa-info"></i> <span>About</span> <i class="fa fa-angle-left pull-right"></i> </a>
  <ul class="treeview-menu">
      <li><a href="<?php echo base_url('admin/about/overview')?>"> <span>Overview</span></a></li>
      <li><a href="<?php echo base_url('admin/about/holy_land')?>"> <span>Holy Land</span></a></li>
      <li><a href="<?php echo base_url('admin/about/why_us')?>"> <span>Why Us</span></a></li>

  </ul>
</li>
<li><a href="<?php echo base_url('admin/services/highlights')?>"><i class="fa fa-tags "></i> <span>Highlighted Services</span></a></li>

<li><a href="<?php echo base_url('admin/services')?>"><i class="fa fa-tags "></i> <span>Services</span></a></li>

<li><a href="<?php echo base_url('admin/tours')?>"><i class="fa fa-plane"></i> <span>Tours</span></a></li>



<li><a href="<?php echo base_url('admin/privacy')?>"><i class="fa fa-lock "></i> <span>Privacy Policy</span></a></li>
<li><a href="<?php echo base_url('admin/terms')?>"><i class="fa fa-gavel "></i> <span>Terms of use</span></a></li>
<li class="treeview"> <a href="#"> <i class="fa fa-image"></i> <span>Gallery</span> <i class="fa fa-angle-left pull-right"></i> </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo base_url('admin/gallery')?>"><span>Gallery Albums</span></a></li>
    <li><a href="<?php echo base_url('admin/gallery/images')?>"><span>Album Images</span></a></li>


  </ul>
</li>

<li><a href="<?php echo base_url('admin/files')?>"><i class="fa fa-file "></i> <span>Upload Files</span></a></li>
<li><a href="<?php echo base_url('admin/contact')?>"><i class="fa fa-info-circle "></i> <span>Contact Us</span></a></li>
<li class="treeview"> <a href="#"><i class="fa fa-cog"></i><span>SEO Pages</span><i class="fa fa-angle-left pull-right"></i></a>
  <ul class="treeview-menu">
    <?php foreach($pages as $page){?>
    <li><a href="<?php echo base_url('admin/seo/'.$page['name'])?>"><i class="fa fa-file-text-o"></i>
      <?=$page['en_title']?>
      </a></li>
    <?php } ?>
  </ul>
</li>
<li><a href="<?php echo base_url('admin/support')?>"><i class="fa fa-phone "></i> <span>Support</span></a></li>
