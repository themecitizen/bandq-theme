<?php
/**
 * Register page option, sections and field options
 */


/**
 * Register argument
 */
function wpfunc_register_option_page( $theme_option_name, $theme )
{
    $args = array(
        'opt_name'      =>  $theme_option_name,
        'menu_title'    =>  esc_html__( 'Theme Options', 'wpf_domain' ),
        'page_title'    =>  esc_html__( 'Theme Options', 'wpf_domain' ),
        'menu_type'     =>  'submenu',
        'dev_mode'      => false,
        'display_name' => esc_html__( 'Theme Options', 'wpf_domain' ),
        'display_version' => WPF_VERSION,
        'class'         => 'wpfriend-options',
        'system_info'   => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        'forced_dev_mode_off'  => false,
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    Redux::setArgs( $theme_option_name, $args );
}

add_action( 'wptext_register_option_page', 'wpfunc_register_option_page', 10 , 2 );
/**
 * Register help tabs
 */

function wpfunc_register_help_tab( $theme_option_name )
{
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => 'Theme Information 1',
            'content' => '<br />This is the tab content, HTML is allowed.<br />',
        ),
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => 'Theme Information 1',
            'content' => '<br />This is the tab content, HTML is allowed.<br />'
        )
    );
    //Redux::setHelpTab( $theme_option_name, $tabs );
}
//add_action( 'wptext_register_help_tab', 'wpfunc_register_help_tab', 10, 1 );

/**
 * Register tabs Section and section's fields
 */

add_action( 'wptext_register_setting_setions', 'wpfunc_section_general', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_header', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_page_title', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_typo', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_layout', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_social', 10, 1 );
add_action( 'wptext_register_setting_setions', 'wpfunc_section_footer', 10, 1 );


/**
 * Function add readcrumb section option tab on theme options page
 */
function wpfunc_section_page_title( $theme_option_name )
{
	$section = array(
		'title'  => esc_html__( 'Page Title', 'wpf_domain' ),
		'id'     => 'options-page-title',
		'desc'   => '',
		'icon'   => 'el el-fork',
		'fields' => array(
			array(
				'id'        => 'hide_page_title',
				'type'      => 'switch',
				'title'     => esc_html__( 'Hide Page Title Section on all pages', 'wpf_domain' ),
				'default'   => false,
			),
			array(
				'id'       => 'page_title_bg_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Background Image' , 'wpf_domain'),
				'subtitle' => esc_html__( 'Upload new logo or select one in media library', 'wpf_domain' ),
				'compiler' => 'true',
				'default'  => array( 'url' => WPF_URL . '/img/page-title-bg.jpg' ),
			),
			array(
				'id'        => 'show_breadcrumb',
				'type'      => 'switch',
				'title'     => esc_html__( 'Show BreadCrumb', 'wpf_domain' ),
				'default'   => false,
			),
			array(
				'id'       => 'hide_breadcrumb_on',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Hide Breadcrumb on', 'wpf_domain' ),
				'subtitle' => esc_html__( 'Select page hides breadcrumb', 'wpf_domain' ),
				//Must provide key => value pairs for multi checkbox options
				'options'  => array(
					'post'          => esc_html__( 'Blog', 'wpf_domain' ),
					'page'          => esc_html__( 'Page', 'wpf_domain' ),
				),
				'required'      => array( 'show_breadcrumb', '=', array( true ) ),
			),
		)
	);

	Redux::setSection( $theme_option_name, $section );
}

/**
 * Function add Typography section option tab on theme options page
 */

function wpfunc_section_typo( $theme_option_name )
{

	$section = array(
		'title'  => esc_html__( 'Typography' , 'wpf_domain'),
		'id'     => 'options-typo',
		'desc'   => '',
		'icon'   => 'el el-font',
	);

	Redux::setSection( $theme_option_name, $section );

	$section = array(
		'title'      => esc_html__( 'Body Typography' , 'wpf_domain'),
		'id'         => 'options-typo-body',
		'subsection' => true,
		'desc'       => '',
		'fields' => array(
			array(
				'id'        => 'body_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'Body Typography', 'wpf_domain' ),
				'font-style' => false
			),
		)
	);

	Redux::setSection( $theme_option_name, $section );

	$section = array(
		'title'      => esc_html__( 'Headers Typography' , 'wpf_domain'),
		'id'         => 'options-typo-heading',
		'subsection' => true,
		'desc'       => '',
		'fields' => array(
			array(
				'id'        => 'h1_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H1 Headers Typography', 'wpf_domain' ),
			),
			array(
				'id'        => 'h2_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H2 Headers Typography', 'wpf_domain' ),
			),
			array(
				'id'        => 'h3_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H3 Headers Typography', 'wpf_domain' ),
			),
			array(
				'id'        => 'h4_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H4 Headers Typography', 'wpf_domain' ),
			),
			array(
				'id'        => 'h5_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H5 Headers Typography', 'wpf_domain' ),
			),
			array(
				'id'        => 'h6_typography',
				'type'      => 'typography',
				'title'     => esc_html__( 'H6 Headers Typography', 'wpf_domain' ),
			),
		)
	);

	Redux::setSection( $theme_option_name, $section );

}

