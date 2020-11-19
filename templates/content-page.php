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



?>

	<div id="page_<?php the_ID(); ?>" <?php post_class('row'); ?>>
		<?php 

		/**
		 * page content 
		 * Comments Template
		 * @Hook  photomedia_page_content
		 *
		 * @Hooked photomedia_page_content_cb
		 * 
		 *
		 */
		do_action( 'photomedia_page_content' );

		?>
	</div>
