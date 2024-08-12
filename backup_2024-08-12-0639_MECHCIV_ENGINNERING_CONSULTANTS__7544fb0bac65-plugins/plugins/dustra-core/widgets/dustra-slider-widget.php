<?php
	/**
	* Elementor Slider Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Slider widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'singlebannerslider';
	}

	/**
	* Get widget title.
	*
	* Retrieve Slider widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Banner Slider', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Slider widget icon.
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
			'slider_content',
			[
				'label'		=> esc_html__( 'Slider Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Slider Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'dustra-core' ),
					'2' 	=> esc_html__( 'Style Two', 'dustra-core' ),
					'3' 	=> esc_html__( 'Style Three', 'dustra-core' ),
					'4' 	=> esc_html__( 'Style Four', 'dustra-core' ),
					'5' 	=> esc_html__( 'Style Five', 'dustra-core' ),
					'6' 	=> esc_html__( 'Style Six', 'dustra-core' ),
					'7' 	=> esc_html__( 'Style Seven', 'dustra-core' ),
					'8' 	=> esc_html__( 'Style Eight', 'dustra-core' ),
					'9' 	=> esc_html__( 'Style Nine', 'dustra-core' ),
					'10' 	=> esc_html__( 'Style Ten', 'dustra-core' ),
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
				'condition' 	=> ['style' => ['1','2','4']],
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			]
		);
		
		$this->add_control(
			'list_two',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'condition' 	=> ['style' => ['3','5']],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_one_text',
			[
				'label' 		=> esc_html__( 'Button One Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_one_url',
			[
				'label' 		=> esc_html__( 'Button One URL', 'dustra-core' ),
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
			'slider_button_two_text',
			[
				'label' 		=> esc_html__( 'Button Two Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_two_url',
			[
				'label' 		=> esc_html__( 'Button Two URL', 'dustra-core' ),
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
			'list_six',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'condition' 	=> ['style' => '6'],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			]
		);
		
		$this->add_control(
			'list_seven',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'condition' 	=> ['style' => '7'],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Slider Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			]
		);
		
		$this->add_control(
			'list_eight',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'condition' 	=> ['style' => ['8','9']],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);		
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			]
		);
		
		$this->add_control(
			'list_ten',
			[
				'label' 	=> esc_html__( 'Slider', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'dustra-core' ),
					],
				],
				'condition' 	=> ['style' => ['10']],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$this->add_control(
			'slider_shape_one',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '8'],
			]
		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_left_box_color',
			[
				'label' 		=> esc_html__( 'Slider Left Box Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-area.banner-box .box-cell::before' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'style' =>	'6'],
			]
		);
		$this->add_control(
			'sl_box_col_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'dustra_sl_title_col',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content h2' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dustra_sl_title_typo',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .carousel-inner .box-cell .content h2',
			]
		);
		
		$this->add_control(
			'title_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
			'dustra_sl_sub_col',
			[
				'label' 		=> esc_html__( 'Slider Subtitle Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content h3' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'style' =>	['2','6']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dustra_sl_sub_typo',
				'label' 		=> esc_html__( 'Slider Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .carousel-inner .box-cell .content h3',
				'condition'		=> [ 'style' =>	['2','6']],
			]
		);
		$this->add_control(
			'sl_hr_2_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'dustra_sl_des_col',
			[
				'label' 		=> esc_html__( 'Slider Description Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content p' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'style' =>	['1','6']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dustra_sl_des_typo',
				'label' 		=> esc_html__( 'Description Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .carousel-inner .box-cell .content p',
				'condition'		=> [ 'style' =>	['1','6']],
			]
		);
		
		$this->add_control(
			'description_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dustra_sl_btn_typo',
				'label' 		=> esc_html__( 'Button Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .carousel-inner .box-cell .content a',
			]
		);
		$this->add_control(
			'slider_button_text_color',
			[
				'label' 		=> esc_html__( 'Slider Button Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .carousel-inner .box-cell .content a' => 'color: {{VALUE}}!important',
				],
			]
		);
		
		$this->add_control(
			'slider_button_background_color',
			[
				'label' 		=> esc_html__( 'Slider Button Background Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .carousel-inner .box-cell .content a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slider_button_hover_text_color',
			[
				'label' 		=> esc_html__( 'Slider Button Hover Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .shadow .btn-theme:hover' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'slider_button_background_hover_color',
			[
				'label' 		=> esc_html__( 'Slider Button Background Hover Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .shadow .btn-theme::after' => 'background-color: {{VALUE}}',
				],
			]
		);

		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$dustra_slider_output = $this->get_settings_for_display();
	$dustra_sliders = $dustra_slider_output['list'];
	$dustra_slider_three = $dustra_slider_output['list_two'];
	$dustra_slider_six = $dustra_slider_output['list_six'];
	$dustra_slider_seven = $dustra_slider_output['list_seven'];
	$dustra_slider_eight = $dustra_slider_output['list_eight'];
	$dustra_slider_ten = $dustra_slider_output['list_ten'];
	if($dustra_slider_output['style'] == 1){
	?>
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area inc-content shadow shape default">
        <div id="bootcarousel" class="carousel slide text-light carousel-fade animate_text" data-ride="carousel">

            <!-- Indicators for slides -->
            <div class="carousel-indicator">
                <ol class="carousel-indicators">
                <?php 
	              $counter = 0;
	              foreach ($dustra_sliders as $slider_one) :
	            ?>
	            	<li data-target="#bootcarousel" data-slide-to="<?php echo $counter;?>" class="<?php if($counter == 0){echo esc_attr("active");}?>"></li>
	            <?php 
	                $counter++;
					endforeach;
				?>
                </ol>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
            	<?php 
	              $counter = 1;
	              foreach ($dustra_sliders as $slider_one) :
	            ?>
                <div class="carousel-item <?php if($counter == 1){echo esc_attr("active");}?>">
                    <div class="slider-thumb bg-cover" style="background-image: url(<?php echo esc_url($slider_one['image_slider']['url']); ?>);"></div>
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="content">
                                        <?php if(!empty($slider_one['slider_title'])):?>	
                                            <h2 data-animation="animated slideInLeft"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_title'],'dustra-core')); ?></h2>
                                        <?php endif;?>
                                        <?php if(!empty($slider_one['slider_content'])):?><p  data-animation="animated slideInUp"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_content'],'dustra-core')); ?></p>
                                        <?php endif;?>
                                        <?php if(!empty($slider_one['slider_button_text'])):?>
                                            <a data-animation="animated slideInRight" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_one['slider_button_url']['url']); ?>"><?php echo esc_html($slider_one['slider_button_text'],'dustra-core'); ?></a>
                                         <?php endif;?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>   
               
            </div>
            <!-- End Wrapper for slides -->
        </div>
    </div>
    <!-- End Banner --> 

	<?php }elseif($dustra_slider_output['style'] == 2){?>

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area text-large">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 1;
	              foreach ($dustra_sliders as $slider_one) :
	            ?>
	                <div class="carousel-item bg-cover <?php if($counter == 1){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_one['image_slider']['url']); ?>);">
	                    <div class="box-table">
	                        <div class="box-cell">
	                            <div class="container">
	                                <div class="row">
	                                    <div class="col-lg-8">
	                                        <div class="content">
	                                            <div class="shape animated slideInLeft"></div>
	                                            <h3 data-animation="animated slideInUp"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_content'],'dustra-core')); ?></h3>
	                                            <h2 data-animation="<?php if($counter ==1){echo"animated slideInDown";}else{echo "animated slideInRight";}?>"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_title'],'dustra-core')); ?></h2>
	                                            <div class="slider-button">
	                                            <?php if(!empty($slider_one['slider_button_text'])):?>
	                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_one['slider_button_url']['url']); ?>"><?php echo esc_html($slider_one['slider_button_text'],'dustra-core'); ?></a>
	                                            <?php endif;?>     
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_html("Previous",'dustra');?></span>
            </a>
            <a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_html("Next",'dustra');?></span>
            </a>
        </div>
    </div>
    <!-- End Banner -->

    <?php }elseif($dustra_slider_output['style'] == 3){?>
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area top-pad-90 during-nav-box bg-gray text-default">
        <div id="bootcarousel" class="carousel slide animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 1;
	              foreach ($dustra_slider_three as $slider_three) :
	            ?>
                <div class="carousel-item <?php if($counter == 1){echo esc_attr("active");}?>">
                    <!-- Thumb -->
                    <div class="right-thumb" style="background-image: url(<?php echo esc_url($slider_three['image_slider']['url']); ?>);"></div>
                    <!-- End Thumb -->
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 data-animation="animated fadeInLeft"><?php echo htmlspecialchars_decode(esc_html($slider_three['slider_subtitle'],'dustra-core')); ?></h3>
                                            <h2 data-animation="animated fadeInUp"><?php echo htmlspecialchars_decode(esc_html($slider_three['slider_title'],'dustra-core')); ?></h2>
                                            <p data-animation="animated slideInRight">
                                                <?php echo htmlspecialchars_decode(esc_html($slider_three['slider_content'],'dustra-core')); ?>
                                            </p>
                                            <?php if(!empty($slider_three['slider_button_text'])):?>
                                            <div class="slider-button">
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_three['slider_button_url']['url']); ?>"><?php echo esc_html($slider_three['slider_button_text'],'dustra-core'); ?></a>
                                            </div>
                                        	<?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
                <i class="fal fa-long-arrow-left"></i>
                <span class="sr-only"><?php echo esc_attr__("Previous",'dustra-core');?></span>
            </a>
            <a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
                <i class="fal fa-long-arrow-right"></i>
                <span class="sr-only"><?php echo esc_attr__("Next",'dustra-core');?></span>
            </a>
        </div>
    </div>
    <!-- End Banner -->
    <?php }elseif($dustra_slider_output['style'] == 4){?>

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area top-pad-90 border-shape default text-light">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 1;
	              foreach ($dustra_sliders as $slider_four) :
	            ?>
                <div class="carousel-item bg-cover <?php if($counter == 1){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_four['image_slider']['url']); ?>);">
                    <div class="box-table">
                        <div class="box-cell shadow dark">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="content">
                                            <div class="shape animated slideInLeft"></div>
                                            <h3 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode(esc_html($slider_four['slider_content'],'dustra-core')); ?></h3>
                                            <h2 data-animation="animated slideInRight"><?php echo htmlspecialchars_decode(esc_html($slider_four['slider_title'],'dustra-core')); ?></h2>
                                            <div class="slider-button">
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_four['slider_button_url']['url']); ?>"><?php echo esc_html($slider_four['slider_button_text'],'dustra-core'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
               
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_attr__("Previous",'dustra-core');?></span>
            </a>
            <a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_attr__("Next",'dustra-core');?></span>
            </a>
        </div>
    </div>
    <!-- End Banner -->
    <?php }elseif($dustra_slider_output['style'] == 5){?>
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area inc-content shadow car-service-banner bg-fixed default">
        <div id="bootcarousel" class="carousel slide text-light carousel-fade animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
            	<?php 
	              $counter = 1;
	              foreach ($dustra_slider_three as $slider_five) :
	            ?>
                <div class="carousel-item <?php if($counter == 1){echo esc_attr("active");}?>">
                    <div class="slider-thumb bg-cover" style="background-image: url(<?php echo esc_url($slider_five['image_slider']['url']); ?>);"></div>
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="shape" data-animation="animated slideInDown" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/shape/15.png);"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="content">
                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode(esc_html($slider_five['slider_title'],'dustra-core')); ?></h2>
                                            <p data-animation="animated slideInRight">
                                                <?php echo htmlspecialchars_decode(esc_html($slider_five['slider_content'],'dustra-core')); ?>
                                            </p>
                                            <?php if(!empty($slider_five['slider_button_text'])):?>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_five['slider_button_url']['url']); ?>"><?php echo esc_html($slider_five['slider_button_text'],'dustra-core'); ?></a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
               
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
                <i class="fal fa-long-arrow-left"></i>
                <span class="sr-only"><?php echo esc_attr__("Previous",'dustra-core');?><</span>
            </a>
            <a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
                <i class="fal fa-long-arrow-right"></i>
                <span class="sr-only"><?php echo esc_attr__("Next",'dustra-core');?></span>
            </a>

        </div>
    </div>
    <!-- End Banner -->
    <?php }elseif($dustra_slider_output['style'] == 6){?>
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area shadow inc-content bg-dark banner-style-standard text-light auto-height banner-box default">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">
                <?php 
	              $counter = 1;
	              foreach ($dustra_slider_six as $slider_six) :
	            ?>
	                <div class="carousel-item <?php if($counter == 1){echo esc_attr("active");}?>">
	                    <div class="slider-thumb bg-cover" style="background-image: url(<?php echo esc_url($slider_six['image_slider']['url']); ?>);"></div>
	                    <div class="box-table">
	                        <div class="box-cell">
	                            <div class="container">
	                                <div class="row">
	                                    <div class="col-lg-8 offset-lg-2">
	                                        <div class="content">
	                                            <h3 data-animation="animated slideInUp"><?php echo htmlspecialchars_decode(esc_html($slider_six['slider_subtitle'],'dustra-core')); ?></h3>
	                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode(esc_html($slider_six['slider_title'],'dustra-core')); ?></h2>
	                                            <p data-animation="animated slideInDown">
	                                                <?php echo htmlspecialchars_decode(esc_html($slider_six['slider_content'],'dustra-core')); ?>
	                                            </p>
	                                            <div class="slider-button">
	                                            	<?php if(!empty($slider_six['slider_button_one_text'])): ?>
	                                                <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="<?php  echo esc_html($slider_six['slider_button_one_url']['url']);?>"><?php  echo esc_html($slider_six['slider_button_one_text']);?></a>
	                                            	<?php endif; ?>
	                                            	<?php if(!empty($slider_six['slider_button_two_text'])): ?>
	                                                <a data-animation="animated slideInUp" class="btn btn-dark theme btn-md" href="<?php  echo esc_html($slider_six['slider_button_two_url']['url']);?>"><?php  echo esc_html($slider_six['slider_button_two_text']);?></a>
	                                                <?php endif; ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php 
	                $counter++;
					endforeach;
				?>

            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_html__("Previous",'dustra-core') ?></span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_html__("Next",'dustra-core') ?></span>
            </a>
        </div>
    </div>
    <!-- End Banner -->
	<?php }elseif($dustra_slider_output['style'] == 7){?>
	<!-- Start Banner 
    ============================================= -->
    <div class="banner-area auto-height banner-style-seven default">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel" data-interval="5000000">
        	
            <!-- Indicators for slides -->
            <div class="carousel-indicator">
                <ol class="carousel-indicators">
                	<?php 
		              $counter = 0;
		              foreach ($dustra_slider_seven as $slider_seven) :
		            ?>
                    <li data-target="#bootcarousel" data-slide-to="<?php echo $counter;?>" class="<?php if($counter == 0){echo esc_attr("active");}?>"></li>
                    <?php 
		                $counter++;
						endforeach;
					?>
                </ol>
            </div>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 0;
	              foreach ($dustra_slider_seven as $slider_seven) :
	            ?>
                <div class="carousel-item bg-cover <?php if($counter == 0){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_seven['image_slider']['url']); ?>);">
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 offset-lg-1">
                                        <div class="content">
                                            <div class="shape animated slideInLeft"></div>
                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode( esc_html($slider_seven['slider_title']));?></h2>
                                            <?php if(!empty($slider_seven['slider_button_text'])):?>
                                            <div class="slider-button">
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_seven['slider_button_url']['url']);?>"><?php echo htmlspecialchars_decode( esc_html($slider_seven['slider_button_text']));?></a>
                                            </div>
                                        	<?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               	<?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

        </div>
    </div>
    <!-- End Banner -->
	<?php }elseif($dustra_slider_output['style'] == 8){?>
	<!-- Start Banner version eight
    ============================================= -->
    <div class="banner-area text-light banner-style-eight default">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 0;
	              foreach ($dustra_slider_eight as $slider_eight) :
	            ?>
                <div class="carousel-item bg-cover <?php if($counter == 0){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_eight['image_slider']['url']); ?>);">
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 offset-lg-1">
                                        <div class="content">
                                            <h4 class="animated slideInLeft"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_subtitle']));?></h4>
                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_title']));?></h2>
                                            <p class="animated slideInRight">
                                               <?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_content']));?>
                                            </p>
                                            <?php if(!empty($slider_eight['slider_button_text'])):?>
                                            <div class="slider-button">
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_eight['slider_button_url']['url']);?>"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_button_text']));?></a>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($dustra_slider_output['slider_shape_one']['url'])):?>
                        	<div class="sahpe" style="background-image: url(<?php echo esc_url($dustra_slider_output['slider_shape_one']['url']);?>);"></div>
                    	<?php endif;?>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_html("Previous",'dustra-core');?></span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_html("Next",'dustra-core');?></span>
            </a>

        </div>
    </div>
    <!-- End Banner version eight -->

	<?php }elseif($dustra_slider_output['style'] == 9){?>

	<!-- Start Banner version Nine -->
    <div class="banner-area text-light banner-style-nine default">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 0;
	              foreach ($dustra_slider_eight as $slider_eight) :
	            ?>
                <div class="carousel-item bg-fixed <?php if($counter == 0){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_eight['image_slider']['url']); ?>);">
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-6">
                                        <div class="content">
                                            <h4 class="animated slideInLeft"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_subtitle']));?></h4>
                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_title']));?></h2>
                                            <p class="animated slideInRight">
                                               <?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_content']));?>
                                            </p>
                                            <?php if(!empty($slider_eight['slider_button_text'])):?>
                                            <div class="slider-button">
                                                <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="<?php echo esc_url($slider_eight['slider_button_url']['url']);?>"><?php echo htmlspecialchars_decode( esc_html($slider_eight['slider_button_text']));?></a>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_html("Previous",'dustra-core');?></span>
            </a>
            <a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_html("Next",'dustra-core');?></span>
            </a>

        </div>
    </div>
    <!-- End Banner version Nine -->
    <?php }elseif($dustra_slider_output['style'] == 10){?>
     <!-- Start Banner Ten
    ============================================= -->
    <div class="banner-area banner-style-ten text-light">
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel" data-interval="500000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php 
	              $counter = 0;
	              foreach ($dustra_slider_ten as $slider_ten) :
	            ?>
                <div class="carousel-item bg-cover <?php if($counter == 1){echo "active";}?>" style="background-image: url(<?php echo esc_url($slider_ten['image_slider']['url']); ?>);">
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="text-fixed"><?php echo htmlspecialchars_decode( esc_html($slider_ten['slider_title']));?></h1>
                                    </div>
                                    <div class="col-lg-6 offset-lg-6">
                                        <div class="content">
                                            <div class="shape animated slideInLeft"></div>
                                            <h2 data-animation="animated slideInDown"><?php echo htmlspecialchars_decode( esc_html($slider_ten['slider_subtitle']));?></h2>
                                            <?php if(!empty($slider_ten['slider_button_text'])):?>
	                                            <div class="slider-button">
	                                                <a data-animation="animated slideInUp" class="btn btn-light circle effect btn-md" href="<?php echo esc_url($slider_ten['slider_button_url']['url']);?>"><?php echo htmlspecialchars_decode( esc_html($slider_ten['slider_button_text']));?></a>
	                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only"><?php echo esc_html("Previous",'dustra-core');?></span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only"><?php echo esc_html("Next",'dustra-core');?></span>
            </a>
        </div>
    </div>
    <!-- End Banner Ten -->	
    <?php }
	}
}