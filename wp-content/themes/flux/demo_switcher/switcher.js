  jQuery(document).ready(function($) {
								  
    var idz_templateurl = jQuery('#idz_templateurl').attr('href') + "/";
	
	var layouttypeval = jQuery.cookie("if_cookie_layouttypeval");
	
	if(layouttypeval=="fullwidth"){
		var fullwidthselected = 'selected="selected"';
		var boxedselected = '';
	}else{
		var fullwidthselected = '';
		var boxedselected = 'selected="selected"';
	}	
	
	
	var styleswitcherstr = ' \
	<div id="style-switcher"> \
	<form id="style-switcher-form">\
	  <div id="style-switcher-heading"><a id="toggleswitcher" href="#"><h4>Style Switcher</h4></a></div>\
	  <div class="switchercontainer"> \
		  <span>Layout Type</span> \
			<select id="layouttype" name="layouttype"> \
				<option value="fullwidth" '+fullwidthselected+'>Full Width</option> \
				<option value="boxed" '+boxedselected+'>Boxed</option> \
			</select> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span class="title">Body</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker14" class="boxpicker"><div></div></div> <span class="pickertext">BG Body</span> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span class="title">Top Section</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker3" class="boxpicker"><div></div></div> <span class="pickertext">BG Color</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker4" class="boxpicker"><div></div></div> <span class="pickertext">Text Color</span> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span class="title">Menu Section</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker5" class="boxpicker"><div></div></div> <span class="pickertext">BG Color</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker6" class="boxpicker"><div></div></div> <span class="pickertext">Menu Color</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker15" class="boxpicker"><div></div></div> <span class="pickertext">Top Border Menu</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker7" class="boxpicker"><div></div></div> <span class="pickertext">BG Active Menu</span> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span class="title">Footer Section</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker10" class="boxpicker"><div></div></div> <span class="pickertext">BG Color</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker11" class="boxpicker"><div></div></div> <span class="pickertext">Heading</span> \
		  <div class="clear"></div> \
		  <div id="colorpicker12" class="boxpicker"><div></div></div> <span class="pickertext">Color Text</span> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <span class="title">Patterns</span> \
		  <div class="clear"></div> \
		  <a rel="bg-body1" class="bg-box" href=""></a> \
		  <a rel="bg-body2" class="bg-box" href=""></a> \
		  <a rel="bg-body3" class="bg-box" href=""></a> \
		  <a rel="bg-body4" class="bg-box" href=""></a> \
		  <a rel="bg-body5" class="bg-box" href=""></a> \
		  <a rel="bg-body6" class="bg-box" href=""></a> \
		  <a rel="bg-body7" class="bg-box" href=""></a> \
		  <a rel="bg-body8" class="bg-box" href=""></a> \
		  <a rel="bg-body9" class="bg-box" href=""></a> \
		  <a rel="bg-body10" class="bg-box" href=""></a> \
		  <a rel="bg-body11" class="bg-box" href=""></a> \
		  <a rel="bg-body12" class="bg-box" href=""></a> \
		  <a rel="bg-body13" class="bg-box" href=""></a> \
		  <a rel="bg-body14" class="bg-box" href=""></a> \
		  <a rel="bg-body15" class="bg-box" href=""></a> \
		  <a rel="bg-body16" class="bg-box" href=""></a> \
		  <a rel="bg-body17" class="bg-box" href=""></a> \
		  <a rel="bg-body18" class="bg-box" href=""></a> \
		  <a rel="bg-body19" class="bg-box" href=""></a> \
		  <a rel="bg-body20" class="bg-box" href=""></a> \
		  <div class="clear"></div> \
	  </div> \
	  <div class="switchercontainer"> \
		  <a href="#" id="switcher-reset">Reset</a> \
		  <div class="clear"></div> \
	  </div> \
	  </form>\
	</div> \
	';
	
	jQuery("body").prepend( styleswitcherstr );
	
	jQuery("#toggleswitcher").click(function(e){
		jQuery("#style-switcher").toggleClass("active");
	});
    
	/*************** COLOR PICKER ******************/
	
	
	
	
	
	jQuery('#colorpicker3').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var topbg = hex;
				
				jQuery('#colorpicker3 div').css('backgroundColor', '#' + hex);
				
				jQuery('header#top').css({"background": '#' + topbg});
	           
				jQuery.cookie("indonez_cookie_topbg", topbg);  
				
				
			},
      color: '#34495e'
	  
    });
	
	
	jQuery('#colorpicker4').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var toptext = hex;
				
				jQuery('#colorpicker4 div').css('backgroundColor', '#' + hex);
				
				jQuery('#top-info, #top-info span, #top-info a, #top-info a:visited').css({"color": '#' + toptext});
	           
				jQuery.cookie("indonez_cookie_toptext", toptext);  
				
				
			},
      color: '#61758a'
	  
    });
	
	jQuery('#colorpicker5').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var menuconbg = hex;
				
				jQuery('#colorpicker5 div').css('backgroundColor', '#' + hex);
				var getbgcolor = jQuery.Color('#' + menuconbg).alpha(0.2);
				
				jQuery('#mainmenu-wrapper, #menu ul').css({"background": '#' + menuconbg, "border-color":getbgcolor.toRgbaString()});
	           
				jQuery.cookie("indonez_cookie_menuconbg", menuconbg);  
				
				
			},
      color: '#283849'
	  
    });
	
	
	jQuery('#colorpicker6').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var menucolor = hex;
				
				jQuery('#colorpicker6 div').css('backgroundColor', '#' + hex);
				
				jQuery('#mainmenu ul li a, #mainmenu ul li li a:hover').css({"color": '#' + menucolor});
				jQuery('#mainmenu ul li li a').css({"color": '#828282'});
				jQuery('#mainmenu ul li li a').hover(
					function () {
						jQuery(this).css('color', '#' + menucolor);
					}, 
					function () {
						jQuery(this).css('color', '#828282');
					}
				);
				
	           
				jQuery.cookie("indonez_cookie_menucolor", menucolor);  
				
				
			},
      color: '#d4d7db'
	  
    });
	
	jQuery('#colorpicker15').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var mbordercolor = hex;
				
				jQuery('#colorpicker15 div').css('backgroundColor', '#' + hex);
				var html = '<span class="mborder"></span>';
				
				jQuery('.mborder').css({"background": '#' + mbordercolor});
	jQuery('ul#menu > li.current_page_item, ul#menu > li.current_page_parent, ul#menu > li.current-menu-parent, ul#menu > li.current-menu-item').prepend(html);
	jQuery('ul#menu > li.current_page_item > span.mborder, ul#menu > li.current_page_parent > span.mborder, ul#menu > li.current-menu-parent > span.mborder, ul#menu > li.current-menu-item > span.mborder').css({"background": '#' + mbordercolor});
	jQuery("ul#menu > li").hover(
  
   function() {

        // Do not append menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;

        // Append menu-hover on non-selected li
        jQuery(this).prepend(html);
        jQuery("ul#menu > li span.mborder").fadeIn("slow");
		jQuery('.mborder').css({"background": '#' + mbordercolor});

    },
	
   function() {
        
		// Do not remove menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;
		
		// Remove span
        jQuery(this).find("span.mborder").remove();

    }
	
	);
				
	           
				jQuery.cookie("indonez_cookie_mbordercolor",mbordercolor);  
				
				
			},
      color: '#1abc9c'
	  
    });
	
	
	jQuery('#colorpicker7').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var menuactivebg = hex;
				
				jQuery('#colorpicker7 div').css('backgroundColor', '#' + hex);
				var getbgcolor = jQuery.Color('#' + menuactivebg).alpha(0.2);
				
				jQuery('#mainmenu ul li:hover, #mainmenu li.current_page_item,#mainmenu li.current_page_parent,	#mainmenu li.current-menu-parent, #mainmenu li.current-menu-item').css({"background": '#' + menuactivebg, "border-color":getbgcolor.toRgbaString()});
				
				jQuery('#mainmenu ul ul.sub-menu li:hover, #mainmenu ul.sub-menu li.current_page_item ,#mainmenu ul.sub-menu li.current_page_parent ,	#mainmenu ul.sub-menu li.current-menu-parent, #mainmenu ul.sub-menu li.current-menu-item').css({"background": 'transparent', "border-color":'#34495e'});
	           
				jQuery.cookie("indonez_cookie_menuactivebg", menuactivebg);  
				
				
			},
      color: '#254550'
	  
    });
	
	
	
	
	jQuery('#colorpicker10').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footerbg = hex;
				
				jQuery('#colorpicker10 div').css('backgroundColor', '#' + hex);
				
				jQuery('footer').css({"background": '#' + footerbg});
	           
				jQuery.cookie("indonez_cookie_footerbg", footerbg);  
				
				
			},
      color: '#34495e'
	  
    });
	
	
	jQuery('#colorpicker11').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footerheading = hex;
				
				jQuery('#colorpicker11 div').css('backgroundColor', '#' + hex);
				
				jQuery('footer h1, footer h2, footer h3, footer h4, footer h5, footer h6').css({"color": '#' + footerheading});
	           
				jQuery.cookie("indonez_cookie_footerheading", footerheading);  
				
				
			},
      color: '#ffffff'
	  
    });
	
	
	jQuery('#colorpicker12').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footercolortext = hex;
				
				jQuery('#colorpicker12 div').css('backgroundColor', '#' + hex);
				
				jQuery('footer ul li a, footer ul li a:visited, footer p').each(function () {
					this.style.setProperty('color', '#' + footercolortext, 'important');
				});
	           
				jQuery.cookie("indonez_cookie_footercolortext", footercolortext);  
				
				
			},
      color: '#85929e'
	  
    });
	
	jQuery('#colorpicker13').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var footersocicon = hex;
				
				jQuery('#colorpicker13 div').css('backgroundColor', '#' + hex);
				
				jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').css('backgroundColor', '#' + footersocicon);
				var getbgcolor = jQuery.Color('#' + footersocicon).alpha(0.8);
				jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').hover(
					function () {
						jQuery(this).css('backgroundColor', getbgcolor.toRgbaString());
					}, 
					function () {
						jQuery(this).css('backgroundColor', '#' + footersocicon);
					}
				);
	           
				jQuery.cookie("indonez_cookie_footersocicon", footersocicon);  
				
				
			},
      color: '#5e5e5e'
	  
    });
	
	
	jQuery('#colorpicker14').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn("fast");
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut("fast");
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				
				var bgbody = hex;
				
				jQuery('#colorpicker14 div').css('backgroundColor', '#' + hex);
				
				jQuery('body').css('backgroundColor', '#' + bgbody);
	           
				jQuery.cookie("indonez_cookie_bgbody", bgbody);  
				
				
			},
      color: '#ffffff'
	  
    });
	
	jQuery('#colorpicker div').css('backgroundColor', '#1abc9c');
	jQuery('#colorpicker2 div').css({"background": '#646464'});
	jQuery('#colorpicker3 div').css({"background": '#34495e'});
	jQuery('#colorpicker4 div').css({"background": '#61758a'});
	jQuery('#colorpicker5 div').css({"background": '#283849'});
	jQuery('#colorpicker6 div').css({"background": '#d4d7db'});
	jQuery('#colorpicker7 div').css({"background": '#254550'});
	jQuery('#colorpicker8 div').css({"background": '#4badef'});
	jQuery('#colorpicker9 div').css({"background": '#59b8f7'});
	jQuery('#colorpicker10 div').css({"background": '#34495e'});
	jQuery('#colorpicker11 div').css({"background": '#ffffff'});
	jQuery('#colorpicker12 div').css({"background": '#85929e'});
	jQuery('#colorpicker13 div').css({"background": '#5e5e5e'});
	jQuery('#colorpicker14 div').css({"background": '#ffffff'});
	jQuery('#colorpicker15 div').css({"background": '#1abc9c'});
	
	
	/*************** END COLOR PICKER ******************/
	
	/*************** BACKGROUND PATTERN BOX **************/
	jQuery('#style-switcher a.bg-box').each(function (i) {
		var backgroundUrl = 'url('+idz_templateurl+'/images/bg/' + jQuery(this).attr('rel') + '.jpg)';
		var a = jQuery(this);
		a.css({
			backgroundImage: backgroundUrl,
	  		backgroundRepeat: "repeat"
		})
	});
	/*************** END BACKGROUND PATTERN BOX **************/
	
  
  /********** bg-box.click ***************/
  jQuery('#style-switcher a.bg-box').click(function (e) {
      e.preventDefault();
      var backgroundUrl = 'url('+idz_templateurl+'/images/bg/' + jQuery(this).attr('rel') + '.jpg)';
      jQuery('body').css({
          backgroundImage: backgroundUrl,
          backgroundRepeat: "repeat"
      });
    jQuery.cookie("indonez_cookie_bgimage",backgroundUrl);
  });
  /********** end bg-box.click ***********/
  
	jQuery('#layouttype').change(function(e){
		var layouttypeval = jQuery(this).val();
		if(layouttypeval=="fullwidth"){
			jQuery("#wrapper").addClass("fullwidth");
			jQuery("#wrapper").removeClass("boxed");
			location.reload();
		}else{
		   jQuery("#wrapper").addClass("boxed");
		   jQuery("#wrapper").removeClass("fullwidth");
		   location.reload();
		}
		jQuery.cookie("if_cookie_layouttypeval", layouttypeval);
	});  

  var layouttypeval		= jQuery.cookie("if_cookie_layouttypeval");
  var generalcolor 		= jQuery.cookie("indonez_cookie_generalcolor");
  var headingcolor 		= jQuery.cookie("indonez_cookie_headingcolor");
  var topbg		 		= jQuery.cookie("indonez_cookie_topbg");
  var toptext	 		= jQuery.cookie("indonez_cookie_toptext");
  var menuconbg	 		= jQuery.cookie("indonez_cookie_menuconbg");
  var menucolor	 		= jQuery.cookie("indonez_cookie_menucolor");
  var mbordercolor 		= jQuery.cookie("indonez_cookie_mbordercolor");
  var menuactivebg		= jQuery.cookie("indonez_cookie_menuactivebg");
  var headerbg			= jQuery.cookie("indonez_cookie_headerbg");
  var footerbg			= jQuery.cookie("indonez_cookie_footerbg");
  var footerheading		= jQuery.cookie("indonez_cookie_footerheading");
  var footercolortext	= jQuery.cookie("indonez_cookie_footercolortext");
  var footersocicon		= jQuery.cookie("indonez_cookie_footersocicon");
  var bgbody	 		= jQuery.cookie("indonez_cookie_bgbody");
  var background 		= jQuery.cookie("indonez_cookie_bgimage");
  
  if (layouttypeval) {
     jQuery("#wrapper").addClass(layouttypeval);
  }
  
  
  if(topbg){
	  	
		jQuery('#colorpicker3 div').css('backgroundColor', '#' + topbg );
	  
		jQuery('header#top').css({"background": '#' + topbg});	  
  }
  
  if(toptext){
	  	
		jQuery('#colorpicker4 div').css('backgroundColor', '#' + toptext );
	  
		jQuery('#top-info, #top-info span, #top-info a, #top-info a:visited').css({"color": '#' + toptext});	  
  } 
  
  if(menuconbg){
		jQuery('#colorpicker5 div').css('backgroundColor', '#' + menuconbg );
		var getbgcolor = jQuery.Color('#' + menuconbg).alpha(0.2);
		jQuery('#mainmenu-wrapper, #menu ul').css({"background": '#' + menuconbg, "border-color":getbgcolor.toRgbaString()});	  
  } 
  
  if(menucolor){
		jQuery('#colorpicker6 div').css('backgroundColor', '#' + menucolor );
		jQuery('#mainmenu ul li a, #mainmenu ul li li a:hover').css({"color": '#' + menucolor});
		jQuery('#mainmenu ul li li a').css({"color": '#d4d7db'});
		jQuery('#mainmenu ul li li a').hover(
			function () {
				jQuery(this).css('color', '#' + menucolor);
			}, 
			function () {
				jQuery(this).css('color', '#d4d7db');
			}
		);
  } 
  
  if(menuactivebg){
		jQuery('#colorpicker7 div').css('backgroundColor', '#' + menuactivebg );
		var getbgcolor = jQuery.Color('#' + menuactivebg).alpha(0.2);
		jQuery('#mainmenu ul li:hover, #mainmenu li.current_page_item,#mainmenu li.current_page_parent,	#mainmenu li.current-menu-parent, #mainmenu li.current-menu-item').css({"background": '#' + menuactivebg, "border-color":getbgcolor.toRgbaString()});
				jQuery('#mainmenu ul ul.sub-menu li:hover, #mainmenu ul.sub-menu li.current_page_item ,#mainmenu ul.sub-menu li.current_page_parent ,	#mainmenu ul.sub-menu li.current-menu-parent, #mainmenu ul.sub-menu li.current-menu-item').css({"background": 'transparent'});
		
  } 
  
  
  if(mbordercolor){
	  	
		jQuery('#colorpicker15 div').css('backgroundColor', '#' + mbordercolor );
	  
				var html = '<span class="mborder"></span>';
				
				jQuery('.mborder').css({"background": '#' + mbordercolor});
	jQuery('ul#menu > li.current_page_item, ul#menu > li.current_page_parent, ul#menu > li.current-menu-parent, ul#menu > li.current-menu-item').prepend(html);
	jQuery('ul#menu > li.current_page_item > span.mborder, ul#menu > li.current_page_parent > span.mborder, ul#menu > li.current-menu-parent > span.mborder, ul#menu > li.current-menu-item > span.mborder').css({"background": '#' + mbordercolor});
	jQuery("ul#menu > li").hover(
  
   function() {

        // Do not append menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;

        // Append menu-hover on non-selected li
        jQuery(this).prepend(html);
        jQuery("ul#menu > li span.mborder").fadeIn("slow");
		jQuery('.mborder').css({"background": '#' + mbordercolor});

    },
	
   function() {
        
		// Do not remove menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;
		
		// Remove span
        jQuery(this).find("span.mborder").remove();

    }
	
	);
  }
  
  
  if(footerbg){
		jQuery('#colorpicker10 div').css('backgroundColor', '#' + footerbg );
		jQuery('footer').css({"background": '#' + footerbg});
  } 
  
  if(footerheading){
		jQuery('#colorpicker11 div').css('backgroundColor', '#' + footerheading );
		jQuery('footer h1, footer h2, footer h3, footer h4, footer h5, footer h6').css({"color": '#' + footerheading});
  } 
  
  if(footercolortext){
		jQuery('#colorpicker12 div').css('backgroundColor', '#' + footercolortext );
		jQuery('footer ul li a, footer ul li a:visited, footer p').each(function () {
			this.style.setProperty('color', '#' + footercolortext, 'important');
		});
  } 
  
  if(footersocicon){
		jQuery('#colorpicker13 div').css('backgroundColor', '#' + footersocicon );
		jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').css('backgroundColor', '#' + footersocicon);
		var getbgcolor = jQuery.Color('#' + footersocicon).alpha(0.8);
		jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').hover(
			function () {
				jQuery(this).css('backgroundColor', getbgcolor.toRgbaString());
			}, 
			function () {
				jQuery(this).css('backgroundColor', '#' + footersocicon);
			}
		);
  } 
  
  
  if (bgbody) {
	  jQuery('#colorpicker14 div').css('backgroundColor', '#' + bgbody);
      jQuery('body').css({
        backgroundColor: '#' + bgbody,
        backgroundRepeat: "repeat"
      });
  }

  if (background) {
      jQuery('body').css({
        backgroundImage: background,
        backgroundRepeat: "repeat"
      });
  }
  
  
  jQuery("#switcher-reset").click(function(){
		var generalcolor = "1abc9c";
		var headingcolor = "646464";
		var topbg = "34495e";
		var toptext = "61758a";
		var menuconbg = "283849";
		var menucolor = "d4d7db";
		var mbordercolor = "1abc9c";
		var menuactivebg = "254550";
		var headerbg = "59b8f7";
		var footerbg = "34495e";
		var footerheading = "ffffff";
		var footercolortext = "85929e";
		var footersocicon = "5e5e5e";
		var bgbody = "ffffff";
		
		
		
		jQuery('#colorpicker2 div').css({"background": '#646464'});
		jQuery('#colorpicker3 div').css({"background": '#34495e'});
		jQuery('#colorpicker4 div').css({"background": '#61758a'});
		jQuery('#colorpicker5 div').css({"background": '#283849'});
		jQuery('#colorpicker6 div').css({"background": '#d4d7db'});
		jQuery('#colorpicker7 div').css({"background": '#254550'});
		jQuery('#colorpicker9 div').css({"background": '#59b8f7'});
		jQuery('#colorpicker10 div').css({"background": '#34495e'});
		jQuery('#colorpicker11 div').css({"background": '#ffffff'});
		jQuery('#colorpicker12 div').css({"background": '#85929e'});
		jQuery('#colorpicker13 div').css({"background": '#5e5e5e'});
		jQuery('#colorpicker14 div').css({"background": '#ffffff'});
		jQuery('#colorpicker15 div').css({"background": '#1abc9c'});
		
		var layouttypeval = "fullwidth";
		jQuery("#wrapper").removeClass("boxed");
		jQuery("#wrapper").addClass(layouttypeval);
		jQuery.cookie("if_cookie_layouttypeval",layouttypeval);
		location.reload();
		jQuery("#layouttype").val(layouttypeval);
		
		
		jQuery('header#top').css({"background": '#' + topbg});
		jQuery.cookie("indonez_cookie_topbg", topbg); // topbg cookie
		
		jQuery('#top-info, #top-info span, #top-info a, #top-info a:visited').css({"color": '#' + toptext});
		jQuery.cookie("indonez_cookie_toptext", toptext); // toptext cookie
		
		jQuery('#mainmenu-wrapper, #menu ul').css({"background": '#' + menuconbg, "border-color":'#2f8bc9'});
		jQuery.cookie("indonez_cookie_menuconbg", menuconbg);  // menu container bg cookie
		
		jQuery('#mainmenu ul li a, #mainmenu ul li li a:hover').css({"color": '#' + menucolor});
		jQuery('#mainmenu ul li li a').css({"color": '#d4d7db'});
		jQuery('#mainmenu ul li li a').hover(
			function () {
				jQuery(this).css('color', '#' + menucolor);
			}, 
			function () {
				jQuery(this).css('color', '#d4d7db');
			}
		);
		jQuery.cookie("indonez_cookie_menucolor", menucolor);  // menu color cookie
		
		
		jQuery('#mainmenu ul li:hover, #mainmenu li.current_page_item,#mainmenu li.current_page_parent,	#mainmenu li.current-menu-parent, #mainmenu li.current-menu-item').css({"background": '#' + menuactivebg});
		jQuery.cookie("indonez_cookie_menuactivebg", menuactivebg); // menu active bg cookie 
		
		jQuery('.mborder').css({"background": '#' + mbordercolor});
		jQuery.cookie("indonez_cookie_mbordercolor",mbordercolor);
		
		jQuery('footer').css({"background": '#' + footerbg});
		jQuery.cookie("indonez_cookie_footerbg", footerbg);   // footer bg cookie  
		
		jQuery('footer h1, footer h2, footer h3, footer h4, footer h5, footer h6').css({"color": '#' + footerheading});
		jQuery.cookie("indonez_cookie_footerheading", footerheading);  // footer heading color cookie
		
		jQuery('footer ul li a, footer ul li a:visited, footer p').each(function () {
			this.style.setProperty('color', '#' + footercolortext, 'important');
		});
		jQuery.cookie("indonez_cookie_footercolortext", footercolortext); // footer color text cookie 
		
		jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').css('backgroundColor', '#' + footersocicon);
		jQuery('footer .circle-social li, footer .circle-icon, footer .square-social li, footer .square-icon').hover(
			function () {
				jQuery(this).css('backgroundColor', '#272727');
			}, 
			function () {
				jQuery(this).css('backgroundColor', '#' + footersocicon);
			}
		);
		jQuery.cookie("indonez_cookie_footersocicon", footersocicon); // footer social color cookie 
		
		jQuery('body').css('backgroundColor', '#' + bgbody);
		jQuery.cookie("indonez_cookie_bgbody", bgbody);  //BG Body cookie 
		
		var backgroundUrl = 'url('+idz_templateurl+'/images/bg/trans.png)';
		jQuery('body').css({
		  	backgroundImage: backgroundUrl,
		  	backgroundRepeat: "repeat"
	  	});
		jQuery.cookie("indonez_cookie_bgimage",backgroundUrl);
		
  });
         
});   