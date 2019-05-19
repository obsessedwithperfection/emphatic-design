<?php
/**
 * The header for our theme
 *
 *
 * @package emphatic-design
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head> 
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  
 <?php if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	} ?>
	
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="myPage"  data-target=".navbar" data-offset="60">
<div class="container-fluid" id="header">
    <div class="row" >
		<div class="col-sm-6 logo">
			<?php if(has_custom_logo() ): ?>
			<div class="logo-header">
				<?php the_custom_logo(); ?>
			</div>
			 <?php endif ?>
			 <div class="site-meta">
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>
		</div>
		<div class="col-sm-6">
			<nav id="primary-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu')); ?>
			</nav>
			<div id="search">			 			
				<?php esc_url(get_search_form()); ?>			
			 </div>
		</div>
	</div>
</div>




