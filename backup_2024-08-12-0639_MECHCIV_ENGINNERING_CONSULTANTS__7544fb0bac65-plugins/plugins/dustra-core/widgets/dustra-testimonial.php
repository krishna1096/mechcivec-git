<?php
	/**
	* Elementor Testimonial Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

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
		return 'testimonial';
	}

	/**
	* Get widget title.
	*
	* Retrieve Testimonial widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Testimonial', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Testimonial widget icon.
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
			'testimonial_content',
			[
				'label'		=> esc_html__( 'Testimonial Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'left_image',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'years',
			[
				'label' 		=> esc_html__( 'Years', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( 'type years', 'dustra-core' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label' 		=> esc_html__( 'Heading', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_html__( 'type heading', 'dustra-core' ),
			]
		);
		
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'testimonial_image',
			[
				'label'			=> esc_html__( 'Add Image','dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_content', [
				'label' 		=> esc_html__( 'Set Testimonial Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_name', [
				'label' 		=> esc_html__( 'Person Name', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_occupation', [
				'label' 		=> esc_html__( 'Person Occupation', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_rating', [
				'label' 		=> esc_html__( 'Person Rating', 'dustra-core' ),
				'type' 		    => \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( '1', 'dustra-core' ),
					'2' 	=> esc_html__( '1.5', 'dustra-core' ),
					'3'  	=> esc_html__( '2', 'dustra-core' ),
					'4' 	=> esc_html__( '2.5', 'dustra-core' ),
					'5'  	=> esc_html__( '3', 'dustra-core' ),
					'6' 	=> esc_html__( '3.5', 'dustra-core' ),
					'7'  	=> esc_html__( '4', 'dustra-core' ),
					'8' 	=> esc_html__( '4.5', 'dustra-core' ),
					'9'  	=> esc_html__( '5', 'dustra-core' ),
				],
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'list',
			[
				'label' 	=> esc_html__( 'Testimonial', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Testimonial', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ person_name }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'testimonail_style',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Heading Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Heading Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-items h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Heading Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .testimonial-items h2',
			]
		);
		$this->add_control(
			'heading_description_option',
			[
				'label' 		=> esc_html__( 'Person Description Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		
		
		$this->add_control(
			'testimonail_content_color',
			[
				'label' 		=> esc_html__( 'Content Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_typography',
				'label' 		=> esc_html__( 'Content Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .testimonial-content p',
			]
		);
		
		$this->add_control(
			'tes_person_name_option',
			[
				'label' 		=> esc_html__( 'Person Name Option', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'tes_person_name_color',
			[
				'label' 		=> esc_html__( 'Name Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info h5' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'tes_person_name_typography',
				'label' 		=> esc_html__( 'Name Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .info h5',
			]
		);
		
		$this->add_control(
			'occupation_option',
			[
				'label' 		=> esc_html__( 'Person Position Option', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'occupation_color',
			[
				'label' 		=> esc_html__( 'Position Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info  span' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'occupation_typography',
				'label' 		=> esc_html__( 'Position Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .info span',
			]
		);
		
		$this->add_control(
			'rating_color_option',
			[
				'label' 		=> esc_html__( 'Rating Color Option', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'rating_color',
			[
				'label' 		=> esc_html__( 'Rating Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-area .testimonial-content .content .rating ,{{WRAPPER}} .testimonials-area .testimonial-content.testimonials-carousel .owl-nav .owl-prev, .testimonials-area .testimonial-content.testimonials-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		$dustra_testimonial_output = $this->get_settings_for_display();
		?>

		<!-- Start Testimonials Area 
    ============================================= -->
    <div class="testimonials-area">
        <div class="container">
            <div class="testimonial-items">
                <div class="row align-center">
                    <div class="col-lg-5 title text-center">
                        <h1 style="background-image: url(<?php echo esc_url($dustra_testimonial_output['left_image']['url']); ?> );"><?php echo htmlspecialchars_decode(esc_html($dustra_testimonial_output['years']));?></h1>
	                    <h2><?php echo htmlspecialchars_decode(esc_html($dustra_testimonial_output['heading']));?></h2>
                    </div>
                    <div class="col-lg-7 testimonial-box">
                        <div class="testimonial-content testimonials-carousel owl-carousel owl-theme">
                        	<?php
							if( !empty( $dustra_testimonial_output['list'] ) ):
								foreach( $dustra_testimonial_output['list'] as $single_value ):
							?>
                            <!-- Single Item -->
                            <div class="item">
                                <div class="content">
                                    <div class="rating">
                                    <?php 
                                    if($single_value['person_rating']==1){
                                    ?> 	
                                        <i class="fas fa-star"></i>
                                    <?php     
                                    }elseif ($single_value['person_rating']==2){
                                    ?> 	
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php 
                                    }elseif ($single_value['person_rating']==3){
                                    ?> 	
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php 
                                    }elseif ($single_value['person_rating']==4){
                                    ?> 	
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php 
                                    }elseif ($single_value['person_rating']==5){
                                    ?> 	
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php 
                                    	}elseif ($single_value['person_rating']==6){
                                    ?>
                                    	<i class="fas fa-star"></i>
                                    	<i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php 
                                    	}elseif ($single_value['person_rating']==7){
                                    ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php 
                                    	}elseif ($single_value['person_rating']==8){
                                    ?>
                                    	<i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php 
                                    	}elseif ($single_value['person_rating']==9){
                                    ?>
                                    	<i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    <?php 
                                       }    
                                    ?>
                                    </div>
                                    <?php
			                            if( !empty( $single_value['testimonial_content'] ) ):?>
                                    <p>
		                                <?php 
											echo wp_kses_post( esc_html($single_value['testimonial_content']) );
										?>	
                                    </p>
                                <?php endif;?>
                                </div>
                                <div class="provider">
                                   <?php if(!empty($single_value['testimonial_image']['url'])): ?>
	                                    <div class="thumb">
	                                    	<img src="<?php echo esc_url($single_value['testimonial_image']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
	                                    </div>
                                	<?php endif; ?>
                                    <div class="info">
                                        <?php
			                                if( !empty( $single_value['person_name'] ) ){
												echo '<h5>'.esc_html( $single_value['person_name'] ).'</h5>';
											}
		                                ?>
                                        <?php
			                                if( !empty( $single_value['person_occupation'] ) ){
												echo '<span>'.esc_html( $single_value['person_occupation'] ).'</span>';
											}
		                                ?>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->
	<?php 
	}
}
?>