<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");
		
		//Access the WordPress Pages via an Array
		
		/*$_menu_object = wp_get_nav_menu_object( 4 );
		$nav_menu_selected_title = $_menu_object->name;
		echo $nav_menu_selected_title;*/
		
		
		$of_footmenus 			= array();
		$of_footmenus_obj 		= get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
		foreach ($of_footmenus_obj as $of_footmenu) {
		    $of_footmenus[$of_footmenu->term_id] = $of_footmenu->name; }
			
			
		
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");
		
		//Google Fonts
		$googlefonts = array(
		'none' => 'Select a font',//please, always use this key: "none"
		'Abel' => 'Abel',
		'Abril Fatface' => 'Abril Fatface',
		'Aclonica' => 'Aclonica',
		'Acme' => 'Acme',
		'Actor' => 'Actor',
		'Adamina' => 'Adamina',
		'Advent Pro' => 'Advent Pro',
		'Aguafina Script' => 'Aguafina Script',
		'Aladin' => 'Aladin',
		'Aldrich' => 'Aldrich',
		'Alegreya' => 'Alegreya',
		'Alegreya SC' => 'Alegreya SC',
		'Alex Brush' => 'Alex Brush',
		'Alfa Slab One' => 'Alfa Slab One',
		'Alice' => 'Alice',
		'Alike' => 'Alike',
		'Alike Angular' => 'Alike Angular',
		'Allan' => 'Allan',
		'Allerta' => 'Allerta',
		'Allerta Stencil' => 'Allerta Stencil',
		'Allura' => 'Allura',
		'Almendra' => 'Almendra',
		'Almendra SC' => 'Almendra SC',
		'Amarante' => 'Amarante',
		'Amaranth' => 'Amaranth',
		'Amatic SC' => 'Amatic SC',
		'Amethysta' => 'Amethysta',
		'Andada' => 'Andada',
		'Andika' => 'Andika',
		'Angkor' => 'Angkor',
		'Annie Use Your Telescope' => 'Annie Use Your Telescope',
		'Anonymous Pro' => 'Anonymous Pro',
		'Antic' => 'Antic',
		'Antic Didone' => 'Antic Didone',
		'Antic Slab' => 'Antic Slab',
		'Anton' => 'Anton',
		'Arapey' => 'Arapey',
		'Arbutus' => 'Arbutus',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arizonia' => 'Arizonia',
		'Armata' => 'Armata',
		'Artifika' => 'Artifika',
		'Arvo' => 'Arvo',
		'Asap' => 'Asap',
		'Asset' => 'Asset',
		'Astloch' => 'Astloch',
		'Asul' => 'Asul',
		'Atomic Age' => 'Atomic Age',
		'Aubrey' => 'Aubrey',
		'Audiowide' => 'Audiowide',
		'Average' => 'Average',
		'Averia Gruesa Libre' => 'Averia Gruesa Libre',
		'Averia Libre' => 'Averia Libre',
		'Averia Sans Libre' => 'Averia Sans Libre',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bad Script' => 'Bad Script',
		'Balthazar' => 'Balthazar',
		'Bangers' => 'Bangers',
		'Basic' => 'Basic',
		'Battambang' => 'Battambang',
		'Baumans' => 'Baumans',
		'Bayon' => 'Bayon',
		'Belgrano' => 'Belgrano',
		'Belleza' => 'Belleza',
		'Bentham' => 'Bentham',
		'Berkshire Swash' => 'Berkshire Swash',
		'Bevan' => 'Bevan',
		'Bigshot One' => 'Bigshot One',
		'Bilbo' => 'Bilbo',
		'Bilbo Swash Caps' => 'Bilbo Swash Caps',
		'Bitter' => 'Bitter',
		'Black Ops One' => 'Black Ops One',
		'Bokor' => 'Bokor',
		'Bonbon' => 'Bonbon',
		'Boogaloo' => 'Boogaloo',
		'Bowlby One' => 'Bowlby One',
		'Bowlby One SC' => 'Bowlby One SC',
		'Brawler' => 'Brawler',
		'Bree Serif' => 'Bree Serif',
		'Bubblegum Sans' => 'Bubblegum Sans',
		'Bubbler One' => 'Bubbler One',
		'Buda' => 'Buda',
		'Buenard' => 'Buenard',
		'Butcherman' => 'Butcherman',
		'Butterfly Kids' => 'Butterfly Kids',
		'Cabin' => 'Cabin',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin Sketch' => 'Cabin Sketch',
		'Caesar Dressing' => 'Caesar Dressing',
		'Cagliostro' => 'Cagliostro',
		'Calligraffitti' => 'Calligraffitti',
		'Cambo' => 'Cambo',
		'Candal' => 'Candal',
		'Cantarell' => 'Cantarell',
		'Cantata One' => 'Cantata One',
		'Cantora One' => 'Cantora One',
		'Capriola' => 'Capriola',
		'Cardo' => 'Cardo',
		'Carme' => 'Carme',
		'Carter One' => 'Carter One',
		'Caudex' => 'Caudex',
		'Cedarville Cursive' => 'Cedarville Cursive',
		'Ceviche One' => 'Ceviche One',
		'Changa One' => 'Changa One',
		'Chango' => 'Chango',
		'Chau Philomene One' => 'Chau Philomene One',
		'Chelsea Market' => 'Chelsea Market',
		'Chenla' => 'Chenla',
		'Cherry Cream Soda' => 'Cherry Cream Soda',
		'Chewy' => 'Chewy',
		'Chicle' => 'Chicle',
		'Chivo' => 'Chivo',
		'Coda' => 'Coda',
		'Coda Caption' => 'Coda Caption',
		'Codystar' => 'Codystar',
		'Comfortaa' => 'Comfortaa',
		'Coming Soon' => 'Coming Soon',
		'Concert One' => 'Concert One',
		'Condiment' => 'Condiment',
		'Content' => 'Content',
		'Contrail One' => 'Contrail One',
		'Convergence' => 'Convergence',
		'Cookie' => 'Cookie',
		'Copse' => 'Copse',
		'Corben' => 'Corben',
		'Courgette' => 'Courgette',
		'Cousine' => 'Cousine',
		'Coustard' => 'Coustard',
		'Covered By Your Grace' => 'Covered By Your Grace',
		'Crafty Girls' => 'Crafty Girls',
		'Creepster' => 'Creepster',
		'Crete Round' => 'Crete Round',
		'Crimson Text' => 'Crimson Text',
		'Crushed' => 'Crushed',
		'Cuprum' => 'Cuprum',
		'Cutive' => 'Cutive',
		'Damion' => 'Damion',
		'Dancing Script' => 'Dancing Script',
		'Dangrek' => 'Dangrek',
		'Dawning of a New Day' => 'Dawning of a New Day',
		'Days One' => 'Days One',
		'Delius' => 'Delius',
		'Delius Swash Caps' => 'Delius Swash Caps',
		'Delius Unicase' => 'Delius Unicase',
		'Della Respira' => 'Della Respira',
		'Devonshire' => 'Devonshire',
		'Didact Gothic' => 'Didact Gothic',
		'Diplomata' => 'Diplomata',
		'Diplomata SC' => 'Diplomata SC',
		'Doppio One' => 'Doppio One',
		'Dorsa' => 'Dorsa',
		'Dosis' => 'Dosis',
		'Dr Sugiyama' => 'Dr Sugiyama',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
		'Duru Sans' => 'Duru Sans',
		'Dynalight' => 'Dynalight',
		'EB Garamond' => 'EB Garamond',
		'Eagle Lake' => 'Eagle Lake',
		'Eater' => 'Eater',
		'Economica' => 'Economica',
		'Electrolize' => 'Electrolize',
		'Emblema One' => 'Emblema One',
		'Emilys Candy' => 'Emilys Candy',
		'Engagement' => 'Engagement',
		'Enriqueta' => 'Enriqueta',
		'Erica One' => 'Erica One',
		'Esteban' => 'Esteban',
		'Euphoria Script' => 'Euphoria Script',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Expletus Sans' => 'Expletus Sans',
		'Fanwood Text' => 'Fanwood Text',
		'Fascinate' => 'Fascinate',
		'Fascinate Inline' => 'Fascinate Inline',
		'Fasthand' => 'Fasthand',
		'Federant' => 'Federant',
		'Federo' => 'Federo',
		'Felipa' => 'Felipa',
		'Fjord One' => 'Fjord One',
		'Flamenco' => 'Flamenco',
		'Flavors' => 'Flavors',
		'Fondamento' => 'Fondamento',
		'Fontdiner Swanky' => 'Fontdiner Swanky',
		'Forum' => 'Forum',
		'Francois One' => 'Francois One',
		'Fredericka the Great' => 'Fredericka the Great',
		'Fredoka One' => 'Fredoka One',
		'Freehand' => 'Freehand',
		'Fresca' =>'Fresca',
		'Frijole' => 'Frijole',
		'Fugaz One' => 'Fugaz One',
		'GFS Didot' => 'GFS Didot',
		'GFS Neohellenic' => 'GFS Neohellenic',
		'Galdeano' => 'Galdeano',
		'Galindo' => 'Galindo',
		'Gentium Basic' => 'Gentium Basic',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Geo' => 'Geo',
		'Geostar' => 'Geostar',
		'Geostar Fill' => 'Geostar Fill',
		'Germania One' => 'Germania One',
		'Give You Glory' => 'Give You Glory',
		'Glass Antiqua' => 'Glass Antiqua',
		'Glegoo' => 'Glegoo',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Goblin One' => 'Goblin One',
		'Gochi Hand' => 'Gochi Hand',
		'Gorditas' => 'Gorditas',
		'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
		'Graduate' => 'Graduate',
		'Gravitas One' => 'Gravitas One',
		'Great Vibes' => 'Great Vibes',
		'Griffy' => 'Griffy',
		'Gruppo' => 'Gruppo',
		'Gudea' => 'Gudea',
		'Habibi' => 'Habibi',
		'Hammersmith One' => 'Hammersmith One',
		'Handlee' => 'Handlee',
		'Hanuman' => 'Hanuman',
		'Happy Monkey' => 'Happy Monkey',
		'Headland One' => 'Headland One',
		'Henny Penny' => 'Henny Penny',
		'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
		'Holtwood One SC' => 'Holtwood One SC',
		'Homemade Apple' => 'Homemade Apple',
		'Homenaje' => 'Homenaje',
		'IM Fell DW Pica' => 'IM Fell DW Pica',
		'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
		'IM Fell Double Pica' => 'IM Fell Double Pica',
		'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
		'IM Fell English' => 'IM Fell English',
		'IM Fell English SC' => 'IM Fell English SC',
		'IM Fell French Canon' => 'IM Fell French Canon',
		'IM Fell French Canon SC' => 'IM Fell French Canon SC',
		'IM Fell Great Primer' => 'IM Fell Great Primer',
		'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
		'Iceberg' => 'Iceberg',
		'Iceland' => 'Iceland',
		'Imprima' => 'Imprima',
		'Inconsolata' => 'Inconsolata',
		'Inder' => 'Inder',
		'Indie Flower' => 'Indie Flower',
		'Inika' => 'Inika',
		'Irish Grover' => 'Irish Grover',
		'Istok Web' => 'Istok Web',
		'Italiana' => 'Italiana',
		'Italianno' => 'Italianno',
		'Jacques Francois' => 'Jacques Francois',
		'Jacques Francois Shadow' => 'Jacques Francois Shadow',
		'Jim Nightshade' => 'Jim Nightshade',
		'Jockey One' => 'Jockey One',
		'Jolly Lodger' => 'Jolly Lodger',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Judson' => 'Judson',
		'Julee' => 'Julee',
		'Junge' => 'Junge',
		'Jura' => 'Jura',
		'Just Another Hand' => 'Just Another Hand',
		'Just Me Again Down Here' => 'Just Me Again Down Here',
		'Kameron' => 'Kameron',
		'Karla' => 'Karla',
		'Kaushan Script' => 'Kaushan Script',
		'Kelly Slab' => 'Kelly Slab',
		'Kenia' => 'Kenia',
		'Khmer' => 'Khmer',
		'Knewave' => 'Knewave',
		'Kotta One' => 'Kotta One',
		'Koulen' => 'Koulen',
		'Kranky' => 'Kranky',
		'Kreon' => 'Kreon',
		'Kristi' => 'Kristi',
		'Krona One' => 'Krona One',
		'La Belle Aurore' => 'La Belle Aurore',
		'Lancelot' => 'Lancelot',
		'Lato' => 'Lato',
		'League Script' => 'League Script',
		'Leckerli One' => 'Leckerli One',
		'Ledger' => 'Ledger',
		'Lekton' => 'Lekton',
		'Lemon' => 'Lemon',
		'Life Savers' => 'Life Savers',
		'Lilita One' => 'Lilita One',
		'Limelight' =>'Limelight',
		'Linden Hill' => 'Linden Hill',
		'Lobster' => 'Lobster',
		'Lobster Two' => 'Lobster Two',
		'Londrina Outline' => 'Londrina Outline',
		'Londrina Shadow' => 'Londrina Shadow',
		'Londrina Sketch' => 'Londrina Sketch',
		'Londrina Solid' => 'Londrina Solid',
		'Lora' => 'Lora',
		'Love Ya Like A Sister' => 'Love Ya Like A Sister',
		'Loved by the King' => 'Loved by the King',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'Luckiest Guy' => 'Luckiest Guy',
		'Lusitana' => 'Lusitana',
		'Lustria' => 'Lustria',
		'Macondo' => 'Macondo',
		'Macondo Swash Caps' => 'Macondo Swash Caps',
		'Magra' => 'Magra',
		'Maiden Orange' => 'Maiden Orange',
		'Mako' => 'Mako',
		'Marck Script' => 'Marck Script',
		'Marko One' => 'Marko One',
		'Marmelad' => 'Marmelad',
		'Marvel' => 'Marvel',
		'Mate' => 'Mate',
		'Mate SC' => 'Mate SC',
		'Maven Pro' => 'Maven Pro',
		'McLaren' =>'McLaren',
		'Meddon' => 'Meddon',
		'MedievalSharp' => 'MedievalSharp',
		'Medula One' => 'Medula One',
		'Megrim' => 'Megrim',
		'Meie Script' => 'Meie Script',
		'Merienda One' => 'Merienda One',
		'Merriweather' => 'Merriweather',
		'Metal' => 'Metal',
		'Metal Mania' => 'Metal Mania',
		'Metamorphous' => 'Metamorphous',
		'Metrophobic' => 'Metrophobic',
		'Michroma' => 'Michroma',
		'Miltonian' => 'Miltonian',
		'Miltonian Tattoo' => 'Miltonian Tattoo',
		'Miniver' => 'Miniver',
		'Miss Fajardose' => 'Miss Fajardose',
		'Modern Antiqua' => 'Modern Antiqua',
		'Molengo' => 'Molengo',
		'Monofett' => 'Monofett',
		'Monoton' => 'Monoton',
		'Monsieur La Doulaise' => 'Monsieur La Doulaise',
		'Montaga' => 'Montaga',
		'Montez' => 'Montez',
		'Montserrat' => 'Montserrat',
		'Moul' => 'Moul',
		'Moulpali' => 'Moulpali',
		'Mountains of Christmas' => 'Mountains of Christmas',
		'Mr Bedfort' => 'Mr Bedfort',
		'Mr Dafoe' => 'Mr Dafoe',
		'Mr De Haviland' => 'Mr De Haviland',
		'Mrs Saint Delafield' => 'Mrs Saint Delafield',
		'Mrs Sheppards' => 'Mrs Sheppards',
		'Muli' => 'Muli',
		'Mystery Quest' => 'Mystery Quest',
		'Neucha' => 'Neucha',
		'Neuton' => 'Neuton',
		'News Cycle' => 'News Cycle',
		'Niconne' => 'Niconne',
		'Nixie One' => 'Nixie One',
		'Nobile' => 'Nobile',
		'Nokora' => 'Nokora',
		'Norican' => 'Norican',
		'Nosifer' => 'Nosifer',
		'Nothing You Could Do' => 'Nothing You Could Do',
		'Noticia Text' => 'Noticia Text',
		'Nova Cut' => 'Nova Cut',
		'Nova Flat' => 'Nova Flat',
		'Nova Mono' => 'Nova Mono',
		'Nova Oval' => 'Nova Oval',
		'Nova Round' => 'Nova Round',
		'Nova Script' => 'Nova Script',
		'Nova Slim' => 'Nova Slim',
		'Nova Square' => 'Nova Square',
		'Numans' => 'Numans',
		'Nunito' => 'Nunito',
		'Odor Mean Chey' => 'Odor Mean Chey',
		'Old Standard TT' => 'Old Standard TT',
		'Oldenburg' => 'Oldenburg',
		'Oleo Script' => 'Oleo Script',
		'Open Sans' => 'Open Sans',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Oranienbaum' => 'Oranienbaum',
		'Orbitron' => 'Orbitron',
		'Oregano' => 'Oregano',
		'Orienta' => 'Orienta',
		'Original Surfer' => 'Original Surfer',
		'Oswald' => 'Oswald',
		'Over the Rainbow' => 'Over the Rainbow',
		'Overlock' => 'Overlock',
		'Overlock SC' => 'Overlock SC',
		'Ovo' => 'Ovo',
		'Oxygen' => 'Oxygen',
		'Oxygen Mono' => 'Oxygen Mono',
		'PT Mono' => 'PT Mono',
		'PT Sans' => 'PT Sans',
		'PT Sans Caption' => 'PT Sans Caption',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Serif' => 'PT Serif',
		'PT Serif Caption' => 'PT Serif Caption',
		'Pacifico' => 'Pacifico',
		'Parisienne' => 'Parisienne',
		'Passero One' => 'Passero One',
		'Passion One' => 'Passion One',
		'Patrick Hand' => 'Patrick Hand',
		'Patua One' => 'Patua One',
		'Paytone One' => 'Paytone One',
		'Peralta' => 'Peralta',
		'Permanent Marker' => 'Permanent Marker',
		'Petit Formal Script' => 'Petit Formal Script',
		'Petrona' => 'Petrona',
		'Philosopher' => 'Philosopher',
		'Piedra' => 'Piedra',
		'Pinyon Script' => 'Pinyon Script',
		'Plaster' => 'Plaster',
		'Play' => 'Play',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'Podkova' => 'Podkova',
		'Poiret One' => 'Poiret One',
		'Poller One' => 'Poller One',
		'Poly' => 'Poly',
		'Pompiere' => 'Pompiere',
		'Pontano Sans' => 'Pontano Sans',
		'Port Lligat Sans' => 'Port Lligat Sans',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Prata' => 'Prata',
		'Preahvihear' => 'Preahvihear',
		'Press Start 2P' => 'Press Start 2P',
		'Princess Sofia' => 'Princess Sofia',
		'Prociono' => 'Prociono',
		'Prosto One' => 'Prosto One',
		'Puritan' => 'Puritan',
		'Quando' => 'Quando',
		'Quantico' => 'Quantico',
		'Quattrocento' => 'Quattrocento',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Qwigley' => 'Qwigley',
		'Racing Sans One' => 'Racing Sans One',
		'Radley' => 'Radley',
		'Raleway' => 'Raleway',
		'Raleway Dots' => 'Raleway Dots',
		'Rammetto One' => 'Rammetto One',
		'Ranchers' => 'Ranchers',
		'Rancho' => 'Rancho',
		'Rationale' => 'Rationale',
		'Redressed' => 'Redressed',
		'Reenie Beanie' => 'Reenie Beanie',
		'Revalia' => 'Revalia',
		'Ribeye' => 'Ribeye',
		'Ribeye Marrow' => 'Ribeye Marrow',
		'Righteous' => 'Righteous',
		'Roboto' => 'Roboto',
		'Rochester' => 'Rochester',
		'Rock Salt' => 'Rock Salt',
		'Rokkitt' => 'Rokkitt',
		'Romanesco' => 'Romanesco',
		'Ropa Sans' => 'Ropa Sans',
		'Rosario' => 'Rosario',
		'Rosarivo' => 'Rosarivo',
		'Rouge Script' => 'Rouge Script',
		'Ruda' => 'Ruda',
		'Ruge Boogie' => 'Ruge Boogie',
		'Ruluko' => 'Ruluko',
		'Ruslan Display' => 'Ruslan Display',
		'Russo One' => 'Russo One',
		'Ruthie' => 'Ruthie',
		'Rye' => 'Rye',
		'Sail' => 'Sail',
		'Salsa' => 'Salsa',
		'Sancreek' => 'Sancreek',
		'Sansita One' => 'Sansita One',
		'Sarina' => 'Sarina',
		'Satisfy' => 'Satisfy',
		'Schoolbell' => 'Schoolbell',
		'Seaweed Script' => 'Seaweed Script',
		'Sevillana' => 'Sevillana',
		'Shadows Into Light' => 'Shadows Into Light',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shanti' => 'Shanti',
		'Share' => 'Share',
		'Shojumaru' => 'Shojumaru',
		'Short Stack' => 'Short Stack',
		'Siemreap' => 'Siemreap',
		'Sigmar One' => 'Sigmar One',
		'Signika' => 'Signika',
		'Signika Negative' => 'Signika Negative',
		'Simonetta' => 'Simonetta',
		'Sirin Stencil' => 'Sirin Stencil',
		'Six Caps' => 'Six Caps',
		'Skranji' => 'Skranji',
		'Slackey' => 'Slackey',
		'Smokum' => 'Smokum',
		'Smythe' => 'Smythe',
		'Sniglet' => 'Sniglet',
		'Snippet' => 'Snippet',
		'Sofia' => 'Sofia',
		'Sonsie One' => 'Sonsie One',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Source Sans Pro' => 'Source Sans Pro',
		'Special Elite' => 'Special Elite',
		'Spicy Rice' => 'Spicy Rice',
		'Spinnaker' => 'Spinnaker',
		'Spirax' => 'Spirax',
		'Squada One' => 'Squada One',
		'Stalin One' => 'Stalin One',
		'Stardos Stencil' => 'Stardos Stencil',
		'Stint Ultra Condensed' => 'Stint Ultra Condensed',
		'Stint Ultra Expanded' => 'Stint Ultra Expanded',
		'Stoke' => 'Stoke',
		'Sue Ellen Francisco' => 'Sue Ellen Francisco',
		'Sunshiney' => 'Sunshiney',
		'Supermercado One' => 'Supermercado One',
		'Suwannaphum' => 'Suwannaphum',
		'Swanky and Moo Moo' => 'Swanky and Moo Moo',
		'Syncopate' => 'Syncopate',
		'Tangerine' => 'Tangerine',
		'Taprom' => 'Taprom',
		'Telex' => 'Telex',
		'Tenor Sans' => 'Tenor Sans',
		'The Girl Next Door' => 'The Girl Next Door',
		'Tienne' => 'Tienne',
		'Tinos' => 'Tinos',
		'Titan One' => 'Titan One',
		'Trade Winds' => 'Trade Winds',
		'Trocchi' => 'Trocchi',
		'Trochut' => 'Trochut',
		'Trykker' => 'Trykker',
		'Tulpen One' => 'Tulpen One',
		'Ubuntu' => 'Ubuntu',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu Mono' => 'Ubuntu Mono',
		'Ultra' => 'Ultra',
		'Uncial Antiqua' => 'Uncial Antiqua',
		'UnifrakturCook' => 'UnifrakturCook',
		'UnifrakturMaguntia' => 'UnifrakturMaguntia',
		'Unkempt' => 'Unkempt',
		'Unlock' => 'Unlock',
		'Unna' => 'Unna',
		'VT323' => 'VT323',
		'Varela' => 'Varela',
		'Varela Round' => 'Varela Round',
		'Vast Shadow' => 'Vast Shadow',
		'Vibur' => 'Vibur',
		'Vidaloka' => 'Vidaloka',
		'Viga' => 'Viga',
		'Voces' => 'Voces',
		'Volkhov' => 'Volkhov',
		'Vollkorn' => 'Vollkorn',
		'Voltaire' => 'Voltaire',
		'Waiting for the Sunrise' => 'Waiting for the Sunrise',
		'Wallpoet' => 'Wallpoet',
		'Walter Turncoat' => 'Walter Turncoat',
		'Warnes' => 'Warnes',
		'Wellfleet' => 'Wellfleet',
		'Wire One' => 'Wire One',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
		'Yellowtail' => 'Yellowtail',
		'Yeseva One' => 'Yeseva One',
		'Yesteryear' => 'Yesteryear',
		'Zeyada' => 'Zeyada',
		); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


