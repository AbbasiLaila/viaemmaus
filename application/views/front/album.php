<link rel="stylesheet" href="<?=base_url('assets/styles/lightgallery.css')?>" type="text/css" />

<div class="page-container">
	<div class="inner-page">
		<div class="inner-page-header" style="background:url('<?=base_url('assets/images/g1.jpg')?>'); background-size: cover;background-position: center center;">
			<h1 class="title white-title">
				Span Tour <br/> - 10 March 2015 -
			</h1>

			<svg id="svg2" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 30" version="1.1" preserveAspectRatio="none" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
				<path id="path6" d="m-100 1.041s61.625-4.5064 99.75 5.2333 70.594 15.391 124.5 16.312c55.25 0.9437 75.75-8.8513 75.75-8.8513v16.266h-300v-28.959z" style="fill:#fff;fill-opacity:.2" class="layer5"/>
				<path id="path8" d="m-100 30h300v-6.6791s-16.526 2.7112-62.25 2.3702c-58.5-0.436-97.875-12.245-153.75-15.599-55.875-3.3549-84-0.2745-84-0.2745v20.182z" style="fill:#fff;fill-opacity:.2" class="layer4"/>
				<path id="path10" d="m200 16.232s-24.625-5.6378-84.5-3.7495c-59.875 1.8882-74.962 15.943-144 16.562-50.75 0.455-71.5-3.7697-71.5-3.7697v4.7252h300v-13.768z" style="fill:#fff;fill-opacity:.2" class="layer3"/>
				<path id="path12" d="m200 1.041s-61.625-4.5064-99.75 5.2333-70.594 15.391-124.5 16.311c-55.25 0.9437-75.75-8.8513-75.75-8.8513v16.266h300v-28.959z" style="fill:#fff;fill-opacity:.2" class="layer2"/>
				<path id="path14" d="m-100 17.511s29.006-2.6495 75-0.6876c60.25 2.5701 81.25 11.545 150.25 11.912 55.721 0.2965 74.75-5.6414 74.75-5.6414v6.906h-300v-12.489z" style="fill:#fff" class="layer1"/>
			</svg>

		</div>
		<div class="overview">
			<div class="overview-container">
				<h1>Description</h1>
				<p>Vestibulum vehicula pretium ipsum, eu ornare libero. Ut sit amet ultricies lorem, pharetra auctor mi. Proin pretium euismod nibh. Nam nec diam eu felis vestibulum fermentum. Donec accumsan turpis et dolor elementum ullamcorper. In dolor est, efficitur eu vehicula sed, tempor sed sem. Aliquam tincidunt rhoncus vehicula. Integer nec ex eu erat facilisis tempor. Cras iaculis quam non pharetra aliquam. Fusce facilisis consectetur nibh, vitae cursus quam tincidunt et. Cras mattis ipsum vel eleifend lacinia. Phasellus molestie nec urna vitae aliquet. Vivamus eu massa sit amet magna bibendum aliquet nec et nibh. Morbi ut tellus convallis orci aliquam dignissim in vehicula quam.</p>
			</div>	
		</div>

		<div class="album" id="lightgallery">

			<a href="<?=base_url('assets/images/g1.jpg')?>" class="service" data-sub-html="<h1>Span Tour </h1><p>fluent in the language of your choice, certified by the respective ministry of tourism..</p>">
				<div class="service-inner">
					<img src="<?=base_url('assets/images/g1.jpg')?>"/>
				</div>
			</a>



			<a href="<?=base_url('assets/images/g2.jpg')?>" class="service" data-sub-html="<h1>Span Tour </h1><p>fluent in the language of your choice, certified by the respective ministry of tourism..</p>">
				<div class="service-inner">
					<img src="<?=base_url('assets/images/g2.jpg')?>"/>
				</div>
			</a>


			<a href="<?=base_url('assets/images/g3.jpg')?>" class="service" data-sub-html="<h1>Span Tour </h1><p>fluent in the language of your choice, certified by the respective ministry of tourism..</p>">
				<div class="service-inner">
					<img src="<?=base_url('assets/images/g3.jpg')?>"/>
				</div>
			</a>


			<a href="<?=base_url('assets/images/g4.jpg')?>" class="service" data-sub-html="<h1>Span Tour </h1><p>fluent in the language of your choice, certified by the respective ministry of tourism..</p>">
				<div class="service-inner">
					<img src="<?=base_url('assets/images/g4.jpg')?>"/>
				</div>
			</a>

		</div>
		


	</div>
</div>

<script src="<?=base_url('assets/js/picturefill.min.js')?>"></script>
<script src="<?=base_url('assets/js/lightgallery-all.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.mousewheel.min.js')?>"></script>

<script type="text/javascript">

$(document).ready(function() {

  $("#lightgallery").lightGallery(); 
});
</script>