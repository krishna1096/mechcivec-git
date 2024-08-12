<?php
	/**
	* Elementor Portfolio Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Portfolio_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Price widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'portfolio';
	}

	/**
	* Get widget title.
	*
	* Retrieve Price widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Portfolio', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Price widget icon.
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
	* Retrieve the list of categories the Price widget belongs to.
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
				'label' => __( 'Show/Hide Section Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
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
			'section_content',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'portfolio_content',
			[
				'label'		=> esc_html__( 'Set Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Portfolio Version', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'dustra-core' ),
					'2'  	=> esc_html__( 'Style Two', 'dustra-core' ),
					'3'  	=> esc_html__( 'Style Three', 'dustra-core' ),
				],
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
					'specpost' 		=> esc_html__( 'Specific Post', 'dustra-core' ),
				],
			]
		);

	
		$all_posts = array();

		$args = array('post_type' => 'dustra-portfolio','post_status' => 'publish','posts_per_page' => -1  );
		$recent_posts = new WP_Query( $args  );
		while ( $recent_posts->have_posts()) :
		$recent_posts->the_post();
			$all_posts[get_the_ID()] = get_the_title();
		endwhile;

		$this->add_control(
		    'portfolio_show_posts',
		    [
		        'label' => __( 'Specefic Post', 'dustra-core' ),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'multiple' => true,
		        'options' => $all_posts,
		        'condition'		=> [ 'post_from'	=>	'specpost' ],
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
			'date_text',
			[
				'label' 		=> esc_html__( 'Date Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Launch Date:', 'dustra-core' ),
			]
		);
		
		$this->add_control(
			'svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/shape/14.png',
				],
			]
		);
		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'portfolio_heading_style',
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
			'portfolio_design_option',
			[
				'label'			=> esc_html__( 'Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'portfolio_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'portfolio_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title  h5 a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'portfolio_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .pf-item .overlay .content .title  h5 a',
			]
		);
		$this->add_control(
			'portfolio_title_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title  h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'portfolio_title_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title  h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'portfolio_cat_color',
			[
				'label' 		=> esc_html__( 'Category Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'portfolio_cat_typography',
				'label' 		=> esc_html__( 'Category Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .pf-item .overlay .content .title span',
			]
		);
		$this->add_control(
			'portfolio_cat_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'portfolio_cat_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pf-item .overlay .content .title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		$dustra_portfolio_output = $this->get_settings_for_display();
		global $post;

		if( $dustra_portfolio_output['post_from'] == "specpost" ){
			$portfolio_query = array(
			   'post_type'         => 'dustra-portfolio',
			   'posts_per_page'    => esc_attr( $dustra_portfolio_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_portfolio_output['order'] ),
			   'orderby'           => esc_attr( $dustra_portfolio_output['order_by'] ),
			   'post__in' => $dustra_portfolio_output['portfolio_show_posts'],
		    );    
		}else{
			$portfolio_query = array(
			   'post_type'         => 'dustra-portfolio',
			   'posts_per_page'    => esc_attr( $dustra_portfolio_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_portfolio_output['order'] ),
			   'orderby'           => esc_attr( $dustra_portfolio_output['order_by'] ),
		    );
		}

		$portfolio = new WP_Query($portfolio_query);
		if($dustra_portfolio_output['style'] == 1){
	?>

    <!-- Start Portfolio Area 
    ============================================= -->   
    <div class="gallery-area default-padding">
        <div class="container">
        	<?php if($dustra_portfolio_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <?php 
                        if(!empty($dustra_portfolio_output['section_subtitle'])): ?>
                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($dustra_portfolio_output['section_title'])): ?>
                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_title']));?></h2>
                        <?php endif;?>
						<?php if(!empty($dustra_portfolio_output['section_content'])): ?>
                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_content']));?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery masonary">
                        <div id="portfolio-grid" class="gallery-items colums-3">
                        	<?php
								while ( $portfolio->have_posts() ) :
	        					$portfolio->the_post();
	        					$cat_terms = wp_get_post_terms($post->ID, 'dustra_portfolio_categories', array("fields" => "names"));
	                            $image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'dustra_800x800');   
							?>
                            <!-- Single Item -->
                            <div class="pf-item">
                                <div class="overlay">
                                	<?php if(!empty($image)):?>
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                                    <?php endif;?>
                                    <div class="content">
                                        <div class="title">
                                            <span><?php echo esc_html(implode(', ', $cat_terms)); ?></span>
                                    		<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        </div>
                                        <a href="<?php the_permalink();?>"><i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio Area -->
    <?php }elseif($dustra_portfolio_output['style'] == 2){?>
   	<!-- Start Portfolio Area 
    ============================================= -->
    <div class="portfolio-area">
        <!-- Fixed Shape -->
        <div class="top-sahpe" style="background-image: url(<?php echo esc_url($dustra_portfolio_output['svg_one']['url']); ?>);"></div>
        <!-- Fixed Shape -->
        <?php if($dustra_portfolio_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <?php 
                        if(!empty($dustra_portfolio_output['section_subtitle'])): ?>
                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($dustra_portfolio_output['section_title'])): ?>
                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_title']));?></h2>
                        <?php endif;?>
						<?php if(!empty($dustra_portfolio_output['section_content'])): ?>
                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_content']));?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class="container-full">
            <div class="portfolio-box">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-carousel owl-carousel owl-theme">
                        	<?php
								while ( $portfolio->have_posts() ) :
	        					$portfolio->the_post();
	        					$cat_terms = wp_get_post_terms($post->ID, 'dustra_portfolio_categories', array("fields" => "names"));
	                            $image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'dustra_800x1050');   
							?>
                            <!-- Single Item -->
                            <div class="item">
                                <div class="thumb">
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                                </div>
                                <div class="info">
                                    <div class="content">
                                        <div class="left">
                                            <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                            <?php $launch_date = get_post_meta( get_the_ID(), 'launch_date', true ); ?>
                                        	<?php if(!empty($launch_date)):?>
                                            <span> <strong><?php echo esc_html($dustra_portfolio_output['date_text']);?></strong> <?php echo date('j M Y', strtotime($launch_date));   ?></span>
                                            <?php endif;?>
                                        </div>
                                        <div class="right">
                                            <a href="<?php the_permalink();?>"><i class="fal fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio Area -->
    <?php }elseif($dustra_portfolio_output['style'] == 3){?>
	<!-- Start Gallery
    ============================================= -->
    <div class="gallery-area bg-gray default-padding">
        <div class="container">
            <?php if($dustra_portfolio_output['section_show'] == 'yes'): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                        <?php 
	                        if(!empty($dustra_portfolio_output['section_subtitle'])): ?>
	                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_subtitle']));?></h4>
	                    	<?php endif;?>
	                    	<?php if(!empty($dustra_portfolio_output['section_title'])): ?>
	                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_title']));?></h2>
	                        <?php endif;?>
							<?php if(!empty($dustra_portfolio_output['section_content'])): ?>
	                        	<p><?php echo  htmlspecialchars_decode(esc_html($dustra_portfolio_output['section_content']));?></p>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        <?php endif;?>
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery masonary portfolio-list">
                        <div class="gallery-items  colums-3">
                        	<?php
								while ( $portfolio->have_posts() ) :
	        					$portfolio->the_post();
	        					$cat_terms = wp_get_post_terms($post->ID, 'dustra_portfolio_categories', array("fields" => "names"));
	                            $image= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'dustra_800x1050');   
							?>
                            <!-- Single Item -->
                            <div class="pf-item">
                                <div class="overlay">
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                                    <div class="content">
                                        <div class="title">
                                            <span><?php echo esc_html(implode(', ', $cat_terms)); ?></span>
                                    		<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                        </div>
                                        <a href="<?php the_permalink();?>"><i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->
	<?php 
		}
	}
}