<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-md-4 d-none d-md-block">
                            <div class="header_links ">
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
                        <div class="col-xl-4 col-md-4">
                            <div class="logo">
                                <?php
                                    echo photomedia_theme_logo( 'navbar-brand' );
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 d-none d-md-block">
                            <div class="login_resiter">
                                <p><a href="#"><i class="flaticon-user"></i>login</a> | <a href="#">Resister</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area white-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <?php
                                    if(has_nav_menu('primary-menu')) {
                                        wp_nav_menu(array(
                                            'menu'           => 'primary-menu',
                                            'theme_location' => 'primary-menu',
                                            'menu_id'        => 'navigation',
                                            'container_class'=> false,
                                            'container_id'   => false,
                                            'menu_class'     => false,
                                            'walker'         => new photomedia_bootstrap_navwalker,
                                            'depth'          => 3
                                        ));
                                    }
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="get_serch">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="search_input" id="search_input_box">
                        <div class="container">
                            <form class="d-flex justify-content-between search-inner" action="<?php echo esc_url( site_url( '/' ) ); ?>">
                                <input id="search_input" type="text" class="form-control" name="s" placeholder="<?php esc_html_e( 'Search here', 'photomedia' ); ?>">
                                <button type="submit" class="btn"></button>
                                <span class="ti-close" id="close_search" title="Close Search"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <?php
    //Page Title Bar
    if( function_exists( 'photomedia_page_titlebar' ) ){
	    photomedia_page_titlebar();
    }

