<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package emphatic-design
 */
 ?>
<div class="containter-fluid" id="title">
				<div class="row">
					<h1 rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></h1>
				</div>
			</div>
				<div class="container-fluid" id="article">
					<div class="row">
						<div class="col-sm-8">
							<?php the_content(); ?>
							<?php the_tags(); ?>
							<?php
 	$defaults = array(
		'before'           => '<p>' . __( 'Pages:', 'emphatic-design' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'emphatic-design'),
		'previouspagelink' => __( 'Previous page', 'emphatic-design' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $defaults );

?>
						</div>										
						<div class="col-sm-4" id="sidebar">
							<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
						</div>						
					</div> 									
				</div>
	


