(function($) {

	$.fn.reorder = function(options) {

		// Config
		var defaults = {
			'extratop': 30,
			'initialtop': 30,
			'selector': 'body',
			'wait': 1000,
			'wrapperselector': 'body'		
		};

		$.fn.reorder.options = $.extend(defaults, options);
        var options = $.fn.reorder.options;

        // Functions
        var getcolsnumber = function() {

        	var width = $(window).width();
        	if(width < 768) {
        		return 1;
        	} else if(width >= 768 && width < 992) {
        		return 3;
        	} else {
        		return 4;
        	}
        }

        var getdivs = function() {
        	return $(options.selector);
        }

        var getfirstlineelement = function(pos, cols) {

        	do {
        		if(pos % cols == 0) return pos;
        		else pos = pos - 1;
        	} while(pos > 0);

        	return 0;

        }

        var getleftpos = function(pos, cols, divs) {

        	var fle = getfirstlineelement(pos, cols);
        	var left = 0;

        	for(var i = fle; i < pos; i++) {
        		left = left + parseInt($(divs[i]).css('width').replace('px', ''));
        	}

        	return left;

        }

        var gettoppos = function(pos, cols, divs) {
        	
        	var top = options.initialtop;

        	if(pos < cols) {
        		return options.initialtop;
        	}

        	for(var i = (pos - cols); i >= 0; i = (i - cols)) {
        		top = top + parseInt($(divs[i]).css('height').replace('px', '')) + options.extratop;
        	}

        	return top;

        }

        var main = function() {

        	setTimeout(function() {

	        	var cols = getcolsnumber();
	        	var divs = getdivs();
	        	var maxheight = 0;

	        	for(var i = 0; i < divs.length; i++) {

	        		var leftpos = getleftpos(i, cols, divs);
	        		var toppos = gettoppos(i, cols, divs);

	        		$(divs[i]).css('position', 'absolute');
	        		$(divs[i]).css('left', leftpos);
	        		$(divs[i]).css('top', toppos);

	        		newheight = toppos + parseInt($(divs[i]).css('height').replace('px', ''));
	        		if(newheight > maxheight) {
	        			maxheight = newheight;
	        		}
	        	}

	        	$(options.wrapperselector).css('height', maxheight);

	        }, options.wait);

        }

        // Return plugin
        return this.each(function() {

        	main();

        }); 

	}

	$.fn.reorder.options = {};

})(jQuery);