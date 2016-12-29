<?php 
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );
function add_frontend_ajax_javascript_file() {
    wp_enqueue_script( 'ajax_custom_script', THEME_DIR . '/js/ajax.js', array('jquery') );
    wp_localize_script( 'ajax_custom_script', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}

add_action( 'wp_ajax_load_term_content', 'load_term_content' );
add_action( 'wp_ajax_nopriv_load_term_content', 'load_term_content' );
function load_term_content(){

	$post_id = isset($_POST['post_id']) ? sanitize_text_field( $_POST['post_id']  ) : '';
	$response = array();

	if($post_id){
		$gallery_rep = get_field('gallery_rep',$post_id);
		print_r($gallery_rep);
		die();
	}
	
	

	echo json_encode($response);
	die();
}