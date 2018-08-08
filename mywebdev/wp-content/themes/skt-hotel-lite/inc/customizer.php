<?php
/**
 * SKT Hotel Theme Customizer
 *
 * @package SKT Hotel Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class hotel_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#02aee7',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-hotel-lite'),
 			'description' => sprintf( esc_html__( 'More color options in PRO Version', 'skt-hotel-lite' )),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('slider_below_desc',array(
		'title'	=> esc_attr__('Slider Below Info','skt-hotel-lite'),
		'description'	=> esc_html__('Title & Description Below The Slider','skt-hotel-lite'),
		'priority'	=> null
	));
	$wp_customize->add_setting('shortinfo_sb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'shortinfo_sb', array(
				'setting'	=> 'shortinfo_sb',
				'section'	=> 'slider_below_desc'
			)
		)
	);	
	
	$wp_customize->add_setting('booknow_button',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('booknow_button',array(
			'label'	=> esc_html__('Book Now Button Custom Link','skt-hotel-lite'),			
			'setting'	=> 'booknow_button',
			'section'	=> 'slider_below_desc'
	));		
		
	$wp_customize->add_section('home_boxes', array(
		'title'	=> esc_html__('Homepage Boxes','skt-hotel-lite'),
		'description' => esc_html__('Box Image Dimmensions: ( 336 X 228 ) ','skt-hotel-lite'),		
		'priority'	=> null
	));
	$wp_customize->add_setting('column_one', array(
			'default'	=> null,
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_one', array(
				'label'	=> esc_html__('First column content','skt-hotel-lite'),
				'setting'	=> 'column_one',
				'section'	=> 'home_boxes'
			)
		)
	);
	$wp_customize->add_setting('column_two', array(
			'default'	=> null,
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_two', array(
				'label'	=> esc_html__('Second column content','skt-hotel-lite'),
				'setting'	=> 'column_two',
				'section'	=> 'home_boxes'
			)
		)
	);
	
	$wp_customize->add_setting('column_three',array(
			'default'	=>	null,
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_three', array(
				'label'	=> esc_html__('Third column content','skt-hotel-lite'),
				'setting'	=> 'column_three',
				'section'	=> 'home_boxes'
			)
		)
	);	
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> esc_html__('Slider Settings','skt-hotel-lite'),
		'description' => sprintf( esc_html__( 'Slider Image Dimensions ( 1400 X 536 ) Add slider images here. More slider settings available in  PRO Version', 'skt-hotel-lite' )),			
		'priority'		=> null
	));	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> null,
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => esc_html__('Slide Image 1','skt-hotel-lite'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> null,
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title1', array(	
			'label'	=> esc_html__('Slide title 1','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'sanitize_callback'	=> 'wptexturize'	
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc1', array(
				'label'	=> esc_attr__('Slider description  1','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc1'
			)
		)
	);
	$wp_customize->add_setting('slide_link1',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> esc_html__('Slide link 1','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> esc_html__('Slide image 2','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(
			'default'	=> null,
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title2', array(	
			'label'	=> esc_html__('Slide title 2','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc2', array(
				'label'	=> esc_html__('Slide description 2','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc2'
			)
		)
	);	
	$wp_customize->add_setting('slide_link2',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> esc_html__('Slide link 2','skt-hotel-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> esc_html__('Slide Image 3','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
			)
		)
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title3', array(		
			'label'	=> esc_html__('Slide title 3','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> null,
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control($wp_customize,'slide_desc3', array(
				'label'	=> esc_html__('Slide Description 3','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc3'		
			)
		)
	);	
	$wp_customize->add_setting('slide_link3',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> esc_attr__('Slide link 3','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
// Slide Image 4
	$wp_customize->add_setting('slide_image4',array(
			'default'	=> null,
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	$wp_customize->add_control(
	 	new WP_Customize_Image_Control(
			$wp_customize,
			'slide_image4',
			array(
				'label'	=> esc_html__('Slide Image 4','skt-hotel-lite'),
				'section'	=> 'slider_section',	
				'setting'	=> 'slide_image4'
			)
		)
	);	
	$wp_customize->add_setting('slide_title4',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'slide_title4',	array(	
			'label'	=> esc_html__('Slide title 4','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title4'		
	));
	$wp_customize->add_setting('slide_desc4',array(
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc4',
			array(
				'label'	=> esc_html__('Slide description 4','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc4'
			)
		)
	);		
	$wp_customize->add_setting('slide_link4',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('slide_link4',array(
			'label'	=> esc_html__('Slide link 4','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link4'
	));
	// Slide Image 5
	$wp_customize->add_setting('slide_image5',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'slide_image5',
			array(
				'label'	=> esc_html__('Slide image 5','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image5'
			)
		)
	);
	$wp_customize->add_setting('slide_title5',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title5',	array(	
			'label'	=> esc_html__('Slide title 5','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title5'
	));
	$wp_customize->add_setting('slide_desc5',array(
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc5',
			array(
				'label'	=> esc_html__('Slide description 5','skt-hotel-lite'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc5'
			)
		)
	);
	$wp_customize->add_setting('slide_link5',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link5',array(
			'label'	=> esc_html__('Slide link 5','skt-hotel-lite'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link5'
	));	
	$wp_customize->add_section('social_sec',array(
			'title'	=> esc_html__('Social Settings','skt-hotel-lite'),
			'description' => sprintf( esc_html__( 'Add social icons link here. PRO Version', 'skt-hotel-lite' )),			
			'priority'		=> null
	));
	
		$wp_customize->add_setting('social_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('social_title',array(
			'label'	=> esc_html__('Add title for footer social icons','skt-hotel-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'social_title'
	));	
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_html__('Add facebook link here','skt-hotel-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_html__('Add twitter link here','skt-hotel-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> esc_html__('Add google plus link here','skt-hotel-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_html__('Add linkedin link here','skt-hotel-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_setting('menu_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> esc_html__('Add title for footer menu','skt-hotel-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('footer_menu',array(
			'default'	=> null,
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'footer_menu', array(
				'section'	=> 'footer_area',
				'setting'	=> 'footer_menu'
			)
		)
	);
	
	$wp_customize->add_setting('news_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('news_title',array(
			'label'	=> esc_html__('Footer Second Column News Title','skt-hotel-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'news_title'
	));	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> esc_html__('Add contact title here','skt-hotel-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_title'
	));	
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> esc_html__('Contact Details','skt-hotel-lite'),
			'description'	=> esc_html__('Add you contact details here','skt-hotel-lite'),
			'priority'	=> null
	));	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> esc_html__('Add contact address here','skt-hotel-lite'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Add contact number here.','skt-hotel-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> esc_html__('Add you email here','skt-hotel-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));

}
add_action( 'customize_register', 'hotel_customize_register' );

//Integer
function hotel_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function hotel_custom_css(){
		?>
        	<style type="text/css">
					
					a, .header .header-inner .nav ul li a:hover, 
					.signin_wrap a:hover,
					.header .header-inner .nav ul li.current_page_item a,					
					.services-wrap .one_fourth:hover .ReadMore,
					.services-wrap .one_fourth:hover h3,
					.services-wrap .one_fourth:hover .fa,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.MoreLink:hover,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#02aee7')); ?>;}
					
					.social-icons a:hover, 
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,
					.nivo-controlNav a.active,
					.header .header-inner .logo,
					.bookbtn,
					.wpcf7 input[type="submit"]
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#02aee7')); ?>;}
					
					.services-wrap .one_fourth:hover .ReadMore,
					.services-wrap .one_fourth:hover .fa,
					.MoreLink:hover
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#02aee7')); ?>;}
					
			</style>
<?php        
}
         
add_action('wp_head','hotel_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_customize_preview_js() {
	wp_enqueue_script( 'hotel_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'hotel_customize_preview_js' );