jQuery(document).ready(function($) {

	$(".idz-tabs").tabs();
	
	$(".idz-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.idz-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.idz-toggle-title', collapsible: true});
		}
	});
	
	$(this).accordion({ header: '.idz-accordion-title', collapsible: true});
	
	//Mansory jQuery
	$('.masorny_col').masonry({
	  itemSelector : '.four'
	});	
	
	
});



//*** Progress Bar Jquery ***//
function progress(percent, element) {
var progressBarWidth = percent * element.width() / 100;
element.find('div').animate({ width: progressBarWidth }, 2000).html("<div class='progress-meter'>"+percent+"%&nbsp;</div>");
}

jQuery(document).ready(function() { 
	jQuery('.progress-bar').each(function() { 
	var bar = jQuery(this);
	var percentage = jQuery(this).attr('data-percent');
	progress(percentage, bar);
	});
});

//*** Circular Progress Bar Jquery ***//
jQuery(document).ready(function() { 
jQuery(".circular-bar").donutchart({'size': 150});
jQuery(".circular-bar").donutchart("animate");

jQuery(".circular-bar-grey").donutchart({'size': 150, 'fgColor': '#e1e1e1'});
jQuery(".circular-bar-grey").donutchart("animate");

jQuery(".circular-bar-green").donutchart({'size': 150, 'fgColor': '#1abc9c' });
jQuery(".circular-bar-green").donutchart("animate");

jQuery(".circular-bar-blue").donutchart({'size': 150, 'fgColor': '#3498db' });
jQuery(".circular-bar-blue").donutchart("animate");

jQuery(".circular-bar-orange").donutchart({'size': 150, 'fgColor': '#e67e22' });
jQuery(".circular-bar-orange").donutchart("animate");

jQuery(".circular-bar-red").donutchart({'size': 150, 'fgColor': '#e74c3c' });
jQuery(".circular-bar-red").donutchart("animate");

});
