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

	// Final Class
	final class Photomedia{

		
		// Theme Version
		private $photomedia_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			if( class_exists('Epsilon_Framework') ){
				$this->customizer_init();
			}
			
			// Instantiate  Dashboard
			$Epsilon_init_Dashboard = Epsilon_init_Dashboard::get_instance();
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new photomedia_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->photomedia_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'photomedia_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'photomedia', PHOTOMEDIA_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 85,
				'width'       => 286,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 420,
				'default-image' => get_template_directory_uri() . '/assets/img/banner.jpg'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
			
			// Site logo sizes
			add_image_size( 'site_logo_286x85', 286, 85, true );
			add_image_size( 'site_footer_logo_216x69', 216, 69, true );
			
			// Advertisement banner image sizes
			add_image_size( 'adv_banner_thumb_600x120', 600, 120, true );
			add_image_size( 'adv_banner_thumb_300x600', 300, 600, true );
			
			// Feature area image sizes
			add_image_size( 'feature_area_post_thumb_558x380', 558, 380, true );
					
			// Carousel image size
			add_image_size( 'carousel_img_thumb_264x190', 264, 190, true );
					
			// Blog image size
			add_image_size( 'blog_img_thumb_362x262', 362, 262, true );
					
			// About big image size
			add_image_size( 'about_img_big_thumb_1146x580', 1146, 580, true );
					
			// Team member image size
			add_image_size( 'team_img_thumb_264x300', 264, 300, true );
					
			// Single blog post image size
			add_image_size( 'single_blog_750x375', 750, 375, true );
			add_image_size( 'np_thumb', 60, 60, true );

			// Author bio image size
			add_image_size( 'author_bio_img_90x90', 90, 90, true );

			// Comment thumb image size
			add_image_size( 'comment_thumb_img_70x70', 70, 70, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'  => esc_html__( 'Primary Menu', 'photomedia' ),
				'footer-menu'   => esc_html__( 'Footer Menu', 'photomedia' )
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = PHOTOMEDIA_DIR_CSS_URI;
			$jsPath  = PHOTOMEDIA_DIR_JS_URI;
			
			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'magnific-popup',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'nice-select',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'flaticon-css',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'slicknav-css',
						'file' 			=> $cssPath.'slicknav.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'photomedia-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'popper',
						'file' 			=> $jsPath.'popper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'owl-carousel-js',
						'file' 			=> $jsPath.'owl.carousel.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'isotope.pkgd-js',
						'file' 			=> $jsPath.'isotope.pkgd.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'waypoints-js',
						'file' 			=> $jsPath.'waypoints.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery-counterup-js',
						'file' 			=> $jsPath.'jquery.counterup.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'imagesloaded-pkgd-js',
						'file' 			=> $jsPath.'imagesloaded.pkgd.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'scrollIt-js',
						'file' 			=> $jsPath.'scrollIt.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery.scrollUp-js',
						'file' 			=> $jsPath.'jquery.scrollUp.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'wow-js',
						'file' 			=> $jsPath.'wow.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'nice-select-js',
						'file' 			=> $jsPath.'nice-select.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery-slicknav-js',
						'file' 			=> $jsPath.'jquery.slicknav.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery.magnific-popup-js',
						'file' 			=> $jsPath.'jquery.magnific-popup.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery.ajaxchimp-js',
						'file' 			=> $jsPath.'jquery.ajaxchimp.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'plugins-js',
						'file' 			=> $jsPath.'plugins.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'instagramFeed',
						'file' 			=> $jsPath.'jquery.instagramFeed.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),

					array(
						'handler'		=> 'photomedia-custom',
						'file' 			=> $jsPath.'main.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->photomedia_version,
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){

			$fontUrl = '';
			
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'photomedia' ) ) {
				
				$font_families = array(
					'Crimson+Text:400,400i,600,600i,700,700i',
					'Roboto:300,300i,400,400i,500,500i,700,700i'
				);

				$familyArgs = array(
					'family' => htmlentities( implode( '|', $font_families ) ),
					'subset' => urlencode( 'latin, latin-text' ),
				);

				$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
			}
			
			return esc_url_raw( $fontUrl );

		} //End google_font method

		// epsilon customizer init
		private function customizer_init(){

			// epsilon customizer quickie settings
		
			add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );
			
			// Instantiate Epsilon Framework object
			$Epsilon_Framework = new Epsilon_Framework();

			
			// Instantiate photomedia theme customizer
			$photomedia_theme_customizer = new photomedia_theme_customizer();
		}

		public function epsilon_quickie(){

				return	array(

				'links' => array(
					array(
						'link_to'   => 'photomedia_theme_options_panel',
						'icon'      => 'dashicons dashicons-admin-home',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'nav_menus',
						'icon'      => 'dashicons dashicons-menu',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'widgets',
						'icon'      => 'dashicons dashicons-archive',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'custom_css',
						'icon'      => 'dashicons dashicons-editor-code',
						'link_type' => 'section',
					),

				),
				'logo'  => array(
					'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
					'alt' => 'Epsilon Builder Logo',
				),
			);

		}

	} // End Photomedia Class

?>