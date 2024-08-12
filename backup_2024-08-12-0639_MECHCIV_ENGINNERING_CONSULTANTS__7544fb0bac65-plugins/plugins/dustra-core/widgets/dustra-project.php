<?php
	/**
	* Elementor Project Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Project_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name. 
	*
	* Retrieve Project widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'projectwidget';
	}

	/**
	* Get widget title.
	*
	* Retrieve Project widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Project', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Project widget icon.
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
	* Retrieve the list of categories the Project widget belongs to.
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
			'project_content',
			[
				'label'		=> esc_html__( 'Project Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'heading', [
				'label' 		=> esc_html__( 'Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'Type Heading', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'subheading', [
				'label' 		=> esc_html__( 'Sub-Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'Type Sub-Heading', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Content', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
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

		$repeater->add_control(
			'project_type_heading', [
				'label' 		=> esc_html__( 'Project Type Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 	    => esc_html__( 'Project Name', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'project_name', [
				'label' 		=> esc_html__( 'Project Name', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__( 'Type Name', 'dustra-core' ),
			]
		);
		$repeater->add_control(
			'project_duration_heading', [
				'label' 		=> esc_html__( 'Project Duration Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 	    => esc_html__( 'Project Duration', 'dustra-core' ),
			]
		);
		$repeater->add_control(
			'project_duration', [
				'label' 		=> esc_html__( 'Project Duration', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__( 'Type Duration', 'dustra-core' ),
			]
		);
		$repeater->add_control(
			'project_budget_heading', [
				'label' 		=> esc_html__( 'Project Budget Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 	    => esc_html__( 'Project Budget', 'dustra-core' ),
			]
		);
		$repeater->add_control(
			'project_budget', [
				'label' 		=> esc_html__( 'Project Budget', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__( 'Type Budget', 'dustra-core' ),
			]
		);
	
		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Project', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Project', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Project', 'dustra-core' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'project_heading_style',
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
					'{{WRAPPER}} .project-item .info h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .project-item .info h2',
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
					'{{WRAPPER}} .project-item .info h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .project-item .info h4',
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
					'{{WRAPPER}} .project-item .info p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .project-item .info p',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'project_content_style',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'project_title_color',
			[
				'label' 		=> esc_html__( 'Project Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-item .info ul li h5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'project_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .project-item .info ul li h5',
			]
		);
		$this->add_control(
			'project_content_color',
			[
				'label' 		=> esc_html__( 'Project Content Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-item .info ul li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'project_content_typography',
				'label' 		=> esc_html__( 'Project Content Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .project-item .info ul li span',
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		
	$dustra_project_output = $this->get_settings_for_display();
	?>
    <!-- Start Projects Area 
    ============================================= -->
    <div class="projects-area overflow-hidden default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-item projects-carousel owl-carousel owl-theme">
                    	<?php
							if( !empty( $dustra_project_output['list'] ) ):
								foreach( $dustra_project_output['list'] as $single_value ):
						?>
                        <!-- Single Item -->
                        <div class="item">
                            <div class="row align-center">
                                <div class="col-lg-6 order-lg-last thumb-box">
                                    <?php if(!empty($single_value['image']['url'])): ?>
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($single_value['image']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                                        <?php if(!empty($single_value['video_url']['url'])):?>
                                        <a href="<?php echo esc_url($single_value['video_url']['url']); ?>" class="popup-youtube"><i class="fas fa-video"></i></a>
                                    	<?php endif; ?>
                                    </div>
                                	<?php endif; ?>
                                </div>
                                <div class="col-lg-6 info">
                                    <?php if(!empty($single_value['subheading'])) :?>
                                    	<h4><?php echo htmlspecialchars_decode( esc_html($single_value['subheading'])); ?></h4>
                                    <?php endif;?>
                                    <?php if(!empty($single_value['heading'])) :?>
                                    	<h2><?php echo htmlspecialchars_decode(esc_html($single_value['heading'])); ?></h2>
                                    <?php endif;?>
                                    <?php if(!empty($single_value['content'])) :?>
                                    	<p><?php echo htmlspecialchars_decode(esc_html($single_value['content'])); ?>
                                    	</p>
                                    <?php endif;?>
                                    <ul>
                                       <?php if(!empty($single_value['project_name'])) :?>
	                                        <li>
	                                            <h5><?php echo htmlspecialchars_decode(esc_html($single_value['project_type_heading'])); ?></h5>
	                                            <span><?php echo htmlspecialchars_decode(esc_html($single_value['project_name'])); ?></span>
	                                        </li>
	                                        <?php endif;?>
	                                        <?php if(!empty($single_value['project_duration'])) :?>
	                                        <li>
	                                            <h5><?php echo htmlspecialchars_decode(esc_html($single_value['project_duration_heading'])); ?></h5>
	                                            <span><?php echo htmlspecialchars_decode(esc_html($single_value['project_duration'])); ?></span>
	                                        </li>
	                                        <?php endif;?>
	                                        <?php if(!empty($single_value['project_budget'])) :?>
	                                        <li>
	                                            <h5><?php echo htmlspecialchars_decode(esc_html($single_value['project_budget_heading'])); ?></h5>
	                                            <span><?php echo htmlspecialchars_decode(esc_html($single_value['project_budget'])); ?></span>
	                                        </li>
	                                    <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php
							endforeach;
							endif;
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Projects Area -->

		
	<?php }
}