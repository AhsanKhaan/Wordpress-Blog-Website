<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Hotel Lite
 */
get_header(); ?>
<?php if (!is_home() && is_front_page()) { ?>
<section id="home_slider">
        	<?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<6; $i++) {
				if ( get_theme_mod('slide_image'.$i)){
					$imgSrc 	= get_theme_mod('slide_image'.$i);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div><?php
				
				
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                       <h2><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln)); ?>"><?php echo get_theme_mod('slide_title'.$sln); ?></a></h2>
                            <?php if( get_theme_mod('slide_desc'.$sln) ) { ?>
                              <p><?php echo get_theme_mod('slide_desc'.$sln); ?></p>
                            <?php } ?>
                            
                           <?php if( get_theme_mod('slide_link'.$sln) ) { ?>
                              <a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln)); ?>"><?php esc_html_e('Read More &raquo;','skt-hotel-lite'); ?></a>
                           <?php } ?>
                    </div>
                    </div><?php 
                } ?>
                </div>
                <div class="clear"></div><?php 
			}
            ?>
            <div class="container">           
                   <?php if( get_theme_mod('booknow_button') ) { ?>
                      <a class="bookbtn" target="_blank" href="<?php echo esc_url(get_theme_mod('booknow_button')); ?>">
					  <?php echo wp_kses('Book <b>Now</b><span class="fa fa-chevron-right"></span>','skt-hotel-lite'); ?>
                      </a>
                    <?php } ?>             
             </div>
        </section>
<?php } ?>
<?php if (!is_home() && is_front_page()) { ?>
<section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                    
                      <?php if( get_theme_mod('shortinfo_sb') ) { ?>
                           <?php echo get_theme_mod('shortinfo_sb'); ?>
                      <?php } ?>

<div class="space30"></div>
                    
                      <?php if( get_theme_mod('column_one') ) { ?>
                           <?php echo get_theme_mod('column_one'); ?>
                      <?php } ?>

<?php if( get_theme_mod('column_two') ) { ?>
                           <?php echo get_theme_mod('column_two'); ?>
                      <?php } ?>


<?php if( get_theme_mod('column_three') ) { ?>
                           <?php echo get_theme_mod('column_three'); ?>
                      <?php } ?>

                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section>
<?php } ?>
<div class="clear"></div>
<div id="content">
  <div class="container padtop">
    <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section id="FrontBlogPost">
  <div class="container">
  <h1 class="entry-title"><center><?php esc_html_e('Latest Posts','skt-hotel-lite'); ?></center></h1>       
     <div class="site-main" id="sitefull">         
       <?php
	   $p = 0;
        global $wp_query;
        query_posts(array_merge($wp_query->query, array(
            'paged' => get_query_var('paged'), 'orderby' => 'title', 'order' => 'DESC' )));       
    ?>
       <?php global $wp_query; ?>
        <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?><?php $p++; ?>      
            <div class="blog_lists BlogPosts <?php if( $p%3==0 ){?>last_column<?php } ?>">        
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } else {  ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
                <?php } ?>
                </a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="blog-meta"><?php echo get_the_date(); ?> | <?php comments_number(); ?></div>
              <?php the_excerpt(); ?>
              <a class="MoreLink" href="<?php the_permalink(); ?>"><?php echo esc_attr_e('Read more &raquo;','skt-hotel-lite');?></a> 
              <div class="clear"></div>
          </div>       
        <?php endwhile; the_posts_pagination(); ?> 
      <div class="clear"></div>
  </div> 
  </div><!-- .container -->   
 </section>
    <?php
} else {
    ?>
    
    <section class="site-main" id="sitemain">
      <div class="frontcontent">
		<?php
        if ( have_posts() ) :
        // Start the Loop.
        while ( have_posts() ) : the_post();
        /*
        * Include the post format-specific template for the content. If you want to
        * use this in a child theme, then include a file called called content-___.php
        * (where ___ is the post format) and that will be used instead.
        */
        ?>
        <header class="entry-header">
          <h1>
            <?php the_title(); ?>
          </h1>
        </header>
        <?php 
			the_content();
                    
            endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-hotel-lite' ),
							'next_text' => esc_html__( 'Next', 'skt-hotel-lite' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
        <?php get_sidebar();?>
    <?php } ?>
    <div class="clear"></div>
  </div>
  <!-- site-aligner --> 
  
</div>
<?php get_footer(); ?>