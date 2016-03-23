jQuery( function( $ ) {
	
  $(".bg").css( "background-size", "cover" );
	
  $("a[href='#go-to-top']").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});

});
