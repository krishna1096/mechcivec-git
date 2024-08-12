<?php
	/**
	* Elementor Featured Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Featured_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve featured widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'featured';
	}

	/**
	* Get widget title.
	*
	* Retrieve featured widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Featured', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve featured widget icon.
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

	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'featured_content',
			[
				'label'		=> esc_html__( 'featured Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image_one',
			[
				'label' 	=> esc_html__( 'Image One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image_two',
			[
				'label' 	=> esc_html__( 'Image Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'year', [
				'label' 		=> esc_html__( 'Year', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'heading',
			[
				'label' 		=> esc_html__( 'Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'featured_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Featured Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'featured_heading_title_color',
			[
				'label' 		=> esc_html__( 'Heading Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-item h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'featured_heading_title_typography',
				'label' 		=> esc_html__( 'Heading Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .feature-item h2',
			]
		);
		$this->add_control(
			'featured_years_color',
			[
				'label' 		=> esc_html__( 'Years Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-item strong' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'featured_years_typography',
				'label' 		=> esc_html__( 'Years Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .feature-item strong',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$dustra_featured_output = $this->get_settings_for_display();
	?>
    <!-- Start Feature Area
    ============================================= -->
    <div class="default-padding-top our-features-area">
        <div class="container-full">
            <div class="feature-item text-light">
                <div class="row">
                    <div class="col-lg-3 col-md-6 thumb" style="background-image: url(<?php echo esc_url($dustra_featured_output['image_one']['url']); ?>);"></div>
                    <div class="col-lg-3 col-md-6 info">
                        <h2><strong><?php echo esc_html($dustra_featured_output['year']); ?></strong> <?php echo esc_html($dustra_featured_output['content']); ?></h2>
                    </div>
                    <div class="col-lg-3 col-md-6 thumb" style="background-image: url(<?php echo esc_url($dustra_featured_output['image_two']['url']); ?>);"></div>
                    <div class="col-lg-3 col-md-6 info">
                        <h2><?php echo esc_html($dustra_featured_output['heading']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature -->
	<?php 
	}
}
?>