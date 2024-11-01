<?php
/*
Plugin Name: Upcoming Events
Plugin URI: 
Description: Upcoming Events
Author: Terry Stevenson II
Version: 1.0
Author URI:
*/

function upcoming_widget() {

 // Get today's date in the right format
				$todaysDate = date('Y/m/d H:i');

echo '<h3 class="widgettitle">Upcoming Events</h3>';
echo '<ul>';
query_posts('showposts=5&category_name=events&tag=location1,location2,location3,location4&meta_key=Date&meta_compare=>&meta_value=' . $todaysDate . '&orderby=meta_value&order=ASC');
if ( have_posts() ) : while ( have_posts() ) : the_post();

// get ID of each post
	$post_id = get_the_ID();

 // format  Todays Date as a Date
	$eventMeta = get_post_meta($post_id, 'Date', true);
	$Date = strtotime($eventMeta);

echo '<div class="widget"><span class="front-title">';
echo '<a href="';
echo the_permalink();
echo '"  >';
//shorten event title if it is too long...
echo '<li>'; $shorttitle = substr(the_title('','',FALSE),0,12);
echo $shorttitle; if (strlen($shorttitle) >11){ echo '&hellip;'; } 
//end shorten event title if it is too long...
echo '</a></span>';
//echo '</li>';
echo '<span class="front-date"><br />'; 
echo date("F j @ g:i a", $Date); echo '</span></div></li>';
endwhile;
else: echo '<li><p>No events have been scheduled.</p>';
endif;
echo '</li></ul>';
}
function init_upcoming(){
register_sidebar_widget("Upcoming Events", "upcoming_widget");
}
add_action("plugins_loaded", "init_upcoming");
?>
