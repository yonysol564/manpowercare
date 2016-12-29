<?php
define("THEME_DIR",get_stylesheet_directory_uri());
define("LANG", ICL_LANGUAGE_CODE);

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

    //wp_enqueue_style( 'swiper', $swiper, array(), 'v1', 'all' );
    wp_enqueue_style( 'slick', $slick, array(), NULL, 'all' );
    wp_enqueue_style( 'magnific', $magnific, array(), NULL, 'all' );
    wp_enqueue_style( 'font_awesome', $font_awesome, array(), microtime(), 'all' );
    wp_enqueue_style( 'normalize', $normalize, array(), NULL, 'all' );
    wp_enqueue_style( 'fonts', $fonts, array(), NULL, 'all' ); 

   	if( !is_rtl() ) {
    	wp_enqueue_style( 'foundation', $foundation, array(), NULL, 'all' );
    } else {
    	wp_enqueue_style(  'foundation_rtl', $foundation_rtl, array(), 'v1', 'all' );
    }

    wp_enqueue_style( 'child-style', THEME_DIR . '/style.css', array( 'avada-stylesheet' ) );

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


function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

/******************************************************************************************
						N A V I G A T I O N S  -  M E N U
******************************************************************************************/

// Menu
function register_my_menu() {
    register_nav_menus(array(
    	'top_menu' 	  		=>  'Top Menu',
    	'mobile_menu'   	=>  'Mobile Menu',
    	'footer_menu_one'   =>  'Footer Menu One',
    	'footer_menu_two'   =>  'Footer Menu Two',
    	'footer_menu_three' =>  'Footer Menu Three',
    	'footer_menu_four'  =>  'Footer Menu Four',
    	'footer_menu_five'  =>  'Footer Menu Five',
    ));
}
add_action( 'init', 'register_my_menu' );


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
