<?php
	/**
	* Elementor Team Member Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Team_Member_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Team Member widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'teammember';
	}

	/**
	* Get widget title.
	*
	* Retrieve Team Member widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Team Member', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Team Member widget icon.
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
	* Retrieve the list of categories the Team Member widget belongs to.
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
			'section_heading',
			[
				'label'		=> esc_html__( 'Section Heading','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_show',
			[
				'label' => __( 'Show/Hide Section Heading', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'dustra-core' ),
				'label_off' => __( 'Hide', 'dustra-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'section_description',
			[
				'label' 		=> esc_html__( 'Section Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label'		=> esc_html__( 'Set Team Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'team_style',
			[
				'label' 	=> esc_html__( 'Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> esc_html__( 'Style One', 'dustra-core' ),
					'2' 		=> esc_html__( 'Style Two', 'dustra-core' ),
				],
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__( 'Post Limit', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( 'Only Number Work. Like 4 or 6', 'dustra-core' ),
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> esc_html__( 'Order', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> esc_html__( 'Ascending', 'dustra-core' ),
					'DESC' 			=> esc_html__( 'Descending', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'order_by',
			[
				'label' 		=> esc_html__( 'Order By', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> esc_html__( 'None', 'dustra-core' ),
					'type' 			=> esc_html__( 'Type', 'dustra-core' ),
					'title' 		=> esc_html__( 'Title', 'dustra-core' ),
					'name' 			=> esc_html__( 'Name', 'dustra-core' ),
					'date' 			=> esc_html__( 'Date', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'con_length',
			[
				'label' 		=> esc_html__( 'Content Length', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( '20', 'dustra-core' ),
				'default' 		=> '20',
			]
		);
	    
	    $this->add_control(
			'show_bac_shape',
			[
				'label' => __( 'Show Background Shape', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'dustra-core' ),
				'label_off' => __( 'Hide', 'dustra-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'team_shape',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/4.svg',
				],
				'condition' 	=> ['show_bac_shape' => 'yes'],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label'			=> esc_html__( 'Heading Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_section_margin',
			[
				'label' 		=> esc_html__( 'Heading Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'heading_section_padding',
			[
				'label' 		=> esc_html__( 'Heading Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'heading_title_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h2',
			]
		);
		$this->add_control(
			'heading_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_subtitle_color',
			[
				'label' 		=> esc_html__( 'Subtitle Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h4',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'heading_subtitle_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h4',
			]
		);
		$this->add_control(
			'heading_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_description_color',
			[
				'label' 		=> esc_html__( 'Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'heading_description_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading p',
			]
		);

		$this->end_controls_section();
	
		$this->start_controls_section(
			'design_option',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'team_option',
			[
				'label' 		=> esc_html__( 'Member Name Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' 		=> esc_html__( 'Team Member Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info h4, .team-items .overlay a h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'name_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .team-items .info h4',
			]
		);
		
		$this->add_control(
			'name_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'name_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'designation_option',
			[
				'label' 		=> esc_html__( 'Designation Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'designation_color',
			[
				'label' 		=> esc_html__( 'Designation Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'designation_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .team-items .info span',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'designation_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .team-items .info span',
			]
		);
		$this->add_control(
			'designation_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'designation_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .overlay p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'description_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .team-items .overlay p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'description_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .team-items .overlay p',
			]
		);
		$this->add_control(
			'description_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .overlay p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'description_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .overlay p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_icon_option',
			[
				'label' 		=> esc_html__( 'Social Icon Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		
		$this->add_control(
			'social_icon_style',
			[
				'label' 		=> esc_html__( 'Icon Normal And Hover', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::CHOOSE,
				'options' 		=> [
					'normal' 		=> [
						'title' 	=> esc_html__( 'Normal', 'dustra-core' ),
						'icon'  	=> 'fa fa-user',
					],
					'hover' 		=> [
						'title' 	=> esc_html__( 'Hover', 'dustra-core' ),
						'icon'  	=> 'fa fa-cloud',
					],
				],
				'default' 		=> 'normal',
				'toggle' 		=> true,
			]
		);
		$this->add_control(
			'first_icon_color',
			[
				'label' 		=> esc_html__( 'First Icon Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .facebook i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'second_icon_color',
			[
				'label' 		=> esc_html__( 'Second Icon Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .twitter i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'third_icon_color',
			[
				'label' 		=> esc_html__( 'Third Icon Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .instagram i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'first_icon_color_hover',
			[
				'label' 		=> esc_html__( 'First Icon Color On Hover', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .facebook i:hover' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'social_icon_style'	=>	'hover' ],
			]
		);
		$this->add_control(
			'second_icon_color_hover',
			[
				'label' 		=> esc_html__( 'Second Icon Color On Hover', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .twitter i:hover' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'social_icon_style'	=>	'hover' ],
			]
		);
		$this->add_control(
			'third_icon_color_hover',
			[
				'label' 		=> esc_html__( 'Third Icon Color On Hover', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social .instagram i:hover' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'social_icon_style'	=>	'hover' ],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'social_icon_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .social li a i',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'social_icon_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .social li a i',
			]
		);
		$this->add_control(
			'social_icon_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .social li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_icon_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .social li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		
		$dustra_team_output = $this->get_settings_for_display();
		$teams = array(
		   'post_type'         => 'dustra-team',
		   'posts_per_page'    => esc_attr( $dustra_team_output['post_limit'] ),
		   'order'             => esc_attr( $dustra_team_output['order'] ),
		   'orderby'           => esc_attr( $dustra_team_output['order_by'] ),
	    );
	    
		if($dustra_team_output['team_style'] == 1){
		?>
		<!-- Start Team Area 
	    ============================================= -->
	    <div class="team-area">
	        
	        <?php if($dustra_team_output['show_bac_shape'] == 'yes'):?>
	        <!-- Fixed Shape  -->
	        <div class="fixed-shape">
	            <img src="<?php echo esc_url($dustra_team_output['team_shape']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
	        </div>
	        <!-- End Fixed Shape  -->
	        <?php endif;?>
	        <div class="container">
	        	<?php if($dustra_team_output['section_show'] == 'yes'): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                       <div class="site-heading text-center">
		                    	<?php if(!empty($dustra_team_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_team_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_team_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_team_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_team_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_team_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
	                    </div>
	                </div>
	            </div>
	            <?php endif;?>
	            <div class="team-items text-center">
	                <div class="row">

	                	<?php 
						$teams = new WP_Query( $teams );
						if( $teams->have_posts() ):
							while( $teams->have_posts() ):
								$teams->the_post();
						$designation = get_post_meta( get_the_ID(), '_designation', true );
						$facebook = get_post_meta( get_the_ID(), '_facebook', true );
						$twitter = get_post_meta( get_the_ID(), '_twitter', true );
						$youtube = get_post_meta( get_the_ID(), '_youtube', true );	
					    ?>
	                    <!-- Single Item -->
	                    <div class="col-lg-4 col-md-6 single-item">
	                        <div class="item">
	                            <div class="thumb">
	                            	<?php if( has_post_thumbnail() ){ ?>
			                            <div class="thumb">
											<?php the_post_thumbnail(); ?>
			                            </div>
		                            <?php } ?>
	                                <div class="info">
	                                    <a href="<?php echo get_the_permalink();?>"><h4><?php echo esc_html(get_the_title()); ?></h4></a>
	                                    <span><?php echo esc_html($designation); ?></span>
	                                </div>
	                                <div class="overlay text-light">
	                                    <a href="<?php echo get_the_permalink();?>"><h4><?php echo esc_html(get_the_title()); ?></h4></a>
		                                <p><?php echo esc_html(wp_trim_words(get_the_content(), $dustra_team_output['con_length'],'')); ?></p>
	                                    <ul>		                                    <li class="facebook">
		                                        <a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
		                                    </li>
		                                    <li class="twitter">
		                                        <a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
		                                    </li>
		                                    <li class="youtube">
		                                        <a href="<?php echo esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a>
		                                    </li>
		                                </ul>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
	                    <?php 
	                        
		                    endwhile;
							wp_reset_postdata();
							endif;
	                    ?> 
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End Team Area -->

	    <?php }else{?>

		<!-- Start Team Area 
	    ============================================= -->
        <div class="team-area carousel-shadow default-padding bottom-less bg-gray">
	        <div class="container">
	        	<?php if($dustra_team_output['section_show'] == 'yes'): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                       <div class="site-heading text-center">
		                    	<?php if(!empty($dustra_team_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_team_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_team_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_team_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_team_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_team_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
	                    </div>
	                </div>
	            </div>
	            <?php endif;?>
	            <div class="team-items text-center">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="team-carousel owl-carousel owl-theme">
	                        	<?php 
									$teams = new WP_Query( $teams );
									if( $teams->have_posts() ):
										$counter=1;
										while( $teams->have_posts() ):
											$teams->the_post();
									$designation = get_post_meta( get_the_ID(), '_designation', true );
									$facebook = get_post_meta( get_the_ID(), '_facebook', true );
									$twitter = get_post_meta( get_the_ID(), '_twitter', true );
									$youtube = get_post_meta( get_the_ID(), '_youtube', true );	
								?>
	                            <!-- Single Item -->
	                            <div class="item">
	                                <div class="thumb">
	                                    <?php if( has_post_thumbnail( ) ){ ?>
											<?php the_post_thumbnail(); ?>
			                            <?php } ?>
	                                    <div class="info">
		                                    <a href="<?php echo get_the_permalink();?>"><h4><?php echo esc_html(get_the_title()); ?></h4></a>
	                                        <span><?php echo esc_html($designation); ?></span>
		                                </div>
	                                    <div class="overlay text-light">
	                                        <a href="<?php echo get_the_permalink();?>"><h4><?php echo esc_html(get_the_title());?></h4></a>
		                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), $dustra_team_output['con_length'],'')); ?></p>
	                                        <ul>		                                    <li class="facebook">
		                                        <a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
		                                    </li>
		                                    <li class="twitter">
		                                        <a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
		                                    </li>
		                                    <li class="youtube">
		                                        <a href="<?php echo esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a>
		                                    </li>
		                                </ul>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- End Single Item -->
	                            <?php 
				                    endwhile;
									wp_reset_postdata();
									endif;
			                    ?> 
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- End Team Area -->
	<?php }
    }
}
?>