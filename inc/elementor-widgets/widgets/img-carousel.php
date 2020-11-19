<?php
namespace Photomediaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Photomedia elementor banner post section widget.
 *
 * @since 1.0
 */
class Photomedia_Img_Carousel extends Widget_Base {

	public function get_name() {
		return 'photomedia-img-carousel';
	}

	public function get_title() {
		return __( 'Image Carousel', 'photomedia' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'photomedia-elements' ];
    }

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'image_carousel_section',
            [
                'label' => __( 'Image Carousel Section', 'photomedia' ),
            ]
        );

        $this->add_control(
            'style_type', [
                'label' => __( 'Select Style', 'photomedia' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => __( 'Style 1', 'photomedia' ),
                    'style_2' => __( 'Style 2', 'photomedia' ),
                ]
            ]
        );
        
		$this->add_control(
            'carousel_contents', [
                'label' => __( 'Create New', 'photomedia' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ img_title }}}',
                'fields' => [
                    [
                        'name' => 'carousel_img',
                        'label' => __( 'Carousel Image', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'img_title',
                        'label' => __( 'Title', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Photography', 'photomedia' ),
                    ],
                ],
                'default'   => [
                    [
                        'carousel_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'img_title'         => __( 'Photography', 'photomedia' ),
                    ],
                    [
                        'carousel_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'img_title'         => __( 'Travel Shot', 'photomedia' ),
                    ],
                    [
                        'carousel_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'img_title'         => __( 'Photoshop', 'photomedia' ),
                    ],
                    [
                        'carousel_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'img_title'         => __( 'Lens', 'photomedia' ),
                    ],
                    [
                        'carousel_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'img_title'         => __( 'Travel Shot', 'photomedia' ),
                    ],
                ]
            ]
        );
        
        $this->end_controls_section(); // End content
	}

	protected function render() {
        // call load widget script
        $this->load_widget_script(); 
        $settings           = $this->get_settings();
        $style_type         = $settings['style_type'];
        $carousel_contents  = !empty( $settings['carousel_contents'] ) ? $settings['carousel_contents'] : '';
        if ( $style_type == 'style_1' ) {
            ?>
            <!-- photography_slider_area_start -->
            <div class="photography_slider_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="photoslider_active owl-carousel">
                                <?php
                                if( is_array( $carousel_contents ) && count( $carousel_contents ) > 0 ){
                                    foreach ( $carousel_contents as $single ) {
                                        $img_title    = !empty( $single['img_title'] ) ? $single['img_title'] : '';
                                        $carousel_img   = !empty( $single['carousel_img']['id'] ) ? wp_get_attachment_image( $single['carousel_img']['id'], 'carousel_img_thumb_264x190', '', array('alt' => $img_title . ' image' ) ) : '';
                                        ?>
                                        <div class="single_photography">
                                            <?php 
                                                if ( $carousel_img ) {
                                                    echo $carousel_img;
                                                }
                                            ?>
                                            <div class="photo_title">
                                                <h4><?php echo esc_html( $img_title )?></h4>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php
        } else {
            ?> 
            <!-- photo_gallery_start -->
            <div class="photo_gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title mb-33">
                                <h3>Photo Gallery</h3>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="photo_gallery_active owl-carousel">
                                <?php
                                if( is_array( $carousel_contents ) && count( $carousel_contents ) > 0 ){
                                    foreach ( $carousel_contents as $single ) {
                                        $img_title    = !empty( $single['img_title'] ) ? $single['img_title'] : '';
                                        $carousel_img  = !empty( $single['carousel_img']['url'] ) ? $single['carousel_img']['url'] : '';
                                        ?>
                                        <div class="single_photo_gallery" <?php echo photomedia_inline_bg_img( esc_url( $carousel_img ) ); ?>>
                                            <div class="photo_caption">
                                                <h3><?php echo esc_html( $img_title )?></h3>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- photo_gallery_end -->
        <?php
        }
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //about-pro-active
            $('.photoslider_active').owlCarousel({
            loop:true,
            margin:30,
            items:1,
            // autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false

                },
                767:{
                    items:3,
                    nav:false
                },
                992:{
                    items:4,
                    nav:false
                },
                1200:{
                    items:4,
                }
            }
            });

            //about-pro-active
            $('.photo_gallery_active').owlCarousel({
                loop:true,
                margin:30,
                items:1,
                // autoplay:true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                nav:true,
                dots:false,
                // autoplayHoverPause: true,
                // autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        nav:false

                    },
                    767:{
                        items:2,
                        nav:false
                    },
                    992:{
                        items:2,
                        nav:false
                    },
                    1200:{
                        items:2,
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
