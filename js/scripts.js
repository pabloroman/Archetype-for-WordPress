(function() {

	$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$(".site-navigation").slideToggle();				
			});
			
	$(".post-content").find(".quoted").each(function(i, el) {
		$(el).attr('data-quote', $(el).text())
	});

})();