jQuery( function( $ ) {
	
 $(document).ready(function(){
    var options = {
        autoPlay: true,
        nextButton: true,
        prevButton: true,
        preloader: true,
        navigationSkip: false,
		animateStartingFrameIn: true
    };
	
    var sequence = $("#sequence").sequence(options).data("sequence");

    sequence.afterLoaded = function(){
        $(".sequence-prev, .sequence-next").fadeIn(500);
    }
	});

});