$of_options[] = array( 	"name" 		=> "Dasboard",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_dashboard",
						"std" 		=> __("<p>Hi there.</p><p>Welcome to <strong>".THEMENAME." Dashboard</strong>. This is your theme dashboard.</p><p>Use <strong>Option Reset</strong> button to <strong>restore</strong> all options to default and <strong>Save All Changes</strong> to <strong>save</strong> the options that you have entered in each section.</p><p><strong>Support Forum:</strong> <a href='http://support.indonez.com' target='_blank'>http://support.indonez.com</a></p><p><strong>Documentation:</strong> Open documentation.html in <strong>documentation/theme_documentation</strong></p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_seo",
						"std" 		=> __("<strong>SEO Settings</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> __("Use built-in SEO fields","indonez"),
						"desc" 		=> __("Turn it off if you want to use external SEO plugin.","indonez"),
						"id" 		=> "seo_onoff",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Meta Description","indonez"),
						"desc" 		=> __("These setting may be overridden for single posts &amp; pages.","indonez"),
						"id" 		=> "seo_metadesc",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Meta Keywords","indonez"),
						"desc" 		=> __("These setting may be overridden for single posts &amp; pages.","indonez"),
						"id" 		=> "seo_metakeywords",
						"std" 		=> "",
						"type" 		=> "text"
				);				
						       
				
$of_options[] = array( 	"name" 		=> __("Tracking Code","indonez"),
						"desc" 		=> __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.","indonez"),
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_misc",
						"std" 		=> __("<strong>MISC</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => __("Page 404","indonez"),
						"desc" => __("Enter 404 message text.","indonez"),
						"id" => "page_not_found_text",
						"std" => "",
						"type" => "textarea"); 
				
				
$of_options[] = array( 	"name" 		=> __("Layout Settings","indonez"),
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_layout",
						"std" 		=> __("Don't forget to click <strong>Save All Changes</strong> before you leave this section.","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> __("Responsive Layout","indonez"),
						"desc" 		=> __("Switch Layout","indonez"),
						"id" 		=> "responsive_layout",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( "name" => __("Layout Options","indonez"),
						"desc" => __("Select layout options.","indonez"),
						"id" => "type_layout",
						"std" => "fullwidth",
						"type" => "select",
						"options" => array("fullwidth","boxed"));
				
				
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __("Sidebar Options","indonez"),
						"desc" 		=> __("Sidebar options (Left Sidebar, No Sidebar, Right Sidebar). These setting may be overridden for single posts &amp; pages sidebar.","indonez"),
						"id" 		=> "main_layout",
						"std" 		=> "rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
							'leftsidebar' 	=> $url . '2cl.png',
							'fullwidth' 	=> $url . '1col.png',
							'rightsidebar' 	=> $url . '2cr.png',
							
						)
				);
				
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_layout_header",
						"std" 		=> __("<strong>Header</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" 		=> __("Custom Logo","indonez"),
						"desc" 		=> __("Upload your logo here, or define the URL directly","indonez"),
						"id" 		=> "custom_logo",
						"std"		=> "",
						"type"		=> "upload");
					
$of_options[] = array( 	"name" 		=> __("Custom Favicon","indonez"),
						"desc" 		=> __("Upload a 16px x 16px .ico image that will represent your website's favicon.","indonez"),
						"id" 		=> "custom_favicon",
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Top Social Icon","indonez"),
						"desc" 		=> __("Enter each <strong>social profile code</strong> in a new line. <strong>Example :</strong> <br/> [idz_icon name=&quot;social-facebook&quot; link=&quot;http://facebook.com&quot; blank=&quot;1&quot;] <br/><br/>
						
						<strong>Available name :</strong> social-mail, social-rss, social-github, social-flickr, social-vimeo, social-pinterest, social-tumblr, social-linkedin, social-dribbble, social-stumbleupon, social-lastfm, social-rdio, social-spotify, social-instagram, social-dropbox, social-evernote, social-flattr, social-skype, social-behance, social-soundcloud, social-picasa, social-paypal, social-smashing, social-sina-weibo, social-mixi, social-renren, social-qq  
						
						","indonez"),
						"id" 		=> "contact_custom_top_social_url",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable top social icon.","indonez"),
						"id" 		=> "top_social",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> "Search Form",
						"desc" 		=> __("Enable/disable search form.","indonez"),
						"id" 		=> "top_searchform",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_layout_header_inner",
						"std" 		=> __("<strong>Header Inner Pages</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Breadcrumb Navigation","indonez"),
						"desc" 		=> __("Enable/disable breadcrumb","indonez"),
						"id" 		=> "page_breadcrumb_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_layout_bottom",
						"std" 		=> __("<strong>Bottom Area</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> __("Bottom Widget","indonez"),
						"desc" 		=> __("Enter html, shortcode or text to display in bottom area. These setting may be overridden for single posts and pages.","indonez"),
						"id" 		=> "bottom_text",
						"std" 		=> "This is bottom widget, you can display html, shortcode or text here.  Naviagte to WP Admin - Appearance - Theme Options - Layout Settings - Bottom Area - Bottom Widget",
						"type" 		=> "textarea"
				);	
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable bottom widget.","indonez"),
						"id" 		=> "bottom_text_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
										
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_layout_footer",
						"std" 		=> __("<strong>Footer</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => __("Footer Logo","indonez"),
						"desc" => __("Upload your footer logo here, or define the URL directly","indonez"),
						"id" => "footer_logo",
						"std" => "",
						"type" => "upload");
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable footer logo.","indonez"),
						"id" 		=> "footer_logo_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Copyright Text","indonez"),
						"desc" 		=> __("Enter copyright text","indonez"),
						"id" 		=> "footer_copyright",
						"std" 		=> "&copy;2013.",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable copyright text.","indonez"),
						"id" 		=> "footer_copyright_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Contact Information Title","indonez"),
						"desc" 		=> __("Enter contact information title","indonez"),
						"id" 		=> "footer_contact_title",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable contact information title.","indonez"),
						"id" 		=> "footer_contact_title_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Balloon Text","indonez"),
						"desc" 		=> __("Enter balloon text, example Holla","indonez"),
						"id" 		=> "footer_balloon_text",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Ballon Text URL","indonez"),
						"desc" 		=> __("Enter balloon text url.","indonez"),
						"id" 		=> "footer_balloon_text_url",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable balloon.","indonez"),
						"id" 		=> "footer_balloon_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Address","indonez"),
						"desc" 		=> __("Enter address.","indonez"),
						"id" 		=> "footer_addr",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Telephone","indonez"),
						"desc" 		=> __("Enter telephone number.","indonez"),
						"id" 		=> "footer_tlp",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Mail","indonez"),
						"desc" 		=> __("Enter email address.","indonez"),
						"id" 		=> "footer_mail",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable address, telephone and email address.","indonez"),
						"id" 		=> "footer_ate_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( "name" => __("Include Menu on Footer","indonez"),
						"desc" =>__("Please choose the menu that you want to include on footer area.","indonez"),
						"id" => "footer_menu",
						"std" => "",
						"type" => "radio",
						"options" => $of_footmenus);
						
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __("Enable/disable footer menu.","indonez"),
						"id" 		=> "footer_menu_onoff",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);						
				
				
