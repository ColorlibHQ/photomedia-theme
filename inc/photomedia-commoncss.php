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
 
 
// enqueue css
function photomedia_common_custom_css(){
    
    wp_enqueue_style( 'photomedia-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : 'background-image: none';

		$themeColor     		  = photomedia_opt( 'photomedia_theme_color' );

		$headerBg          		  = photomedia_opt( 'photomedia_header_bg_color' );
		$menuColor          	  = photomedia_opt( 'photomedia_header_menu_color' );
		$menuColor          	  = $menuColor . '!important';
		$menuHoverColor           = photomedia_opt( 'photomedia_header_menu_hover_color' ) != '#fc4600' ? photomedia_opt('photomedia_header_menu_hover_color') : $themeColor;
		$menuHoverColor           = $menuHoverColor . ' !important';

		$dropMenuBgColor          = photomedia_opt( 'photomedia_header_menu_dropbg_color' );
		$dropMenuColor            = photomedia_opt( 'photomedia_header_drop_menu_color' );
		$dropMenuColor            = $dropMenuColor . '!important';
		$dropMenuHovColor         = photomedia_opt( 'photomedia_header_drop_menu_hover_color' ) != '#fc4600' ? photomedia_opt('photomedia_header_drop_menu_hover_color') : $themeColor;
		$dropMenuHovColor         = $dropMenuHovColor . '!important';
		$dropMenuHovItemBg        = photomedia_opt( 'photomedia_drop_menu_item_hover_bg' );


		$footerwbgColor     	  = photomedia_opt('photomedia_footer_widget_bdcolor');
		$footerbottombgColor      = photomedia_opt('photomedia_footer_bottom_bgcolor');
		$footerwTextColor   	  = photomedia_opt('photomedia_footer_widget_textcolor');
		$footerwanchorcolor 	  = photomedia_opt('photomedia_footer_widget_anchorcolor') != '#8a8a8a' ? photomedia_opt('photomedia_footer_widget_anchorcolor') : '';
		$footerwanchorcolordef 	  = photomedia_opt('photomedia_footer_widget_anchorcolor') != '#8a8a8a' ? photomedia_opt('photomedia_footer_widget_anchorcolor') : $themeColor;
		$footerothrcolor 	  	  = photomedia_opt('photomedia_footer_other_anchor_color');
		$footerwanchorhovcolor    = photomedia_opt('photomedia_footer_widget_anchorhovcolor') != '#fc4600' ? photomedia_opt('photomedia_footer_widget_anchorhovcolor') : $themeColor;
		$footerwanchorhovcolor    = $footerwanchorhovcolor . '!important';
		$widgettitlecolor  		  = photomedia_opt('photomedia_footer_widget_titlecolor');
		$footernewsltrbtncolor    = photomedia_opt('photomedia_footer_newsletter_btn_color');


		$fofbg  	  		  = photomedia_opt('photomedia_fof_bg_color');
		$foftonecolor  	  	  = photomedia_opt('photomedia_fof_textone_color');
		$fofttwocolor  	  	  = photomedia_opt('photomedia_fof_texttwo_color');


		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}

			.single_sidebar_widget .tagcloud a:hover, .all_post .tags ul li a:hover, .sidebar_widget .footer-social a:hover
			{
				border-color: {$themeColor}
			}

			.sidebar_widget .sidebar_tittle h3:before, .sidebar_widget .sidebar_tittle h3:after, .sidebar_widget .btn, .btn_1, .all_post .category ul li:hover, .sidebar_widget .widget_categories ul li:hover, .all_post .tags ul li a:hover, .sidebar_widget .footer-social a:hover
			{
				background: {$themeColor};
			}

			.post_1 .single_post_text a h5
			{
				color: {$themeColor};
			}

			.banner_post h5, .banner_post a h2:hover, .post_1 .post_text_1 h5, .post_2 .post_text_1 h5, .post_3 .post_text_1 h5, .post_1 .post_text_1 h3:hover, .post_2 .post_text_1 h3:hover, .post_3 .post_text_1 h3:hover, .post_2 .category_post_img .category_btn, .post_3 .single_post_img .category_btn, .single_sidebar_widget.widget_categories ul li a:hover, .single_sidebar_widget .tagcloud a:hover, a:hover
			{
				color: {$themeColor} !important;
			}


			header.main_menu{
				background: {$headerBg}
			}
			.main_menu .navbar-light .navbar-nav .nav-link
			{
				color: {$menuColor}
			}
			.main_menu .navbar-light .navbar-nav .nav-link:hover
			{
				color: {$menuHoverColor}
			}
			.dropdown:hover .dropdown-menu, .main_menu .navbar-light .navbar-nav .dropdown-menu .nav-link:hover
			{
				background: {$dropMenuBgColor}
			}
			.main_menu .navbar-light .navbar-nav .dropdown-menu .nav-link
			{
				color: {$dropMenuColor}
			}
			.main_menu .navbar-light .navbar-nav .dropdown-menu .nav-link:hover
			{
				color: {$dropMenuHovColor};
				background: {$dropMenuHovItemBg}
			}
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link {
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .navbar .nav .nav-item.submenu ul .nav-item:hover .nav-link{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}
			.copyright_part {
				background-color: {$footerbottombgColor};
			}
			.footer-area .single-footer-widget p, .footer-area .copyright_part_text p, .footer-area .copyright_part .footer-text{
				color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4 {
				color: {$widgettitlecolor}
			}
			.footer-area .single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			.footer-area .single-footer-widget p a, .footer-area .copyright_part_text a {
			   color: {$footerwanchorcolor};
			}
			.footer-area .copyright_text a{
			   color: {$footerwanchorcolordef};
			}
			.footer-area .single-footer-widget p a:hover, .footer-area .copyright_part_text a:hover{
			   color: {$footerwanchorhovcolor};
			}
			.footer-area .single-footer-widget h5, .footer-area .contact_info span{
				color: {$footerothrcolor};
			}
			.footer-area .copyright_part_text{
				border-color: {$footerothrcolor};
			}
			.footer-area .single-footer-widget .click-btn{
				background: {$footerwanchorcolordef};
			}
			.footer-area .single-footer-widget input[type=email]{
				border-color: {$footernewsltrbtncolor} !important;
			}
			.footer-area .single-footer-widget ul li a:hover, .footer-area .copyright_part_text a:hover, .footer-area .copyright_text a:hover{
			   color: {$footerwanchorhovcolor};
			}
			.footer-area .copyright_text .footer-social a{
				color: {$footerwanchorcolor};
			}
			.footer-area .copyright_text .footer-social a:hover{
				color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'photomedia-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'photomedia_common_custom_css', 50 );
