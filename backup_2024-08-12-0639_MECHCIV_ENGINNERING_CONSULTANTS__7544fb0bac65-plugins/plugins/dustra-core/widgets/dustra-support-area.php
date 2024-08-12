<?php
	/**
	* Elementor Support Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Support_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Support widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'support';
	}

	/**
	* Get widget title.
	*
	* Retrieve Support widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Support', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Support widget icon.
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
	* Retrieve the list of categories the Slider widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'dustra-elements' ];
	}

	public function get_script_depends() {
		return [ 'mainjs' ];
	}
	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'Support_content',
			[
				'label'		=> esc_html__( 'Support Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' 		=> esc_html__( 'Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type heading', 'dustra-core' ),
			]
		);
		$this->add_control(
			'video_url',
			[
				'label' 		=> esc_html__( 'Video URL', 'dustra-core' ),
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
		$this->add_control(
			'video_txt', [
				'label' 		=> esc_html__( 'Video Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/13.png',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'support_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Support Design Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Heading Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quick-support-area h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Heading Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .quick-support-area h2',
			]
		);

		$this->add_control(
			'subheading_title_color',
			[
				'label' 		=> esc_html__( 'Sub-Heading Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quick-support-area a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subheading_title_typography',
				'label' 		=> esc_html__( 'Sub-Heading Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .quick-support-area a',
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 		=> esc_html__( 'Video Button Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quick-support-area .video-btn i,{{WRAPPER}} .quick-support-area .video-btn i::after' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$dustra_support_output = $this->get_settings_for_display();
	?>

	<!-- Start Quick Support Area 
    ============================================= -->
    <div class="quick-support-area text-center">
        <div class="container">
            <div class="quick-support-box">
                <!-- Fixed Shape -->
                <div class="fixed-shape" style="background-image: url(<?php echo esc_url($dustra_support_output['svg_one']['url']); ?>);"></div>
                <!-- Fixed Shape -->
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h2><?php echo esc_html($dustra_support_output['heading']); ?></h2>
                        <a href="<?php echo esc_url($dustra_support_output['video_url']['url']); ?>" class="popup-youtube video-btn"><i class="fas fa-play"></i><?php echo esc_html($dustra_support_output['video_txt']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick Support Area -->
	<?php 
	}
}
?>