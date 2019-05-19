<?php
//Wordpress basic search template
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search', 'label','emphatic-design' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','emphatic-design' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label','emphatic-design' ) ?>" />
    </label>
    
    <button type="submit" class="search-submit">
    <img src="<?php echo esc_url(get_theme_root_uri())?>/emphatic-design/images/search-solid.svg" class="fa fa-search" aria-hidden="true">
    </button>

</form>
