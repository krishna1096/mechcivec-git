<?php
	/**
	* Elementor About Nav Tab Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_About_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About Nav Tab widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'about';
	}

	/**
	* Get widget title.
	*
	* Retrieve About Nav Tab widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'About', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve About Nav Tab widget icon.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	* Get widget categories.
	*
	* Retrieve the list of categories the About Nav Tab widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'dustra-elements' ];
	}
	
	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'about_style',
			[
				'label'		=> esc_html__( 'About Style','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'dustra-core' ),
					'2' 	=> esc_html__( 'Style Two', 'dustra-core' ),
					'3' 	=> esc_html__( 'Style Three', 'dustra-core' ),
					'4' 	=> esc_html__( 'Style Four', 'dustra-core' ),
					'5' 	=> esc_html__( 'Style Five', 'dustra-core' ),
					'6' 	=> esc_html__( 'Style Six', 'dustra-core' ),
					'7' 	=> esc_html__( 'Style Seven', 'dustra-core' ),
					'8' 	=> esc_html__( 'Style Eight', 'dustra-core' ),
					'9' 	=> esc_html__( 'Style Nine', 'dustra-core' ),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'about_content',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => ['1','2','3']],
			]
		);
		
		$this->add_control(
			'thumb_image',
			[
				'label' 	=> esc_html__( 'Thumnail Image', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'thumb_image_2',
			[
				'label' 	=> esc_html__( 'Thumnail Image', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'thumb_year', [
				'label' 		=> esc_html__( 'Thumnail Year', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'thumb_content', [
				'label' 		=> esc_html__( 'Thumnail Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		
		$this->add_control(
			'svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape.png',
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'svg_two',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/1.png',
				],
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'about_title_three', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'funfact_number',
			[
				'label'			=> esc_html__( 'Fun Factor Number','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'funfact_prefix',
			[
				'label'			=> esc_html__( 'Fun Factor Prefix','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'funfact_subtitle',
			[
				'label'			=> esc_html__( 'Fun Factor Subtitle','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,

			]
		);

		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Fun Factor', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Fun Factor', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Fun Factor', 'dustra-core' ),
				'condition' 	=> ['style' => '3'],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '1'],
			]
		);
		

		$this->add_control(
			'right_content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn_text', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'dustra-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'contact_number', [
				'label' 		=> esc_html__( 'Contact Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'contact_text', [
				'label' 		=> esc_html__( 'Contact Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-telephone',
                'condition'  => [
                    'icon_style' => '1'
                ]
            ]
		);
		$this->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'about_right_content_2',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'overlay_heading', [
				'label' 		=> esc_html__( 'Overlay Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_2', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn_text_2', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn_link_2',
			[
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'dustra-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content_v3',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'right_subtitle_v3', [
				'label' 		=> esc_html__( 'Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v3', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'contact_number_v3', [
				'label' 		=> esc_html__( 'Contact Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'contact_text_v3', [
				'label' 		=> esc_html__( 'Contact Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'icon_style_v3',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
				],
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'flat_icon_v3',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-telephone',
                'condition'  => [
                    'icon_style' => '1'
                ]
            ]
		);
		$this->add_control(
			'icon_image_v3',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style_v3' => '2'
                ]
			]
		);
		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'about_left_content_v4',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '4'],
			]
		);

		$this->add_control(
			'left_v4_img_one',
			[
				'label' 	=> esc_html__( 'Image One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'left_v4_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'left_v4_img_two',
			[
				'label' 	=> esc_html__( 'Image Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content_v4',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '4'],
			]
		);
		$this->add_control(
			'right_title_v4', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v4', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'featured_title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'featured_subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'icon_style_v4',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
					'3' 	=> esc_html__( 'Icofont', 'dustra-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_v4',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-telephone',
                'condition'  => [
                    'icon_style_v4' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon_image_v4',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style_v4' => '2'
                ]
			]
		);
		$repeater->add_control(
			'icofont_v4', [
				'label' 		=> esc_html__( 'Icofont', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style_v4' => '3'
                ]
			]
		);

		$this->add_control(
			'list_right_v4',
			[
				'label' 	=> esc_html__( 'Featured Content', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Featured Content', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ featured_title }}}',
			]
		);

	
		$this->end_controls_section();
		$this->start_controls_section(
			'about_left_content_v5',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '5'],
			]
		);

		$this->add_control(
			'left_v5_img',
			[
				'label' 	=> esc_html__( 'Image', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		

		$this->end_controls_section();
		$this->start_controls_section(
			'about_right_content_v5',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '5'],
			]
		);
		$this->add_control(
			'right_title_v5', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_subtitle_v5', [
				'label' 		=> esc_html__( 'SubTitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v5', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'hr_v5_tab',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'tab_name', [
				'label' 		=> esc_html__( 'Tab Name', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'tab_content', [
				'label' 		=> esc_html__( 'Tab Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'list_right_v5_tab',
			[
				'label' 	=> esc_html__( 'Tab Content', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Tab Content', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ tab_name }}}',
			]
		);
		$this->add_control(
			'hr_v5_tab_finish',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'right_content_v5_btn_txt', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v5_btn_link', [
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'label_block' 	=> true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'about_left_content_v6',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '6'],
			]
		);

		$this->add_control(
			'left_v6_img_one',
			[
				'label' 	=> esc_html__( 'Image One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'left_v6_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'left_v6_img_two',
			[
				'label' 	=> esc_html__( 'Image Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'left_v6_years',
			[
				'label' 	=> esc_html__( 'Years', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'left_v6_years_title',
			[
				'label' 	=> esc_html__( 'Years Title', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'about_right_content_v6',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '6'],
			]
		);
		$this->add_control(
			'right_title_v6', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_subtitle_v6', [
				'label' 		=> esc_html__( 'SubTitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v6', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'hr_v6_tab',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_heading', [
				'label' 		=> esc_html__( 'Feature Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_subheading', [
				'label' 		=> esc_html__( 'Feature Sub-heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'icon_style_v6',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
					'3' 	=> esc_html__( 'Icofont', 'dustra-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_v6',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-telephone',
                'condition'  => [
                    'icon_style_v6' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon_image_v6',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style_v6' => '2'
                ]
			]
		);
		$repeater->add_control(
			'icofont_v6', [
				'label' 		=> esc_html__( 'Icofont', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style_v6' => '3'
                ]
			]
		);
		$this->add_control(
			'list_right_v6_tab',
			[
				'label' 	=> esc_html__( 'Feature Content', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Feature Content', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ feature_heading }}}',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'about_left_content_v7',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '7'],
			]
		);

		$this->add_control(
			'left_v7_img_one',
			[
				'label' 	=> esc_html__( 'Image One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'left_v7_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'left_v7_img_two',
			[
				'label' 	=> esc_html__( 'Image Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content_v7',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '7'],
			]
		);
		$this->add_control(
			'right_title_v7', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_subtitle_v7', [
				'label' 		=> esc_html__( 'SubTitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v7', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'hr_v7_tab',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'right_content_v7_btn_txt', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v7_btn_link', [
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'label_block' 	=> true,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'about_left_content_v8',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '8'],
			]
		);

		$this->add_control(
			'left_v8_img',
			[
				'label' 	=> esc_html__( 'Image', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content_v8',
			[
				'label'		=> esc_html__( 'About Rigth Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '8'],
			]
		);
		$this->add_control(
			'right_title_v8', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_subtitle_v8', [
				'label' 		=> esc_html__( 'SubTitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v8', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'hr_v8_tab',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'facility_heading_v8', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'icon_style_v8',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
					'3' 	=> esc_html__( 'Icofont', 'dustra-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_v8',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-telephone',
                'condition'  => [
                    'icon_style_v8' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon_image_v8',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style_v8' => '2'
                ]
			]
		);
		$repeater->add_control(
			'icofont_v8', [
				'label' 		=> esc_html__( 'Custom Icon', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style_v8' => '3'
                ]
			]
		);
		$this->add_control(
			'list_right_v8_tab',
			[
				'label' 	=> esc_html__( 'Facilities', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Facilities', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ facility_heading_v8 }}}',
			]
		);

		$this->add_control(
			'right_content_v8_btn_txt', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_content_v8_btn_link', [
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'label_block' 	=> true,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'about_left_content_v9',
			[
				'label'		=> esc_html__( 'About Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '9'],
			]
		);
		$this->add_control(
			'left_v9_title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'left_v9_subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'left_v9_content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'left_content_v9_btn_txt', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'left_content_v9_btn_link', [
				'label' 		=> esc_html__( 'Button Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'left_v9_shape',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_right_content_v9',
			[
				'label'		=> esc_html__( 'About Right Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '9'],
			]
		);

		$this->add_control(
			'ri8_v9_img_one',
			[
				'label' 	=> esc_html__( 'Image One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'ri8_v9_img_two',
			[
				'label' 	=> esc_html__( 'Image Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		
		$this->add_control(
			'hr_v9_tab',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'funfact_v9_title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'funfact_v9_number', [
				'label' 		=> esc_html__( 'Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'funfact_v9_operator', [
				'label' 		=> esc_html__( 'Operator', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		
		$this->add_control(
			'list_right_v9_tab',
			[
				'label' 	=> esc_html__( 'Funfact', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Funfact', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ funfact_v9_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_design_option',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'about_title_option',
			[
				'label' 		=> esc_html__( 'Content Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'about_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .info h2 '=> 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> 
					'{{WRAPPER}} .about-area .info h2','{{WRAPPER}} .about-area .experiecne span',
			]
		);
		$this->add_control(
			'about_content_color',
			[
				'label' 		=> esc_html__( 'Content Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .info p'=> 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_content_typography',
				'label' 		=> esc_html__( 'Content Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .about-area .info p',
			]
		);
		
		$this->add_control(
			'about_list_content_color',
			[
				'label' 		=> esc_html__( 'List Content Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .info ul li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_list_content_typography',
				'label' 		=> esc_html__( 'List Content Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .about-area .info ul li',
			]
		);
		$this->add_control(
			'about_con_num_color',
			[
				'label' 		=> esc_html__( 'Contact Number Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .contact h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_con_num_typography',
				'label' 		=> esc_html__( 'Contact Number Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .about-area .contact h4',
			]
		);
		$this->add_control(
			'about_con_text_color',
			[
				'label' 		=> esc_html__( 'Contact Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .contact span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_con_text_typography',
				'label' 		=> esc_html__( 'Contact Heading ng Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .about-area .contact span',
			]
		);
		$this->add_control(
			'about_btn_color',
			[
				'label' 		=> esc_html__( 'Button Background Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .bottom .button a' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'about_btn_color2',
			[
				'label' 		=> esc_html__( 'Button Background Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-area .info a' => 'background-color: {{VALUE}}',
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		
	$dustra_about_output = $this->get_settings_for_display();
	if($dustra_about_output['style'] == 2){
	?>
    <!-- Start Our About
    ============================================= -->
    <div class="about-area ver-two overflow-hidden shape-box default-padding-top">
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo esc_url($dustra_about_output['svg_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
        </div>
        <!-- End Fixed Shape -->
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-5 thumb-box">
                	<?php if($dustra_about_output['thumb_image_2']['url']): ?>
	                    <div class="thumb">
	                        <img src="<?php echo esc_url($dustra_about_output['thumb_image_2']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
	                    </div>
                	<?php endif;?>
                </div>

                <div class="col-lg-7 info">
                    <h2 class="text-opacity"><?php echo esc_html($dustra_about_output['overlay_heading']); ?></h2>
                     <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_2'])); ?>
                    <?php if(!empty($dustra_about_output['btn_text_2'])):?> 
                    <a class="btn btn-theme effect btn-md" href="<?php echo esc_url($dustra_about_output['btn_link_2']['url']); ?>"><?php echo esc_html($dustra_about_output['btn_text_2']); ?></a>
                	<?php endif;?>
                </div>
                
            </div>
        </div>
        <!-- Shape -->
        <div class="shape-bg">
            <img src="<?php echo esc_url($dustra_about_output['svg_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
        </div>
        <!-- End Shape -->
    </div>
    <!-- End Our About -->


	<?php }elseif($dustra_about_output['style'] == 1){?>
    <!-- Start Our About
    ============================================= -->
    <div class="about-area overflow-hidden shape-box default-padding" >
    	 <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo esc_url($dustra_about_output['svg_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
        </div>
        <!-- End Fixed Shape -->
        <div class="container">
            <div class="about-box">
                <div class="row align-center">
                    <div class="col-lg-6 thumb-left">
                        <div class="thumb">
                        	<?php if(!empty($dustra_about_output['thumb_image']['url'])):?>
                        		<img class="item-mousemove" src="<?php echo esc_url($dustra_about_output['thumb_image']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                            <?php endif;?>		
                           
                            <?php if(!empty($dustra_about_output['thumb_year'] || $dustra_about_output['thumb_content'])): ?>
                            <div class="experiecne">
                                <h2><?php echo esc_html($dustra_about_output['thumb_year']); ?></h2>
                                <h5><?php echo esc_html($dustra_about_output['thumb_content']); ?></h5>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6 info">
                        <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content'])); ?>
                        <div class="bottom">
                        	<?php if(!empty($dustra_about_output['contact_number'])):?>
                            <div class="call">
                                <div class="icon">
                                	<a href="tel:<?php $phone = $dustra_about_output['contact_number']; echo esc_attr(str_replace(' ','',"$phone"));?>">
                                        <?php if(!empty($dustra_about_output['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($dustra_about_output['flat_icon_one']); ?>"></i>
                                    	<?php endif;?>
                                    	<?php if(!empty($dustra_about_output['icon_image_one'])):?>
                                        <img src="<?php echo esc_url($dustra_about_output['icon_image_one']['url']); ?>">
                                    	<?php endif;?>
                                        <div class="contact">
                                            <h4><?php echo esc_html($dustra_about_output['contact_number']); ?></h4>
                                            <span><?php echo esc_html($dustra_about_output['contact_text']); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($dustra_about_output['btn_text'])):?>
	                            <div class="button">
	                                <a class="btn btn-theme effect btn-md" href="<?php echo esc_url($dustra_about_output['btn_link']['url']); ?>"><?php echo esc_html($dustra_about_output['btn_text']); ?></a>
	                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our About -->

	<?php }elseif($dustra_about_output['style'] == 3){?>
	
	<!-- Start About Area
    ============================================= -->
    <div class="about-simple-area default-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 left-info">
                    <h2><?php echo esc_html($dustra_about_output['about_title_three']);?></h2>
                    <ul class="achivement">
                    	<?php 
                    		if(!empty($dustra_about_output['list'])):
                    	    foreach ($dustra_about_output['list'] as $about_fun_fact):?>
	                        <li>
	                            <div class="fun-fact">
	                                <div class="counter">
	                                    <div class="timer" data-to="<?php echo esc_attr($about_fun_fact['funfact_number']);?>" data-speed="5000"><?php echo esc_html($about_fun_fact['funfact_number']);?></div>
	                                    <div class="operator"><?php echo esc_html($about_fun_fact['funfact_prefix']);?></div>
	                                </div>
	                                <span class="medium"><?php echo htmlspecialchars_decode(esc_html($about_fun_fact['funfact_subtitle']));?></span>
	                            </div>
	                        </li>
                    	<?php endforeach; endif;?>
                    </ul>
                </div>
                <div class="col-lg-6 offset-lg-1 right-info">
                    <blockquote><?php echo esc_html($dustra_about_output['right_subtitle_v3']);?></blockquote>
                    <p><?php echo esc_html($dustra_about_output['right_content_v3']);?></p>
                    <?php if(!empty($dustra_about_output['contact_number_v3'])):?>
                    <div class="contact">
                        <a href="tel:<?php $phone = $dustra_about_output['contact_number_v3']; echo esc_attr(str_replace(' ','',"$phone"));?>">
                        	<?php if(!empty($dustra_about_output['flat_icon_v3'])):?>
                        		<div class="icon">
                            		<i class="<?php echo esc_attr($dustra_about_output['flat_icon_v3']); ?>"></i>
                            	</div>
                        	<?php endif;?>
                            <?php if(!empty($dustra_about_output['icon_image_v3'])):?>
                                <img src="<?php echo esc_url($dustra_about_output['icon_image_v3']['url']); ?>">
                            <?php endif;?>
                            <div class="content">
                                <h4><?php echo esc_html($dustra_about_output['contact_number_v3']); ?></h4>
                                <span><?php echo esc_html($dustra_about_output['contact_text_v3']); ?></span>
                            </div>
                        </a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->
	<?php }elseif($dustra_about_output['style'] == 4){?>
	<!-- Start Our About
    ============================================= -->
    <div class="car-about-area overflow-hidden shape-box default-padding">
        <div class="container">
            <div class="about-items">
                <div class="row align-center">
                    <div class="col-lg-6 thumb-left">
                        <div class="thumb">
                        	<?php if(!empty($dustra_about_output['left_v4_img_one']['url'])):?>
                            <img class="wow fadeInDown" data-wow-delay="900ms" src="<?php echo esc_url($dustra_about_output['left_v4_img_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                        	<?php endif;?>
                        	<?php if(!empty($dustra_about_output['left_v4_img_two']['url'])):?>
                            <img class="wow fadeInLeft" src="<?php echo esc_url($dustra_about_output['left_v4_img_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6 info">
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_title_v4']));?></h2>
                        <p><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_v4']));?></p>
                        <ul>
                        	<?php if(!empty($dustra_about_output['list_right_v4'])):?>
                        		<?php foreach($dustra_about_output['list_right_v4'] as $right_featured):?>
		                            <li>
		                                <div class="top">
		                                	<?php if(!empty($right_featured['flat_icon_v4'])):?>
				                        		<div class="icon">
				                            		<i class="<?php echo esc_attr($right_featured['flat_icon_v4']); ?>"></i>
				                            	</div>
				                        	<?php endif;?>
				                        	<?php if(!empty($right_featured['icofont_v4'])):?>
				                        		<div class="icon">
				                            		<i class="<?php echo esc_attr($right_featured['icofont_v4']); ?>"></i>
				                            	</div>
				                        	<?php endif;?>
				                            <?php if(!empty($right_featured['icon_image_v4'])):?>
				                                <img src="<?php echo esc_url($right_featured['icon_image_v4']['url']); ?>">
				                            <?php endif;?>
		                                    <h6><?php echo esc_html($right_featured['featured_title']);?></h6>
		                                </div>
		                                <p><?php echo esc_html($right_featured['featured_subtitle']);?></p>
		                            </li>
	                        	<?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our About -->
	<?php }elseif($dustra_about_output['style'] == 5){?>
	<!-- Start Our About
    ============================================= -->
    <div class="about-area overflow-hidden default-padding">
        <div class="container">
            <div class="about-style-four-layout">
                <div class="row align-center">
                    <div class="col-lg-6">
                        <div class="about-style-four-thumb">
                        	<?php if(!empty($dustra_about_output['left_v5_img']['url'])):?>
                            <img src="<?php echo esc_url($dustra_about_output['left_v5_img']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-style-four-info">
                            <h4><?php echo esc_html($dustra_about_output['right_subtitle_v5']);?></h4>
                            <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_title_v5']));?></h2>
                            <p><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_v5']));?></p>
                            <div class="tab-content">
                                <ul id="tabs" class="nav nav-tabs">
                                <?php if(!empty($dustra_about_output['list_right_v5_tab'])):?>
                        			<?php
                        			$counter=1;
                        			foreach($dustra_about_output['list_right_v5_tab'] as $tab_list):?>	
                                    <li class="nav-item">
                                        <a href="" data-target="#tab<?php echo esc_attr($counter); ?>" data-toggle="tab" class="<?php if($counter == 1) echo esc_attr("active");?> nav-link"><?php echo esc_html($tab_list['tab_name']);?></a>
                                    </li>
	                                <?php $counter++; endforeach; ?>
	                            <?php endif;?>    
                                </ul>
                                <div id="tabsContent" class="tab-content">
                                	<?php
                        				$counter=1;
                        				foreach($dustra_about_output['list_right_v5_tab'] as $tab_list):
                        			?>
                                    <div id="tab<?php echo esc_attr($counter); ?>" class="tab-pane fade <?php if($counter == 1) echo esc_attr("active show");?>">
                                        <?php echo htmlspecialchars_decode(esc_html($tab_list['tab_content']));?>
                                    </div>
	                                <?php $counter++; endforeach; ?>
		                            
                                </div>
                            </div>
                            <a class="btn-regular" href="<?php echo esc_url($dustra_about_output['right_content_v5_btn_link']['url']);?>"><?php echo esc_html($dustra_about_output['right_content_v5_btn_txt']);?> <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our About -->
    <?php }elseif($dustra_about_output['style'] == 6){?>
    <!-- Start About Area
    ============================================= -->
    <div class="about-area">
        <div class="container">
            <div class="about-style-three-box">
                <div class="shape">
                    <img src="<?php echo esc_url($dustra_about_output['left_v6_img_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                </div>
                <div class="row">
                    <div class="col-lg-6 about-style-three">
                        <div class="thumb">
                            <?php if(!empty($dustra_about_output['left_v6_img_one']['url'])):?>
                            <img src="<?php echo esc_url($dustra_about_output['left_v6_img_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                            <?php endif;?>
                            <?php if(!empty($dustra_about_output['left_v6_years'] || $dustra_about_output['left_v6_years_title'] )): ?>
                            <div class="experience">
                                <h2>
                                    <strong><?php echo esc_html($dustra_about_output['left_v6_years']);?></strong>
                                    <?php echo esc_html($dustra_about_output['left_v6_years_title']);?>
                                </h2>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6 about-style-three content-right">
                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_subtitle_v6']));?></h4>
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_title_v6']));?></h2>
                        <p>
                            <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_v6']));?>
                        </p>
                        <?php if(!empty($dustra_about_output['list_right_v6_tab'])):
                			foreach($dustra_about_output['list_right_v6_tab'] as $feature_list):?>
	                        <div class="award">
	                            <div class="icon">
	                                <?php if(!empty($feature_list['flat_icon_v6'])):?>
		                        		<div class="icon">
		                            		<i class="<?php echo esc_attr($feature_list['flat_icon_v6']); ?>"></i>
		                            	</div>
		                        	<?php endif;?>
		                        	<?php if(!empty($feature_list['icofont_v6'])):?>
		                        		<div class="icon">
		                            		<i class="<?php echo esc_attr($feature_list['icofont_v6']); ?>"></i>
		                            	</div>
		                        	<?php endif;?>
		                            <?php if(!empty($feature_list['icon_image_v6'])):?>
		                                <img src="<?php echo esc_url($feature_list['icon_image_v6']['url']); ?>">
		                            <?php endif;?>
	                            </div>
	                            <div class="info">
	                                <h5> <?php echo htmlspecialchars_decode(esc_html($feature_list['feature_heading']));?></h5>
	                                <p>
	                                    <?php echo htmlspecialchars_decode(esc_html($feature_list['feature_subheading']));?>
	                                </p>
	                            </div>
	                        </div>
	                    <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->
    <?php }elseif($dustra_about_output['style'] == 7){?>
    <!-- Start About
    ============================================= -->
    <div class="about-style-four-area">
        <div class="container">
            <div class="row align-center">
                <div class="about-style-four col-lg-6">
                    <div class="thumb">
                    	<?php if(!empty($dustra_about_output['left_v7_img_one']['url'])):?>
                        	<img src="<?php echo esc_url($dustra_about_output['left_v7_img_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                    	<?php endif;?>
                    	<?php if(!empty($dustra_about_output['left_v7_img_two']['url'])):?>
                        <img src="<?php echo esc_url($dustra_about_output['left_v7_img_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                        <?php endif;?>
                    </div>
                </div>
                <div class="about-style-four col-lg-6">
                    <h4><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_subtitle_v7']));?></h4>
                    <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_title_v7']));?></h2>
                    <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_v7']));?>
                    <?php if(!empty($dustra_about_output['right_content_v7_btn_txt'])):?>
                    <a class="btn btn-dark theme btn-md" href="<?php echo esc_url($dustra_about_output['right_content_v7_btn_link']['url']);?>"><?php echo esc_html($dustra_about_output['right_content_v7_btn_txt']); ?></a>
                	<?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->	
	<?php }elseif($dustra_about_output['style'] == 8){?>
	<!-- Start About
    ============================================= -->
    <div class="about-style-five-area">
        <div class="container">
            <div class="row align-center">
            	<?php if(!empty($dustra_about_output['left_v8_img']['url'])):?>
                <div class="about-style-five col-lg-5">
                    <div class="thumb">
                        <img src="<?php echo esc_url($dustra_about_output['left_v8_img']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                    </div>
                </div>
                <?php endif;?>
                <div class="about-style-five col-lg-6 offset-lg-1">
                    <h4><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_subtitle_v8']));?></h4>
                    <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_title_v8']));?></h2>
                     <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['right_content_v8']));?>
                    <ul>
                    	<?php foreach ($dustra_about_output['list_right_v8_tab'] as $single_about_v8):?>
                        <li>
                            <?php if(!empty($single_about_v8['flat_icon_v8'])):?>
                        		<div class="icon">
                            		<i class="<?php echo esc_attr($single_about_v8['flat_icon_v8']); ?>"></i>
                            	</div>
                        	<?php endif;?>
                        	<?php if(!empty($single_about_v8['icofont_v8'])):?>
                        		<div class="icon">
                            		<i class="<?php echo esc_attr($single_about_v8['icofont_v8']); ?>"></i>
                            	</div>
                        	<?php endif;?>
                            <?php if(!empty($single_about_v8['icon_image_v8'])):?>
                                <img src="<?php echo esc_url($single_about_v8['icon_image_v8']['url']); ?>">
                            <?php endif;?>
                            <div class="content">
                                <h5><?php echo htmlspecialchars_decode(esc_html($single_about_v8['facility_heading_v8']));?></h5>
                            </div>
                        </li>
                    	<?php endforeach;?>
                    </ul>
                    <?php if(!empty($dustra_about_output['right_content_v8_btn_txt'])):?>
                    	<a class="btn btn-dark theme btn-md" href="<?php echo esc_url($dustra_about_output['right_content_v8_btn_link']['url']);?>"><?php echo esc_html($dustra_about_output['right_content_v8_btn_txt']); ?></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->
    <?php }elseif($dustra_about_output['style'] == 9){?>
    <!-- Start About Area 
    ============================================= -->
    <div class="about-style-ten-area default-padding-bottom">
    	<?php if(!empty($dustra_about_output['left_v9_shape']['url'])):?>
	        <div class="shape-bottom-left">
	            <img src="<?php echo esc_url($dustra_about_output['left_v9_shape']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
	        </div>
    	<?php endif;?>
        <div class="container">
            <div class="row">

                <div class="col-lg-5 about-style-ten">
                    <div class="info">
                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['left_v9_subtitle'],'dustra-core')); ?></h4>
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_about_output['left_v9_title'],'dustra-core')); ?></h2>
                        <p>
                            <?php echo htmlspecialchars_decode(esc_html($dustra_about_output['left_v9_content'],'dustra-core')); ?>
                        </p>
                        <?php if(!empty($dustra_about_output['left_content_v9_btn_txt'])):?>
                        <a class="btn circle btn-theme effect btn-md" href="<?php echo esc_url($dustra_about_output['left_content_v9_btn_link']['url']); ?>"><?php echo esc_html($dustra_about_output['left_content_v9_btn_txt']); ?></a>
                    	<?php endif;?>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1 about-style-ten">
                    <div class="thumb">
                    	<?php if(!empty($dustra_about_output['ri8_v9_img_one']['url'])):?>
                        	<img src="<?php echo esc_url($dustra_about_output['ri8_v9_img_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                    	<?php endif;?>
                    	<?php if(!empty($dustra_about_output['ri8_v9_img_two']['url'])):?>
                        	<img src="<?php echo esc_url($dustra_about_output['ri8_v9_img_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                        <?php endif;?>
                        <div class="achivement">
                        	<?php foreach ($dustra_about_output['list_right_v9_tab'] as $single_about_v9):?>
	                            <div class="fun-fact">
	                                <div class="counter">
	                                    <div class="timer" data-to="<?php echo esc_attr($single_about_v9['funfact_v9_number']);?>" data-speed="5000"><?php echo esc_html($single_about_v9['funfact_v9_number']);?></div>
	                                    <div class="operator"><?php echo esc_html($single_about_v9['funfact_v9_operator']);?></div>
	                                </div>
	                                <span class="medium"><?php echo esc_html($single_about_v9['funfact_v9_title']);?></span>
	                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End About -->	
    <?php }		
    }
}