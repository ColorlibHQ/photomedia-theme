<?php 
/**
 * @Packge     : Photomedia
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function photomedia_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Body support function
=========================================================*/
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/*=========================================================
	Custom meta id callback
=========================================================*/
function photomedia_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_photomedia_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function photomedia_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'photomedia_excerpt_length' ) ) {
	function photomedia_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'photomedia_posted_comments' ) ) {
    function photomedia_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','photomedia');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','photomedia');
            } else {
                $comments = esc_html__( '1 Comment','photomedia' );
            }
            $comments = '<i class="ti-comment"></i>'. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'photomedia' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function photomedia_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function photomedia_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'photomedia' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'photomedia' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function photomedia_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'site_logo_286x85' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'. PHOTOMEDIA_DIR_ASSETS_URI .'img/logo.png" alt=""></a>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function photomedia_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner breadcrumb_bg">
            <div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-sm-12">
						<div class="breadcrumb_tittle">
							<h2>
								<?php
								if ( is_category() ) {
									single_cat_title( __('Category: ', 'photomedia') );

								} elseif ( is_tag() ) {
									single_tag_title( __('Tag Archive for - ', 'photomedia') );

								} elseif ( is_archive() ) {
									echo get_the_archive_title();

								} elseif ( is_page() ) {
									echo get_the_title();

								} elseif ( is_search() ) {
									echo esc_html__( 'Search for: ', 'photomedia' ) . get_search_query();

								} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
									// echo  get_the_title();
									echo esc_html__( 'Single Blog', 'photomedia' );

								} elseif ( is_home() ) {
									echo esc_html__( 'Blog', 'photomedia' );

								} elseif ( is_404() ) {
									echo esc_html__( '404 error', 'photomedia' );

								}
								?>
							</h2>
						</div>
					</div>
				</div>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function photomedia_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function photomedia_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function photomedia_featured_post_cat( $seperator = ', ', $class_name = null ){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {
			if ( $class_name ) {
				$getCat[] = '<a class="'.$class_name.'" href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			} else {
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'"><h5>'.esc_html( $value->name ).'</h5></a>';
			}
		}

		return implode( $seperator, $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function photomedia_sidebar_opt(){

    $sidebarOpt = photomedia_opt( 'photomedia_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function photomedia_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function photomedia_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button-contactForm class:boxed-btn "Send"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'photomedia_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function photomedia_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex col-lg-12">';
        echo the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'photomedia' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'photomedia' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('photomedia_blog_single_post_navigation') ) {
	function photomedia_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'photomedia' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'photomedia' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function photomedia_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Photomedia Comment Template Callback
 ====================================================*/
function photomedia_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'photomedia' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'photomedia'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'photomedia' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'photomedia' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'photomedia_replace_reply_link_class');
function photomedia_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Featured Post For Elementor Section
===========================================================*/
function photomedia_featured_post( $post_number = 2, $post_order = 'desc', $post_cat = '', $show_meta = true ){
	
	$bBlog = new WP_Query( array(
        'post_type'      => 'post',
		'posts_per_page' => $post_number,
		'order'			 => $post_order,
		'category_name'  => $post_cat
	) );
	
	$i = 1;

    if( $bBlog->have_posts() ){
        while( $bBlog->have_posts() ){
			$bBlog->the_post();
			$post_thumb = get_the_post_thumbnail_url( get_the_ID(), 'feature_area_post_thumb_558x380' );
 
			// if ( $post_thumb ) {
			// 	$alt_text = get_post_meta( $post_thumb->ID, '_wp_attachment_image_alt', true );
			// 	if ( ! empty( $post_thumb ) ) {
			// 		if ( ! empty( $alt_text ) ) {
			// 			$alt_text = $alt_text;
			// 		} else {
			// 			$alt_text = get_the_title(); 
			// 		}
			// 	}
			// }
			?>
		<div class="col-xl-6 col-md-6">
			<div class="single_photography" <?php echo photomedia_inline_bg_img( $post_thumb )?>>
				<div class="info">
					<div class="info_inner">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php
						if ( $show_meta ) {
							?>
							<div class="date_catagory d-flex align-items-center justify-content-between">
								<span><?php echo the_time('F j Y');?></span>
								<?php echo photomedia_featured_post_cat(' / '); ?>
							</div>
							<?php
						}
						?>
						
					</div>
				</div>
			</div>
		</div>
		<?php
        }
		wp_reset_postdata();
    }

}


/*=========================================================
    Feature Post For Elementor Section
===========================================================*/
function photomedia_blog_posts( $post_cat = '', $pNumber = '6', $meta = true, $order = 'DESC' ){
	
	$fBlog = new WP_Query( array(
        'post_type'      	=> 'post',
        'order'      		=> $order,
		'posts_per_page' 	=> $pNumber,
		'cat'  				=> $post_cat
	) );
	
    if( $fBlog->have_posts() ){
        while( $fBlog->have_posts() ){
			$fBlog->the_post();	
			?>
			<div class="col-xl-6 col-md-6">
				<div class="single_blog">
					<div class="blog_thumb">
						<a href="<?php the_permalink(); ?>">
							<?php
								echo has_post_thumbnail() ? the_post_thumbnail( 'blog_img_thumb_362x262', ['alt' => get_the_title()] ) : '';
							?>
						</a>
					</div>
					<?php
						if ( $meta ) {
							?>
							<div class="blog_meta">
								<p><?php echo photomedia_featured_post_cat(', ', 'photomedia-category-link'); ?> | <?php echo the_time('F j Y');?></p>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<?php
		}

		wp_reset_postdata();
	}

}



/*=========================================================
    Category Post For Elementor Section
===========================================================*/
function photomedia_category_post( $cat, $meta, $order, $cat_lbl ){
	
	$cBlog = new WP_Query( array(
        'post_type'      => 'post',
		'posts_per_page' => 3,
		'order'			 => $order,
		'category_name'	 => $cat
	) );
	
	$i = 1;
	$author_nickname = get_the_author_meta( 'nickname');

    if( $cBlog->have_posts() ){
        while( $cBlog->have_posts() ){
			$cBlog->the_post();
			$sing_cont_class = ($i == 3) ? 'd-block d-sm-none d-lg-block' : '';		
	?>

		<div class="col-sm-6 col-lg-4">
			<div class="single_catagory_post post_2 <?php $sing_cont_class?>">
				<div class="category_post_img">
					<?php
						echo has_post_thumbnail() ? the_post_thumbnail( 'category_post_360x336', ['alt' => get_the_title()] ) : '';
					?>
					<?php
						if ( $cat_lbl ) {
							echo photomedia_featured_post_cat( 'category_btn' );
						}
					?>
				</div>
				<div class="post_text_1 pr_30">
					<?php if ( $meta ) { ?>
						<p><span> By <?php echo $author_nickname?> </span> / <?php the_time('F j, Y') ?></p>
					<?php 
						}
					?>
					<a href="<?php the_permalink(); ?>">
						<h3><?php the_title();?></h3>
					</a>
					<div class="post_icon">
						<ul>
							<li><i class="ti-comment"></i><?php echo photomedia_posted_comments();?></li>
							<li><?php echo get_simple_likes_button( get_the_ID() );?></li>
							<li><a href="<?php the_permalink(); ?>#social-icons"><i class="ti-export"></i> <?php echo esc_html__( 'Share ', 'photomedia' );?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
		$i++;
        }
		wp_reset_postdata();
    }

}


/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function photomedia_latest_blog( $not_cat, $pNumber = 5, $meta, $order ){
	
	$bBlog = new WP_Query( array(
        'post_type'      	=> 'post',
		'posts_per_page' 	=> $pNumber,
		'order'			 	=> $order,
		'category__not_in'	=> $not_cat
	) );
	
	$author_nickname = get_the_author_meta( 'nickname');

    if( $bBlog->have_posts() ){
        while( $bBlog->have_posts() ){
			$bBlog->the_post();
	?>
			
			<div class="single_post media post_3">
				<div class="single_post_img">
					<?php
						if( has_post_thumbnail() ){
							the_post_thumbnail( 'all_post_350x340', ['alt' => get_the_title()] );
						}
					?>
					<?php echo photomedia_featured_post_cat( 'category_btn' );?>
				</div>
				<div class="post_text_1 media-body align-self-center">
					<?php if ( $meta ) { ?>
						<p><span> <?php echo esc_html__( 'By ', 'photomedia') . $author_nickname?> </span> / <?php the_time('F j, Y') ?></p>
					<?php 
						}
					?>
					<a href="<?php the_permalink(); ?>">
						<h3><?php the_title();?></h3>
					</a>
					<div class="post_icon">
						<ul>
							<li><i class="ti-comment"></i><?php echo photomedia_posted_comments();?></li>
							<li><?php echo get_simple_likes_button( get_the_ID() );?></li>
							<li><a href="<?php the_permalink(); ?>#social-icons"><i class="ti-export"></i> <?php echo esc_html__( 'Share ', 'photomedia' );?></a></li>
						</ul>
					</div>
				</div>
			</div>
        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function photomedia_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$facebookURL= 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'" id="social-icons">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="ti-facebook"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function photomedia_flaticon_list(){
    return(
        array(
            'flaticon-growth'     => 'Flaticon Growth',
            'flaticon-wallet'     => 'Flaticon Wallet',
        )
    );
}

