<?php
	/**
	* Elementor Steps Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Consulting_Widget extends \Elementor\Widget_Base {

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
		return 'consulting';
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
		return esc_html__( 'Consulting', 'dustra-core' );
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
			'section_style',
			[
				'label'		=> esc_html__( 'Section Style','dustra-core' ),
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
		$this->end_controls_section();

		$this->start_controls_section(
			'left_content',
			[
				'label'		=> esc_html__( 'Left Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'description', [
				'label' 		=> esc_html__( 'Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type description', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		

		$this->add_control(
			'content_list',
			[
				'label' 	=> esc_html__( 'Content List', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Content List', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Content List', 'dustra-core' ),
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
			'number', [
				'label' 		=> esc_html__( 'Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type number', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'prefix', [
				'label' 		=> esc_html__( 'Prefix', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type prefix', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'funfact_list',
			[
				'label' 	=> esc_html__( 'Funfact List', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Funfact List', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Funfact List', 'dustra-core' ),
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'right_content',
			[
				'label'		=> esc_html__( 'Right Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '1'],
			]
		);
		
		$this->add_control(
			'image',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'title',
			[
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type title', 'dustra-core' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__( 'Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type subtitle', 'dustra-core' ),
			]
		);

		$this->add_control(
			'btn_text', [
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default'       => esc_html__( 'Read More', 'dustra-core' ),

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
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'right_content_v2',
			[
				'label'		=> esc_html__( 'Right Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '2'],
			]
		);
		
		$this->add_control(
			'image_v2',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
        
        $this->add_control(
			'title_v2',
			[
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type title', 'dustra-core' ),
			]
		);

		$this->add_control(
			'subtitle_v2',
			[
				'label' 		=> esc_html__( 'Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type subtitle', 'dustra-core' ),
			]
		);

		$this->add_control(
			'estimate_sc',
			[
				'label' 		=> esc_html__( 'Shortcode', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'con_setting',
			[
				'label'		=> esc_html__( 'Setting','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'con_shadow',
			[
				'label' => __( 'Shadow', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'dustra-core' ),
				'label_off' => __( 'Hide', 'dustra-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'consulting_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'consulting_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'consulting_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area h2',
			]
		);
		
		$this->add_control(
			'consulting_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'consulting_description_color',
			[
				'label' 		=> esc_html__( 'Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .right-info p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .right-info p',
			]
		);
		
        $this->add_control(
			'item_title_option',
			[
				'label' 		=> esc_html__( 'Item Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'consulting_li_title_color',
			[
				'label' 		=> esc_html__( 'Item Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .item h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_li_title_typography',
				'label' 		=> esc_html__( 'Item Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .item h4',
			]
		);
		
        $this->add_control(
			'consulting_li_description_color',
			[
				'label' 		=> esc_html__( 'Item Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .item p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_li_description_typography',
				'label' 		=> esc_html__( 'Item Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .item p',
			]
		);
		
		$this->add_control(
			'consulting_btn_option',
			[
				'label' 		=> esc_html__( 'Button Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'consulting_btn_color',
			[
				'label' 		=> esc_html__( 'Button Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .right-info a' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_btn_typography',
				'label' 		=> esc_html__( 'Button Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .right-info a',
			]
		);

		$this->add_control(
			'funfact_title_option',
			[
				'label' 		=> esc_html__( 'Funfact Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'consulting_funfact_title_color',
			[
				'label' 		=> esc_html__( 'Funfact Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .achivement .counter' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_funfact_title_typography',
				'label' 		=> esc_html__( 'Funfact Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .achivement .counter',
			]
		);
		
        $this->add_control(
			'consulting_funfact_description_color',
			[
				'label' 		=> esc_html__( 'Funfact Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consulting-area .achivement .medium' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'consulting_funfact_description_typography',
				'label' 		=> esc_html__( 'Funfact Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .consulting-area .achivement .medium',
			]
		);

		$this->end_controls_section();
		
	}

	// Output For User
	protected function render(){
	$dustra_consulting_output = $this->get_settings_for_display();
	if($dustra_consulting_output['style'] == 1):
	?>
	<!-- Start Consulting Area
    ============================================= -->
    <div class="consulting-area <?php if($dustra_consulting_output['con_shadow'] == 'yes'){echo esc_attr__("shadow",'dustra-core');}else{echo esc_attr__("shadow-less",'dustra-core');} ?> relative">
        <div class="container">
            <div class="inner-items">
                <div class="row">
                    <div class="col-lg-6 text-light left-info">
                        <?php
							if( !empty( $dustra_consulting_output['content_list'] ) ):
								foreach( $dustra_consulting_output['content_list'] as $single_value ):
						?>
	                        <div class="item">
	                            <h4>
	                            	<?php echo esc_html($single_value['title'],'dustra-core');?>
	                            </h4>
	                            <p>
	                            	<?php echo esc_html($single_value['description'],'dustra-core');?>	
	                            </p>
	                        </div>
                        <?php endforeach; endif; ?>   
                        
                        <ul class="achivement">
                        	<?php
							if( !empty( $dustra_consulting_output['funfact_list'] ) ):
								foreach( $dustra_consulting_output['funfact_list'] as $single_value ):
						    ?>
                            <li>
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="<?php echo esc_html($single_value['number'],'dustra-core');?>" data-speed="5000"><?php echo esc_html($single_value['number'],'dustra-core');?></div>
                                        <div class="operator"><?php echo esc_html($single_value['prefix'],'dustra-core');?></div>
                                    </div>
                                    <span class="medium"><?php echo esc_html($single_value['title'],'dustra-core');?></span>
                                </div>
                            </li>
                            <?php endforeach; endif; ?> 
                        </ul>
                    </div>
                    <div class="col-lg-6 right-info" style="background-image: url(<?php echo esc_url($dustra_consulting_output['image']['url']); ?>);">
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_consulting_output['title'])); ?></h2>
                        <p>
                           <?php echo htmlspecialchars_decode(esc_html($dustra_consulting_output['subtitle'])); ?>
                        </p>
                        <?php
						if( !empty( $dustra_consulting_output['btn_text'] ) ): ?>
                        <a class="btn btn-light effect btn-md" href="<?php echo esc_url($dustra_consulting_output['btn_link']['url']); ?>"><?php echo esc_html($dustra_consulting_output['btn_text']); ?></a>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Consulting Area -->
    <?php elseif($dustra_consulting_output['style'] == 2):?>
    <!-- Start Consulting Area
    ============================================= -->
    <div class="consulting-area shape-less relative">
        <div class="container">
            <div class="inner-items">
                <div class="row">
                    <div class="col-lg-6 text-light left-info">
                    	<?php
							if( !empty( $dustra_consulting_output['content_list'] ) ):
								foreach( $dustra_consulting_output['content_list'] as $single_value ):
						?>
	                        <div class="item">
	                            <h4>
	                            	<?php echo esc_html($single_value['title'],'dustra-core');?>
	                            </h4>
	                            <p>
	                            	<?php echo esc_html($single_value['description'],'dustra-core');?>	
	                            </p>
	                        </div>
                        <?php endforeach; endif; ?>  
                        
                        <ul class="achivement">
                        	<?php
							if( !empty( $dustra_consulting_output['funfact_list'] ) ):
								foreach( $dustra_consulting_output['funfact_list'] as $single_value ):
						    ?>
                            <li>
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="<?php echo esc_html($single_value['number'],'dustra-core');?>" data-speed="5000"><?php echo esc_html($single_value['number'],'dustra-core');?></div>
                                        <div class="operator"><?php echo esc_html($single_value['prefix'],'dustra-core');?></div>
                                    </div>
                                    <span class="medium"><?php echo esc_html($single_value['title'],'dustra-core');?></span>
                                </div>
                            </li>
                            <?php endforeach; endif; ?> 
                        </ul>
                    </div>
                    <div class="col-lg-6 right-info" style="background-image: url(<?php echo esc_url($dustra_consulting_output['image_v2']['url']);?>);">
                        <div class="appoinment-form">
                            <h2><?php echo esc_html($dustra_consulting_output['title_v2']); ?></h2>
                            <p>
                                <?php echo esc_html($dustra_consulting_output['subtitle_v2']); ?>
                            </p>
                            <?php echo do_shortcode($dustra_consulting_output['estimate_sc']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Consulting Area -->
    <?php endif;?>
	<?php
	}
}