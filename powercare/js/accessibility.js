jQuery(document).ready(function(){

    //Trigger accessibility sidebar from skip links
	jQuery('.trigger_access_sidebar').on('click',function(e){
		e.preventDefault();
		jQuery('.wrap_access').toggle();
		if( jQuery('.wrap_access').attr("aria-hidden") == 'true' ) {
			jQuery('.wrap_access').attr("aria-hidden","false");
		} else {
			jQuery('.wrap_access').attr("aria-hidden","true");
		}
		jQuery("a.close_access_btn").focus();
	});

    //Activate mega menu on focus
    // jQuery("#skip-navigation .menu-item-has-children > a").on("focus", function(){
    //     jQuery(this).parent().find("ul.sub-menu").addClass("active_mega_menu");
    // });   

});

jQuery(window).load(function() {
    jQuery(".addthis_inline_share_toolbox a.at-share-btn").each(function(){
        jQuery(this).prop('tabIndex', -1);
        jQuery(this).removeAttr('tabindex');
    });
});