/**
 * Function add General section option tab on theme options page
 */

function wpfunc_section_general( $theme_option_name )
{

	$section = array(
		'title'  => esc_html__( 'General' , 'wpf_domain'),
		'id'     => 'options-general',
		'desc'   => '',
		'icon'   => 'el el-cog',
		'fields' => array(
			array(
				'id'        => 'general_enable_preloader',
				'type'      => 'switch',
				'title'     => esc_html__( 'Enable Preloader', 'wpf_domain' ),
				'default'   => false,
			),
			array(
				'id'        => 'general_show_back_to_top_button',
				'type'      => 'switch',
				'title'     => esc_html__( 'Display back to top button', 'wpf_domain' ),
				'default'   => false,
			),
			array(
				'id'        => 'general_enable_smooth_scroll',
				'type'      => 'switch',
				'title'     => esc_html__( 'Enable Smooth Scroll', 'wpf_domain' ),
				'default'   => false,
			),
			array(
				'id'       => 'general_favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Favicon' , 'wpf_domain'),
				'subtitle' => esc_html__( 'Upload new logo or select one in media library', 'wpf_domain' ),
				'compiler' => 'true',
				'default'  => array( 'url' => WPF_URL . '/img/favicon.ico' ),
			),
			array(
				'id'       => 'general_404_begin_section',
				'type'     => 'section',
				'indent'   =>  true,
				'title'    => esc_html__( '404 Page Settings', 'wpf_domain' ),
			),
			array(
				'id'       => 'general_404_bg_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Background Image' , 'wpf_domain'),
				'subtitle' => esc_html__( 'Upload new logo or select one in media library', 'wpf_domain' ),
				'compiler' => 'true',
				'default'  => array( 'url' => WPF_URL . '/img/404.jpg' ),
			),
			array(
				'id'       => 'general_404_page_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Page Title', 'wpf_domain' ),
				'default'  => "404"
			),
			array(
				'id'       => 'general_404_page_sub_description',
				'type'     => 'text',
				'title'    => esc_html__( 'Page sub description', 'wpf_domain' ),
				'default'  => "Page not found!"
			),
			array(
				'id'       => 'general_404_page_description',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Page description', 'wpf_domain' ),
				'default'  => ""
			),
			array(
				'id'       => 'general_404_end_section',
				'type'     => 'section',
				'indent'   =>  false,
			),
		)
	);

	Redux::setSection( $theme_option_name, $section );
}

/**
 * Function add Header section option tab on theme options page
 */

function wpfunc_section_header( $theme_option_name )
{
     $section = array(
        'title'  => esc_html__('Header' , 'wpf_domain'),
        'id'     => 'options-header',
        'desc'   => '',
        'icon'   => 'el el-flag',
        'fields' => array(
            array(
                'id'       => 'opt_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo' , 'wpf_domain'),
                'subtitle' => esc_html__( 'Upload new logo or select one in media library', 'wpf_domain' ),
                'compiler' => 'true',
                'default'  => array( 'url' => WPF_URL . '/img/logo.png' ),
            ),
            array(
                'id'       => 'extra_nav_item',
                'type'     => 'sortable',
                'mode'     => 'checkbox', // checkbox or text
                'title'    => esc_html__( 'Menu extra item', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Display and sortable menu extra items', 'wpf_domain' ),
                'desc'     => esc_html__( 'There are items display at the end of navigation bar', 'wpf_domain' ),
                'options'  => array(
                    'cart' => esc_html__( 'Small Cart', 'wpf_domain' ),
                    'search' => esc_html__( 'Search', 'wpf_domain' ),
                    'config' => esc_html__( 'Config', 'wpf_domain' ),
                ),
                'default'  => array(
                    'cart' => true,
                    'search' => true,
                    'config' => true,
                )
            ),
            array(
                'id'       => 'custom_header_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Header Scripts', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Input here your custom scripts', 'wpf_domain' ),
                'mode'     => 'javascript',
                'theme'    => 'dreamweaver',
                'default'  => ""
            )
        )
    );

    Redux::setSection( $theme_option_name, $section );
}

/**
 * Function add Layout section option tab on theme options page
 */
