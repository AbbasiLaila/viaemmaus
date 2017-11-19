<div class="page-container">
	<div class="inner-page">

	
		<div class="inner-page-header" style="background:url('<?=base_url('assets/images/tour3.jpg')?>'); background-size: cover;background-position: center center;">
			<h1 class="title white-title">
				Local Tours
			</h1>



			<svg id="svg2" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 30" version="1.1" preserveAspectRatio="none" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
				<path id="path6" d="m-100 1.041s61.625-4.5064 99.75 5.2333 70.594 15.391 124.5 16.312c55.25 0.9437 75.75-8.8513 75.75-8.8513v16.266h-300v-28.959z" style="fill:#fff;fill-opacity:.2" class="layer5"/>
				<path id="path8" d="m-100 30h300v-6.6791s-16.526 2.7112-62.25 2.3702c-58.5-0.436-97.875-12.245-153.75-15.599-55.875-3.3549-84-0.2745-84-0.2745v20.182z" style="fill:#fff;fill-opacity:.2" class="layer4"/>
				<path id="path10" d="m200 16.232s-24.625-5.6378-84.5-3.7495c-59.875 1.8882-74.962 15.943-144 16.562-50.75 0.455-71.5-3.7697-71.5-3.7697v4.7252h300v-13.768z" style="fill:#fff;fill-opacity:.3" class="layer3"/>
				<path id="path12" d="m200 1.041s-61.625-4.5064-99.75 5.2333-70.594 15.391-124.5 16.311c-55.25 0.9437-75.75-8.8513-75.75-8.8513v16.266h300v-28.959z" style="fill:#fff;fill-opacity:.3" class="layer2"/>
				<path id="path14" d="m-100 17.511s29.006-2.6495 75-0.6876c60.25 2.5701 81.25 11.545 150.25 11.912 55.721 0.2965 74.75-5.6414 74.75-5.6414v6.906h-300v-12.489z" style="fill:#fff" class="layer1"/>
			</svg>

		</div>

		<div class="section mini-section">
			<div class="inner-small-container">
					<div class="box-container rating-inner">
						<h3> Local Tours Service Rating</h3>
						<div class="rating-section">
                            <div class="rating-center">
                              <input name="rating" value="5" class="rating_star" id="rating_star" type="hidden"  tourID="1" data-rating="5" />
                            </div>

                            <span class="rating-value">5.0</span>
                            <span class="rating-people">7 Total</span>
                        </div>

                        <div class="btns-group-small">
		                    <a class="btn" href="<?=base_url('/front/itineraries')?>">See Tours</a>
		                    <a class="btn" data-toggle="modal" data-target="#bookTour">Add Review</a>
		                </div>
		                
         			</div>
         		
         	</div>
		</div>

		<div class="description">
			<div class="description-container">

				<p>Over the years, the family of Via Emmaus has strived towards excellence and perfection. The
				passion and dedication has enabled Via Emmaus to provide perfectly planned pilgrimages and
				tours, among which are:</p>
				<ul>
					<li>Impeccable Christian pilgrimages; with special focus on Anglican, Catholic, and Greek
					Orthodox pilgrimages.</li>
					<li>Historical and archeological tours of Israel, Palestine, Jordan and Egypt.</li>
					<li>Facilitate pilgrimages at the Marian sanctuaries in Portugal and France, Christian tours
					in Rome, as well as pilgrimage following the footsteps of St. Paul.</li>
				</ul>

				<p>Via Emmaus’ hallmark is the personalized flexibility, and distinction in each pilgrimage
				operated. The first step is a personalized itinerary built to the taste of the client.</p>

			</div>	
		</div>
	




	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="bookTour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Review</h5>
       

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" id="contactusForm" method="post" enctype="multipart/form-data" action="">

        	<div class="rating-section">
                <div class="rating-center">
                  <input name="rating" value="0" class="rating_star" id="rating_star" type="hidden"  tourID="1" data-rating="0" />
                </div>
			</div>

            <div class="col-1">
              <input name="name" type="text" class="form-control" placeholder="Name" id="name">

              <input name="phone" class="form-control" id="phone" placeholder="Phone Number">
            </div>
            <div class="col-2">
              <input name="email" class="form-control" id="email" placeholder="Email Address">
              <select class="form-control">
              	<option value="">Guides</option>
              	<option value="">Local Tours</option>
              	<option value="">Hotel Reservations</option>
              	<option value="">Restaurant Reservations </option>
              	<option value="">Modern Transportation </option>

              </select>
            </div>
            <div class="col-all">
              <textarea rows="5" name="message" class="form-control" id="message" placeholder="Write Review"></textarea>
            </div>

          </form>
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" class="btn btn-gold btn-small">Add Review</button>
        </center>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>

