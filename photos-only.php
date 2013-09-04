<?php

/*
Plugin Name: Photos Only
Plugin URI: http://www.chrisfinke.com/wordpress/plugins/photos-only/
Description: Only show photos on your blog. Upload a photo, boom: it's published to your readers.
Version: 1
Author: Chris Finke
Author URI: http://www.chrisfinke.com/
License: GPLv2 or later
*/

function photos_only_pre_get_posts( &$query ) {
	if ( ( is_home() || is_feed() ) && $query->is_main_query() ) {
		// Media are the only first-class post citizens.
		$query->set( 'post_type', array( 'attachment' ) );
		$query->set( 'post_status', array( 'inherit', 'publish' ) );
		$query->set( 'posts_per_page', 30 );
	}
}

add_action( 'pre_get_posts', 'photos_only_pre_get_posts' );