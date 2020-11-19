<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Photomedia
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function photomedia_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'photomedia'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'photomedia'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_wiget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="section_title mb-33"><h3>',
        'after_title'   => '</h3></div>'
    ));

	// footer social register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Social', 'photomedia' ),
			'id'            => 'footer-social',
			'before_widget' => '<div id="%1$s" class="footer_links text-center single-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => null,
			'after_title'   => null,
		)
	);

}
add_action( 'widgets_init', 'photomedia_widgets_init' );
