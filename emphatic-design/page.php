<?php
/**
 * The page template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package emphatic-design
 */

get_header(); ?>

	<?php if ( is_front_page() ) { 		
	if(has_header_image()):
		do_action('emphaticdesign_index_header');
	else: ?>
		<?php if(has_post_thumbnail() ):
			do_action('emphaticdesign_thumbnail');
		endif ?>
	<?php endif ?>

<?php } else { ?>

	<?php if(has_post_thumbnail() ):
			do_action('emphaticdesign_thumbnail');
		endif ?>

	<?php } ?>

		<?php
		if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post();?>
		<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>			
				<?php get_template_part('template-parts/content','page'); ?>
		<?php else: ?>			
			<div class="containter-fluid" id="title">
				<div class="row">
					<h1 rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></h1>
				</div>
			</div>
				<div class="container" id="article">			  
					<?php the_content(); ?>
					<?php the_tags(); ?>			
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
