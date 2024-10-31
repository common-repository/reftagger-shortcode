<?php
/* 
Plugin Name: RefTagger Shortcode
Plugin URI: http://www.designerken.com/reftagger-shortcode
Description: Adds a <a href="http://reftagger.com/">Reftagger</a> shortcode button to the TinyMCE visual editor in wordpress for easy tagging of bible references that are not inline.
Author: Ken Charity
Version: 1.1
Author URI: http://www.designerken.com/
*/

/*-----------------------------------------------------------------------------------*/
/*	Check if Reftagger is installed 
/*-----------------------------------------------------------------------------------*/

function reftagger_shortcode_init() {
	/* Check if Reftagger is active */
	if(! function_exists( 'lbs_add_menu' ) ) {
		function reftagger_shortcode_warning() {
			global $current_user ;
				$user_id = $current_user->ID;
				/* Check that the user hasn't already clicked to ignore the message */
			if ( ! get_user_meta($user_id, 'reftagger_shortcode_ignore_notice') ) {
				echo '<div id="reftagger_shortcode-warning" class="error fade"><p>';
				printf(__('<a href="%1$s" target="_blank" style="text-decoration:none;">Reftagger</a> is not activated, the correct Bibleref semantic markup will still be generated on the frontend, but without a link. | <a href="%2$s">Hide Notice</a>'), 'http://reftagger.com/', '?reftagger_shortcode_nag_ignore=0');
				echo "</p></div>";
			}
		}
		/* Display a notice that can be dismissed */
		add_action( 'admin_notices','reftagger_shortcode_warning' );
	}
}
add_action( 'plugins_loaded', 'reftagger_shortcode_init' );

function reftagger_shortcode_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['reftagger_shortcode_nag_ignore']) && '0' == $_GET['reftagger_shortcode_nag_ignore'] ) {
             add_user_meta($user_id, 'reftagger_shortcode_ignore_notice', 'true', true);
	}
}
add_action('admin_init', 'reftagger_shortcode_ignore');

/*-----------------------------------------------------------------------------------*/
/*	The Shortcode - <cite class="bibleref" title="Mt 5:48">v. 48</cite>
/*-----------------------------------------------------------------------------------*/

function reftagger_shortcode( $atts, $reference = null ) {
    extract( shortcode_atts( array(
		'title'    	 => ''
    ), $atts ) );
	$out = '<cite class="bibleref shortcode" title="'.$title.'">'.do_shortcode( $reference ).'</cite>';
    return $out;
}
add_shortcode( 'reftagger','reftagger_shortcode' );


/*-----------------------------------------------------------------------------------*/
/*	TinyMCE shortcode
/*-----------------------------------------------------------------------------------*/

function reftagger_button() {
   if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
     return;
   }
   if ( get_user_option( 'rich_editing' ) == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_reftagger_plugin' );
     add_filter( 'mce_buttons', 'register_reftagger_button' );
   }
}
add_action( 'init', 'reftagger_button' );

function register_reftagger_button( $buttons ) {
 array_push( $buttons, "|", "reftagger_button" );
 return $buttons;
}
function add_reftagger_plugin( $plugin_array ) {
   $plugin_array['reftagger_button'] = plugins_url( 'includes/js/shortcode.js' , __FILE__ );
   return $plugin_array;
}
