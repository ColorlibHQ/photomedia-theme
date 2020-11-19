<?php 
/**
 * @Packge 	   : Photomedia
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	//  Call Header
	get_header(); ?>

	<section class="all_post most_recent_blog section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php
						if( have_posts() ){
							while( have_posts() ){
								the_post();
								// Post Contant
								get_template_part( 'templates/content', get_post_format() );
							}

							//Pagination
							echo '<div class="clearfix"></div>';
								photomedia_blog_pagination();

								
							// Reset Data
							wp_reset_postdata();
						}else{
							get_template_part( 'templates/content', 'none' );
						} 
						?>
					</div>
				</div>
				<?php
				get_sidebar();
				?>
			</div>
		</div>
	</section>

	<?php
	 // Call Footer
	 get_footer();
?>