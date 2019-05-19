<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * Please browse readme.txt for credits information
 * @package emphatic-design
 */

get_header(); ?>
		<div class="container" id="article">
   			<header ">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'emphatic-design' ); ?></h1>
			</header><!-- .page-header -->
			<section>
				<div >
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'emphatic-design' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->        
        </div><!--.container-->
		<?php get_footer(); ?>
