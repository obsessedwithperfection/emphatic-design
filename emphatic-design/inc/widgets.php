<?php
/* Registering widgets sidebars
 * */
function emphaticdesign_widgets_init() {
	register_sidebar (array(
	'name' => __('Sidebar','emphatic-design'),
	'id'	=> "sidebar-widget-area",
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="sidewidgettitle">',
	'after_title'	=> '</h2>' )
	);
	register_sidebar (array(
	'name' => __('Left Footer','emphatic-design'),
	'id' => "footer-left-widget-area",
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>' )
	);
	
	register_sidebar (array(
	'name' => __('Middle Footer','emphatic-design'),
	'id' => "footer-middle-widget-area",
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>' )
	);
	
	register_sidebar (array(
	'name' => __('Right Footer','emphatic-design'),
	'id' => "footer-right-widget-area",
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>' )
	);
}
add_action('init','emphaticdesign_widgets_init');