$of_options[] = array( 	"name" 		=> __("Slider Settings","indonez"),
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_slider",
						"std" 		=> __("<p>You should install <strong>Revolution Slider</strong> plugin for the first time in Appearance >> Install Plugins. Then activate the plugin.</p><p>To create slider post, navigate to <a href='admin.php?page=revslider'>Revolution Slider</a>.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Blog Settings","indonez"),
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_blog",
						"std" 		=> __("<p>This is <strong>Blog Settings</strong> section.</p><p>Don't forget to click <strong>Save All Changes</strong> before you leave this section.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( "name" => __("Blog Categories","indonez"),
						"desc" =>__("Please select the categories that you want to include in blog page. Only used for blog template.","indonez"),
						"id" => "blog_categories",
						"std" => "",
						"type" => "select",
						"options" => $of_categories);
						
$of_options[] = array( "name" => __("Posts Order","indonez"),
						"desc" => __("Select your order parameter for blog posts. Only used for blog template.","indonez"),
						"id" => "blog_order",
						"std" => "date",
						"type" => "select",
						"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));
				
$of_options[] = array( 	"name" 		=> __("Posts Per Page","indonez"),
						"desc" 		=> __("Number of posts per page (default: 3). Only used for blog template.","indonez"),
						"id" 		=> "blog_item_number",
						"std" 		=> "3",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Title Blog","indonez"),
						"desc" 		=> __("Enter title for blog and single post page.","indonez"),
						"id" 		=> "blog_title",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Blog Description text","indonez"),
						"desc" 		=> __("Enter text for blog description.","indonez"),
						"id" 		=> "blog_desc",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Read More","indonez"),
						"desc" 		=> __("Read more button text.","indonez"),
						"id" 		=> "blog_read_moretext",
						"std" 		=> "Read more",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __("Show Author","indonez"),
						"desc" 		=> __("Show author on posts list and single post.","indonez"),
						"id" 		=> "blog_show_author",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Show Post Date","indonez"),
						"desc" 		=> __("Show post date on posts list and single post.","indonez"),
						"id" 		=> "blog_show_postdate",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Show Tags","indonez"),
						"desc" 		=> __("Show tag on posts list and single post.","indonez"),
						"id" 		=> "blog_show_tag",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
				
$of_options[] = array( 	"name" 		=> __("Show Comments","indonez"),
						"desc" 		=> __("Show comments number on posts list and single post.","indonez"),
						"id" 		=> "blog_show_comments",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Show Facebook Like Button","indonez"),
						"desc" 		=> __("Show facebook like button in single post.","indonez"),
						"id" 		=> "blog_show_fblike",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Show Social Share","indonez"),
						"desc" 		=> __("Show social share icon in single post.","indonez"),
						"id" 		=> "blog_show_shareicon",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
				
				
$of_options[] = array( 	"name" 		=> __("Portfolio Settings","indonez"),
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_portfolio",
						"std" 		=> __("<p>This is <strong>Portfolio Settings</strong> section.</p><p>Don't forget to click <strong>Save All Changes</strong> before you leave this section.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => __("Portfolio posts order","indonez"),
						"desc" => __("Select your order parameter for portfolio posts.","indonez"),
						"id" => "portfolio_order",
						"std" => "date",
						"type" => "select",
						"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));
						
$of_options[] = array( 	"name" 		=> __("Portfolio Title","indonez"),
						"desc" 		=> __("Enable/disable portfolio title.","indonez"),
						"id" 		=> "portfolio_title",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Portfolio Description","indonez"),
						"desc" 		=> __("Enable/disable portfolio posts description.","indonez"),
						"id" 		=> "portfolio_desc",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Sidebar Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_sidebar",
						"std" 		=> __("<p>This is <strong>Sidebar Settings</strong> section.</p><p>This section allow you to create <strong>unlimited sidebar</strong> simply by enter each sidebar name separated by comma.</p><p>Once you have created the desired number of sidebars, navigate to <strong>Appearance > Widgets</strong> to populate them with widget items.</p><p>Don't forget to click <strong>Save All Changes</strong> before you leave this section.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				
				
$of_options[] = array( "name" => __("Manage Sidebars","indonez"),
					"desc" => __("Enter each sidebar name separated by comma","indonez"),
					"id" => "custom_sidebar",
					"std" =>"",
					"type" => "textarea");
					
									
$of_options[] = array( 	"name" 		=> "Styling Settings",
						"type" 		=> "heading"
				);
				
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_styling",
						"std" 		=> __("<p>This is <strong>Styling Settings</strong> section.</p><p>Don't forget to click <strong>Save All Changes</strong> before you leave this section.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> __("Style Switcher Demo","indonez"),
						"desc" 		=> __("Enable/disable style switcher. For Demo Only","indonez"),
						"id" 		=> "show_switcher",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
				
				
$of_options[] = array( "name" => __("General Color","indonez"),
					"desc" => __("Click to select general color, example link color etc. default is #1abc9c","indonez"),
					"id" => "generalcolor",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => "Background Pattern",
					"desc" => "Select a background pattern.",
					"id" => "bg_pattern",
					"std" => $bg_images_url."bg-body1.jpg",
					"type" => "tiles",
					"options" => $bg_images,
					);

$of_options[] = array( 	"name" 		=> __("Show Background pattern","indonez"),
						"desc" 		=> __("Enable/disable background pattern body. Default is disable","indonez"),
						"id" 		=> "show_pattern",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
					
          
$of_options[] = array( "name" => "Background Color",
					"desc" => "Click to select custom body background color.",
					"id" => "bg_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Heading Color","indonez"),
					"desc" => __("Click to select heading color, default is #646464","indonez"),
					"id" => "headingcolor",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_style1",
						"std" 		=> __("<strong>Top Section</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
					
					
$of_options[] = array( "name" => __("Top Background Color","indonez"),
					"desc" => __("Click to select background color top area, default is #34495e","indonez"),
					"id" => "topareabg",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Color Text","indonez"),
					"desc" => __("Click to select color for text, default is #61758a","indonez"),
					"id" => "topareatext",
					"std" => "",
					"type" => "color");
					
					
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_style2",
						"std" 		=> __("<strong>Menu Section</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
					
					
$of_options[] = array( "name" => __("Menu Background Color","indonez"),
					"desc" => __("Click to select background color menu area, default is #283849","indonez"),
					"id" => "menuareabg",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Menu Color","indonez"),
					"desc" => __("Click to select menu color, default is #d4d7db","indonez"),
					"id" => "menucolor",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Menu Description Color","indonez"),
					"desc" => __("Click to select menu description color, default is #7e8892","indonez"),
					"id" => "menudesccolor",
					"std" => "",
					"type" => "color");
					
					
$of_options[] = array( "name" => __("Menu Active Background","indonez"),
					"desc" => __("Click to select background color for active menu, default is #254550","indonez"),
					"id" => "bgmenucolor",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_style3",
						"std" 		=> __("<strong>Footer Section</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
					
					
$of_options[] = array( "name" => __("Footer Background Color","indonez"),
					"desc" => __("Click to select background color for footer, default is #34495e","indonez"),
					"id" => "footerbg",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __("Footer Heading Color","indonez"),
					"desc" => __("Click to select color for heading, default is #ffffff","indonez"),
					"id" => "footerheadingcolor",
					"std" => "",
					"type" => "color");
					
					
$of_options[] = array( "name" => __("Footer Color Text","indonez"),
					"desc" => __("Click to select color for footer text, default is #85929e","indonez"),
					"id" => "footertextcolor",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_style4",
						"std" 		=> __("<strong>Custom CSS</strong>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
					
				
$of_options[] = array( "name" => "",
					"desc" => __("Quickly add some CSS to your theme by adding it to this block.","indonez"),
					"id" => "custom_css",
					"std" =>"",
					"type" => "textarea");
				
				
$of_options[] = array( 	"name" 		=> "Font Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "",
						"id" 		=> "introduction_font",
						"std" 		=> __("<p>This is <strong>Font Settings</strong> section.</p><p>Don't forget to click <strong>Save All Changes</strong> before you leave this section.</p>","indonez"),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Body",
						"desc" 		=> __("Select font for body. Default is Open Sans","indonez"),
						"id" 		=> "font_body",
						"std" 		=> "Open Sans",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "13px" //this is the text size from preview box
						),
						"options" 	=> $googlefonts,
				);
				
				
$of_options[] = array( 	"name" 		=> "Top Menu",
						"desc" 		=> __("Select font for top menu. Default is Roboto","indonez"),
						"id" 		=> "font_menu",
						"std" 		=> "Roboto",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "20px" //this is the text size from preview box
						),
						"options" 	=> $googlefonts,
				);
				
$of_options[] = array( 	"name" 		=> "Menu Description",
						"desc" 		=> __("Select font for top menu description. Default is Open Sans","indonez"),
						"id" 		=> "font_menu_desc",
						"std" 		=> "Open Sans",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "20px" //this is the text size from preview box
						),
						"options" 	=> $googlefonts,
				);
				
				
$of_options[] = array( 	"name" 		=> "Heading Font",
						"desc" 		=> __("Select font for heading title. Default is Roboto","indonez"),
						"id" 		=> "font_heading",
						"std" 		=> "Roboto",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "20px" //this is the text size from preview box
						),
						"options" 	=> $googlefonts,
				);
				
				
// Backup Options
/*$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
*/
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>