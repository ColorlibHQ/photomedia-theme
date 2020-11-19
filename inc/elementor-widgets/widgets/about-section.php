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
 * Photomedia elementor about section widget.
 *
 * @since 1.0
 */
class Photomedia_About_Section extends Widget_Base {

	public function get_name() {
		return 'photomedia-about';
	}

	public function get_title() {
		return __( 'About Section', 'photomedia' );
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
            'about_section',
            [
                'label' => __( 'About Section', 'photomedia' ),
            ]
        );

        $this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'photomedia' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Lost Is Just a Four Letter Word', 'photomedia' ),
            ]
        );
        $this->add_control(
            'sec_txt', [
                'label' => __( 'Section Text', 'photomedia' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => __( 'For man shall him gathering image dry gathering which cattle. Said second fruit dry Upon cattle sixth lights herb gathered second that night sea his blessed he us meat Seed void. Day saw him days itself lights. Give waters multiply earth very brought replenish open itself multiply upon cattle she’d rule make doesn’t lights together I let heaven which for land saw grass our was unto face brought seed dry moving was, were great. Our won’t dry herb set over. Seasons earth upon fill it after. Shall she’d hath so which seas to <br>
                For man shall him gathering image dry gathering which cattle. Said second fruit dry Upon cattle sixth lights herb gathered second that night sea his blessed he us meat Seed void. Day saw him days itself lights. Give waters multiply earth very brought replenish open itself multiply upon cattle', 'photomedia' ),
            ]
        );
        $this->add_control(
            'big_img', [
                'label' => __( 'Big Image', 'photomedia' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src()
                ]
            ]
        );
        $this->add_control(
            'left_text', [
                'label' => __( 'After Image Left Text', 'photomedia' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'For man shall him gathering image dry gathering which cattle. Said second fruit dry Upon cattle sixth lights herb gathered second that night sea his blessed he us meat Seed void. Day saw him days itself lights.', 'photomedia' ),
            ]
        );
        $this->add_control(
            'right_text', [
                'label' => __( 'After Image Right Text', 'photomedia' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'For man shall him gathering image dry gathering which cattle. Said second fruit dry Upon cattle sixth lights herb gathered second that night sea his blessed he us meat Seed void. Day saw him days itself lights.', 'photomedia' ),
            ]
        );
        
        $this->end_controls_section(); // End content
	}

	protected function render() {
        $settings   = $this->get_settings();
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $sec_txt    = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
        $big_img    = !empty( $settings['big_img']['id'] ) ? wp_get_attachment_image( $settings['big_img']['id'], 'about_img_big_thumb_1146x580', '', array('alt' => $sec_title . ' image' ) ) : '';
        $left_text  = !empty( $settings['left_text'] ) ? $settings['left_text'] : '';
        $right_text = !empty( $settings['right_text'] ) ? $settings['right_text'] : '';
        ?>
        
    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="about_text">
                        <?php
                            if ( $sec_title ) {
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                            if ( $sec_txt ) {
                                echo '<p class="about_text_1">';
                                echo wp_kses_post( nl2br( $sec_txt ) );
                                echo '</p>';
                            }
                        ?>
                    </div>
                </div>
                <?php
                    if ( $big_img ) {
                        echo '<div class="col-xl-12">
                                <div class="about_thumb">';
                                    echo $big_img;
                            echo '</div>
                        </div>';
                    }
                ?>
                <div class="about_details">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <?php
                                    if ( $left_text ) {
                                        echo '<p>';
                                        echo wp_kses_post( nl2br( $left_text ) );
                                        echo '</p>';
                                    }
                                ?>
                            </div>
                            <div class="col-xl-6">
                                <?php
                                    if ( $right_text ) {
                                        echo '<p>';
                                        echo wp_kses_post( nl2br( $right_text ) );
                                        echo '</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_start -->
    <?php
    }
}
