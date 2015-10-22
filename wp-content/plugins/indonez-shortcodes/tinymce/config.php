<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$indonez_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'indonez'),
			'desc' => __('Add the button\'s url eg http://example.com', 'indonez')
		),
		'color' => array(
			'type' => 'select',
			'label' => __('Button Color', 'indonez'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'indonez'),
			'options' => array(
				'grey' => 'Grey',
				'black' => 'Black',
				'green' => 'Green',
				'light-blue' => 'Light Blue',
				'blue' => 'Blue',
				'red' => 'Red',
				'orange' => 'Orange',
				'purple' => 'Purple'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'indonez'),
			'desc' => __('Select the button\'s size', 'indonez'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'indonez'),
			'desc' => __('Select the button\'s type', 'indonez'),
			'options' => array(
				'round' => 'Round',
				'square' => 'Square'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'indonez'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'indonez'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'indonez'),
			'desc' => __('Add the button\'s text', 'indonez'),
		)
	),
	'shortcode' => '[idz_button url="{{url}}" color="{{color}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/idz_button]',
	'popup_title' => __('Insert Button Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Select the alert type', 'indonez'),
			'options' => array(
			    'default' => 'Default',
				'info' => 'Info',
				'success' => 'Success',
				'warning' => 'Warning',
				'error' => 'Error'
			)
		),
		'content' => array(
			'std' => 'Text Here',
			'type' => 'textarea',
			'label' => __('Alert Text', 'indonez'),
			'desc' => __('Add the alert\'s text', 'indonez'),
		)
		
	),
	'shortcode' => '[idz_alert type="{{type}}"] {{content}} [/idz_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Progress Bar
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['progress'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Title here',
			'type' => 'text',
			'label' => __('Title', 'indonez'),
			'desc' => __('Add the title text', 'indonez'),
		),
		'color' => array(
			'type' => 'select',
			'label' => __('Color', 'indonez'),
			'desc' => __('Select the color\'s style, ie the progress colour', 'indonez'),
			'options' => array(
				'grey' => 'Grey',
				'green' => 'Green',
				'blue' => 'Blue',
				'orange' => 'Orange',
				'red' => 'Red'
			)
		),
		'value' => array(
			'std' => '70',
			'type' => 'text',
			'label' => __('Number value', 'indonez'),
			'desc' => __('Add number value to show percentage in progress bar', 'indonez'),
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Style', 'indonez'),
			'desc' => __('Select the style', 'indonez'),
			'options' => array(
				'default' => 'Default',
				'circle' => 'Circle'
			)
		)
	),
	'shortcode' => '[idz_progress_bar title="{{title}}" color="{{color}}" value="{{value}}" type="{{type}}"]',
	'popup_title' => __('Insert Progress Bar Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Dropcap Config
/*-----------------------------------------------------------------------------------*/

$indonez_shortcodes['dropcap'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Dropcap Style', 'indonez'),
			'desc' => __('Select the dropcap\'s style', 'indonez'),
			'options' => array(
				'round' => 'Round',
				'square' => 'Square',
				'none' => 'None'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Dropcap Text', 'indonez'),
			'desc' => __('Add the dropcap\'s text', 'indonez'),
		)
		
	),
	'shortcode' => '[idz_dropcap type="{{type}}"] {{content}} [/idz_dropcap]',
	'popup_title' => __('Insert Dropcap Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Pullquote Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['pullquote'] = array(
	'no_preview' => true,
	'params' => array(
		'align' => array(
			'type' => 'select',
			'label' => __('Pullquote align', 'indonez'),
			'desc' => __('Select the pullquote\'s align', 'indonez'),
			'options' => array(
				'left' => 'Left',
				'right' => 'Right'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Pullquote Text', 'indonez'),
			'desc' => __('Add the pullquote\'s text', 'indonez'),
		)
		
	),
	'shortcode' => '[idz_pullquote align="{{align}}"] {{content}} [/idz_pullquote]',
	'popup_title' => __('Insert Pullquote Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Table Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['table'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => __('Table Color', 'indonez'),
			'desc' => __('Select the table color', 'indonez'),
			'options' => array(
				'green' => 'Green',
				'blue' => 'Blue',
				'orange' => 'Orange',
				'red' => 'Red',
				'grey' => 'Grey',
				'white' => 'White'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Table Code', 'indonez'),
			'desc' => __('Add the table code', 'indonez'),
		)
		
	),
	'shortcode' => '[idz_table color="{{color}}"] {{content}} [/idz_table]',
	'popup_title' => __('Insert Table Shortcode', 'indonez')
);



/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$indonez_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Title', 'indonez'),
			'desc' => __('Add the title that will go above the toggle content', 'indonez'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'indonez'),
			'desc' => __('Add the toggle content. Will accept HTML', 'indonez'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'indonez'),
			'desc' => __('Select the state of the toggle on page load', 'indonez'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[idz_toggle title="{{title}}" state="{{state}}"] {{content}} [/idz_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$indonez_shortcodes['accordion'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Accordion Title', 'indonez'),
			'desc' => __('Add the title that will go above the accordion content', 'indonez'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Accordion Content', 'indonez'),
			'desc' => __('Add the accordion content. Will accept HTML', 'indonez'),
		),
	),
	'shortcode' => '[idz_accordion title="{{title}}"] {{content}} [/idz_accordion]',
	'popup_title' => __('Insert Accordion Content Shortcode', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$indonez_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[idz_tabs] {{child_shortcode}}  [/idz_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'indonez'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'indonez'),
                'desc' => __('Title of the tab', 'indonez'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'indonez'),
                'desc' => __('Add the tabs content', 'indonez')
            )
        ),
        'shortcode' => '[idz_tab title="{{title}}"] {{content}} [/idz_tab]',
        'clone_button' => __('Add Tab', 'indonez')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Pricing Tables Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['pricing'] = array(
    'params' => array(
		'column' => array(
			'std' => 'Column',
			'type' => 'select',
			'label' => __('Column', 'indonez'),
			'desc' => __('Choose pricing column', 'indonez'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[idz_pricing column="{{column}}"] {{child_shortcode}}  [/idz_pricing]',
    'popup_title' => __('Insert Pricing Shortcode', 'indonez'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Pricing Title', 'indonez'),
                'desc' => __('Title of the pricing column', 'indonez'),
            ),
            'price_symbol' => array(
                'std' => '$',
                'type' => 'text',
                'label' => __('Price Symbol', 'indonez'),
                'desc' => __('Add price symbol', 'indonez')
            ),
            'price' => array(
                'std' => '10',
                'type' => 'text',
                'label' => __('Price', 'indonez'),
                'desc' => __('Add price', 'indonez')
            ),
            'per' => array(
                'std' => '/ Month',
                'type' => 'text',
                'label' => __('Per Symbol', 'indonez'),
                'desc' => __('Symbol or Text ', 'indonez')
            ),
            'subtitle' => array(
                'std' => 'Sub Title',
                'type' => 'text',
                'label' => __('Sub Title', 'indonez'),
                'desc' => __('Sub Title Text ', 'indonez')
            ),
            'button_url' => array(
                'std' => 'http://themeforest.net',
                'type' => 'text',
                'label' => __('Button URL', 'indonez'),
                'desc' => __('Add link to button ', 'indonez')
            ),
            'button_color' => array(
                'std' => 'cyan',
                'type' => 'select',
                'label' => __('Button Color', 'indonez'),
                'desc' => __('Choose Button Color', 'indonez'),
				'options' => array(
					'gold' => 'Gold',
					'cyan' => 'Cyan',
					'purple' => 'Purple',
					'brown' => 'Brown',
					'rosy' => 'Rosy',
					'green' => 'Green',
					'pink' => 'Pink',
					'blue' => 'Blue',
					'yellow' => 'Yellow',
					'magenta' => 'Magenta',
					'orange' => 'Orange',
					'red' => 'Red',
					'grey' => 'Grey',
					'black' => 'Black',
					'white' => 'White'
				)
            ),
            'button_text' => array(
                'std' => 'Order Now',
                'type' => 'text',
                'label' => __('Button Text', 'indonez'),
                'desc' => __('Add button text ', 'indonez')
            ),
            'featured' => array(
                'std' => 'no',
                'type' => 'select',
                'label' => __('Featured Column', 'indonez'),
                'desc' => __('Set Column as Featured ', 'indonez'),
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes'
				)
            ),
            'featured_color' => array(
                'std' => 'blue',
                'type' => 'select',
                'label' => __('Featured Color', 'indonez'),
                'desc' => __('Set Color to Featured Column', 'indonez'),
				'options' => array(
					'blue' => 'Blue',
					'green' => 'Green',
					'orange' => 'Orange',
					'red' => 'Red'
				)
            ),
            'content' => array(
                'std' => 'Pricing Content',
                'type' => 'textarea',
                'label' => __('Pricing Content', 'indonez'),
                'desc' => __('Add content to pricing column', 'indonez')
            )
        ),
        'shortcode' => '[idz_pricing_item title="{{title}}" price_symbol="{{price_symbol}}" price="{{price}}" per="{{per}}" subtitle="{{subtitle}}" button_url="{{button_url}}" button_color="{{button_color}}" featured="{{featured}}" featured_color="{{featured_color}}"] {{content}} [/idz_pricing_item]',
        'clone_button' => __('Add Pricing Item', 'indonez')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Spacer Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['spacer'] = array(
	'no_preview' => true,
	'params' => array(
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Height', 'indonez'),
			'desc' => __('Add height (px) to spacer', 'indonez'),
		),
		'color' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Color', 'indonez'),
			'desc' => __('Add hex color to spacer', 'indonez'),
		)
		
	),
	'shortcode' => '[idz_spacer height="{{height}}" color="{{color}}"]',
	'popup_title' => __('Insert Spacer Shortcode', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Custom Heading
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['heading'] = array(
	'no_preview' => true,
	'params' => array(
		'tag' => array(
			'std' => 'h3',
			'type' => 'select',
			'label' => __('Heading Tag', 'indonez'),
			'desc' => __('Choose Heading Tag', 'indonez'),
			'options' => array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6'
			)
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'indonez'),
			'desc' => __('Add class to tag', 'indonez')
		),
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title Text', 'indonez'),
			'desc' => __('Add Title Text', 'indonez')
		)
	),
	'shortcode' => '[idz_custom_heading tag="{{tag}}" class="{{class}}"]{{content}}[/idz_custom_heading]',
	'popup_title' => __('Insert Heading Custom', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Paragraph Text
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['paragraph'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'indonez'),
			'desc' => __('Add class to paragraph', 'indonez')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'indonez'),
			'desc' => __('Add text content', 'indonez')
		)
	),
	'shortcode' => '[idz_paragraph class="{{class}}"]{{content}}[/idz_paragraph]',
	'popup_title' => __('Insert Paragraph', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['highlight'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Color', 'indonez'),
			'desc' => __('Choose Color', 'indonez'),
			'options' => array(
				'blue' => 'blue',
				'green' => 'green',
				'yellow' => 'yellow',
				'red' => 'red',
				'pink' => 'pink',
				'brown' => 'brown',
				'purple' => 'purple'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'indonez'),
			'desc' => __('Add text', 'indonez')
		)
	),
	'shortcode' => '[idz_highlight color="{{color}}"]{{content}}[/idz_highlight]',
	'popup_title' => __('Insert Highlight Text Color', 'indonez')
);



