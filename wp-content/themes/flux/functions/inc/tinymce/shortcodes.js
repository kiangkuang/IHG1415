/* SET LOCALIZED VARIABLES */
var columns_title = objectL10n.columns_title;
var row_title = objectL10n.row_title;
var onecol_title = objectL10n.onecol_title;
var onehalf_title = objectL10n.onehalf_title;
var onethird_title = objectL10n.onethird_title;
var onefourth_title = objectL10n.onefourth_title;
var onesixth_title = objectL10n.onesixth_title;
var threefourth_title = objectL10n.threefourth_title;
var twothird_title = objectL10n.twothird_title;

var elements_title = objectL10n.elements_title;
var button_title  = objectL10n.button_title ;
var dropcap1_title = objectL10n.dropcap1_title;
var dropcap2_title = objectL10n.dropcap2_title;
var dropcap3_title = objectL10n.dropcap3_title;
var pullquote_left_title = objectL10n.pullquote_left_title ;
var pullquote_right_title  = objectL10n.pullquote_right_title ;
var infobox_title  = objectL10n.infobox_title ;
var successbox_title  = objectL10n.successbox_title ;
var warningbox_title  = objectL10n.warningbox_title ;
var errorbox_title  = objectL10n.errorbox_title;
var image_title  = objectL10n.image_title ;
var highlighttext_title  = objectL10n.highlighttext_title ;
var paragraphtext_title  = objectL10n.paragraphtext_title ;


var list_title = objectL10n.list_title;
var disclist_title  = objectL10n.disclist_title ;
var squarelist_title  = objectL10n.squarelist_title; 
var nobulletlist_title  = objectL10n.nobulletlist_title; 
var arrowlist_title  = objectL10n.arrowlist_title ;
var checklist_title  = objectL10n.checklist_title ;
var pluslist_title  = objectL10n.pluslist_title ;
var deletelist_title  = objectL10n.deletelist_title;
var starlist_title  = objectL10n.starlist_title; 
var pinlist_title  = objectL10n.pinlist_title; 
var flaglist_title  = objectL10n.flaglist_title; 



var content_title = objectL10n.content_title;
var icons_title = objectL10n.icons_title;
var note_title = objectL10n.note_title;
var promo_title = objectL10n.promo_title;
var toggle_title  = objectL10n.toggle_title;
var accordion_title  = objectL10n.accordion_title;
var tabs_title  = objectL10n.tabs_title;
var pricing_title = objectL10n.pricing_title;
var progessbar_title  = objectL10n.progessbar_title;
var gmap_title  = objectL10n.gmap_title ;
var vimeo_title  = objectL10n.vimeo_title ;
var youtube_title  = objectL10n.youtube_title ;
var team_list_title = objectL10n.team_list_title;
var client_list_title = objectL10n.client_list_title;
var wrapbox_title = objectL10n.wrapbox_title;
var testimonial_title = objectL10n.testimonial_title;
var portfolio_title = objectL10n.portfolio_title;
var recent_portfolio_title = objectL10n.recent_portfolio_title;
var blogpost_title = objectL10n.blogpost_title;
var spacer_title = objectL10n.spacer_title;
var clear_title = objectL10n.clear_title;

