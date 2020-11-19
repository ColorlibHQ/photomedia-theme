<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */
    $siteUrl 		= home_url('/');		
    $footer_logo_id = get_theme_mod( 'footer_logo' );
    $footer_logo = '';
    if ( $footer_logo_id ) {
        $footer_logo = wp_get_attachment_image_src( $footer_logo_id, 'site_footer_logo_216x69' )[0];
    }
    $footer_wtoggle = photomedia_opt( 'photomedia_footer_widget_toggle' );
    $footerSlogan = !empty( photomedia_opt( 'photomedia_footer_slogan' ) ) ? photomedia_opt( 'photomedia_footer_slogan' ) : '';
    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'photomedia' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( photomedia_opt( 'photomedia_footer_copyright_text' ) ) ? photomedia_opt( 'photomedia_footer_copyright_text' ) : $copyText;
    ?>

    <!-- footer_start -->
    <footer class="footer">
        <div class="footer_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer_info text-center">
                            <?php
                            // Footer logo
                            if ( $footer_logo ) {
                                echo '<div class="footer_logo text-center">';
                                    echo '<a href="'.esc_url( $siteUrl ).'">';
                                    ?>
                                        <img src="<?php echo $footer_logo?>" alt="footer logo">
                                    <?php
                                    echo '</a>';
                                echo '</div>';
                            } else {
                                echo '<a href="'.esc_url( $siteUrl ).'">';
                                ?>
                                    <img src="<?php echo PHOTOMEDIA_DIR_ASSETS_URI .'img/footer-logo.png';?>" alt="footer logo">
                                <?php
                                echo '</a>';
                            }

                            // Footer slogan
                            if ( $footerSlogan ) {
                                echo '<p class="footer_text">';
                                    echo esc_html( $footerSlogan );
                                echo '</p>';
                            }
                            ?>

                            <div class="header_links">
                                <?php
                                    $social_opt = photomedia_opt('photomedia_social_profile_toggle');
                                    if ( $social_opt == true ) {
                                        $social_items = photomedia_opt('photomedia_header_social');
                                        if( is_array( $social_items ) && count( $social_items ) > 0 ){
                                            echo '<ul>';
                                                foreach ($social_items as $value) {
                                                    $soc_class = $value['social_icon'];
                                                    if ( strpos($soc_class, 'twitter') ) {
                                                        echo '<li><a class="twiter" href="'. esc_url($value['social_url']) .'"> <i class="'. esc_attr($value['social_icon']) .'"></i> </a></li>';
                                                    }elseif ( strpos($soc_class, 'instagram') ) {
                                                        echo '<li><a class="insta" href="'. esc_url($value['social_url']) .'"> <i class="'. esc_attr($value['social_icon']) .'"></i> </a></li>';
                                                    } else {
                                                        echo '<li><a href="'. esc_url($value['social_url']) .'"> <i class="'. esc_attr($value['social_icon']) .'"></i> </a></li>';
                                                    }
                                                }
                                            echo '</ul>';
                                        }          
                                    }   
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom ">
            <div class="container">
                <div class="footer_border">
                    <?php
                        // Footer Social Widget
                        if( $footer_wtoggle == 1 ) {
                            ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <?php 
                                    if ( is_active_sidebar( 'footer-social' ) ) {
                                        dynamic_sidebar( 'footer-social' );
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="copyright_text text-center">
                <p><?php echo wp_kses_post( $copyRight ); ?></p>
            </div>
        </div>
    </footer>
    <!-- footer_end -->

    <?php wp_footer();?>
    </body>
</html>