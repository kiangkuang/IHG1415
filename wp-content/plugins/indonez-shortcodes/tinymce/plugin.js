(function ()
{
	// create indonezShortcodes plugin
	tinymce.create("tinymce.plugins.indonezShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("indonezPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Indonez Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "indonez_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('indonez_button', {
                    title: "Indonez Shortcode",
					image: IndonezShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Toggle", "toggle" );
					a.addWithPopup( b, "Accordion", "accordion" );
					a.addWithPopup( b, "Progress Bar", "progress" );
					a.addWithPopup( b, "Dropcap", "dropcap" );
					a.addWithPopup( b, "Heading", "heading" );
					a.addWithPopup( b, "List Style", "list" );
					a.addWithPopup( b, "Alert", "alert" );
					a.addWithPopup( b, "Paragraph", "paragraph" );
					a.addWithPopup( b, "Highlight", "highlight" );
					a.addWithPopup( b, "Pullquote", "pullquote" );
					a.addWithPopup( b, "Notebox", "note" );
					a.addWithPopup( b, "Promobox", "promobox" );
					a.addWithPopup( b, "Table", "table" );
					a.addWithPopup( b, "Pricing Table", "pricing" );
					a.addWithPopup( b, "Google Map", "gmap" );
					a.addWithPopup( b, "Video", "video" );
					a.addWithPopup( b, "Testimonial", "testimonial" );
					a.addWithPopup( b, "Testimonial Carousel", "testimonial_carousel" );
					a.addWithPopup( b, "Portfolio", "portfolio" );
					a.addWithPopup( b, "Portfolio Carousel", "portfolio_carousel" );
					a.addWithPopup( b, "Team", "team" );
					a.addWithPopup( b, "Client", "client" );
					a.addWithPopup( b, "Blog Column", "blogpost" );
					a.addWithPopup( b, "Twitter", "twitter" );
					a.addWithPopup( b, "Div", "div" );
					a.addWithPopup( b, "Spacer", "spacer" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("indonezPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Indonez Shortcodes',
				author: 'Indonez',
				authorurl: 'http://themeforest.net/user/indonez/',
				infourl: 'http://indonez.com/',
				version: "1.0"
			}
		}
	});
	
	// add indonezShortcodes plugin
	tinymce.PluginManager.add("indonezShortcodes", tinymce.plugins.indonezShortcodes);
})();