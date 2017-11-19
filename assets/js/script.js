$(document).ready(function ($) {

    $(document).on("click",".menu-open",function(e) {
   		e.preventDefault();

   		if($(".side-menu").hasClass('open')){
   			$(".side-menu").removeClass('open');
   		}else{
   			$(".side-menu").addClass('open');
   		}

	});

	$(document).on("click",".days-list ul li a",function(e) {
   		e.preventDefault();
   		console.log($(this).attr('href'));

   		var
                link_href = $(this).attr('href')
                , $linkElem = $(link_href)
                , $linkElem_scroll = $linkElem.get(0) && $linkElem.position().top+500;
            $('html, body')
                .animate({
                    scrollTop: $linkElem_scroll
                }, 'slow');

	});

	$(document).on("click",".scroll-icon",function(e) {
   		e.preventDefault();

            $('html, body')
                .animate({
                    scrollTop: $('.section-2-home').position().top
                }, 'slow');

	});



});