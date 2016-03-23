<?php
/**
 * fitcoach Theme Customizer
 *
 * @package fitcoach
 */
 
function fitcoach_theme_customizer( $wp_customize ) {
	
	//allows donations
    class fitcoach_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() {
        ?>

        <?php
        }
    }	
	
	// Donations
    $wp_customize->add_section( 
        'fitcoach_theme_info',
        array(
            'title' => __('Like Fit Coach? Help Us Out.', 'fitcoach'),
            'priority' => 5,
            'description' => __('We do all we can do to make all our themes free for you. While we enjoy it, and it makes us happy to help out, a little appreciation can help us to keep theming.</strong><br/><br/> Please help support our mission and continued development with a donation of $5, $10, $20, or if you are feeling really kind $100..<br/><br/> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a>', 'fitcoach' ), 
        )
    );  
	 
    //Donations section
    $wp_customize->add_setting('fitcoach_help', array(   
			'sanitize_callback' => 'fitcoach_no_sanitize', 
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new fitcoach_Info( $wp_customize, 'fitcoach_help', array( 
        'section' => 'fitcoach_theme_info', 
        'settings' => 'fitcoach_help', 
        'priority' => 10
        ) )
    ); 
	
	// Fonts  
    $wp_customize->add_section(
        'fitcoach_typography',
        array(
            'title' => __('Google Fonts', 'fitcoach' ),  
            'priority' => 39,    
        )
    );
    $font_choices = 
        array(
			'Oswald:400,700' => 'Oswald',
            'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'fitcoach_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Oswald is the default Heading font.', 'fitcoach'),
            'section' => 'fitcoach_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'fitcoach_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Oswald is the default Body font.', 'fitcoach' ), 
            'section' => 'fitcoach_typography',
            'choices' => $font_choices 
        ) 
    );

	// Colors
    $wp_customize->add_setting( 'fitcoach_link_color', array( 
		'default' => '#dc6263',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_link_color', array(
        'label'	   => __( 'Link Color', 'fitcoach' ),
        'section'  => 'colors',
        'settings' => 'fitcoach_link_color', 
    ) ) );
	
	$wp_customize->add_setting( 'fitcoach_hover_color', array(
		'default' => '#d55455', 
        'sanitize_callback' => 'sanitize_hex_color',  
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_hover_color', array(
        'label'	   => __( 'Hover Color', 'fitcoach' ),
        'section'  => 'colors',
        'settings' => 'fitcoach_hover_color', 
    ) ) );
	
	$wp_customize->add_setting( 'fitcoach_custom_color', array(
		'default' => '#dc6263', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_custom_color', array(
        'label'	   => __( 'Theme Color', 'fitcoach' ),
        'section'  => 'colors',
        'settings' => 'fitcoach_custom_color', 
		'priority' => 1
    ) ) );
	
	$wp_customize->add_setting( 'fitcoach_custom_color_hover', array(
		'default' => '#d55455', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_custom_color_hover', array(
        'label'	   => __( 'Theme Hover Color', 'fitcoach' ),
        'section'  => 'colors',
        'settings' => 'fitcoach_custom_color_hover', 
		'priority' => 2
    ) ) );
	
	$wp_customize->add_setting( 'fitcoach_site_title_color', array(
        'default'     => '#dc6263',  
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_site_title_color', array(
        'label'	   => __( 'Site Title Color', 'fitcoach' ),  
        'section'  => 'colors',
        'settings' => 'fitcoach_site_title_color',
		'priority' => 40
    )));
	
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fitcoach_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '', 
	) ) );

    // Logo upload
    $wp_customize->add_section( 'fitcoach_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'fitcoach' ),
	    'priority'    => 25,
	    'description' => 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.',
	) );

	$wp_customize->add_setting( 'fitcoach_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fitcoach_logo', array(
		'label'    => __( 'Logo', 'fitcoach' ),
		'section'  => 'fitcoach_logo_section', 
		'settings' => 'fitcoach_logo',
		'priority' => 1,
	) ) );
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', 
	array( 
		'default' => '190',
		'sanitize_callback' => 'fitcoach_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_size', array( 
		'label'    => __( 'Change the width of the Logo in PX.', 'fitcoach' ),
		'description'    => __( 'Only enter numeric value', 'fitcoach' ),
		'section'  => 'fitcoach_logo_section',
		'settings' => 'logo_size',  
		'priority'   => 2 
	) ) );
	
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/images/favicon.png'),
			'sanitize_callback' => 'esc_url_raw',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16x16 pixels)', 'fitcoach' ),
			   'type' 			=> 'image',
               'section'        => 'fitcoach_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'fitcoach' ),
               'type'           => 'image',
               'section'        => 'fitcoach_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'fitcoach' ),
               'type'           => 'image',
               'section'        => 'fitcoach_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'fitcoach' ),
               'type'           => 'image',
               'section'        => 'fitcoach_logo_section',
               'settings'       => 'apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'fitcoach' ),
               'type'           => 'image',
               'section'        => 'fitcoach_logo_section',
               'settings'       => 'apple_touch_57', 
               'priority'       => 14,
            )
        )
    );
	
	// Home Page
	$wp_customize->add_section( 'fitcoach_home_section' , array(  
	    'title'       => __( 'Home Page', 'fitcoach' ),
	    'priority'    => 30,
	    'description' => 'Customize your home page section.',
	) );
	
	// hide classes section
	$wp_customize->add_setting('active_classes',
	array(
	        'sanitize_callback' => 'fitcoach_sanitize_checkbox',
	    ) 
	);  
	
	$wp_customize->add_control( 
    'active_classes',  
    array(
        'type' => 'checkbox',
        'label' => 'Hide Classes Section',  
        'section' => 'fitcoach_home_section',
		'priority'   => 1
    ));
	
	// hide CTA section
	$wp_customize->add_setting('active_cta',
	array(
	        'sanitize_callback' => 'fitcoach_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_cta', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Call-to-Action Section',  
        'section' => 'fitcoach_home_section',
		'priority'   => 2
    ));
	
	// hide blog section
	$wp_customize->add_setting('active_blog',
	array(
	        'sanitize_callback' => 'fitcoach_sanitize_checkbox',
	    ) 
	);
	
	$wp_customize->add_control( 
    'active_blog', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Blog Section',  
        'section' => 'fitcoach_home_section',
		'priority'   => 3
    ));
	
	
	// Class Title
	$wp_customize->add_setting( 'class_title_text', 
	array(        
		'default' => 'Upcoming Classes',
		'sanitize_callback' => 'fitcoach_sanitize_text',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'class_title_text', array(
		'label'    => __( 'Upcoming Class Title', 'fitcoach' ),
		'section'  => 'fitcoach_home_section', 
		'settings' => 'class_title_text', 
		'priority'   => 4
	))); 
	
	
	// CTA Background
	$wp_customize->add_setting( 'cta_background', array(
		'default' => (get_stylesheet_directory_uri() . '/images/cta.jpg'), 
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_background', array(  
		'label'    => __( 'Your call-to-action background', 'fitcoach' ),
		'section'  => 'fitcoach_home_section',  
		'settings' => 'cta_background', 
		'priority'   => 5
	) ) );
	
	// CTA Text
	$wp_customize->add_setting( 'cta_text', array(
		'sanitize_callback' => 'fitcoach_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_text', array(
		'label'    => __( 'Call-to-action display text', 'fitcoach' ),
		'section'  => 'fitcoach_home_section',  
		'settings' => 'cta_text', 
		'priority'   => 6
	) ) );
	
	// CTA Button Text
	$wp_customize->add_setting( 'cta_button_text', array( 
		'default' => 'Book a Class',
		'sanitize_callback' => 'fitcoach_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_button_text', array( 
		'label'    => __( 'Call-to-action button text', 'fitcoach' ),
		'section'  => 'fitcoach_home_section',  
		'settings' => 'cta_button_text',
		'priority'   => 7
	) ) ); 
	
	// Blog Title
	$wp_customize->add_setting( 'fc_blog_title', array( 
		'default' => 'Latest News Posts', 
		'sanitize_callback' => 'fitcoach_sanitize_text', 
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fc_blog_title', array( 
		'label'    => __( 'Blog Title', 'fitcoach' ), 
		'section'  => 'fitcoach_home_section',  
		'settings' => 'fc_blog_title',
		'priority'   => 8
	) ) ); 
	
	// Page Drop Downs 
	$wp_customize->add_setting('fitcoach_ctalink_url', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'fitcoach_sanitize_int'
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_cta_url', array( 
    'label' => __( 'Front Page Call-to-Action URL', 'fitcoach' ),
    'section' => 'fitcoach_home_section',
	'type' => 'dropdown-pages',
    'settings' => 'fitcoach_ctalink_url', 
	'priority'   => 9 
	) ) );
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer', 'fitcoach' ),
    	'priority' => 35, 
    	'description' => __( 'Customize your footer area. Choose from any of <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">these icons</a>. Example: "fa-mobile"', 'fitcoach' )   
	) );
	
	// Footer Logo
	$wp_customize->add_setting( 'fitcoach_footer_logo', array(
		'default' => (get_stylesheet_directory_uri() . '/images/footer-logo.png'), 
		'sanitize_callback' => 'esc_url_raw', 
	) ); 

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fitcoach_footer_logo', array(
		'label'    => __( 'Footer Logo', 'fitcoach' ),
		'section'  => 'footer-custom', 
		'settings' => 'fitcoach_footer_logo',
		'priority'   => 1
	) ) );
	
	// Footer Background
	$wp_customize->add_setting( 'footer_background', array(
		'default' => (get_stylesheet_directory_uri() . '/images/footer-bg.png'),   
		'sanitize_callback' => 'esc_url_raw', 
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background', array(  
		'label'    => __( 'Footer background', 'fitcoach' ), 
		'section'  => 'footer-custom',  
		'settings' => 'footer_background', 
		'priority'   => 2
	) ) );
	
	// Footer Background Color
	$wp_customize->add_setting( 'fitcoach_footer_bgcolor', array( 
        'default'     => '#1e1c1d', 
		'sanitize_callback' => 'sanitize_hex_color',  
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitcoach_footer_bgcolor', array(
        'label'	   => __( 'Footer Background Color', 'fitcoach' ),
        'section'  => 'footer-custom',
        'settings' => 'fitcoach_footer_bgcolor', 
		'priority' => 2 
    ) ) );
	
	// Footer Icon 1
	$wp_customize->add_setting( 'footer_icon_1' , 
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text', 
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_icon_1', array( 
    'label' => __( 'First Footer Icon', 'fitcoach' ), 
    'section' => 'footer-custom',
    'settings' => 'footer_icon_1',
	'priority'   => 3
	) ) );
	
	// Footer Phone Number
	$wp_customize->add_setting( 'fitcoach_footer_phone' , 
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text',  
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_footer_phone', array(
    'label' => __( 'Footer Phone Number', 'fitcoach' ),
    'section' => 'footer-custom',
    'settings' => 'fitcoach_footer_phone', 
	'priority'   => 4
	) ) );
	
	// Footer Icon 2
	$wp_customize->add_setting( 'footer_icon_2' , 
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text', 
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_icon_2', array( 
    'label' => __( 'Second Footer Icon', 'fitcoach' ),   
    'section' => 'footer-custom',
    'settings' => 'footer_icon_2',
	'priority'   => 5
	) ) );
	
	// Footer Hours
	$wp_customize->add_setting( 'fitcoach_footer_address',
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text', 
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_footer_address', array(
    'label' => __( 'Footer Address', 'fitcoach' ),
    'section' => 'footer-custom',
    'settings' => 'fitcoach_footer_address',
	'priority'   => 6
	) ) );
	
	// Footer Icon 3
	$wp_customize->add_setting( 'footer_icon_3', 
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text', 
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_icon_3', array( 
    'label' => __( 'Third Footer Icon', 'fitcoach' ), 
    'section' => 'footer-custom',
    'settings' => 'footer_icon_3',
	'priority'   => 7
	) ) );
	
	// Footer Contact
	$wp_customize->add_setting( 'fitcoach_footer_contact', 
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text',
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_footer_contact', array(
    'label' => __( 'Footer Contact Email', 'fitcoach' ), 
    'section' => 'footer-custom',
    'settings' => 'fitcoach_footer_contact',
	'priority'   => 8
	) ) );
	
	// Footer Byline Text
	$wp_customize->add_setting( 'fitcoach_footerid',
	array( 
		'sanitize_callback' => 'fitcoach_sanitize_text',
	));   
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_footerid', array(
    'label' => __( 'Footer Byline Text', 'fitcoach' ),
    'section' => 'footer-custom', 
    'settings' => 'fitcoach_footerid',
	'priority'   => 9 
	) ) ); 

    // Choose excerpt or full content on blog
    $wp_customize->add_section( 'fitcoach_layout_section' , array( 
	    'title'       => __( 'Layout', 'fitcoach' ),
	    'priority'    => 38,
	    'description' => 'Change how fitcoach displays posts',  
	) );

	$wp_customize->add_setting( 'fitcoach_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'fitcoach_sanitize_index_content',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fitcoach_post_content', array(
		'label'    => __( 'Post content', 'fitcoach' ),
		'section'  => 'fitcoach_layout_section',
		'settings' => 'fitcoach_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	) ) );
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 12,  
        'section'     => 'fitcoach_layout_section',
        'label'       => __('Excerpt length', 'fitcoach'),
        'description' => __('Choose your excerpt length here. Default: 30 words', 'fitcoach'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ), 
    ) );  

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10; 

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'fitcoach_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
 

}
add_action('customize_register', 'fitcoach_theme_customizer');


