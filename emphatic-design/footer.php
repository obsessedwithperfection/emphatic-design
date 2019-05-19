<?php
/**
 * The template for displaying the footer
 *
 * 
 * @package emphatic-design
 */

?>
<div class="container-fluid widgets">
  <div class="row">
    <div class="col-sm-4">
	  <?php if ( is_active_sidebar( 'footer-left-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
	  <?php endif; ?>
    </div>
    <div class="col-sm-4">
	<?php if ( is_active_sidebar( 'footer-middle-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
	<?php endif; ?>
    </div>
    <div class="col-sm-4">
	<?php if ( is_active_sidebar( 'footer-right-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'footer-right-widget-area' ); ?>
	<?php endif; ?>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <img src="<?php echo esc_url(get_theme_root_uri())?>/emphatic-design/images/angle-up-solid.svg" class="fa fa-angle-up" aria-hidden="true">
  </a>
  <p><?php bloginfo( 'name' ); ?> &copy;<?php echo date_i18n(__('Y','emphatic-design'))?><a href="<?php echo esc_url( __( 'http://www.emphaticsite.com/anurag', 'emphatic-design' ) ); ?>"><?php printf( __( '.Developed by %s', 'emphatic-design' ), 'Anurag soni' ); ?></a></p>
	<div class="logo">
		<?php the_custom_logo(); ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
