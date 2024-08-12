<?php
	/**
	* Elementor Steps Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Workprocess_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Steps widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'workprocess';
	}

	/**
	* Get widget title.
	*
	* Retrieve Steps widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Workprocess Step', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Steps widget icon.
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
	* Retrieve the list of categories the Steps widget belongs to.
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
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'section_description',
			[
				'label' 		=> esc_html__( 'Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'expert_content',
			[
				'label'		=> esc_html__( 'Work-Process Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Workprocess Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'dustra-core' ),
					'2' 	=> esc_html__( 'Style Two', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'column',
			[
				'label' 	=> esc_html__( 'Column Type', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '4',
				'options' 	=> [
					'3' 	=> esc_html__( 'Four Column', 'dustra-core' ),
					'4'  	=> esc_html__( 'Three Column', 'dustra-core' ),
					
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type title', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type content', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'dustra-core' ),
					'2' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
					'3' 	=> esc_html__( 'Custom Icon', 'cleanu-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'dustra-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => dustra_flaticons(),
                'include'    => dustra_include_flaticons(),
                'default'    => 'flaticon-creativity',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);
		$repeater->add_control(
            'custom_icon',
            [
                'label'         => esc_html__( 'Add Custom Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_style' => '3'
                ]
            ]
        );
		

		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Work-Process', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Work-Process', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'workproces_title_style',
			[
				'label'			=> esc_html__( 'Heading Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
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

		$this->end_controls_section();
		
		$this->start_controls_section(
			'workprocess_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'process_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .item-inner h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'process_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .item-inner h4',
			]
		);
		
		$this->add_control(
			'title_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'process_description_color',
			[
				'label' 		=> esc_html__( 'Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .item-inner p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'process_description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .item-inner p',
			]
		);
		$this->add_control(
			'icon_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'workp_icon_color',
			[
				'label' 		=> esc_html__( 'Icon Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-area .work-pro-items .item i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'workp_box_color',
			[
				'label' 		=> esc_html__( 'Box Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-area .work-pro-items .item::before, .work-process-area .work-pro-items .item::after, {{WRAPPER}} .work-process-area .work-pro-items .item .item-inner::before, .work-process-area .work-pro-items .item .item-inner::after ' => 'background-color: {{VALUE}}',
				],
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$dustra_workprocess_output = $this->get_settings_for_display();
	?>
	<?php if($dustra_workprocess_output['style'] == 1):?>
    <!-- Start Work Porccess 
    ============================================= -->
    <div class="work-process-area inc-img relative default-padding bottom-less bg-fixed" style="background-image: url(<?php echo get_template_directory_uri()?>/assets/img/bg.png);" id="workprocess">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <?php 
                        	if(!empty($dustra_workprocess_output['section_subtitle'])): ?>
		                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_subtitle']));?></h4>
		                    <?php endif;?>
		                    <?php if(!empty($dustra_workprocess_output['section_title'])): ?>
		                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_title']));?></h2>
		                    <?php endif;?>
							<?php if(!empty($dustra_workprocess_output['section_description'])): ?>
		                        <p><?php echo  htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_description']));?></p>
			                <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="work-pro-items">
                <div class="row">
                	<?php
						if( !empty( $dustra_workprocess_output['list'] ) ):
							foreach( $dustra_workprocess_output['list'] as $single_value ):
					?>
                    <div class="col-lg-<?php echo esc_attr($dustra_workprocess_output['column']);?> col-md-6 single-item">
                        <div class="item">
                            <div class="item-inner">
                                <?php if(!empty($single_value['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($single_value['flat_icon_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_value['icon_image_one'])):?>
                                    	<img src="<?php echo esc_url($single_value['icon_image_one']['url']); ?>">
                                <?php endif;?>
                                <?php if(!empty($single_value['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_value['custom_icon']); ?>"></i>
	                            <?php endif;?>
                                <?php if(!empty($single_value['title'])): ?>    
                                	<h4><?php echo htmlspecialchars_decode(esc_html($single_value['title'])); ?></h4>
                                <?php endif;?>
                                <p>
                                    <?php echo htmlspecialchars_decode(esc_html($single_value['content'])); ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
						endforeach;
						endif;
					?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Work Porccess -->
	<?php else: ?>
	<!-- Start Work Porccess 
    ============================================= -->
    <div class="work-process-area relative default-padding bottom-less bg-fixed" style="background-image: url(<?php echo get_template_directory_uri()?>/assets/img/bg.png);" id="workprocess">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <?php 
                        	if(!empty($dustra_workprocess_output['section_subtitle'])): ?>
		                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_subtitle']));?></h4>
		                    <?php endif;?>
		                    <?php if(!empty($dustra_workprocess_output['section_title'])): ?>
		                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_title']));?></h2>
		                    <?php endif;?>
							<?php if(!empty($dustra_workprocess_output['section_description'])): ?>
		                        <p><?php echo  htmlspecialchars_decode(esc_html($dustra_workprocess_output['section_description']));?></p>
		                <?php
		                     endif;
		                ?>
                    </div>
                </div>
            </div>
            <div class="work-pro-items">
                <div class="row">
                	<?php
						$counter=1;
						if( !empty( $dustra_workprocess_output['list'] ) ):
							foreach( $dustra_workprocess_output['list'] as $single_value ):
					?>
	                    <div class="col-lg-<?php echo esc_attr($dustra_workprocess_output['column']);?> col-md-6 single-item">
	                        <div class="item">
	                            <div class="item-inner">
	                               <?php if(!empty($single_value['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($single_value['flat_icon_one']); ?>"></i>
                                    <?php endif;?>
                                    <?php if(!empty($single_value['icon_image_one'])):?>
                                        <img src="<?php echo esc_url($single_value['icon_image_one']['url']); ?>">
                                    <?php endif;?>
                                    <?php if(!empty($single_value['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_value['custom_icon']); ?>"></i>
	                                 <?php endif;?>
                                    <?php if(!empty($single_value['title'])): ?>
		                                <h4>
		                                	<?php echo htmlspecialchars_decode(esc_html($single_value['title'])); ?><span><?php echo '0'.$counter; ?></span>
		                                </h4>
	                                <?php
					                    endif;
					                ?>
	                                <?php if(!empty($single_value['content'])): ?>
	                                    <p>
	                                    	<?php echo htmlspecialchars_decode(esc_html($single_value['content'])); 
	                                    	?>
	                                    </p>
	                                <?php
					                    endif;
					                ?>
	                            </div>
	                        </div>
	                    </div>
                    <?php
                        $counter++;
						endforeach;
						endif;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work Porccess -->
	<?php endif; ?>
	<?php
	}
}