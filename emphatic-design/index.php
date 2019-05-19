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

get_header(); ?>

<?php		
	if(has_header_image()): 
		do_action('emphaticdesign_index_header');
	else: ?>
		<div class="container-fluid plate"></div>
	<?php endif ?>
</div>	

		<?php
		if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post();?>
		<div class="container-fluid index" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<?php if(has_post_thumbnail()): ?>
			<div class="row">				
				<div class="col-sm-4">					
					<img class="slideanim images" src="<?php 
					echo esc_url(get_the_post_thumbnail_url()); ?>">
				</div>
		<?php endif ?>
				<div class="col-sm-8">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark"
				title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
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
					<?php the_excerpt();?>
					<a href="<?php the_permalink();?>">Read more&raquo;</a>
				</div>
			</div>			
		</div> <!--end of container-->
		<?php endwhile; ?> 
			<div class="container-fluid">
				<?php the_posts_pagination(); ?>
			</div>
	<?php else : ?>
	
			<div class="container">
				<h1><?php esc_html_e('No contents found here','emphatic-design')?></h1>
			</div>
		<?php endif ?>


<?php
get_footer();