function wpfunc_section_layout( $theme_option_name )
{
    $section = array(
        'title'  => esc_html__( 'Layout', 'wpf_domain' ),
        'id'     => 'options-layout',
        'desc'   => '',
        'icon'   => 'el el-screen',
        'fields' => array(
            array(
                'id'       => 'layout_page',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Layout', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Select layout for page', 'wpf_domain' ),
                'options'  => array(
                    'full-content' => array(
                        'alt' => esc_attr__( 'Full Page', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/full-side.png'
                    ),
                    'left-sidebar' => array(
                        'alt' =>  esc_attr__( 'Left Sidebar', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/left-sidebar.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_attr__( 'Right Sidebar', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/right-sidebar.png'
                    ),
                ),
                'default'  => 'full-content'
            ),
            array(
                'id'       => 'layout_post',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Layout', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Select layout for post', 'wpf_domain' ),
                'options'  => array(
                    'full-content' => array(
                        'alt' => esc_attr__( 'Full Page', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/full-side.png'
                    ),
                    'left-sidebar' => array(
                        'alt' =>  esc_attr__( 'Left Sidebar', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/left-sidebar.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_attr__( 'Right Sidebar', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/right-sidebar.png'
                    ),
                ),
                'default'  => 'full-content'
            ),
        )
    );

    Redux::setSection( $theme_option_name, $section );
}

/**
 * Function add Footer section option tab on theme options page
 */
function wpfunc_section_footer( $theme_option_name )
{
    $section = array(
        'title'  => 'Footer',
        'id'     => 'options_footer',
        'desc'   => '',
        'icon'   => 'el el-leaf',
        'fields' => array(
	        array(
		        'id'       => 'footer_layout',
		        'type'     => 'image_select',
		        'title'    => esc_html__( 'Footer Layouts', 'wpf_domain' ),
		        'subtitle' => esc_html__( 'Select the different header layouts', 'wpf_domain' ),
		        'options'  => array(
			        'type1' => array(
				        'alt' =>  esc_html__( 'Footer 1', 'wpf_domain' ),
				        'img' => WPF_URL . '/img/theme-options/header-1.png'
			        ),
		        ),
		        'default'  => 'type1'
	        ),
            array(
                'id'        => 'enable_footer_widget',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display Footer Widgets', 'wpf_domain' ),
                'subtitle'  => esc_html__( 'Look, it\'s on!', 'wpf_domain' ),
                'default'   => false,
                'required'      => array( 'footer_layout', '=', array( 'type1' ) ),
            ),
            array(
                'id'       => 'footer_widget_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Footer Widget Columns', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Select the number of columns are displayed', 'wpf_domain' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__( '1 Column', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/1col.jpg'
                    ),
                    '2' => array(
                        'alt' =>  esc_attr__( '2 Columns', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/2col.jpg'
                    ),
                    '3' => array(
                        'alt' => esc_attr__( '3 Columns', 'wpf_domain' ),
                        'img' => WPF_URL . '/img/theme-options/3col.jpg'
                    ),
                    '4' => array(
	                    'alt' => esc_attr__( '4 Columns', 'wpf_domain' ),
	                    'img' => WPF_URL . '/img/theme-options/4col.jpg'
                    ),
                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'footer_copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer Copy Right', 'wpf_domain' ),
                'validate' => 'html',
                'default'  => esc_html__( '© 2016 All Rights Reserved', 'wpf_domain' ),
            ),
            array(
                'id'       => 'custom_footer_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Footer Scripts', 'wpf_domain' ),
                'subtitle' => esc_html__( 'Input here your custom scripts', 'wpf_domain' ),
                'mode'     => 'javascript',
                'theme'    => 'dreamweaver',
                'default'  => ""
            )
        )
    );

    Redux::setSection( $theme_option_name, $section );
}


/**
 * Function add social section option tab on theme options page
 */
function wpfunc_section_social( $theme_option_name )
{
    $socials = wpfunc_get_socials();

    $section = array(
        'title'  => 'Social',
        'id'     => 'options_social',
        'desc'   => '',
        'icon'   => 'el el-adult',
        'fields' => array(
            array(
                'id'        => 'enable_socials',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display social buttons', 'wpf_domain' ),
                'default'   => false,
            ),
            array(
                'id'       => 'open-new-tab',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Open link on new tab', 'wpf_domain' ),
                'default'  => '1'// 1 = on | 0 = off
            )
        )
    );

    foreach ( $socials as $key => $item )
    {
	    $section['fields'][] = array(
		    'id'            => 'socials-' . $key . '-begin-section',
		    'type'     => 'section',
		    'title'         => $item['label'],
		    'indent'   =>  true,
	    );
	    $section['fields'][] = array(
		    'id'            => 'socials-' . $key,
		    'type'          => 'text',
		    'title'         => esc_html__( 'Address', 'bitmin' ),
		    'default'       =>  $item['default'],
	    );
	    $section['fields'][] = array(
		    'id'            => 'socials-' . $key . '-bg-color',
		    'type'          => 'color',
		    'title'         => esc_html__( 'Background Color', 'bitmin' ),
	    );
	    $section['fields'][] = array(
		    'id'            => 'socials-' . $key . '-color',
		    'type'          => 'color',
		    'title'         => esc_html__( 'Color', 'bitmin' ),
	    );
	    $section['fields'][] = array(
		    'id'            => 'socials-' . $key . '-end-section',
		    'type'     => 'section',
		    'indent'   =>  false,
	    );
    }


    Redux::setSection( $theme_option_name, $section );
}
