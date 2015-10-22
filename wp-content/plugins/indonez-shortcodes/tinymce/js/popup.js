
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var indonezs = {
    	loadVals: function()
    	{
    		var shortcode = $('#_indonez_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.indonez-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('indonez_', ''),		// gets rid of the indonez_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_indonez_ushortcode').remove();
    		$('#indonez-sc-form-table').prepend('<div id="_indonez_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_indonez_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.indonez-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('indonez_', '')		// gets rid of the indonez_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_indonez_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_indonez_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_indonez_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_indonez_ushortcode').remove();
    		$('#indonez-sc-form-table').prepend('<div id="_indonez_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				indonezPopup = $('#indonez-popup');

            tbWindow.css({
                height: indonezPopup.outerHeight() + 50,
                width: indonezPopup.outerWidth(),
                marginLeft: -(indonezPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: indonezPopup.outerHeight() + 50,
				overflow: 'auto', // IMPORTANT
				width: indonezPopup.outerWidth()
			});
			
			$('#indonez-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	indonezs = this,
    			popup = $('#indonez-popup'),
    			form = $('#indonez-sc-form', popup),
    			shortcode = $('#_indonez_shortcode', form).text(),
    			popupType = $('#_indonez_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		indonezs.resizeTB();
    		$(window).resize(function() { indonezs.resizeTB() });
    		
    		// initialise
    		indonezs.loadVals();
    		indonezs.children();
    		indonezs.cLoadVals();
    		
    		// update on children value change
    		$('.indonez-cinput', form).live('change', function() {
    			indonezs.cLoadVals();
    		});
    		
    		// update on value change
    		$('.indonez-input', form).change(function() {
    			indonezs.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.indonez-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_indonez_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#indonez-popup').livequery( function() { indonezs.load(); } );
});