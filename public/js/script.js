(function() {

	// ------------------------------------
	// Bootstrap popover trigger
	// ------------------------------------
	$("a[data-toggle=popover]")
	.popover()
	.click(function(e) {
		e.preventDefault();
	});



	// ------------------------------------
	// Bootstrap tooltip trigger
	// ------------------------------------
	$("a[data-toggle=tooltip]")
	.tooltip();



	

	
	// ------------------------------------
	// Hoverdir
	// ------------------------------------
	$(".hoverdir .hoverdir-item").each( function() { $(this).hoverdir(); } );



	$(window).smartresize(function(){
		$containerIsotope.isotope({
			itemWidth: $('.isotope .isotope-item').width()
		});
	});

	// filter items when filter link is clicked
	$('#filters a').click(function(){
		var selector = $(this).attr('data-filter');
		$containerIsotope.isotope({ filter: selector });
		// add .active class to <li> and remove others
		$(this).parent().parent().find('.active').removeClass('active');
		$(this).parent().addClass('active');
		return false;
	});



	// ------------------------------------
	// Masonry
	// ------------------------------------
	var $containerMasonry = $('#container-masonry');
	$containerMasonry.masonry({
		resizable: false, // disable normal resizing
		itemSelector: '.masonry-item',
		columnWidth: $('.masonry .masonry-item').outerWidth(true)
	});

	$(window).smartresize(function(){
		$containerMasonry.masonry({
			columnWidth: $('.masonry .masonry-item').outerWidth(true)
		});
	});



	// ------------------------------------
	// FitVids
	// ------------------------------------
	$(".fitvids").fitVids();



	// ------------------------------------
	// FlexSlider
	// ------------------------------------
	$('.flexslider').flexslider({
		animation: "slide"
	});



	// ------------------------------------
	// Placeholder polyfill
	// ------------------------------------
	Modernizr.load({
	    test: Modernizr.input.placeholder,
	    nope: [ '/js/libs/placeholder_polyfill.jquery.min.js' ]
	});



	// ------------------------------------
	// Form validation
	// ------------------------------------
    $(".help-inline").css('display', 'none');

    $('#contact-form').on('submit', function() {
        var ret = true;
        if (!is_valid_name($("#contact-name-surname"))) ret = false;
        if (!is_valid_email($("#contact-email"))) ret = false;
        return ret;
    });

    $('#mail-form').on('submit', function() {
        var ret = true;
        if (!is_valid_name($("#mail-name-surname"))) ret = false;
        if (!is_valid_email($("#mail-email"))) ret = false;
        return ret;
    });

    $('#newsletter-form').on('submit', function() {
        var ret = true;
        if (!is_valid_email($("#newsletter-email"))) ret = false;
        return ret;
    });

    // Email validate
    function is_valid_email($element) {
        console.log($element);
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return errorDisplay(pattern.test($element.val()), $element);
    }

    // Name validate
    function is_valid_name($element) {
        console.log($element);
        return errorDisplay( $element.val().length > 0, $element);
    }

    function errorDisplay(test, $context) {
        if(test){ // valid
            if ($context.closest(".control-group").hasClass("error")){
                $context.closest(".control-group").removeClass("error");
            }
            $context.siblings(".help-inline").css("display", "none");
            return true;
        } else { // error
            if (!$context.closest(".control-group").hasClass("error")){
                $context.closest(".control-group").addClass("error");
            }
            $context.siblings(".help-inline").css("display", "block");
            return false;
        }
    }



	// ------------------------------------
	// Theme switcher
	// ------------------------------------

    // create markup
    $('body').prepend([
	    '<div class="theme-switcher">',
	            '<a class="t1" data-skin="-t1" href="#"></a>',
	            '<a class="t2" data-skin="-t2" href="#"></a>',
	            '<a class="t3" data-skin="-t3" href="#"></a>',
	            '<a class="t4" data-skin="-t4" href="#"></a>',
	    '</div>'
    ].join(""));

    $('.theme-switcher').on("click", "a", function(e){
        e.preventDefault();
        var skin = $(this).data('skin');
        // switch css
        $('link:first').attr('href', 'css/style'+ skin + '.css');

        // switch logo
        $('.brand img').attr('src', 'img/logo'+ skin + '.png');
    });
    


})();