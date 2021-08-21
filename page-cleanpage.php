<?php
/**
 * Template Name: Clean Page
 * This template will only display the content you entered in the page editor
 */
 function my_deregister_scripts_and_styles() {
    global $wp_scripts, $wp_styles;

    foreach($wp_scripts->registered as $registered)
        if(strpos($registered->src,'/wp-admin/')===FALSE)
            wp_deregister_script($registered->handle);

    foreach($wp_styles->registered as $registered)
        if(strpos($registered->src,'/wp-admin/')===FALSE)
            wp_deregister_style($registered->handle);
}
add_action( 'wp_enqueue_scripts', 'my_deregister_scripts_and_styles');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body class="cleanpage">
<?php
    while ( have_posts() ) : the_post();  
        the_content();
    endwhile;
?>
<?php wp_footer(); ?>

</body>
</html>