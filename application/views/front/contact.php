<div class="page-container">
	<div class="inner-page">

	
		<div class="inner-page-header" style="background:#fff;min-height: 400px;">
			<h1 class="title">
				Contact Us
			</h1>

            <div id="map-canvas"></div>



			<svg class="contact-svg" id="svg2" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 30" version="1.1" preserveAspectRatio="none" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
				<path id="path6" d="m-100 1.041s61.625-4.5064 99.75 5.2333 70.594 15.391 124.5 16.312c55.25 0.9437 75.75-8.8513 75.75-8.8513v16.266h-300v-28.959z" style="fill:#fff;fill-opacity:.2" class="layer5"/>
				<path id="path8" d="m-100 30h300v-6.6791s-16.526 2.7112-62.25 2.3702c-58.5-0.436-97.875-12.245-153.75-15.599-55.875-3.3549-84-0.2745-84-0.2745v20.182z" style="fill:#fff;fill-opacity:.2" class="layer4"/>
				<path id="path10" d="m200 16.232s-24.625-5.6378-84.5-3.7495c-59.875 1.8882-74.962 15.943-144 16.562-50.75 0.455-71.5-3.7697-71.5-3.7697v4.7252h300v-13.768z" style="fill:#fff;fill-opacity:.3" class="layer3"/>
				<path id="path12" d="m200 1.041s-61.625-4.5064-99.75 5.2333-70.594 15.391-124.5 16.311c-55.25 0.9437-75.75-8.8513-75.75-8.8513v16.266h300v-28.959z" style="fill:#fff;fill-opacity:.3" class="layer2"/>
				<path id="path14" d="m-100 17.511s29.006-2.6495 75-0.6876c60.25 2.5701 81.25 11.545 150.25 11.912 55.721 0.2965 74.75-5.6414 74.75-5.6414v6.906h-300v-12.489z" style="fill:#fff" class="layer1"/>
			</svg>

		</div>


        <div class="section mini-section">
            <div class="grid-2">
                <div class="box-container">
                    <h1>Contact Info</h1>
                    <ul class="contact-info">
                       <li> <span><img src="<?=base_url('assets/images/mail.png')?>"></span> info@viaemmaustours.com</li> 
                       <li> <span><img src="<?=base_url('assets/images/tele.png')?>"></span>  +972 2-627-1636</li> 
                       <li> <span><img src="<?=base_url('assets/images/fax.png')?>"></span>  +972 2-627-1636</li> 
                    </ul>

                    <h1>Follow us On social media</h1>
                    
                    <center>
                        <ul class="social-media">
                            <li>
                                <a class="fb" href="#" target="_blank">
                                    
                                </a>
                            </li>
                            <li>
                                <a class="tw" href="#" target="_blank">
                                    
                                </a>
                            </li>
                            <li>
                                <a class="trip" href="#" target="_blank">
                                    
                                </a>
                            </li>
                        </ul>
                    </center>

                    <div class="clear"></div>
                </div>

            </div>
            <div class="grid-2 ">
                <div class="box-container border-left-box">
                    <h1>Contact Form</h1>

                    <form class="form" id="contactusForm" method="post" enctype="multipart/form-data" action="">
                        <input name="name" type="text" class="form-control" placeholder="Name" id="name">

                        <input name="email" class="form-control" id="email" placeholder="Email Address">

                        <input name="phone" class="form-control" id="phone" placeholder="Phone Number">

                        <textarea rows="5" name="message" class="form-control" id="message" placeholder="Message"></textarea>

                        <div id="status"></div>

                        <input type="submit" class="btn btn-gold btn-small" value="Send">

                    </form>
                </div>
            </div>

            <div class="clear"></div>
        </div>

		




	</div>
</div>
<script type="text/javascript">


    var map;
    var uluru = {lat: 31.919410, lng: 35.207249};
    function initMap() {
      map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 15,
        center: uluru,
        fullscreenControl: false,
        styles: [ { "stylers": [ { "hue": "#7cbf00" },
                {gamma: 1.15} ] } ],
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
      map.setCenter(uluru);
    }
    $(document).ready(function ($) {
      
        google.maps.event.trigger(map, 'resize');
         map.setCenter(uluru);
      });

</script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAP_Mv1CiNps6wISPJCBOpXTiQaVM3Khfw&callback=initMap"></script>