// Creates a new plugin class and a custom listbox
(function() {
	tinymce.create('tinymce.plugins.shortcodes', {
    createControl : function(n, cm) {
			if(n=='columns'){
				
                var clb = cm.createListBox('columns', {
                     //title : columns_title,
                     title : columns_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v); 
						                                       
                     }
                });
 
                // Add column values to the list box
				clb.add(row_title, '[row][/row]');
                clb.add(onecol_title, '[col_full][/col_full]');
                clb.add(onehalf_title, '[col_12][/col_12]');
                clb.add(onethird_title, '[col_13][/col_13]');
                clb.add(onefourth_title, '[col_14][/col_14]');
				clb.add(onesixth_title, '[col_16][/col_16]');
                clb.add(twothird_title, '[col_23][/col_23]');
                clb.add(threefourth_title, '[col_34][/col_34]');
               

                // Return the new list box instance
                return clb;
             }
 
			if(n=='elements'){
				
                var mlb = cm.createListBox('elements', {
                     //title : elements_title,
                     title : elements_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
				mlb.add(button_title, '[button link="#" color="" size="small|medium|big addclass="optional class for button" blank="1|0"]your text[/button]');
                mlb.add(dropcap1_title, '[dropcap1][/dropcap1]');
                mlb.add(dropcap2_title, '[dropcap2][/dropcap2]');
                mlb.add(dropcap3_title, '[dropcap3][/dropcap3]');
                mlb.add(pullquote_left_title, '[pullquote_left][/pullquote_left]');
                mlb.add(pullquote_right_title, '[pullquote_right][/pullquote_right]');
                mlb.add(infobox_title, '[info][/info]');
                mlb.add(successbox_title, '[success][/success]');
                mlb.add(warningbox_title, '[warning][/warning]');
                mlb.add(errorbox_title, '[error][/error]'); 
                mlb.add(image_title, '[image source="" align="left|center|right" class=""]');
				mlb.add(highlighttext_title, '[highlight_text color="purple | brown | pink | red | yellow | blue | green"]');
				mlb.add(paragraphtext_title, '[paragraph_text class="additional class"]Text Here[/paragraph_text]');

                // Return the new list box instance
                return mlb;
             }

			 if(n=='list'){
				
                var mlb = cm.createListBox('list', {
                     //title : elements_title,
                     title : list_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(disclist_title, '[disclist][/disclist]');
                mlb.add(squarelist_title, '[squarelist][/squarelist]'); 
                mlb.add(nobulletlist_title, '[nobulletlist][/nobulletlist]'); 
                mlb.add(arrowlist_title, '[arrowlist][/arrowlist]');
                mlb.add(checklist_title, '[checklist][/checklist]');
                mlb.add(pluslist_title, '[pluslist][/pluslist]');
                mlb.add(starlist_title, '[starlist][/starlist]');
				mlb.add(pinlist_title, '[pinlist][/pinlist]');
				mlb.add(flaglist_title, '[flaglist][/flaglist]');
                // Return the new list box instance
                return mlb;
             }
             
      if(n=='content'){
				
                var mlb = cm.createListBox('content', {
                     title : content_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
				mlb.add(icons_title, '[icon name="" size="small | medium | default" link="link url" blank="1 | 0" class=""]');
				mlb.add(note_title, '[note color="green | blue | orange | red | grey " class="aditional class here"]your content here[/note]');
				mlb.add(promo_title, '[promobox color="green | blue | orange | red | grey " class="aditional class here"]your content here[/promobox]');
                mlb.add(toggle_title, '[toggle title="your title here"]your content here[/toggle]');
				mlb.add(accordion_title, '[accordion title="your title here"]your content here[/accordion]');
                mlb.add(tabs_title, '[tabs name="default" menu="top || bottom || left || right"]'+"\r\n"+'[tab title="your title here"]your content here[/tab]'+"\r\n"+'[/tabs]');
                mlb.add(pricing_title, '[pricing column=2]'+"\r\n"+'[item title="" price_symbol="" price="" per="" subtitle="" button_url="#" button_color="" button_text="" featured="" featured_color=""]'+"\r\n"+'[/pricing]');
				mlb.add(progessbar_title, '[progress_bar title="" color="grey | green | blue | orange | red" value="80"]');
                mlb.add(gmap_title, '[gmap width="" height="" latitude="" longitude="" controls="" zoom="" html="" popup="" scrollwheel="" maptype="" marker=""]');
                mlb.add(vimeo_title, '[vimeo_video id="65888557"]');
                mlb.add(youtube_title, '[youtube_video id="aqzitoL0YsM"]');
				mlb.add(team_list_title, '[team_list title="" category="input category slug here" column="2 | 3 | 4" showpost="number of post"]');
				mlb.add(client_list_title, '[client_list category="input category slug here" showpost="number of post"]');
				mlb.add(wrapbox_title, '[wrapbox]your content here[/wrapbox]');
				mlb.add(testimonial_title, '[testimonial column="number of column" showpost="number of post"]');
				mlb.add(portfolio_title, '[portfolio type="filter | gallery" showposttitle=" yes| no" showpostdesc=" yes | no" showpost="number of post" colnumber="2|3|4" cat_id="input category id here separated by comma"]');
				mlb.add(recent_portfolio_title, '[recent_portfolio showposttitle=" yes| no" showpostdesc=" yes | no" cat_id="input portfolio category id here separated by comma"]');
				mlb.add(blogpost_title, '[blogpost title="" desc="" showpost="number of post" cat_id="input category id here separated by comma"]');
				mlb.add(spacer_title, '[spacer height="1" color="#ccc"]');
				mlb.add(clear_title, '[clear]');
				
                // Return the new list box instance
                return mlb;
             }
             
      return null;
		}
	});
 
	// Register plugin
	tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
	
})();

