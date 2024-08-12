<?php
	/**
	* Elementor Steps Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Project_Status_Widget extends \Elementor\Widget_Base {

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
		return 'projectstatus';
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
		return esc_html__( 'Project Status', 'dustra-core' );
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
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'Type Your Button Title', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Url', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'dustra-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'project_status_content',
			[
				'label'		=> esc_html__( 'Project Status Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'project_style',
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
			'project_number', [
				'label' 		=> esc_html__( 'Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type content', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		

		$this->add_control(
			'pro_status_list',
			[
				'label' 	=> esc_html__( 'Project Status', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Project Status', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Project Status', 'dustra-core' ),
			]
		);
		
		$this->end_controls_section();
		
	}

	// Output For User
	protected function render(){
		$dustra_pro_status_output = $this->get_settings_for_display();
		$dustra_project_style = $dustra_pro_status_output['project_style'];
		?>
		<!-- Start Project Status
	    ============================================= -->
	    <div class="<?php if($dustra_project_style == 1){echo "work-with-us-area bg-gray default-padding-bottom";}else {echo "work-with-us-area bg-gray default-padding-top default-padding-bottom";}?>">
	        <div class="container">
	            <div class="content-box">
	                <div class="row align-center">
	                    <div class="col-lg-5">
	                        <div class="heading-info">
	                        	<?php 
	                        	if(!empty($dustra_pro_status_output['section_subtitle'])): ?>
	                            	<h5><?php echo esc_html($dustra_pro_status_output['section_subtitle']) ?></h5>
	                            <?php endif;?>
	                            <?php if(!empty($dustra_pro_status_output['section_title'])): ?>
	                            	<h2><?php echo esc_html($dustra_pro_status_output['section_title']) ?></h2>
	                            <?php endif;?>
	                            <?php if(!empty($dustra_pro_status_output['button_text'])): ?>
	                            	<a href="<?php echo esc_url($dustra_pro_status_output['button_url']['url']); ?>" class="btn angle btn-theme effect btn-md"><?php echo esc_html($dustra_pro_status_output['button_text']) ?></a>
	                            <?php endif;?>
	                        </div>
	                    </div>
	                    <div class="col-lg-7 fun-facts-items text-center">
	                        <div class="row">
	                        	<?php
									if( !empty( $dustra_pro_status_output['pro_status_list'] ) ):
										foreach( $dustra_pro_status_output['pro_status_list'] as $single_value ):
								?>
		                            <div class="col-lg-4 col-md-4">
		                                <div class="fun-fact">
		                                    <h4><?php echo esc_html($single_value['title']); ?></h4>
		                                    <div class="timer" data-to="28" data-speed="5000"><?php echo esc_html($single_value['project_number']); ?></div>
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
	        </div>
	    </div>
	    <!-- End Project Status -->
		<?php
	}
}