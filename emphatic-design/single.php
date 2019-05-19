<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package emphatic-design
 */

get_header(); ?>

	<?php if(has_post_thumbnail() ):
		do_action('emphaticdesign_thumbnail');	
	 endif ?>

		<?php
		if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post();?>
		<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>			
				<?php get_template_part('template-parts/content','post'); ?>
		<?php else: ?>			
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
				<div class="container" id="article">			  
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
						

		<?php endif; ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :		
			comments_template();
			endif;?>

		<?php endwhile; ?>
			
		<?php else :			

		endif; ?>
<?php
get_footer();
