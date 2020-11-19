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
class Photomedia_Banner_Posts extends Widget_Base {

	public function get_name() {
		return 'photomedia-banner';
	}

	public function get_title() {
		return __( 'Featured Posts', 'photomedia' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'photomedia-elements' ];
    }
    
    public function photomedia_featured_post_cat(){
        $post_cat_array = [];
        $cat_args = [
            'orderby' => 'name',
            'order'   => 'ASC'
        ];
        $categories = get_categories($cat_args);
        foreach($categories as $category) {
            $args = array(
                'showposts' => 2,
                'category_name' => $category->slug,
                'ignore_sticky_posts'=> 1
            );
            $posts = get_posts($args);
            if ($posts) {
                $post_cat_array[ $category->slug ] = $category->name;
            } else {
                return __( 'Select a different category, because this category have not enough posts.', 'photomedia' );
            }
        }
    
        return $post_cat_array;

             
    }

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Featured Post Section', 'photomedia' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'photomedia' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'default'       => 'Welcome to Photomedia <br>photography blog',
            ]
        );
        $this->add_control(
            'adv_img',
            [
                'label' => esc_html__( 'Advertisement Image', 'photomedia' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'adv_url',
            [
                'label' => esc_html__( 'Advertisement URL', 'photomedia' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'   => '#',
                ]
            ]
        );

        $this->add_control(
            'featured_posts_section_separator',
            [
                'label' => esc_html__( 'Posts Section', 'photomedia' ),
                'type' => Controls_Manager::HEADING,
                'seperator' => 'after',
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'         => esc_html__( 'Select Category', 'photomedia' ),
                'type'          => Controls_Manager::SELECT,
                // 'default'       => 'creative-design',
                'description'   => esc_html__( 'Please use the featured images size 1159px width & 811px height or more for better look.', 'photomedia' ),
                'options'       => $this->photomedia_featured_post_cat()
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label'         => esc_html__( 'Post Order', 'photomedia' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'ASC', 'photomedia' ),
				'label_off'     => __( 'DESC', 'photomedia' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
            ]
        );
        $this->add_control(
            'post_number',
            [
                'label'         => esc_html__( 'Post Limit', 'photomedia' ),
                'type'          => Controls_Manager::NUMBER,
				'default'       => '2',
				'step'          => '2',
				'min'           => '2',
				'max'           => '6',
            ]
        );
        $this->add_control(
            'show_meta',
            [
                'label'         => esc_html__( 'Show/Hide Meta', 'photomedia' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'photomedia' ),
				'label_off'     => __( 'Hide', 'photomedia' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
            ]
        );
        
        $this->end_controls_section(); // End content
	}

	protected function render() {
        $settings       = $this->get_settings();
        $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $adv_url        = !empty( $settings['adv_url']['url'] ) ? $settings['adv_url']['url'] : '';
        $adv_img_id     = !empty( $settings['adv_img']['id'] ) ? $settings['adv_img']['id'] : '';
        $img_alt        = get_post_meta($adv_img_id, '_wp_attachment_image_alt', TRUE) ? get_post_meta($adv_img_id, '_wp_attachment_image_alt', TRUE) : 'advertisement image';
        $adv_img        = $adv_img_id ? wp_get_attachment_image( $adv_img_id, 'adv_banner_thumb_600x120', '', array( 'alt' => $img_alt ) ) : '';
        $adv_img        = $adv_img_id ? wp_get_attachment_image( $adv_img_id, 'adv_banner_thumb_600x120', '', array( 'alt' => $img_alt ) ) : '';
        $post_cat       = $settings['post_cat'];
        $post_order     = $settings['post_order'] == 'yes' ? 'desc' : 'asc';
        $post_number    = $settings['post_number'];
        $show_meta      = $settings['show_meta'] == 'yes' ? true : false;
    ?>

    <!-- welcome_protomedia_start -->
    <div class="welcome_protomedia">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="add_here">
                        <?php
                            if ( $adv_img ) {
                                echo '<a href="'.esc_url( $adv_url ).'">';
                                    echo $adv_img;
                                echo '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_protomedia_end -->

    <!-- photographi_area_start -->
    <div class="photographi_area">
        <div class="container">
            <div class="row">
                <?php
                    if( function_exists( 'photomedia_featured_post' ) ) {
                        photomedia_featured_post( $post_number, $post_order, $post_cat, $show_meta );
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- photographi_area_end -->
    <?php
    }
}
