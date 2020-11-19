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
 * Photomedia elementor moderator section widget.
 *
 * @since 1.0
 */
class Photomedia_Moderator extends Widget_Base {

	public function get_name() {
		return 'photomedia-moderator';
	}

	public function get_title() {
		return __( 'Moderators', 'photomedia' );
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
            'moderator_section',
            [
                'label' => __( 'Moderator Section', 'photomedia' ),
            ]
        );
        $this->add_control(
			'show_border',
			[
                'label'     => __( 'Show the top border?', 'photomedia' ),
                'type'      => Controls_Manager::SWITCHER,
                'return_value'  => 'yes',
				'default'       => 'yes',
			]
        );
        $this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'photomedia' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Our Moderators', 'photomedia' ),
            ]
        );
        
		$this->add_control(
            'moderators_contents', [
                'label' => __( 'Add New Member', 'photomedia' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'mem_img',
                        'label' => __( 'Member Image', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Title', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Jack Piller', 'photomedia' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Photographer at COk', 'photomedia' ),
                    ],
                    [
                        'name' => 'member_email',
                        'label' => __( 'Member Email', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'info@photomedia.com', 'photomedia' ),
                    ],
                    [
                        'name' => 'member_twitter',
                        'label' => __( 'Twitter URL', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'member_linkedin',
                        'label' => __( 'Linkedin URL', 'photomedia' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'mem_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Jack Piller', 'photomedia' ),
                        'member_designation' => __( 'Photographer at COk', 'photomedia' ),
                        'member_email'       => 'info@photomedia.com',
                        'member_twitter'     => '#',
                        'member_linkedin'    => '#',
                    ],
                    [
                        'mem_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Jack Piller', 'photomedia' ),
                        'member_designation' => __( 'Photographer at COk', 'photomedia' ),
                        'member_email'       => 'info@photomedia.com',
                        'member_twitter'     => '#',
                        'member_linkedin'    => '#',
                    ],
                    [
                        'mem_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Jack Piller', 'photomedia' ),
                        'member_designation' => __( 'Photographer at COk', 'photomedia' ),
                        'member_email'       => 'info@photomedia.com',
                        'member_twitter'     => '#',
                        'member_linkedin'    => '#',
                    ],
                    [
                        'mem_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Jack Piller', 'photomedia' ),
                        'member_designation' => __( 'Photographer at COk', 'photomedia' ),
                        'member_email'       => 'info@photomedia.com',
                        'member_twitter'     => '#',
                        'member_linkedin'    => '#',
                    ],
                ]
            ]
        );
        
        $this->end_controls_section(); // End content
	}

	protected function render() {
        $settings            = $this->get_settings();
        $show_border         = !empty( $settings['show_border'] ) ? $settings['show_border'] : '';
        $sec_title           = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $moderators_contents = !empty( $settings['moderators_contents'] ) ? $settings['moderators_contents'] : '';
        ?>
        <!-- moderators_area_start --> 
        <div class="moderators_area">
            <div class="container">
                <?php
                    if ( $show_border ) {
                        echo '<div class="modarator_border"></div>';
                    }
                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="modarator_title">
                            <?php
                                if ( $sec_title ) {
                                    echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if( is_array( $moderators_contents ) && count( $moderators_contents ) > 0 ){
                        foreach ( $moderators_contents as $single ) {
                            $member_name        = !empty( $single['member_name'] ) ? $single['member_name'] : '';
                            $mem_img            = !empty( $single['mem_img']['id'] ) ? wp_get_attachment_image( $single['mem_img']['id'], 'team_img_thumb_264x300', '', array('alt' => $member_name . ' image' ) ) : '';
                            $member_designation = !empty( $single['member_designation'] ) ? $single['member_designation'] : '';
                            $member_email       = !empty( $single['member_email'] ) ? $single['member_email'] : '';
                            $member_twitter     = !empty( $single['member_twitter']['url'] ) ? $single['member_twitter']['url'] : '';
                            $member_linkedin    = !empty( $single['member_linkedin']['url'] ) ? $single['member_linkedin']['url'] : '';
                            ?>
                            <div class="col-xl-3 col-md-3">
                                <div class="single_modarators">
                                    <?php 
                                    if ( $mem_img ) {
                                        ?>
                                        <div class="moderator_thumb">
                                            <?php echo $mem_img;?>
                                            <div class="author_links">
                                                <ul>
                                                    <li><a href="mailto:<?php echo esc_html( $member_email )?>"> <i class="fa fa-envelope"></i> </a></li>
                                                    <li><a href="<?php echo esc_url( $member_twitter )?>"> <i class="fa fa-twitter"></i> </a></li>
                                                    <li><a href="<?php echo esc_url( $member_linkedin )?>"> <i class="fa fa-linkedin-square"></i> </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                    <div class="moderator_name">
                                        <h3><?php echo esc_html( $member_name )?></h3>
                                        <p><?php echo esc_html( $member_designation )?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- moderators_area_end -->
        <?php
    }
}
