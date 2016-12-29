<?php
	define("THEME_DIR",get_template_directory_uri());
	define("LANG", ICL_LANGUAGE_CODE);
	define("CURRENT_YEAR",date('Y'));
	$lang = TEMPLATEPATH . '/lang';
	load_theme_textdomain('title', $lang);

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Accessibility Settings',
			'menu_title'	=> 'Accessibility',
			'parent_slug'	=> 'theme-general-settings',
		));

	}

	//get_template_part('admin/shortcodes');
	//get_template_part("admin/ajax");
	get_template_part("admin/types");
	//get_template_part("inc/ajax","functions");


	// Add body classes
	if ( ! function_exists( 'add_body_class' ) ){
	    function add_body_class( $classes ) {
	        global $post,$is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	        if( $is_lynx ) $classes[] = 'lynx';
	        elseif( $is_gecko ) $classes[] = 'gecko';
	        elseif( $is_opera ) $classes[] = 'opera';
	        elseif( $is_NS4 ) $classes[] = 'ns4';
	        elseif( $is_safari ) $classes[] = 'safari';
	        elseif( $is_chrome ) $classes[] = 'chrome';
	        elseif( $is_IE ) {
	            $classes[] = 'ie';
	            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
	            $classes[] = 'ie' . $browser_version[1];
	        } else $classes[] = 'unknown';
	        if( $is_iphone ) $classes[] = 'iphone';

	        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
	                 $classes[] = 'osx';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
	                 $classes[] = 'linux';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
	                 $classes[] = 'windows';
	        }

	        return $classes;
	    }
	    add_filter( 'body_class','add_body_class' );
	}

	// function lang_class($output) {
	//     return $output . ' class="no-js '.LANG.'"';
	// }
	// add_filter('language_attributes', 'lang_class');

	remove_action('wp_head', 'wp_generator');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails' );


/******************************************************************************************
							S T Y L E S    R E G I S T E R
******************************************************************************************/

	function enqueue_my_styles() {
	    $magnific           = THEME_DIR . '/css/magnific-popup.css';
	    $fonts 				= THEME_DIR . '/fonts/stylesheet.css';
	    $foundation     	= THEME_DIR . '/css/foundation.min.css';
	    $foundation_rtl     = THEME_DIR . '/css/foundation-rtl.min.css';
	    $font_awesome       = THEME_DIR . '/css/font-awesome.min.css';
	    $slick         		= THEME_DIR . '/css/slick.css';
	    $mainStyle          = THEME_DIR . '/css/style.css';
	    $rtl 				= THEME_DIR . '/css/rtl.css';
	    $responsive 		= THEME_DIR . '/css/responsive.css';
	    $rtlresponsive 		= THEME_DIR . '/css/rtl-responsive.css';
	    $normalize			= THEME_DIR . '/css/normalize.css';
	    $fancyboxcss 		= THEME_DIR . '/js/fancybox/jquery.fancybox.css';
	    $swiper		 		= THEME_DIR . '/css/swiper.min.css';
		$joined_style       = THEME_DIR . '/style.css';
		$accessiblity_style = THEME_DIR . '/css/accessibility.css';
		$stroll_css 		= THEME_DIR . '/css/stroll.min.css';

	    //wp_enqueue_style( 'swiper', $swiper, array(), 'v1', 'all' );
	    wp_enqueue_style( 'slick', $slick, array(), NULL, 'all' );
	    wp_enqueue_style( 'fancyboxcss', $fancyboxcss, array(), NULL, 'all' );
	    wp_enqueue_style( 'magnific', $magnific, array(), NULL, 'all' );
	    wp_enqueue_style( 'font_awesome', $font_awesome, array(), microtime(), 'all' );
	    wp_enqueue_style( 'normalize', $normalize, array(), NULL, 'all' );
	    wp_enqueue_style( 'stroll_css', $stroll_css, array(), NULL, 'all' );
	    wp_enqueue_style( 'fonts', $fonts, array(), NULL, 'all' ); 


	   	if( !is_rtl() ) {
	    	wp_enqueue_style( 'foundation', $foundation, array(), NULL, 'all' );
	    } else {
	    	wp_enqueue_style(  'foundation_rtl', $foundation_rtl, array(), 'v1', 'all' );
	    }

	    wp_enqueue_style( 'mainStyle', $mainStyle, array(), microtime(), 'all' );

		if( is_rtl() ) {
			wp_enqueue_style( 'rtl', $rtl, array(), NULL, 'all' );
		}

		wp_enqueue_style( 'responsive', $responsive, array(), NULL, 'all' );
		
		if( is_rtl() ) {
			wp_enqueue_style( 'rtlresponsive', $rtlresponsive, array(), NULL, 'all' );
		}

	
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );


