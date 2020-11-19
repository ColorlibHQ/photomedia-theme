<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'PHOTOMEDIA_DIR_URI' ) )
		define( 'PHOTOMEDIA_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'PHOTOMEDIA_DIR_ASSETS_URI' ) )
		define( 'PHOTOMEDIA_DIR_ASSETS_URI', PHOTOMEDIA_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'PHOTOMEDIA_DIR_CSS_URI' ) )
		define( 'PHOTOMEDIA_DIR_CSS_URI', PHOTOMEDIA_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'PHOTOMEDIA_DIR_JS_URI' ) )
		define( 'PHOTOMEDIA_DIR_JS_URI', PHOTOMEDIA_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('PHOTOMEDIA_DIR_ICON_IMG_URI') )
		define( 'PHOTOMEDIA_DIR_ICON_IMG_URI', PHOTOMEDIA_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'PHOTOMEDIA_DIR_INC' ) )
		define( 'PHOTOMEDIA_DIR_INC', PHOTOMEDIA_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_ELEMENTOR' ) )
		define( 'PHOTOMEDIA_DIR_ELEMENTOR', PHOTOMEDIA_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH' ) )
		define( 'PHOTOMEDIA_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH_INC' ) )
		define( 'PHOTOMEDIA_DIR_PATH_INC', PHOTOMEDIA_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH_LIB' ) )
		define( 'PHOTOMEDIA_DIR_PATH_LIB', PHOTOMEDIA_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH_CLASSES' ) )
		define( 'PHOTOMEDIA_DIR_PATH_CLASSES', PHOTOMEDIA_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH_WIDGET' ) )
		define( 'PHOTOMEDIA_DIR_PATH_WIDGET', PHOTOMEDIA_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'PHOTOMEDIA_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'PHOTOMEDIA_DIR_PATH_ELEMENTOR_WIDGETS', PHOTOMEDIA_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'photomedia-breadcrumbs.php' );
	// Sidebar register file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'widgets/photomedia-widgets-reg.php' );
	// Post widget file include
	// require_once( PHOTOMEDIA_DIR_PATH_INC . 'widgets/photomedia-recent-post-thumb.php' );
	// News letter widget file include
	// require_once( PHOTOMEDIA_DIR_PATH_INC . 'widgets/photomedia-newsletter-widget.php' );
	//Social Links
	// require_once( PHOTOMEDIA_DIR_PATH_INC . 'widgets/photomedia-social-links.php' );
	// Instagram Widget
	// require_once( PHOTOMEDIA_DIR_PATH_INC . 'widgets/photomedia-instagram.php' );
	// Nav walker file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'photomedia-functions.php' );

	// Theme Demo file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'photomedia-commoncss.php' );
	// Post Like
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( PHOTOMEDIA_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( PHOTOMEDIA_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( PHOTOMEDIA_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class photomedia dashboard
	require_once( PHOTOMEDIA_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	

	// Admin Enqueue Script
	function photomedia_admin_script(){
		wp_enqueue_style( 'photomedia-admin', get_template_directory_uri().'/assets/css/photomedia_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'photomedia_admin', get_template_directory_uri().'/assets/js/photomedia_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'photomedia_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Photomedia object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Photomedia Dashboard .
	 *
	 */
	
	$Photomedia = new Photomedia();
	
