<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package emphatic-design
 */

get_header(); ?>


		<?php
		if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post();?>
		<div id="about" class="container-fluid rback">
			<div class="row">
				<div class="col-sm-4">
					<img class="slideanim images" src="<?php 
		echo esc_url(get_the_post_thumbnail_url( $post_id, 'large' )); ?>" width=100%>
				</div>
				<div class="col-sm-8">
					<h2><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"
				title="Permanent Link to <?php esc_attr(the_title_attribute()); ?>"><?php the_title();?></a></h2><br>
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
			
		<?php else :

			

		endif; ?>


<?php
get_footer();
