
$(function() {
	
	var eventListeners;
	
	var addEventListeners = function() {
	
		eventListeners = true;
		
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$(".site-navigation").slideToggle();				
		});		

		$(".post-content").find(".quoted").each(function(i, el) {
			$(el).attr('data-quote', $(el).text())
		});			
	}
		
	
	
	var containerWidth;
	var nColumns;
	var columnGutter;
	var columnWidth;

	var container 	= $(".loop");
	var pins 		= $(".loop-post");
	var blocks;
	
	var init = function() {
	
		if (!eventListeners) addEventListeners();
				
		containerWidth 	= container.width();
		blocks			= [];
		if( containerWidth <= 643 ) {
			pins.css({'position':'relative', 'left': 'auto', 'top': 'auto' });
			return;
		} else {
			nColumns = 3;
		}
        		
		columnGutter = parseInt(pins.css('marginRight'));
		columnWidth = pins.width();
		
		for( var i = 0; i < nColumns; i++ ) {
        	blocks.push(0);
        }
        
		pins.each(function(i, el) {
			var top = Math.min.apply(Math, blocks);
			var index = $.inArray(top, blocks);
			var left = (index*(columnWidth+columnGutter));
        
			$(el).css({'position':'absolute', 'left': left+"px", 'top': top });
			blocks[index] = top + $(el).outerHeight()+columnGutter;
		});
		
		maxHeight = Math.max.apply(Math, blocks);
		container.height(maxHeight);
	}
	
	$(window).on('load resize', init);
	
});