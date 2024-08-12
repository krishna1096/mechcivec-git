<?php
	/**
	* Elementor Blog Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Blog_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Blog widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'blog';
	}

	/**
	* Get widget title.
	*
	* Retrieve Blog widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Blog', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Blog widget icon.
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
	* Retrieve the list of categories the Blog widget belongs to.
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
			'section_description',
			[
				'label' 		=> esc_html__( 'Section Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_content',
			[
				'label'		=> esc_html__( 'Set Content','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label' 	=> esc_html__( 'Blog Style', 'dustra-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'dustra-core' ),
					'2' 	=> esc_html__( 'Style Two', 'dustra-core' ),
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
					'categories' 	=> esc_html__( 'Categories', 'dustra-core' ),
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
			'order',
			[
				'label' 		=> esc_html__( 'Order', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'asc'  			=> esc_html__( 'Ascending', 'dustra-core' ),
					'desc' 			=> esc_html__( 'Descending', 'dustra-core' ),
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
			'content_length',
			[
				'label' 		=> esc_html__( 'Content Length', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '16',
				'placeholder' 	=> esc_html__( 'Type Content Length', 'dustra-core' ),
			]
		);
		$this->add_control(
			'content_show',
			[
				'label' => __( 'Show/Hide Content', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'dustra-core' ),
				'label_off' => __( 'Hide', 'dustra-core' ),
				'return_value' => 'yes',
				'default' => 'no',
				'condition'		=> [ 'blog_style'	=>	'1' ],
			]
		);
		$this->add_control(
			'read_more_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> 'Read More',
				'placeholder' 	=> esc_html__( 'Type Button Text', 'dustra-core' ),
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
			'blog_design_option',
			[
				'label'			=> esc_html__( 'Content Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bl_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'bl_title_color',
			[
				'label' 		=> esc_html__( 'Blog Title Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-items .single-item .info .content h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'blog_title_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-items .content h4',
			]
		);

		
		$this->add_control(
			'bl_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'bl_description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-items .content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'bl_description_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-items .content p',
			]
		);


		$this->add_control(
			'bl_date_option',
			[
				'label' 		=> esc_html__( 'Date Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'bl_date_color',
			[
				'label' 		=> esc_html__( 'Date Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area .thumb .date strong' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'bl_date_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .meta ul li:fast-child',
			]
		);

		$this->add_control(
			'bl_author_option',
			[
				'label' 		=> esc_html__( 'Author Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'bl_author_color',
			[
				'label' 		=> esc_html__( 'Author Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .meta ul li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'bl_author_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .meta ul li:fast-child',
			]
		);

		$this->add_control(
			'bl_rmore_option',
			[
				'label' 		=> esc_html__( 'Read More Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'bl_rmore3_color',
			[
				'label' 		=> esc_html__( 'Read More Text Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a.more-btn' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'blog_style' => ['3','2']],
			]
		);
		$this->add_control(
			'bl_rmore1_color',
			[
				'label' 		=> esc_html__( 'Read More Button Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area a.btn.btn-theme' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'blog_style' => ['1']],
			]
		);
		$this->add_control(
			'bl_rmore1_hover_color',
			[
				'label' 		=> esc_html__( 'Read More Button Hover Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area a.btn-theme::after' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'blog_style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'bl_rmore2_typography',
				'label' 		=> esc_html__( 'Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} a.more-btn, {{WRAPPER}} .blog-area a.btn.btn-theme',
				'condition'		=> [ 'blog_style' => ['3','2','1']],
			]
		);



		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		
		$dustra_blog_output = $this->get_settings_for_display();

		global $post;
		$con_length = $dustra_blog_output['content_length'];

	    if( $dustra_blog_output['post_from'] == "categories" ){
		   $blog = array(
			   'post_type'         => 'post',
			   'posts_per_page'    => esc_attr( $dustra_blog_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_blog_output['order'] ),
			   'orderby'           => esc_attr( $dustra_blog_output['order_by'] ),
			   'tax_query'         => array(
					   array(
						   'taxonomy'  => 'category',
						   'field'     => 'slug',
						   'terms'     => esc_attr( $dustra_blog_output['categories'] ),
					   )
				   ),
		   );
		}else{
			$blog = array(
			   'post_type'         => 'post',
			   'posts_per_page'    => esc_attr( $dustra_blog_output['post_limit'] ),
			   'order'             => esc_attr( $dustra_blog_output['order'] ),
			   'orderby'           => esc_attr( $dustra_blog_output['order_by'] ),
		   );
		}
	    $post_data = array();
	    $counter= 0;
	    $dustra_blog = new WP_Query( $blog );
	   
	    while ( $dustra_blog->have_posts()) {
	        $dustra_blog->the_post();
	        $tags=get_the_tags();
	        $post_data[] = array(
	          "title" => get_the_title(),
	          "content"=>get_the_excerpt(),
	          "date"=>get_the_date(),
	          "thumbnail"=>get_the_post_thumbnail_url(get_the_ID(),"full"),
	          "permalink"=>get_permalink(),
	          "author"=>get_the_author_meta("display_name"),
	          "author_url"=>get_author_posts_url(get_the_author_meta("ID")),
	          'author_avatar'=>get_avatar_url(get_the_author_meta("ID")),
	        );
	      $counter++;
	    }
	    wp_reset_postdata();

	    if($dustra_blog_output['blog_style'] == 1) {  
?>

    <!-- Start Blog Area 
    ============================================= -->
    <div class="blog-area default-padding bottom-less">
        <div class="container">
            <?php if($dustra_blog_output['section_show'] == 'yes'): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($dustra_blog_output['section_subtitle'])): ?>
	                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_blog_output['section_subtitle']));?></h4>
	                    	<?php endif;?>
	                    	<?php if(!empty($dustra_blog_output['section_title'])): ?>
	                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_blog_output['section_title']));?></h2>
	                        <?php endif;?>
							<?php if(!empty($dustra_blog_output['section_description'])): ?>
	                        	<?php echo  htmlspecialchars_decode(esc_html($dustra_blog_output['section_description']));?>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
        	<?php endif;?>
            <div class="blog-items">
                <div class="row">
                	<?php 
	            		while ( $dustra_blog->have_posts()) :
	       				$dustra_blog->the_post();
	       				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'dustra_800x600'); 
	       			?>
                    <!-- Single Item -->
                    <div class="col-lg-4 single-item">
                        <div class="item">
                            <?php if(has_post_thumbnail()):?>
	                            <div class="thumb">
	                                <a href="<?php echo esc_url(get_the_permalink());?>"><img src="<?php echo esc_url($full_image_url[0]);?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>"></a>
	                            </div>
		                    <?php endif;?>
                            <div class="info">
                                <div class="meta">
                                     <ul>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i> <?php the_time( 'M j, Y' ); ?>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                <i class="fas fa-user"></i>
                                                <span><?php echo esc_html(get_the_author());?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                   <h4>
                                        <a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a>
                                    </h4>
                                    <a class="btn btn-theme effect btn-sm" href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html($dustra_blog_output['read_more_button_text']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <?php endwhile;?>
					<?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
    <?php }elseif($dustra_blog_output['blog_style'] == 2){ ?>
    <!-- Start Blog Area 
    ============================================= -->
    <div class="blog-area home-blog date-less default-padding bottom-less">
        <div class="container">
            <?php if($dustra_blog_output['section_show'] == 'yes'): ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($dustra_blog_output['section_subtitle'])): ?>
	                        	<h4><?php echo htmlspecialchars_decode(esc_html($dustra_blog_output['section_subtitle']));?></h4>
	                    	<?php endif;?>
	                    	<?php if(!empty($dustra_blog_output['section_title'])): ?>
	                        	<h2><?php echo htmlspecialchars_decode(esc_html($dustra_blog_output['section_title']));?></h2>
	                        <?php endif;?>
							<?php if(!empty($dustra_blog_output['section_description'])): ?>
	                        	<?php echo  htmlspecialchars_decode(esc_html($dustra_blog_output['section_description']));?>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
        	<?php endif;?>
            <div class="blog-items">
                <div class="row">
                	<?php 
	            		while ( $dustra_blog->have_posts()) :
	       				$dustra_blog->the_post();
	       				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'dustra_800x600'); 
	       			?>
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="<?php echo esc_url(get_the_permalink());?>"><img src="<?php echo esc_url($full_image_url[0]);?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>"></a>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                <i class="fas fa-user"></i>
                                                <span><?php echo esc_html(get_the_author());?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                                <i class="fas fa-comments"></i>
                                                <span><?php echo get_comments_number();?> <?php if(get_comments_number() > '1'){echo esc_html__("Comments", 'dustra' );}else{echo esc_html__("Comment", 'dustra' );} ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h4>
                                        <a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a>
                                    </h4>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(),$dustra_blog_output['content_length'],'')); ?></p>
                                    <a class="more-btn" href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html($dustra_blog_output['read_more_button_text']); ?><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <?php endwhile;?>
					<?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->	
    <?php 
      }
	}
}