/******************************************************************************************
						S C R I P T S 	 R E G I S T E R
******************************************************************************************/

	function register_my_jscripts() {
		//wp_register_script( 'infoBubble', THEME_DIR .'/js/infobubble.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'infoBubble' );
		wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBHxMNH4nOERouGGgLn2eXPMEKRaOCjEyM', array( 'jquery' ), NULL, false );wp_enqueue_script( 'googleapi' );
	    wp_register_script( 'foundation', THEME_DIR .'/js/foundation.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'foundation' );
	    //wp_register_script( 'classie', THEME_DIR .'/js/classie.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'classie' );
		//wp_register_script( 'niceScroll', THEME_DIR .'/js/jquery.nicescroll.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'niceScroll' );
		wp_register_script( 'fancyboxm', THEME_DIR .'/js/fancybox/jquery.mousewheel-3.0.6.pack.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'fancyboxm' );
		wp_register_script( 'fancybox', THEME_DIR .'/js/fancybox/jquery.fancybox.pack.js?v=2.1.5', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'fancybox' );
		wp_register_script( 'magnificjs', THEME_DIR .'/js/jquery.magnific-popup.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'magnificjs' );
		wp_register_script( 'modernizr', THEME_DIR .'/js/modernizr.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'modernizr' );
		//wp_register_script( 'masonry', THEME_DIR .'/js/masonry.pkgd.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'masonry' );
		//wp_register_script( 'stroll', THEME_DIR .'/js/stroll.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'stroll' );
		//wp_register_script( 'AnimOnScroll', THEME_DIR .'/js/AnimOnScroll.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'AnimOnScroll' );
		wp_register_script( 'slick', THEME_DIR .'/js/slick.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'slick' );
		wp_enqueue_script( 'matchHeight', THEME_DIR .'/js/jquery.matchHeight-min.js', array( 'jquery' ), NULL, true );
		wp_register_script("addthis","//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57e21979bdebcfe3",array('jquery'),NULL,true);
		wp_enqueue_script( 'addthis' );

		wp_register_script( 'functions', THEME_DIR .'/js/functions.js', array( 'jquery' ), NULL , true ); wp_enqueue_script( 'functions' );
		
		$slider_rtl = is_rtl() ? 'true' : 'false';		
		$inline_js = 'var slider_rtl = '.$slider_rtl.';';
		$inline_js .= 'var domainurl = "'.THEME_DIR.'";';
		wp_add_inline_script( 'functions', $inline_js );

		wp_register_script( 'accessibility', THEME_DIR .'/js/accessibility.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'accessibility' );
	}
	add_action('wp_enqueue_scripts', 'register_my_jscripts');


/******************************************************************************************
						N A V I G A T I O N S  -  M E N U
******************************************************************************************/

	// Menu
	function register_my_menu() {
	    register_nav_menus(array(
	    	'top_menu' 	  	=>  'Top Menu',
	    	'mobile_menu'   =>  'Mobile Menu',
	    	'footer_menu'   =>  'Footer Menu'
	    ));
	}
	add_action( 'init', 'register_my_menu' );



	// 2. dropdown admin columns - functions.php

	add_action( 'manage_dropdown_posts_custom_column', 'my_manage_dropdown_columns', 10, 2 );

	function my_manage_dropdown_columns( $column, $post_id ) {
	    global $post;
	    printf( __( '<span class="shortcode"><input type="text" value="[submenu id=&quot;%d&quot; title=&quot;%s&quot;]" class="large-text code" readonly="readonly"></span>' ), $post_id, get_the_title()  );
	}

	add_filter( 'manage_edit-dropdown_columns', 'my_edit_dropdown_columns' ) ;

	function my_edit_dropdown_columns( $columns ) {
	    $columns = array(
	        'cb' => '<input type="checkbox" />',
	        'title' => __( 'כותרת' ),
	        'shortcode_id' => __( 'שורטקוד' ),
	        'date' => __( 'Date' )
	    );
	    return $columns;
	}

	/******************************************************************************************
								F 	 U 	 N 	C   T 	I 	O 	N 	S
******************************************************************************************/
	
	// Language
	// function icl_post_languages(){
	// 	$languages = icl_get_languages('skip_missing=0');
	//   	if(1 < count($languages)){
	// 	  	$langs[] = '<select class="lang_selector">';
	// 	    foreach($languages as $l){
	// 	    	$class= '';
	// 	    	//print_r($l);
	// 	    	if($l['active'] == 1) {
	// 	    		$class = 'active';
	// 	    	}
	// 	      $langs[] = '<option data-url="'.$l['url'].'" class="li_lang' . $class . '">'.  $l['code'] .'</option>';
	// 	    }
	// 	    $langs[] = '</select>';
	//     echo join('', $langs);
	// 	}
	// }

	function icl_post_languages(){
	  $languages = icl_get_languages('skip_missing=1');
	  //print_r($languages);
	  if( 0 < count($languages) ){
	  	echo "<select class='lang_selector'>";
	    foreach($languages as $l){
	    	$selected = LANG == $l['language_code'] ? 'selected="selected"' : '';
	      	$langs[] = '<option value="'. $l['url'] .'" '.$selected.'>'.$l['code'].'</option>';
	    }
	    echo join('', $langs);
	    echo '</select>';
	  }
	}

	// Toutube
	function getYoutubeThumbUrl($id , $size="0") {
	    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
	    return $data;
	}

	// Background color
	function hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if(empty($color))
	          return $default;

		//Sanitize $color if "#" is provided
	        if ($color[0] == '#' ) {
	        	$color = substr( $color, 1 );
	        }

	        //Check if color has 6 or 3 characters and get values
	        if (strlen($color) == 6) {
	                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	        } elseif ( strlen( $color ) == 3 ) {
	                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	        } else {
	                return $default;
	        }

	        //Convert hexadec to rgb
	        $rgb =  array_map('hexdec', $hex);

	        //Check if opacity is set(rgba or rgb)
	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	$output = 'rgb('.implode(",",$rgb).')';
	        }

	        //Return rgb(a) color string
	        return $output;
	}

	//D Y N A M I C    E X C E R P T
	function dynamic_excerpt($length, $post) { // Variable excerpt length. Length is set in characters
	    global $post;
	    $text = $post->post_excerpt;
	    if ( '' == $text ) {
	    $text = get_the_content('');
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]>', $text);
	    }
	    $text = strip_shortcodes($text); // optional, recommended
	    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
	    $text = mb_substr($text,0,$length).'';
	    echo $text;
	}

	// Pagination
	function my_pagination($query = ""){
		$arr_left  = ''; 
		$arr_right = '';
		if (is_rtl()) {
			$arr_left   = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
			$arr_right  = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
		}else{
			$arr_left   = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
			$arr_right  = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
		}

	    global $wp_query;
		if(!$query){
			$query = $wp_query;
		}
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '<a class="btns">?paged=%#%</a>',
	        'current' => max(1, get_query_var('paged')),
	        'total' => $query->max_num_pages,
	        'prev_text'          => __($arr_right),
			'next_text'          => __($arr_left)
	    ));
	}
	add_action('init', 'my_pagination'); // Add our Pagination


	function custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


	function new_excerpt_more( $more ) {
			return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyBHxMNH4nOERouGGgLn2eXPMEKRaOCjEyM');
	}
	add_action('acf/init', 'my_acf_init');


	function set_content_type( $content_type ) {
		return 'text/html';
	}
	add_filter( 'wp_mail_content_type', 'set_content_type' );


	add_theme_support( 'post-formats', array( 'image', 'video' ) );