/*-----------------------------------------------------------------------------------*/
/*	List Style
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['list'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Choose type', 'indonez'),
			'options' => array(
				'disc' => 'Disc',
				'square' => 'Square',
				'nobullet' => 'No Bullet',
				'arrow' => 'Arrow List',
				'check' => 'Check List',
				'plus' => 'Plus List',
				'star' => 'Star List',
				'pin' => 'Pin List',
				'flag' => 'Flag List'
			)
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Name class for list', 'indonez'),
			'desc' => __('Additional class for list', 'indonez')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content list', 'indonez'),
			'desc' => __('Add content list', 'indonez')
		)
	),
	'shortcode' => '[idz_list type="{{type}}" class="{{class}}"]{{content}}[/idz_list]',
	'popup_title' => __('Insert List Style', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Note
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['note'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Choose color', 'indonez'),
			'options' => array(
				'green' => 'Green',
				'blue' => 'Blue',
				'orange' => 'Orange',
				'red' => 'Red',
				'grey' => 'Grey'
			)
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'indonez'),
			'desc' => __('Additional class for notebox', 'indonez')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content list', 'indonez'),
			'desc' => __('Add content list', 'indonez')
		)
	),
	'shortcode' => '[idz_note color="{{color}}" class="{{class}}"]{{content}}[/idz_note]',
	'popup_title' => __('Insert Note Box', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Promo box
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['promobox'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Choose color', 'indonez'),
			'options' => array(
				'green' => 'Green',
				'blue' => 'Blue',
				'orange' => 'Orange',
				'red' => 'Red',
				'grey' => 'Grey'
			)
		),
		'button_text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button Label', 'indonez'),
			'desc' => __('Add label text button', 'indonez')
		),
		'button_url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button Url', 'indonez'),
			'desc' => __('Add link to button, enter link with http://', 'indonez')
		),
		'blank' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Open New Tab?', 'indonez'),
			'desc' => __('Button action when clicked', 'indonez'),
			'options' => array(
				'1' => 'Open New Tab',
				'0' => 'Open Same Tab'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'indonez'),
			'desc' => __('Add content', 'indonez')
		),
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'indonez'),
			'desc' => __('Additional class', 'indonez')
		)
	),
	'shortcode' => '[idz_promobox color="{{color}}" button_text="{{button_text}}" button_url="{{button_url}}" blank="{{blank}}" class="{{class}}"]{{content}}[/idz_promobox]',
	'popup_title' => __('Insert Promo Box', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Video
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['video'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Choose video type', 'indonez'),
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo'
			)
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('ID', 'indonez'),
			'desc' => __('Video ID', 'indonez')
		)
	),
	'shortcode' => '[idz_video type="{{type}}" id="{{id}}"]',
	'popup_title' => __('Insert Video', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	DIV
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['div'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Class', 'indonez'),
			'desc' => __('Add class to div', 'indonez')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'indonez'),
			'desc' => __('Add content', 'indonez')
		)
	),
	'shortcode' => '[idz_div class="{{class}}"]{{content}}[idz_end_div]',
	'popup_title' => __('Insert Div Container', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['testimonial'] = array(
	'no_preview' => true,
	'params' => array(
		'column' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Column', 'indonez'),
			'desc' => __('Choose column', 'indonez'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		),
		'showpost' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Showposts', 'indonez'),
			'desc' => __('Enter number value', 'indonez')
		)
	),
	'shortcode' => '[idz_testimonial column="{{column}}" showpost="{{showpost}}"]',
	'popup_title' => __('Insert Testimonial Post', 'indonez')
);

$indonez_shortcodes['testimonial_carousel'] = array(
	'no_preview' => true,
	'params' => array(
		'section' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Section', 'indonez'),
			'desc' => __('Enter unique testimonial name, example "mytestimonial"', 'indonez')
		),
		'ids' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Post id', 'indonez'),
			'desc' => __('Enter id separated by comma to show post in testimonial carousel', 'indonez')
		)
	),
	'shortcode' => '[idz_testimonial_carousel section="{{section}}" ids="{{ids}}"]',
	'popup_title' => __('Insert Testimonial Carousel Post', 'indonez')
);



/*-----------------------------------------------------------------------------------*/
/*	Team
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['team'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'indonez'),
			'desc' => __('Enter heading title text', 'indonez')
		),
		'category' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Category', 'indonez'),
			'desc' => __('Enter category slug from team categories, leave blank if you want all post display', 'indonez')
		),
		'column' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Column', 'indonez'),
			'desc' => __('Choose column', 'indonez'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		),
		'showpost' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Showpost', 'indonez'),
			'desc' => __('Enter number of post you want display, enter -1 if you want all post display', 'indonez')
		)
	),
	'shortcode' => '[idz_team_list  title="{{title}}" category="{{category}}" column="{{column}}" showpost="{{showpost}}"]',
	'popup_title' => __('Insert Team Shortcode', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Client
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['client'] = array(
	'no_preview' => true,
	'params' => array(
		'section' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Section', 'indonez'),
			'desc' => __('Enter unique client section name, example "myclient"', 'indonez')
		),
		'category' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Category', 'indonez'),
			'desc' => __('Enter category slug from client post', 'indonez')
		)
	),
	'shortcode' => '[idz_client_list section="{{section}}" category="{{category}}"]',
	'popup_title' => __('Insert Client List', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'indonez'),
			'desc' => __('Choose portfolio type', 'indonez'),
			'options' => array(
				'filter' => 'Filter',
				'gallery' => 'Gallery'
			)
		),
		'showposttitle' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Show Post Title?', 'indonez'),
			'desc' => __('Display post title', 'indonez'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'showpostdesc' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Show Post Description?', 'indonez'),
			'desc' => __('Display post description', 'indonez'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'showpost' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Showpost', 'indonez'),
			'desc' => __('Enter number of post you want display, enter -1 if you want all post display', 'indonez')
		),
		'colnumber' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Number of Column', 'indonez'),
			'desc' => __('Enter number of column. 2, 3, or 4 column', 'indonez'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		),
		'cat_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Category ID', 'indonez'),
			'desc' => __('Enter category id separated by comma from portfolio post', 'indonez')
		),
		'shape' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Shape', 'indonez'),
			'desc' => __('Enter shape type. Hexagon or default', 'indonez'),
			'options' => array(
				'hexagon' => 'Hexagon',
				'none' => 'None'
			)
		),
		'shownav' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Show Naviagtion', 'indonez'),
			'desc' => __('Display navigation. Only use in portfolio filter type', 'indonez'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[idz_portfolio  type="{{type}}" showposttitle="{{showposttitle}}" showpostdesc="{{showpostdesc}}" showpost="{{showpost}}" colnumber="{{colnumber}}" cat_id="{{cat_id}}" shape="{{shape}}" shownav="{{shownav}}"]',
	'popup_title' => __('Insert Portfolio Shortcode', 'indonez')
);

/*-----------------------------------------------------------------------------------*/
/*	Portolio Carousel
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['portfolio_carousel'] = array(
	'no_preview' => true,
	'params' => array(
		'section' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Section', 'indonez'),
			'desc' => __('Enter unique portfolio section name, example "mypf"', 'indonez')
		),
		'cat_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Category ID', 'indonez'),
			'desc' => __('Enter category id from portfolio category', 'indonez')
		)
	),
	'shortcode' => '[idz_portfolio_carousel section="{{section}}" cat_id="{{cat_id}}"]',
	'popup_title' => __('Insert Portfolio Carousel', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Blog Post Column
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['blogpost'] = array(
	'no_preview' => true,
	'params' => array(
		'showpost' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Showpost', 'indonez'),
			'desc' => __('Enter number of post you want display, enter -1 if you want all post display', 'indonez')
		),
		'cat_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Category ID', 'indonez'),
			'desc' => __('Enter category id post', 'indonez')
		),
	),
	'shortcode' => '[idz_blogpost showpost="{{showpost}}" cat_id="{{cat_id}}"]',
	'popup_title' => __('Insert Blog Column', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Twitter
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['twitter'] = array(
	'no_preview' => true,
	'params' => array(
		'twitter_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Username', 'indonez'),
			'desc' => __('Enter twitter username', 'indonez')
		),
		'max_tweets' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Number of tweets', 'indonez'),
			'desc' => __('Enter number of twitter post you want display', 'indonez')
		),
		'consumer_key' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Consumer Key', 'indonez'),
			'desc' => __('Enter your twitter consumer key', 'indonez')
		),
		'consumer_secret' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Consumer Secret', 'indonez'),
			'desc' => __('Enter your twitter consumer secret', 'indonez')
		),
		'user_token' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Access Token', 'indonez'),
			'desc' => __('Enter your twitter access token', 'indonez')
		),
		'user_secret' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Access Token Secret', 'indonez'),
			'desc' => __('Enter your twitter access token secret', 'indonez')
		)
	),
	'shortcode' => '[idz_twitter  twitter_id="{{twitter_id}}" max_tweets="{{max_tweets}}" consumer_key="{{consumer_key}}" consumer_secret="{{consumer_secret}}" user_token="{{user_token}}" user_secret="{{user_secret}}"]',
	'popup_title' => __('Insert Twitter Shortcode', 'indonez')
);



/*-----------------------------------------------------------------------------------*/
/*	Google Map
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['gmap'] = array(
	'no_preview' => true,
	'params' => array(
		'width' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Width', 'indonez'),
			'desc' => __('Width value of your google map', 'indonez')
		),
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Height', 'indonez'),
			'desc' => __('Height value of your google map', 'indonez')
		),
		'latitude' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Latitude', 'indonez'),
			'desc' => __('The latitude point of your google map', 'indonez')
		),
		'longitude' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Longitude', 'indonez'),
			'desc' => __('The longitude point of your google map', 'indonez')
		),
		'controls' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Controls', 'indonez'),
			'desc' => __('True or false', 'indonez'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'zoom' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Zoom', 'indonez'),
			'desc' => __('Zoom value from 1 to 19 where 19 is the greatest and 1 the smallest', 'indonez')
		),
		'html' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('HTML', 'indonez'),
			'desc' => __('Content that will be shown within the info window for this marker', 'indonez')
		),
		'popup' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Popup', 'indonez'),
			'desc' => __('If true the info window for this marker will be shown when the map finished loading. If html is empty this option will be ignored', 'indonez'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		)
	),
	'shortcode' => '[idz_gmap width="{{width}}" height="{{height}}" latitude="{{latitude}}" longitude="{{longitude}}" controls="{{controls}}" zoom="{{zoom}}" html="{{html}}" popup="{{popup}}"]',
	'popup_title' => __('Insert Google Map', 'indonez')
);


/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/
$indonez_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => '{{child_shortcode}}', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'indonez'),
	'no_preview' => true,
	
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'indonez'),
				'desc' => __('Select the type, ie width of the column.', 'indonez'),
				'options' => array(
					'idz_col_full' => 'Full Column',
					'idz_col_12' => 'One Half',
					'idz_col_13' => 'One Third',
					'idz_col_14' => 'One Fourth',
					'idz_col_16' => 'One Sixth',
					'idz_col_23' => 'Two Tird',
					'idz_col_34' => 'Three Fourth'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'indonez'),
				'desc' => __('Add the column content.', 'indonez'),
			),
			
			'class' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Additional class', 'indonez'),
				'desc' => __('Select the alert\'s style, ie the alert colour', 'indonez'),
			)
		),
		'shortcode' => '[{{column}} class="{{class}}"]{{content}}[/{{column}}]',
		'clone_button' => __('Add Column', 'indonez')
	)
);
?>