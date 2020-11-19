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
 * Photomedia elementor subscription section widget.
 *
 * @since 1.0
 */
class Photomedia_Subscription extends Widget_Base {

	public function get_name() {
		return 'photomedia-subscription';
	}

	public function get_title() {
		return __( 'Subscription', 'photomedia' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'photomedia-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'subscription_section',
            [
                'label' => __( 'Subscription Section Content', 'photomedia' ),
            ]
        );
        $this->add_control(
			'sec_title',
			[
                'label'     => __( 'Subscription Heading', 'photomedia' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Subscribe Newsletter', 'photomedia' )
			]
        );
        $this->add_control(
			'sub_title',
			[
                'label'     => __( 'Sub Heading', 'photomedia' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Get updates to our newsletter and new articles', 'photomedia' )
			]
        );
        $this->add_control(
			'sub_form',
			[
                'label'         => __( 'Subscription Form Shortcode', 'photomedia' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'placeholder'   => '[contact-form-7 id="243" title="Subscription Form"]'
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
                    '{{WRAPPER}} .subscribe_form .subscribe_form_iner h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sec_border_col', [
                'label'     => __( 'Section Border Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_form .subscribe_form_iner' => 'border-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'btn_styles_separator',
            [
                'label'     => __( 'Button Styles', 'photomedia' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_form .wpcf7 .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_form .wpcf7 .btn_1' => 'background-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'btn_hvr_color', [
                'label'     => __( 'Button Hover Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_form .wpcf7 .btn_1:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );    
        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover BG Color', 'photomedia' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe_form .wpcf7 .btn_1:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

	}

	protected function render() {
        $settings       = $this->get_settings();
        $sec_head       = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
        $form_shortcode = !empty( $settings['sub_form'] ) ? $settings['sub_form'] : '';
    ?>
    
    <!-- subscribe_newsletter_start -->
    <div class="subscribe_newsletter">
        <div class="container">
            <div class="black_bg">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="newsletter_text">
                            <?php
                                if ( $sec_head ) {
                                    echo '<h3>'.esc_html($sec_head).'</h3>';
                                }
                                if ( $sub_title ) {
                                    echo '<p>'.esc_html($sub_title).'</p>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="newsform">
                            <?php
                                if ( $form_shortcode ) {
                                    echo do_shortcode( $form_shortcode );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe_newsletter_end -->
    <?php

    }
	
}
