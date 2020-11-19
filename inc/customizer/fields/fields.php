<?php 
/**
 * @Packge     : Photomedia
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'photomedia_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_general_section',
        'default'     => '#fc4600',
    )
);


// Search section
Epsilon_Customizer::add_field(
    'search_sec_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Search Section', 'photomedia' ),
        'section'     => 'photomedia_header_section',
        'default'     => true,

    )
);


// Header search form toggle field
Epsilon_Customizer::add_field(
    'photomedia_hsearchform_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Show header search form', 'photomedia' ),
        'description' => esc_html__( 'Toggle to show header search form.', 'photomedia' ),
        'section'     => 'photomedia_header_section',
        'default'     => true,
    )
);



// Social Profile section
Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile Section', 'photomedia' ),
        'section'     => 'photomedia_header_section',
        'default'     => true,

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'photomedia_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'photomedia' ),
        'section'     => 'photomedia_header_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'photomedia_header_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'photomedia_header_section',
		'label'        => esc_html__( 'Social Profile Links', 'photomedia' ),
        'button_label' => esc_html__( 'Add new social link', 'photomedia' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'default'      => [
            [
                'social_link_title' => esc_html__( 'Facebook', 'beko' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-facebook',
            ],
            [
                'social_link_title' => esc_html__( 'Twitter', 'beko' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-twitter',
            ],
            [
                'social_link_title' => esc_html__( 'Instagram', 'beko' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-instagram',
            ],
            [
                'social_link_title' => esc_html__( 'Behance', 'beko' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-behance',
            ],
        ],
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'beko' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'beko' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '#',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'beko' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);



// Header color section
Epsilon_Customizer::add_field(
    'photomedia_header_color_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Color Settings', 'photomedia' ),
        'section'     => 'photomedia_header_section',
        'default'     => true,

    )
);


// Header background color field
Epsilon_Customizer::add_field(
    'photomedia_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'photomedia' ),
        'description' => esc_html__( 'Select the header background color.', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'photomedia_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'photomedia_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#fc4600',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'photomedia_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#fafafa',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'photomedia_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#2a2a2a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'photomedia_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_header_section',
        'default'     => '#fc4600',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'photomedia_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'photomedia' ),
        'section'     => 'photomedia_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'photomedia_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'photomedia' ),
        'section'     => 'photomedia_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'photomedia_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'photomedia' ),
        'section'           => 'photomedia_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'photomedia_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'photomedia' ),
        'section'           => 'photomedia_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'photomedia_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'photomedia_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'photomedia_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer slogan text
Epsilon_Customizer::add_field(
    'photomedia_footer_slogan',
    array(
        'type'              => 'textarea',
        'label'             => esc_html__( 'Footer Slogan', 'photomedia' ),
        'section'           => 'photomedia_footer_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Explore photo media blog to enrich your photography knowledge', 'photomedia' ),
    )
);

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'photomedia' ),
        'section'     => 'photomedia_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'photomedia' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'photomedia' ),
        'section'     => 'photomedia_footer_section',
        'default'     => '1',
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'photomedia_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'photomedia' ),
        'section'     => 'photomedia_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'photomedia' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'photomedia_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'photomedia' ),
        'section'     => 'photomedia_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_footer_section',
        'default'     => '#f7f7f7',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_footer_section',
        'default'     => '#7b838a',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_footer_section',
        'default'     => '#2a2a2a',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_footer_section',
        'default'     => '#8a8a8a',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'photomedia_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'photomedia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'photomedia_footer_section',
        'default'     => '#fc4600',
    )
);