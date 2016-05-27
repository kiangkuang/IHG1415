jQuery(document).ready(function() {
	
	//Retina Image
	jQuery('img.retina').retina('@2x');
								
	jQuery('audio,video').mediaelementplayer();
	
	
	//Fancybox Jquery
	jQuery(".fancybox").fancybox({
		padding: 0,
		openEffect : 'elastic',
		openSpeed  : 250,
		closeEffect : 'elastic',
		closeSpeed  : 250,
		closeClick : true,
		helpers : {
			overlay : {opacity : 0.65},
			media : {}
		}
	});
	
	jQuery('#menu').superfish();
	
	//TinyNav Jquery
    jQuery("#menu").tinyNav({
	active: 'current_page_item', // Set the "active" class for default menu
	label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
	});

	//Search Panel
	jQuery(".trigger").click(function(){jQuery(".search-panel").toggle("fast");$(this).toggleClass("active");return false});
	
	
	
});




//*** To top Jquery ***//
(function($){$.fn.UItoTop=function(options){var defaults={text:'<i class="icon-chevron-up"></i>',min:200,inDelay:600,outDelay:400,containerID:'toTop',containerHoverID:'toTopHover',scrollSpeed:1200,easingType:'linear'},settings=$.extend(defaults,options),containerIDhash='#'+settings.containerID,containerHoverIDHash='#'+settings.containerHoverID;$('body').append('<a href="#" id="'+settings.containerID+'">'+settings.text+'</a>');$(containerIDhash).hide().on('click.UItoTop',function(){$('html, body').animate({scrollTop:0},settings.scrollSpeed,settings.easingType);$('#'+settings.containerHoverID,this).stop().animate({'opacity':0},settings.inDelay,settings.easingType);return false;}).prepend('<span id="'+settings.containerHoverID+'"></span>').hover(function(){$(containerHoverIDHash,this).stop().animate({'opacity':1},600,'linear');},function(){$(containerHoverIDHash,this).stop().animate({'opacity':0},700,'linear');});$(window).scroll(function(){var sd=$(window).scrollTop();if(typeof document.body.style.maxHeight==="undefined"){$(containerIDhash).css({'position':'absolute','top':sd+$(window).height()-50});}
if(sd>settings.min)
$(containerIDhash).fadeIn(settings.inDelay);else
$(containerIDhash).fadeOut(settings.Outdelay);});};})(jQuery);
jQuery().UItoTop({ easingType: 'easeOutQuart' });	



//*** Tooltip ***//
jQuery( document ).ready( function()
{
	var targets = jQuery( '[class=tooltip]' ),
		target	= false,
		tooltip = false,
		title	= false;

	targets.bind( 'mouseenter', function()
	{
		target	= jQuery( this );
		tip		= target.attr( 'title' );
		tooltip	= jQuery( '<div id="tooltip"></div>' );

		if( !tip || tip == '' )
			return false;

		target.removeAttr( 'title' );
		tooltip.css( 'opacity', 0 )
			   .html( tip )
			   .appendTo( 'body' );

		var init_tooltip = function()
		{
			if( jQuery( window ).width() < tooltip.outerWidth() * 1.5 )
				tooltip.css( 'max-width', jQuery( window ).width() / 2 );
			else
				tooltip.css( 'max-width', 340 );

			var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
				pos_top	 = target.offset().top - tooltip.outerHeight() - 20;

			if( pos_left < 0 )
			{
				pos_left = target.offset().left + target.outerWidth() / 2 - 20;
				tooltip.addClass( 'left' );
			}
			else
				tooltip.removeClass( 'left' );

			if( pos_left + tooltip.outerWidth() > jQuery( window ).width() )
			{
				pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
				tooltip.addClass( 'right' );
			}
			else
				tooltip.removeClass( 'right' );

			if( pos_top < 0 )
			{
				var pos_top	 = target.offset().top + target.outerHeight();
				tooltip.addClass( 'top' );
			}
			else
				tooltip.removeClass( 'top' );

			tooltip.css( { left: pos_left, top: pos_top } )
				   .animate( { top: '+=10', opacity: 1 }, 50 );
		};

		init_tooltip();
		jQuery( window ).resize( init_tooltip );

		var remove_tooltip = function()
		{
			tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
			{
				jQuery( this ).remove();
			});

			target.attr( 'title', tip );
		};

		target.bind( 'mouseleave', remove_tooltip );
		tooltip.bind( 'click', remove_tooltip );
	});
});	



//Detect Video
(function($){
	function detectVideo(){
		var flash_object = '<object style="z-index:0;" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="585" height="345"><param name="wmode" value="transparent" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="585" height="345" wmode="transparent"></embed></object>';
		var quicktime_object = '<object classid="clsid:02bf25d5-8c17-4b23-bc80-d3488abddc6b" codebase="http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0" height="345" width="585"><param name="src" value="{path}"><param name="autoplay" value="false"><param name="scale" value="tofit"><param name="type" value="video/quicktime"><embed src="{path}" scale="tofit" height="345" width="585" autoplay="false" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>';
		var iframe_object = '<iframe src="{path}" frameborder="0" allowfullscreen></iframe>';
		var toInject = "";
		
		var divWrapper = $('.video-container, .video-container-post');
		var ObjectP = divWrapper.find('a');
		
		switch(ObjectP.attr('rel')){
		  
					case 'youtube':
						//movie = 'http://www.youtube.com/v/'+igrab_param('v', ObjectP.attr('href'));
						movie = ObjectP.attr('href');
						toInject = iframe_object.replace(/{path}/g,movie);
					break;
					
					case 'vimeo':
						//movie = "http://vimeo.com/moogaloop.swf?clip_id="+ movie_id.replace('http://vimeo.com/','');
						movie = ObjectP.attr('href');
					    toInject = iframe_object.replace(/{path}/g,movie);
					break;
					
          case 'flash':
						movie = ObjectP.attr('href');
						toInject = flash_object.replace(/{path}/g,movie);
					break;
					
					case 'quicktime':
						movie = ObjectP.attr('href');
						toInject = quicktime_object.replace(/{path}/g,movie);
					break;
		}
		
		divWrapper.html(toInject);
		
	function igrab_param(name,url){
	  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	  var regexS = "[\\?&]"+name+"=([^&#]*)";
	  var regex = new RegExp( regexS );
	  var results = regex.exec( url );
	  if( results == null )
	    return "";
	  else
	    return results[1];
	}	
	
  }
  $(document).ready(function(){detectVideo();});
	
})(jQuery); 