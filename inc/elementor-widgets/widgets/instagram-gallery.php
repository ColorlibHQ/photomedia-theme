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
 * Photomedia elementor instagram gallery section widget.
 *
 * @since 1.0
 */
class Photomedia_Instagram_Gallery extends Widget_Base {

	public function get_name() {
		return 'photomedia-instagram';
	}

	public function get_title() {
		return __( 'Instagram Gallery', 'photomedia' );
	}

	public function get_icon() {
		return 'eicon-instagram-post';
	}

	public function get_categories() {
		return [ 'photomedia-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'instagram_section',
            [
                'label' => __( 'Instagram Gallery Settings', 'photomedia' ),
            ]
        );
        $this->add_control(
			'show_icon',
			[
                'label'     => __( 'Show the Instagram Icon?', 'photomedia' ),
                'type'      => Controls_Manager::SWITCHER,
                'return_value'  => 'yes',
				'default'       => 'yes',
			]
        );
        $this->add_control(
			'sec_title',
			[
                'label'     => __( 'Section Title', 'photomedia' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( '@photomedia', 'photomedia' )
			]
        );
        $this->add_control(
			'inst_id',
			[
                'label'     => __( 'Instagram id', 'photomedia' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'hasanfardousrubel', 'photomedia' )
			]
        );
        $this->add_control(
			'inst_item',
			[
                'label'         => __( 'Instagram Gallery Items', 'photomedia' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => true,
                'default'       => __( '4', 'photomedia' )
			]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Subscription Style', 'photomedia' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .cta_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub Title Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .cta_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'form_styles_separator',
            [
                'label'     => __( 'Form Styles', 'photomedia' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'input_color', [
                'label'     => __( 'Input Field Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .form-control' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'input_bg_color', [
                'label'     => __( 'Input Field BG Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .form-control' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .subs_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .input-group .subs_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'photomedia' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'photomedia' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .cta_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

        // call load widget script
        $this->load_widget_script();


        $settings   = $this->get_settings();
        $inst_id    = !empty( $settings['inst_id'] ) ? $settings['inst_id'] : '';
        $inst_item  = !empty( $settings['inst_item'] ) ? $settings['inst_item'] : '';
        $show_icon  = !empty( $settings['show_icon'] ) ? $settings['show_icon'] : '';
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        ?>

        <!-- instagram_media_area_start -->
        <div class="instagram_media_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="instagram_title text-center">
                            <?php
                                if ( $show_icon ) {
                                    echo '<i class="fa fa-instagram"></i>';
                                }
                                if ( $sec_title ) {
                                    echo '<h3>'.esc_html($sec_title).'</h3>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row cp-instagram-photos" data-username="<?php echo esc_attr( $inst_id )?>" data-items="<?php echo esc_attr( $inst_item )?>">
            </div>
        </div>
        <!-- instagram_media_area_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            function cp_instagram_photos() {
                $('.cp-instagram-photos').each(function(){
                    $.instagramFeed({
                        'username': $(this).data('username'),
                        'container': $(this),
                        'display_profile': false,
                        'display_biography': false,
                        'items': $(this).data('items'),
                        'margin': 0
                    });
                    console.log( $(this) );
                });

            }
            cp_instagram_photos();

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
