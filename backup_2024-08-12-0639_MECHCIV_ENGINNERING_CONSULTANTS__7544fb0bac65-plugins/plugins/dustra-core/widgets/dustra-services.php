<?php
	/**
	* Elementor Service Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Services_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'services';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Services', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
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
	* Retrieve the list of categories the Service widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'dustra-elements'];
	}

	public function get_script_depends() {
        return array('main');
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
			'services_content',
			[
				'label'		=> esc_html__( 'Set Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Service Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
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
			'post_from',
			[
				'label' 		=> esc_html__( 'Post From', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> esc_html__( 'All', 'dustra-core' ),
					'specpost' 		=> esc_html__( 'Specific Service', 'dustra-core' ),
				],
			]
		);

	
		$all_posts = array();

		$args = array('post_type' => 'dustra-service','post_status' => 'publish','posts_per_page' => -1  );
		$recent_posts = new WP_Query( $args  );
		while ( $recent_posts->have_posts()) :
		$recent_posts->the_post();
			$all_posts[get_the_ID()] = get_the_title();
		endwhile;

		$this->add_control(
		    'show_posts',
		    [
		        'label' => __( 'Specefic Post', 'dustra-core' ),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'multiple' => true,
		        'options' => $all_posts,
		        'condition'		=> [ 'post_from'	=>	'specpost' ],
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
			'read_more',
			[
				'label' 		=> esc_html__( 'Read More Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( 'Read More', 'dustra-core' ),
				'default' 		=> esc_html__( 'Read More', 'dustra-core' ),
			]
		);

		$this->add_control(
			'svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/5.png',
				],
				'condition' 	=> ['style' => ['1','9']],
			]
		);
		$this->add_control(
			'svg_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/6.png',
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'svg_three',
			[
				'label' 	=> esc_html__( 'Background Shape Three', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/12.png',
				],
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'svg_four',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/pattern.png',
				],
				'condition' 	=> ['style' => '4'],
			]
		);
		$this->add_control(
			'titledes1',
			[
				'label' 		=> esc_html__( 'Upper Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition' 	=> ['style' => '4'],
			]

		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'date', [
				'label' 		=> esc_html__( 'Date', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type date', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'time', [
				'label' 		=> esc_html__( 'Time', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'type time', 'dustra-core' ),
				'label_block' 	=> true,
			]
		);
		

		$this->add_control(
			'service_list',
			[
				'label' 	=> esc_html__( 'Time & Date', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Time And Date', 'dustra-core' ),
					],
				],
				'title_field' => '{{{ date }}}',
				'condition' 	=> ['style' => '4'],
			]
		);

		$this->add_control(
			'titledes2',
			[
				'label' 		=> esc_html__( 'Lower Content', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition' 	=> ['style' => '4'],
			]

		);
		$this->add_control(
			'service_contact_txt',
			[
				'label' 		=> esc_html__( 'Contact Us Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'condition' 	=> ['style' => '4'],
			]
		);
		$this->add_control(
			'service_contact_url',
			[
				'label' 		=> esc_html__( 'Contact Us Link', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'condition' 	=> ['style' => '4'],
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
			'service_design',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'service_title_color',
			[
				'label' 		=> esc_html__( 'Service Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .services-area .single-item h4 a ,{{WRAPPER}} .services-items h4 a'=> 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'service_title_typography',
				'label' 		=> esc_html__( 'Service Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .services-area .single-item h4 a ,{{WRAPPER}} .services-items h4 a'
			]
		);

		$this->add_control(
			'service_content_color',
			[
				'label' 		=> esc_html__( 'Service Content Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .services-area .single-item p,{{WRAPPER}} .services-items p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'service_content_typography',
				'label' 		=> esc_html__( 'Service Content Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .services-area .single-item p,{{WRAPPER}} .services-items p',
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		$dustra_services_output = $this->get_settings_for_display();


	    if( $dustra_services_output['post_from'] == "specpost" ){
			$service = array(
			   'post_type'         => 'dustra-service',
			   'posts_per_page'    => esc_attr( $dustra_services_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_services_output['order'] ),
			   'orderby'           => esc_attr( $dustra_services_output['order_by'] ),
			   'post__in' => $dustra_services_output['show_posts'],
		    );    
		}else{
			$service = array(
			   'post_type'         => 'dustra-service',
			   'posts_per_page'    => esc_attr( $dustra_services_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_services_output['order'] ),
			   'orderby'           => esc_attr( $dustra_services_output['order_by'] ),
		    );
		}

	    

        if($dustra_services_output['style'] == 2):
		?>
			<!-- Start Services 
		    ============================================= -->
		    <div class="services-area carousel-shadow with-thumb">
		        <div class="container">
		        	<?php if($dustra_services_output['section_show'] == "yes"): ?>
		            <div class="row">
		                <div class="col-lg-8 offset-lg-2">
		                    <div class="site-heading text-center">
		                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_services_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
		                </div>
		            </div>
		            <?php endif;?>
		            <div class="row">
		                <div class="col-lg-12">
		                    <div class="services-items services-carousel owl-carousel owl-theme">
		                    	<?php 
								$dustra_services = new WP_Query( $service );
								if( $dustra_services->have_posts() ):
									$counter=1;
									while( $dustra_services->have_posts() ):
										$dustra_services->the_post();
									$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
									$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
									$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
							    ?>
	                            <!-- Single Item -->
		                        <div class="item">
		                            <?php if( has_post_thumbnail() ){ ?>
			                            <div class="thumb">
											<?php the_post_thumbnail(); ?>
			                            </div>
		                            <?php } ?>
		                            <div class="info">
		                                <?php if(!empty($img_icon)): ?>
		                            		<img src="<?php echo esc_url($img_icon);?>">
		                            	<?php endif;?>
		                            	<?php if(!empty($ico_font)): ?>
		                            		<i class="<?php echo esc_attr($ico_font); ?>"></i>
		                            	<?php endif;?>
		                            	<?php if(!empty($nor_icon)): ?>
		                            		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
		                            	<?php endif;?>
		                                <h4>
		                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
		                                </h4>
			                        	<p><?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?></p>
		                                <div class="button">
		                                    <a href="<?php the_permalink();?>"><?php echo esc_html($dustra_services_output['read_more']);?><i class="fas fa-plus"></i></a>
		                                </div>
		                            </div>
		                        </div>
		                        <!-- End Single Item -->
		                        <?php 
		                        $counter++;
			                    endwhile;
								wp_reset_postdata();
								endif;
		                        ?>   
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	        <!-- End Services -->
		<?php elseif($dustra_services_output['style'] == 1): ?>

		    <!-- Start Services 
		    ============================================= -->
		    <div class="services-area icon-only overflow-hidden bg-gray default-padding bottom-less">
		        <div class="container">
		            <?php if($dustra_services_output['section_show'] == "yes"): ?>
		            <div class="row">
		                <div class="col-lg-8 offset-lg-2">
		                    <div class="site-heading text-center">
		                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_services_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
		                </div>
		            </div>
		            <?php endif;?>
		            <div class="services-box text-center">
		            	<?php if(!empty($dustra_services_output['svg_two']['url'])):?>
		                <!-- Fixed Shape -->
		                <div class="fixed-shape wow slideInRight">
		                    <img src="<?php echo esc_url($dustra_services_output['svg_two']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
		                </div>
		                <!-- End Fixed Shape -->
		                <?php endif;?>
		                <div class="row">
	                	<?php 
							$dustra_services = new WP_Query( $service );
							if( $dustra_services->have_posts() ):
								$counter=1;
								while( $dustra_services->have_posts() ):
									$dustra_services->the_post();
								$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
								$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
								$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
						?>
		                    <!-- Single Item -->
		                    <div class="single-item col-lg-3 col-md-6">
		                        <div class="item">
		                            <?php if(!empty($img_icon)): ?>
	                            		<img src="<?php echo esc_url($img_icon);?>">
	                            	<?php endif;?>
	                            	<?php if(!empty($ico_font)): ?>
	                            		<i class="<?php echo esc_attr($ico_font); ?>"></i>
	                            	<?php endif;?>
	                            	<?php if(!empty($nor_icon)): ?>
	                            		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
	                            	<?php endif;?>
		                            <h4>
			                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
			                        </h4>
		                            <p>
		                            	<?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?>
		                            </p>
		                            <a class="read-more" href="<?php the_permalink();?>"><i class="fas fa-angle-right"></i></a>
		                        </div>
		                    </div>
		                    <!-- End Single Item -->
	                    <?php 
	                        $counter++;
		                    endwhile;
							wp_reset_postdata();
							endif;
	                    ?>
		                </div>
		            </div>
		        </div>
		        <?php if(!empty($dustra_services_output['svg_one']['url'])):?>
			        <!-- Fixed Shape -->
			        <div class="fixed-shape-left wow fadeInDown">
			            <img src="<?php echo esc_url($dustra_services_output['svg_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
			        </div>
			        <!-- End Fixed Shape -->
		    	<?php endif?>
		    </div>
		    <!-- End Services -->
		<?php elseif($dustra_services_output['style'] == 3): ?>
			<!-- Start Services Area
		    ============================================= -->
		    <div class="thumb-services-area shadow default-padding bottom-less">
		        <!-- Shape -->
		        <div class="shape-bottom" style="background-image: url(<?php echo esc_url($dustra_services_output['svg_three']['url']); ?>);"></div>
		        <!-- End Shape -->
		        <div class="container">
		            <div class="thumb-services-items text-light">
		                <div class="row">
		                	<?php 
								$dustra_services = new WP_Query( $service );
								if( $dustra_services->have_posts() ):
									while( $dustra_services->have_posts() ):
									$dustra_services->the_post();
									$service_image_url = get_the_post_thumbnail_url(get_the_ID());
									$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
									$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
									$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
							?>
		                    <!-- Single Item -->
		                    <div class="single-item col-lg-4 col-md-6">
		                        <div class="item" style="background-image: url(<?php echo esc_url($service_image_url); ?>);">
		                            <div class="content">
		                                <div class="inner">
		                                    <?php if(!empty($img_icon)): ?>
			                            		<img src="<?php echo esc_url($img_icon);?>">
			                            	<?php endif;?>
			                            	<?php if(!empty($nor_icon)): ?>
			                            		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
			                            	<?php endif;?>
			                            	<?php if(!empty($ico_font)): ?>
			                            		<i class="<?php echo esc_attr($ico_font); ?>"></i>
			                            	<?php endif;?>
		                                    <h4><?php the_title();?></h4>
		                                    <p>
		                                       <?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?>
		                                    </p>
		                                </div>
		                                <div class="link">
		                                    <a class="btn circle btn-theme effect btn-sm" href="<?php the_permalink();?>"><?php echo esc_html($dustra_services_output['read_more']);?><i class="fal fa-plus"></i></a>
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
		    <!-- End Services -->
	<?php elseif($dustra_services_output['style'] == 4): ?>
		<!-- Start Services 
	    ============================================= -->
	    <div class="car-services-area bg-gray default-padding" style="background-image: url(<?php echo esc_url($dustra_services_output['svg_four']['url']); ?>);">
	        <div class="container">
	            <?php if($dustra_services_output['section_show'] == "yes"): ?>
		            <div class="row">
		                <div class="col-lg-8 offset-lg-2">
		                    <div class="site-heading text-center">
		                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_services_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
		                </div>
		            </div>
		        <?php endif;?>
	            <div class="services-box text-light">
	                <div class="row">
	                    <div class="col-lg-4">
	                        <div class="heading">
	                            <?php echo htmlspecialchars_decode(esc_html($dustra_services_output['titledes1']));?>
	                            <?php if(!empty($dustra_services_output['service_list'])):?>
		                            <ul>
		                            	<?php foreach($dustra_services_output['service_list'] as $services_schdule):?>
		                                	<li><?php echo esc_html($services_schdule['date']); ?> <span class="float-right"><?php echo esc_html($services_schdule['time']); ?> </span></li>
		                            	<?php endforeach;?>
		                            </ul>
	                        	<?php endif;?>
	                            <?php echo htmlspecialchars_decode(esc_html($dustra_services_output['titledes2']));?>
	                            <?php if(!empty($dustra_services_output['service_contact_txt'])):?>
	                            	<a class="btn btn-light border btn-md" href="<?php echo esc_url($dustra_services_output['service_contact_url']['url']);?>"><?php echo esc_html($dustra_services_output['service_contact_txt']);?></a>
	                        	<?php endif;?>
	                        </div>
	                    </div>
	                    <div class="col-lg-8">
	                        <div class="car-ser-carousel owl-carousel owl-theme">
	                        	<?php 
									$dustra_services = new WP_Query( $service );
									if( $dustra_services->have_posts() ):
										while( $dustra_services->have_posts() ):
										$dustra_services->the_post();
										$service_image_url = get_the_post_thumbnail_url(get_the_ID());;
								?>
	                            <!-- Single Item -->
	                            <div class="single-item" style="background-image: url(<?php echo esc_url($service_image_url); ?>);">
	                                <h4>
			                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
			                        </h4>
		                            <p>
		                            	<?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?>
		                            </p>
	                                <a href="<?php the_permalink();?>"><?php echo esc_html($dustra_services_output['read_more']);?> <i class="fas fa-angle-right"></i></a>
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
	    <!-- End Services -->
	<?php elseif($dustra_services_output['style'] == 5): ?>
		<!-- Start Services Area
	    ============================================= -->
	    <div class="services-area default-padding-top">
	        <div class="container">
	            <div class="services-style-three">
	                <div class="row">
	                    <div class="col-lg-4 col-md-6 service-item-style-three">
	                        <h6><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h6>
	                        <h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
	                    </div>
	                    <?php 
							$dustra_services = new WP_Query( $service );
							if( $dustra_services->have_posts() ):
								while( $dustra_services->have_posts() ):
								$dustra_services->the_post();
								$service_image_url = get_the_post_thumbnail_url(get_the_ID());
								$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
								$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
								$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
						?>
	                    <div class="col-lg-4 col-md-6 service-item-style-three">
	                        <div class="thumb" style="background: url(<?php echo esc_url($service_image_url); ?>);"></div>
	                        <?php if(!empty($img_icon)): ?>
                        		<img src="<?php echo esc_url($img_icon);?>">
                        	<?php endif;?>
                        	<?php if(!empty($ico_font)): ?>
                        		<i class="<?php echo esc_attr($ico_font); ?>"></i>
                        	<?php endif;?>
                        	<?php if(!empty($nor_icon)): ?>
                        		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
                        	<?php endif;?>
	                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                        <p>
	                           <?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?>
	                        </p>
	                    </div>
	                    <?php 
		                    endwhile;
							wp_reset_postdata();
							endif;
	                    ?>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End Services -->
	<?php elseif($dustra_services_output['style'] == 6): ?>
		<!-- Start Services Style Six
	    ============================================= -->
	    <div class="services-area bg-cover" style="background-image: url(<?php echo esc_url($dustra_services_output['svg_five']['url']); ?>);">
	        <div class="container">
	            <?php if($dustra_services_output['section_show'] == "yes"): ?>
		            <div class="row">
		                <div class="col-lg-8 offset-lg-2">
		                    <div class="site-heading text-center">
		                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
		                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
		                    	<?php endif;?>
		                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
		                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
		                        <?php endif;?>
								<?php if(!empty($dustra_services_output['section_description'])): ?>
		                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
		                        <?php endif;?>
		                    </div>
		                </div>
		            </div>
		        <?php endif;?>
	        </div>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-10 offset-lg-1">
	                    <div class="services-box">
	                        <div class="row">
	                        <?php 
								$dustra_services = new WP_Query( $service );
								if( $dustra_services->have_posts() ):
									while( $dustra_services->have_posts() ):
									$dustra_services->the_post();
									$service_image_url = get_the_post_thumbnail_url(get_the_ID());
									$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
									$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
									$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
							?>	
	                            <!-- Single Item -->
	                            <div class="services-style-four col-lg-6 col-md-6">
	                                <div class="item">
	                                    <div class="icon">
	                                        <?php if(!empty($img_icon)): ?>
				                        		<img src="<?php echo esc_url($img_icon);?>">
				                        	<?php endif;?>
				                        	<?php if(!empty($ico_font)): ?>
				                        		<i class="<?php echo esc_attr($ico_font); ?>"></i>
				                        	<?php endif;?>
				                        	<?php if(!empty($nor_icon)): ?>
				                        		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
				                        	<?php endif;?>
	                                    </div>
	                                    <div class="info">
	                                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                                        <p>
	                                            <?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?>
	                                        </p>
	                                        <a class="btn circle btn-gray border btn-sm" href="<?php the_permalink();?>"><?php echo esc_html($dustra_services_output['read_more']);?></a>
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
	    <!-- End Services Style Six -->
	    <?php elseif($dustra_services_output['style'] == 7): ?>
		<!-- Start Services Style Seven
	    ============================================= -->
	    <div class="services-style-five-area default-padding bottom-less">
	         <?php if($dustra_services_output['section_show'] == "yes"): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
	                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
	                    	<?php endif;?>
	                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
	                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
	                        <?php endif;?>
							<?php if(!empty($dustra_services_output['section_description'])): ?>
	                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
		    <?php endif;?>
	        <div class="container">
	            <div class="row">
	            	<?php 
						$dustra_services = new WP_Query( $service );
						if( $dustra_services->have_posts() ):
							while( $dustra_services->have_posts() ):
							$dustra_services->the_post();
							$service_image_url = get_the_post_thumbnail_url(get_the_ID());
							$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
							$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
							$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
					?>
	                <!-- Single Item  -->
	                <div class="services-style-five col-lg-3 col-md-6">
	                    <div class="item">
		                    <?php if(!empty($img_icon)): ?>
	                    	<img src="<?php echo esc_url($img_icon);?>">
	                    	<?php endif;?>
	                    	<?php if(!empty($ico_font)): ?>
	                    		<i class="<?php echo esc_attr($ico_font); ?>"></i>
	                    	<?php endif;?>
	                    	<?php if(!empty($nor_icon)): ?>
	                    		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
	                    	<?php endif;?>
	                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                        <p><?php echo esc_html(wp_trim_words(get_the_content(), $dustra_services_output['con_length'],'')); ?></p>
	                    </div>
	                </div>
	                <!-- End Single Item  -->
	                <?php 
	                    endwhile;
						wp_reset_postdata();
						endif;
                    ?> 
	            </div>
	        </div>
	    </div>
	    <!-- End Services Style Seven -->
	    <?php elseif($dustra_services_output['style'] == 8): ?>	
	    <!-- Start Services Style Eight -->
	    <div class="services-style-six-area bg-gray default-padding bottom-less">
        <?php if($dustra_services_output['section_show'] == "yes"): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <?php if(!empty($dustra_services_output['section_subtitle'])): ?>
                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($dustra_services_output['section_title'])): ?>
                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
                        <?php endif;?>
						<?php if(!empty($dustra_services_output['section_description'])): ?>
                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
	    <?php endif;?>
        <div class="container-full">
            <div class="services-style-six-box text-light bg-cover">
                <div class="row">
                	<?php 
						$dustra_services = new WP_Query( $service );
						if( $dustra_services->have_posts() ):
							while( $dustra_services->have_posts() ):
							$dustra_services->the_post();
							$service_image_url = get_the_post_thumbnail_url(get_the_ID());
							$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
							$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
							$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
					?>
	                    <!-- Single Item  -->
	                    <div class="services-style-six col-lg-3 col-md-6" style="background-image: url(<?php echo esc_url($service_image_url); ?>);">
	                        <div class="item">
	                            <?php if(!empty($img_icon)): ?>
                        		<img src="<?php echo esc_url($img_icon);?>">
	                        	<?php endif;?>
	                        	<?php if(!empty($ico_font)): ?>
	                        		<i class="<?php echo esc_attr($ico_font); ?>"></i>
	                        	<?php endif;?>
	                        	<?php if(!empty($nor_icon)): ?>
	                        		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
	                        	<?php endif;?>
	                            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                            <a href="<?php the_permalink();?>"><i class="fas fa-arrow-right"></i></a>
	                        </div>
	                    </div>
	                    <!-- End Single Item  -->
                    <?php 
	                    endwhile;
						wp_reset_postdata();
						endif;
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Style Eight -->
    <?php elseif($dustra_services_output['style'] == 9): ?>	
    <!-- Start Our Services Style Nine
    ============================================= -->
    <div class="services-style-ten-area default-padding bottom-less bottom-light-shape bg-dark">
    	<?php if($dustra_services_output['section_show'] == "yes"): ?>
	        <div class="container">
	            <div class="heading-left text-light">
	                <div class="row">
	                    <div class="col-lg-5">
	                        <div class="content-left">
	                        	<?php if(!empty($dustra_services_output['section_subtitle'])): ?>
	                            	<h5 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_subtitle']));?></h5>
	                            <?php endif;?>
	                            <?php if(!empty($dustra_services_output['section_title'])): ?>
	                            	<h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($dustra_services_output['section_title']));?></h2>
	                            <?php endif;?>
	                        </div>
	                    </div>
	                    <?php if(!empty($dustra_services_output['section_description'])): ?>
	                    <div class="col-lg-6 offset-lg-1">
	                        <p>
	                            <?php echo  htmlspecialchars_decode(esc_html($dustra_services_output['section_description']));?>
	                        </p>
	                    </div>
	                    <?php endif;?>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
            	<?php 
					$dustra_services = new WP_Query( $service );
					$counter = 1;
					if( $dustra_services->have_posts() ):
						while( $dustra_services->have_posts() ):
						$dustra_services->the_post();
						$service_image_url = get_the_post_thumbnail_url(get_the_ID());
						$img_icon = get_post_meta( get_the_ID(), 'custom_icon', true );
						$nor_icon = get_post_meta( get_the_ID(), 's_icon', true );
						$ico_font = get_post_meta( get_the_ID(), 'icofont', true );
				?>
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 services-style-ten">
                    <div class="item wow fadeInUp" data-wow-delay="300ms">
                         <?php if(!empty($dustra_services_output['svg_one']['url'])):?>
					        <div class="shape">
					            <img src="<?php echo esc_url($dustra_services_output['svg_one']['url']); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
					        </div>
				    	<?php endif?>
                        <?php if(!empty($img_icon)): ?>
                			<img src="<?php echo esc_url($img_icon);?>">
                    	<?php endif;?>
                    	<?php if(!empty($ico_font)): ?>
                    		<i class="<?php echo esc_attr($ico_font); ?>"></i>
                    	<?php endif;?>
                    	<?php if(!empty($nor_icon)): ?>
                    		<i class="<?php echo esc_attr($nor_icon); ?>"></i>
                    	<?php endif;?>
                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        <a href="<?php the_permalink();?>"><i class="fas fa-arrow-right"></i></a>
                        <span><?php echo esc_html("0");?><?php echo esc_attr($counter);?></span>
                    </div>
                </div>
                <!-- End Single Item -->
               	<?php 
               	    $counter++;
                    endwhile;
					wp_reset_postdata();
					endif;
                ?> 
            </div>
        </div>
    </div>
    <!-- End Services Style Nine -->
    <?php endif;
	}
}