/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
	function fitcoach_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null; 
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function fitcoach_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function fitcoach_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function fitcoach_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function fitcoach_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
} 

//Sanitizes Fonts 
function fitcoach_sanitize_fonts( $input ) {  
    $valid = array(
			'Oswald:400,700' => 'Oswald',
            'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function fitcoach_no_sanitize( $input ) {
}

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function fitcoach_add_customizer_css() {
	$color = fitcoach_sanitize_hex_color( get_theme_mod( 'fitcoach_link_color', '#dc6263' ) );
	?>
	<!-- fitcoach customizer CSS -->
	<style>
	
		body {
			border-color: <?php echo $color; ?>;
		}
		a {
			color: <?php echo $color; ?>;
		}
		
		
		<?php if ( get_theme_mod( 'fitcoach_hover_color' ) ) : ?> 
		a:hover {
			color: <?php echo get_theme_mod( 'fitcoach_hover_color', '#d55455' ) ?>; 
		}
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.class h2 { color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; } 
		<?php endif; ?>  
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.main-navigation ul ul li { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?> 
		
		 <?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?>  
		.schedule-title span { background: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?>
		
		 <?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		#sequence .animate-in .slide-title { background: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?>
		
		 <?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.red-plus { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ); ?>; color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.dark-plus { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ); ?>; color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.home-blog-title span { background: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ); ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.class-schedule { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ); ?>; color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ); ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		blockquote { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.main-navigation li:hover > a { color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.custom_border_top { border-color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color' ) ) : ?> 
		.entry-meta, .entry-meta a { color: <?php echo get_theme_mod( 'fitcoach_custom_color', '#dc6263' ) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_custom_color_hover' ) ) : ?> 
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { background: <?php echo get_theme_mod( 'fitcoach_custom_color_hover', '#d55455' ) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_footer_bgcolor' ) ) : ?>  
		.site-footer { background-color: <?php echo get_theme_mod( 'fitcoach_footer_bgcolor', '#1e1c1d' ); ?> !important; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'fitcoach_site_title_color' ) ) : ?>
		h1.site-title a { color: <?php echo esc_attr( get_theme_mod( 'fitcoach_site_title_color', '#dc6263' )) ?>; } 
		<?php endif; ?>
		
	</style>
<?php }

add_action( 'wp_head', 'fitcoach_add_customizer_css' );  
