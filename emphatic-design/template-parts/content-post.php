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
				<div class="row">
					<p><?php the_time(get_option( 'date_format' ));?> at <?php the_time(get_option( 'time_format' ));?> by
				<a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a> | Posted in

				<?php

				$categories = get_the_category();
				$separator = ", ";
				$output = ' ';

				if($categories){

					foreach ($categories as $category) {

						$output .= '<a href="'. esc_url(get_category_link($category->term_id)) . '">' .$category->cat_name . '</a>'.$separator;
					}

					echo trim($output, $separator);
				}

				?>
				
				</p>
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
	


