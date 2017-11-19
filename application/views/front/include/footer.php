<footer>
   <span class="copy-right">
        © 2017 Via Emmaus Tours, All Rights Reserved
   </span> 
   <span class="powered">
       Powered By
       <a href="#" target="_blank">
           <img src="<?=base_url('assets/images/media.png')?>">
       </a>
   </span> 
</footer>




<script type="text/javascript">

$(document).ready(function() {

    $(function() {
      $(".rating_star").each(function() {
        var $this=$(this);
        var rating=$this.data("rating");

        $this.codexworld_rating_widget({
            starLength: '5',
            initialValue: rating,
            callbackFunctionName: 'processRating',
            imageDirectory: 'assets/images',
            inputAttr: 'tourID'
        });
      });
    });
        
    
});

</script>

</body>
</html>