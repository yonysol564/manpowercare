jQuery(document).ready(function($) {


});

//Load terms content
function load_term_content(term_id){
	jQuery('.ajax_res .row .ajax_holder').html('');
	jQuery('.loader_div').show();
	jQuery.ajax({
		type : "post",
		dataType : "json",
		url : ajaxurl,
		data : {
			action: "load_term_content", 
			term_id : term_id,
		},
		success: function(response) {
			if(response.type == "success") {
			  jQuery('.loader_div').hide();
			  jQuery('#projects_nav_mobile').hide();
			  
			  jQuery('.ajax_res .row .ajax_holder').html(response.html);
			}
			else {
			   console.log(response.html); 
			}
		}
	});
}


//Load more posts
function load_more_posts(current,post_id){
	jQuery.ajax({
		type : "post",
		dataType : "json",
		url : ajaxurl,
		data : {
			action: "load_more_posts", 
			current : current,
			total : total,
			post_id : post_id
		},
		success: function(response) {
			if(response.type == "success") {
				jQuery(".ajax_response_row").append(response.html);
				jQuery(".wrap_load_more a").data("current",current+1);
			}
		}
	});
}