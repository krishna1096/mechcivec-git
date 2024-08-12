<?php
	/**
	* Elementor Clients Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Clients_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Clients widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'clients';
	}

	/**
	* Get widget title.
	*
	* Retrieve Clients widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Clients', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Clients widget icon.
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
	* Retrieve the list of categories the Clients widget belongs to.
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
			'section_content',
			[
				'label'		=> esc_html__( 'Set Content','dustra-core' ),
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
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> esc_html__( 'Clients Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Clients Title', 'dustra-core' ),
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'description',
			[
				'label' 		=> esc_html__( 'Clients Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Clients Title', 'dustra-core' ),
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'client_shape_img',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/1.png',
				],
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'image',
			[
				'label'			=> esc_html__( 'Clients Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => get_template_directory_uri().'/assets/img/map.svg',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Clients', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Clients', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Clients', 'dustra-core' ),
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'clients_design',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'clients_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'Clients_title_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .clients-area  h2',
			]
		);
		$this->add_control(
			'clients_title_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'clients_title_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'clients_number_color',
			[
				'label' 		=> esc_html__( 'Clients Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'Clients_number_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .clients-area  p',
			]
		);
		$this->add_control(
			'clients_number_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'clients_number_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .clients-area  p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		
	$dustra_clients_output = $this->get_settings_for_display();
	if($dustra_clients_output['style'] == 1):
?>

	<!-- Start Clients Area
    ============================================= -->
    <div class="clients-area default-padding bg-dark text-light">
    	<?php if(!empty($dustra_clients_output['client_shape_img']['url'])):?>
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="<?php echo esc_url($dustra_clients_output['client_shape_img']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
        </div>
    	<?php endif;?>
        <!-- End Fixed Shape -->
        <div class="container">
            <div class="clients-item-box">
                <div class="row align-center">
                    <div class="col-lg-5 left-info">
                        <h2><?php  echo esc_html($dustra_clients_output['title']);?></h2>
                        <p>
                            <?php  echo esc_html($dustra_clients_output['description']);?>
                        </p>
                    </div>
                    <div class="col-lg-6 offset-lg-1 clients-box">
                        <div class="clients-items owl-carousel owl-theme text-center">
                            <?php 
								if( !empty( $dustra_clients_output['list'] ) ):
								
									foreach( $dustra_clients_output['list'] as $single_value ):
							?>
	                            <div class="single-item">
	                                <a href="<?php echo esc_url( $single_value['image']['url']);  ?>"><img src="<?php echo esc_url( $single_value['image']['url']);  ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>"></a>
	                            </div>
	                        <?php
								endforeach;
								endif;
						    ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->
    <?php elseif($dustra_clients_output['style'] == 2): ?>
    	<!-- Start Partner
    ============================================= -->
    <div class="partner-style-two-area">
        <div class="container">
            <div class="brand-carousel owl-carousel owl-theme">
            	<?php 
					foreach( $dustra_clients_output['list'] as $single_value ):
				?>
                <div class="item">
                    <img src="<?php echo esc_url( $single_value['image']['url']);  ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                </div>
                <?php
					endforeach;
			    ?>
            </div>
        </div>
    </div>
    <!-- End Partner -->
	<?php endif;?>
	<?php }
}