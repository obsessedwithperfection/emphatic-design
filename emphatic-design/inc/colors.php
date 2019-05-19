<?php 
// To add "Colors" section on Customize appearance
// The controls are following:-
/*
	Link Color
	Navigation Link Color
	Navigation Link Hover Color
	Title background Color
	*/

	
function emphaticdesign_colors_customize_register( $wp_customize ) {


	$wp_customize->add_setting('emphatic_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting('emphatic_navigation_link_color', array(
		'default' => '#000',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting('emphatic_navigation_link_hover_color', array(
		'default' => '#0099ff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));
    
    /*
	$wp_customize->add_setting('emphatic_title_background_color', array(
		'default' => '#0099ff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	));
    */
    
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'emphatic_link_color_control', array(
		'label' => __('Link Color', 'emphatic-design'),
		'section' => 'colors',
		'settings' => 'emphatic_link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'emphatic_navigation_link_color_control', array(
		'label' => __('Navigation Link Color', 'emphatic-design'),
		'section' => 'emphatic_standard_colors',
		'settings' => 'emphatic_navigation_link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'emphatic_navigation_link_hover_color_control', array(
		'label' => __('Navigation Link Hover Color', 'emphatic-design'),
		'section' => 'colors',
		'settings' => 'emphatic_navigation_link_hover_color',
	) ) );
    /*
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'emphatic_title_background_color_control', array(
		'label' => __('Title background Color', 'emphatic-design'),
		'section' => 'colors',
		'settings' => 'emphatic_title_background_color',
	) ) );
    */
}

add_action('customize_register', 'emphaticdesign_colors_customize_register');



// Output Customize CSS
function emphaticdesign_customize_css() { ?>

	<style type="text/css">

		a:link,
		a:visited {
			color: <?php echo esc_html(get_theme_mod('emphatic_link_color')); ?>;
		}

	  #primary-navigation li a {
      color: <?php echo esc_html(get_theme_mod('emphatic_navigation_link_color')); ?> !important;   
		}
	  #primary-navigation li a:hover {
      color: <?php echo esc_html(get_theme_mod('emphatic_navigation_link_hover_color')); ?> !important;   
		}

	
	@font-face {
	font-family: 'Jura';
	src: url('<?php echo esc_url(get_template_directory_uri());?>/fonts/Jura/Jura-Bold.ttf');
	src: url('<?php echo esc_url(get_template_directory_uri());?>/fonts/Jura/Jura-Light.ttf');
	src: url('<?php echo esc_url(get_template_directory_uri());?>/fonts/Jura/Jura-Medium.ttf');
	src: url('<?php echo esc_url(get_template_directory_uri());?>/fonts/Jura/Jura-Regular.ttf');
	src: url('<?php echo esc_url(get_template_directory_uri());?>/fonts/Jura/Jura-SemiBold.ttf');	
	}	
 #title h1{			
	/*background-color: <?php echo esc_html(get_theme_mod('emphatic_title_background_color')); ?> !important;*/
	background-color: #0099ff !important;
}
.wp-caption-text{
	border-bottom: 1px solid <?php echo esc_html(get_theme_mod('emphatic_title_background_color')); ?> !important;
	}
.widgettitle{
	color:<?php echo esc_html(get_theme_mod('emphatic_title_background_color')); ?> !important;
	border-bottom: 2px solid grey;
	}
	</style>
<?php }

add_action('wp_head', 'emphaticdesign_customize_css');
