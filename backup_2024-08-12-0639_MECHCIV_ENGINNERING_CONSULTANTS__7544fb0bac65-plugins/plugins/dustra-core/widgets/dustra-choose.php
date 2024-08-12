<?php
	/**
	* Elementor Testimonial Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Chose_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Testimonial widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'chose';
	}

	/**
	* Get widget title.
	*
	* Retrieve Process widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Chose', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Process widget icon.
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
			'choose_content',
			[
				'label'		=> esc_html__( 'Choose Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
	    $this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Chose Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> esc_html__( 'Style One', 'dustra-core' ),
					'2'  		=> esc_html__( 'Style Two', 'dustra-core' ),
					'3'  		=> esc_html__( 'Style Three', 'dustra-core' ),
					'4'  		=> esc_html__( 'Style Four', 'dustra-core' ),
				],
			]
		);
		
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'SubTitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','4']],
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['4']],
			]
		);
		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'contact_title', [
				'label' 		=> esc_html__( 'Contact Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'contact_number', [
				'label' 		=> esc_html__( 'Contact Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
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
					'2' 	=> esc_html__( 'Custom Icon', 'dustra-core' ),
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
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
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
			'choose_icon_list',
			[
				'label' 	=> esc_html__( 'Contact', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Contact', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Add Contact', 'dustra-core' ),
				'condition' 	=> ['style' => '4'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Chose', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Chose', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Add Chose', 'dustra-core' ),
				'condition' 	=> ['style' => ['1','2','3']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'number', [
				'label' 		=> esc_html__( 'Number', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'operator', [
				'label' 		=> esc_html__( 'Operator', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'funfact_list',
			[
				'label' 	=> esc_html__( 'Funfactor', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Funfactor', 'dustra-core' ),
					],
				],
				'title_field' => esc_html__( 'Add Funfactor', 'dustra-core' ),
				'condition' 	=> ['style' => '4'],
			]
		);
		
		
		$this->add_control(
		'bac_image',
			[
				'label' 	=> esc_html__( 'Background Image', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'   => esc_html__( 'Type your button Text', 'dustra-core' ),
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'dustra-core' ),
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
		$this->end_controls_section();

		$this->start_controls_section(
			'chosse_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'chose_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'chose_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .why-us-area .content h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'chose_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'chose_title_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content h2',
			]
		);
		$this->add_control(
			'chose_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'chose_subtitle_color',
			[
				'label' 		=> esc_html__( 'Subtitle Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .why-us-area .content h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'chose_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content h4',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'chose_subtitle_text_shadow',
				'label' 		=> esc_html__( 'Text Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content h4',
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
			'chose_li_title_color',
			[
				'label' 		=> esc_html__( 'Item Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .why-us-area .content ul li h5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'chose_li_title_typography',
				'label' 		=> esc_html__( 'Item Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content ul li h5',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'chose_li_title_text_shadow',
				'label' 		=> esc_html__( 'Item Title Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content ul li h5',
			]
		);
        $this->add_control(
			'chose_li_subtitle_color',
			[
				'label' 		=> esc_html__( 'Item Subtitle Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .why-us-area .content ul li p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'chose_li_subtitle_typography',
				'label' 		=> esc_html__( 'Item Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content ul li p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' 			=> 'chose_li_subtitle_text_shadow',
				'label' 		=> esc_html__( 'Item Subtitle Shadow', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .why-us-area .content ul li p',
			]
		);
		$this->add_control(
			'chose_btn_option',
			[
				'label' 		=> esc_html__( 'Button Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'chose_btn_color',
			[
				'label' 		=> esc_html__( 'Button Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .content a' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'chose_btn_typography',
				'label' 		=> esc_html__( 'Button Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .content a',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		$dustra_chose_output = $this->get_settings_for_display();
		if($dustra_chose_output['style'] == 1){
	?>

	<!-- Start Why Chose Us 
    ============================================= -->
    <div class="why-us-area default-padding shadow bg-dark text-light">
        <!-- Fixed Thumb -->
        <div class="fixed-thumb bg-cover" style="background-image: url(<?php echo esc_url( $dustra_chose_output['bac_image']['url']); ?>);"></div>
        <!-- End Fixed Thumb -->
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 offset-lg-3 left-info">
                    <div class="content">
                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['subtitle'])); ?></h4>
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['title'])); ?></h2>
                        <?php if(!empty($dustra_chose_output['button_text'])):?>
                        <a class="btn btn-light effect btn-md" href="<?php echo esc_url($dustra_chose_output['button_url']['url']); ?>"><?php echo esc_html($dustra_chose_output['button_text']); ?></a>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-4 info">
                    <div class="content">
                        <ul>
                            <?php 
								if( !empty( $dustra_chose_output['list'] ) ):
								foreach( $dustra_chose_output['list'] as $single_value ):
							?>
	                            <li>
	                            	<?php if(!empty($single_value['title'])): ?>
	                                	<h5><?php echo htmlspecialchars_decode(esc_html($single_value['title'])); ?></h5>
	                            	<?php endif; ?>
	                            	<?php if(!empty($single_value['subtitle'])): ?>
	                                	<p><?php echo htmlspecialchars_decode(esc_html($single_value['subtitle'])); ?></p>
	                                <?php endif; ?>
	                            </li>
                            <?php
								endforeach;
								endif;
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Chose Us -->
    <?php } elseif($dustra_chose_output['style'] == 2){?>
    <!-- Start Choose Us v2
    ============================================= -->
    <div class="chooseus-area default-padding-top bg-dark text-light half-bg">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 thumb">
                    <div class="thumb-inner ">
                        <img class="item-mousemove" src="<?php echo esc_url( $dustra_chose_output['bac_image']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                    </div>
                </div>
                <div class="col-lg-6 info">
                    <div class="content">
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['title'])); ?></h2>
                        <ul>
                            <?php 
								if( !empty( $dustra_chose_output['list'] ) ):
								foreach( $dustra_chose_output['list'] as $single_value ):
							?>
	                            <li>
	                            	<?php if(!empty($single_value['title'])): ?>
	                                	<h5><?php echo htmlspecialchars_decode(esc_html($single_value['title'])); ?></h5>
	                            	<?php endif; ?>
	                            	<?php if(!empty($single_value['subtitle'])): ?>
	                                	<p><?php echo htmlspecialchars_decode(esc_html($single_value['subtitle'])); ?></p>
	                                <?php endif; ?>
	                            </li>
                            <?php
								endforeach;
								endif;
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Chooseus Area v2-->
<?php } elseif($dustra_chose_output['style'] == 3){?>
	<!-- Start Choose Us v2
    ============================================= -->
    <div class="chooseus-area default-padding-top bg-theme text-light half-bg">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 thumb">
                    <div class="thumb-inner ">
                        <img class="item-mousemove" src="<?php echo esc_url( $dustra_chose_output['bac_image']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                    </div>
                </div>
                <div class="col-lg-6 info">
                    <div class="content">
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['title'])); ?></h2>
                        <ul>
                            <?php 
								if( !empty( $dustra_chose_output['list'] ) ):
								foreach( $dustra_chose_output['list'] as $single_value ):
							?>
	                            <li>
	                            	<?php if(!empty($single_value['title'])): ?>
	                                	<h5><?php echo htmlspecialchars_decode(esc_html($single_value['title'])); ?></h5>
	                            	<?php endif; ?>
	                            	<?php if(!empty($single_value['subtitle'])): ?>
	                                	<p><?php echo htmlspecialchars_decode(esc_html($single_value['subtitle'])); ?></p>
	                                <?php endif; ?>
	                            </li>
                            <?php
								endforeach;
								endif;
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Chooseus Area v2-->
	<?php } elseif($dustra_chose_output['style'] == 4){?>
	<div class="choose-us-style-five-area bg-cover default-padding" style="background-image: url(<?php echo esc_url( $dustra_chose_output['bac_image']['url']); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-us-style-five">
                        <h4><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['subtitle'])); ?></h4>
                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['title'])); ?></h2>
                        <p>
                            <?php echo htmlspecialchars_decode(esc_html($dustra_chose_output['content'])); ?>
                        </p>
                        <?php 
							if( !empty( $dustra_chose_output['choose_icon_list'] ) ):
							foreach( $dustra_chose_output['choose_icon_list'] as $single_icon_value ):
						?>
                        <div class="contact">
                            <a href="tel:<?php echo esc_attr($single_icon_value['contact_number']);?>">
                                <div class="icon">
                                <?php if(!empty($single_icon_value['flat_icon_one'])):?>
                                    <i class="<?php echo esc_attr($single_icon_value['flat_icon_one']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_icon_value['icon_image_one'])):?>
	                                <img src="<?php echo esc_url($single_icon_value['icon_image_one']['url']); ?>">
	                            <?php endif;?>
	                            <?php if(!empty($single_icon_value['custom_icon'])):?>
	                               	<i class="<?php echo esc_attr($single_icon_value['custom_icon']); ?>"></i>
	                            <?php endif;?>
                                </div>
                                <div class="content">
                                    <h4><?php echo esc_html($single_icon_value['contact_title']);?></h4>
                                    <span><?php echo esc_html($single_icon_value['contact_number']);?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif;?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="choose-us-style-five">
                    	<?php 
							if( !empty( $dustra_chose_output['funfact_list'] ) ):
							foreach( $dustra_chose_output['funfact_list'] as $single_funfact_value ):
						?>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="<?php echo esc_attr($single_funfact_value['number']);?>" data-speed="5000"><?php echo esc_html($single_funfact_value['number']);?></div>
                                <div class="operator"><?php echo esc_html($single_funfact_value['operator']);?></div>
                            </div>
                            <span class="medium"><?php echo htmlspecialchars_decode( esc_html($single_funfact_value['title']));?></span>
                        </div>
                        <?php endforeach; endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
		}
    }			
}
?>