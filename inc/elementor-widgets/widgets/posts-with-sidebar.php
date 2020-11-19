<?php
namespace Photomediaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Photomedia elementor about us section widget.
 *
 * @since 1.0
 */
class Photomedia_Posts_With_Sidebar extends Widget_Base {

	public function get_name() {
		return 'photomedia-posts-with-sidebar';
	}

	public function get_title() {
		return __( 'Posts With Sidebar', 'photomedia' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
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
                'category__in' => array($category->term_id),
                'ignore_sticky_posts'=> 1
            );
            $posts = get_posts($args);
            if ($posts) {
                $post_cat_array[ $category->term_id ] = $category->name;
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
                'label' => __( 'Posts With Sidebar', 'photomedia' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'photomedia' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Most Recent', 'photomedia' ),
            ]
        );
        $this->add_control(
            'post_number',
            [
                'label'         => esc_html__( 'Number of Posts', 'photomedia' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 6,
                'min'           => 2,
                'max'           => 10,
                'step'          => 2,
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
        $this->add_control(
            'post_cat',
            [
                'label'         => esc_html__( 'Post Category', 'photomedia' ),
                'type'          => Controls_Manager::SELECT,
                'description'   => __( 'Select post category', 'photomedia' ),
                'options'       => $this->photomedia_featured_post_cat()
            ]
        );
        $this->add_control(
            'load_more_txt',
            [
                'label'         => esc_html__( 'Load More Text', 'photomedia' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Load More', 'photomedia' ),
            ]
        );
        
        $this->end_controls_section(); // End content
	}
    
	protected function render() {
        $settings       = $this->get_settings();
        $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $pNumber        = !empty( $settings['post_number'] ) ? $settings['post_number'] : '';
        $post_cat       = !empty( $settings['post_cat'] ) ? $settings['post_cat'] : '';
        $load_more_txt  = !empty( $settings['load_more_txt'] ) ? $settings['load_more_txt'] : '';
        $meta           = $settings['show_meta'] == 'yes' ? true : false;
        $order          = $settings['post_order'] == 'yes' ? 'desc' : 'asc';
        $siteUrl        = home_url('/');	
    ?>

    <!-- most_recent_blog_start -->
    <div class="most_recent_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-33">
                        <?php
                            if( $sec_title ) {
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="row">
                        <?php
                            if( function_exists( 'photomedia_blog_posts' ) ) {
                                photomedia_blog_posts( $post_cat, $pNumber, $meta, $order );
                            }
                        ?>
                        
                        <div class="col-xl-12">
                            <div class="btn_area text-center">
                                <a href="<?php echo get_category_link( $post_cat )?>" class="boxed-btn"><?php echo esc_html( $load_more_txt )?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
    <!-- most_recent_blog_end -->
    <?php
    }
}
