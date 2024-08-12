<?php
	/**
	* Elementor Steps Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Contact_Widget extends \Elementor\Widget_Base {

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
		return 'contact';
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
		return esc_html__( 'Contact', 'dustra-core' );
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
				'label'		=> esc_html__( 'Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		
		$this->add_control(
			'contact_title',
			[
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'dustra-core' ),
			]

		);

		$this->add_control(
			'contact_shortcode',
			[
				'label' 		=> esc_html__( 'Contact Form Shortcode', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__( 'Put your shortcode Here', 'dustra-core' ),
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
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
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
					'2' 	=> esc_html__( 'Font Awesome', 'dustra-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'dustra-core' ),
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
                'default'    => 'flaticon-location',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Font Awesome Icon', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);
		$repeater->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		

		$this->add_control(
			'contact_list',
			[
				'label' 	=> esc_html__( 'Contact Info', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Contact Info', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( '{{{ title }}}', 'dustra-core' ),
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'contact_design',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'contact_title_color',
			[
				'label' 		=> esc_html__( 'Content Heading Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area h2'=> 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_title_typography',
				'label' 		=> esc_html__( 'Service Heading Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-area h2'
			]
		);
		$this->add_control(
			'contact_list_title',
			[
				'label' 		=> esc_html__( 'Contact List Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .info h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_list_title_typography',
				'label' 		=> esc_html__( 'Contact List Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-area .info h4',
			]
		);
		$this->add_control(
			'contact_list_description',
			[
				'label' 		=> esc_html__( 'Contact List Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .info p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_list_description_typography',
				'label' 		=> esc_html__( 'Contact List Description', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-area .info p',
			]
		);
		$this->add_control(
			'contact_icon_color',
			[
				'label' 		=> esc_html__( 'Contact Icon Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .contact-items .item i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'contact_icon_bc_color',
				'label' => esc_html__( 'Contact Icon Background  Color', 'dustra-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .contact-area .contact-items .item i',
			]
		);

		$this->add_control(
			'con_button_text_color',
			[
				'label' 		=> esc_html__( 'Contact Button Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .contact-items .content button' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'con_button_background_color',
			[
				'label' 		=> esc_html__( 'Contact Button Background Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .contact-items .content button' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'con_button_background_hover_color',
			[
				'label' 		=> esc_html__( 'Contact Button Background Hover Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-area .contact-items .content button::after' => 'background: {{VALUE}}!important;',
				],
			]
		);
		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		$dustra_contact_output = $this->get_settings_for_display();
		?>

    <div class="contact-area default-padding-top">
        <div class="container">
            <div class="contact-items">
                <div class="row">
                    
                    <div class="col-lg-8 left-item">
                        <div class="content">
                            <h2><?php echo esc_html($dustra_contact_output['contact_title']);?></h2>
                            <?php echo do_shortcode($dustra_contact_output['contact_shortcode']);?>
                        </div>
                    </div>

                    <div class="col-lg-4 right-item">
                    	<?php
							if( !empty( $dustra_contact_output['contact_list'] ) ):
								foreach( $dustra_contact_output['contact_list'] as $single_value):
						?>	
	                        <!-- Single Item -->
	                        <div class="item">
	                            <div class="icon">
	                                <?php if(!empty($single_value['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($single_value['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_value['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_value['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($single_value['icon'])):?>
		                               <?php  \Elementor\Icons_Manager::render_icon( $single_value['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		                            <?php endif;?>
	                            </div>
	                            <div class="info">
	                                <h4><?php echo htmlspecialchars_decode(esc_html($single_value['title']));?></h4>
	                                <p>
	                                    <?php echo htmlspecialchars_decode(esc_html($single_value['content']));?>
	                                </p>
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
    <!-- End Contact -->
	<?php
	}
}