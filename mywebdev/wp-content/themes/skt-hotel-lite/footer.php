<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Hotel Lite
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-1">            	
				<?php $menutitle = get_theme_mod('menu_title'); ?>
                <?php if (!empty($menutitle)) { ?>
                   <h5><?php echo esc_html($menutitle); ?></h5>  
                <?php } ?>   
                <div class="menu">
                  <?php wp_nav_menu( array('theme_location' => 'footermenu') ); ?>
                </div>
            </div>                  
             <div class="cols-4 widget-column-2">            	
                   <?php $newstitle = get_theme_mod('news_title'); ?>
                   <?php if (!empty($newstitle)) { ?>
                   <h5><?php echo esc_html($newstitle); ?></h5>  
                   <?php } ?>     
				<?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
                    query_posts( $args ); ?>
                    
                  <?php while ( have_posts() ) :  the_post(); ?>
                        <div class="recent-post">
                         <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                         <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>                         
                         <?php the_excerpt(); ?>                         
                        </div>
                 <?php endwhile; ?>
              </div>     
                      
               <div class="cols-4 widget-column-3">
                   <?php $socialtitle = get_theme_mod('social_title'); ?>
                   <?php if (!empty($socialtitle)) { ?>
                   <h5><?php echo esc_html($socialtitle); ?></h5>  
                   <?php } ?>
                             	
					<div class="clear"></div>                
                  <div class="social-icons">
               		<?php $fb_link = get_theme_mod('fb_link'); ?>
					<?php if (!empty($fb_link)) { ?>
                    <a title="facebook" class="fa fa-facebook" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
                    <?php } ?>                   
                    
                    <?php $twitt_link = get_theme_mod('twitt_link');?>
                    <?php if (!empty($twitt_link)) { ?>
                    <a title="twitter" class="fa fa-twitter" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
                    <?php } ?>                 
                    
                    <?php $gplus_link = get_theme_mod('gplus_link'); ?>
                    <?php if (!empty($gplus_link)) { ?>
                    <a title="google-plus" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
                    <?php } ?>                    
                    
                    <?php $linked_link = get_theme_mod('linked_link'); ?>
                    <?php if (!empty($linked_link)) { ?> 
                    <a title="linkedin" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
                    <?php } ?>                   
               </div>   
                </div>
                
                <div class="cols-4 widget-column-4">
                
                   <?php $contactttitle = get_theme_mod('contact_title'); ?>
                   <?php if (!empty($contactttitle)) { ?>
                   <h5><?php echo esc_html($contactttitle); ?></h5>  
                   <?php } ?>     
                                   <?php $contact_add = get_theme_mod('contact_add'); ?> 
                <?php if(!empty($contact_add)){?>           	
                   <p><?php echo wp_kses_post($contact_add); ?></p>
                   <?php } ?>
              <div class="phone-no">                <?php $contact_no = get_theme_mod('contact_no'); ?> 
                	<?php if(!empty($contact_no)){?><?php echo esc_html($contact_no); ?> <?php } ?> <br  />
               <?php $contact_mail = get_theme_mod('contact_mail'); ?>          
               <?php if(!empty($contact_mail)){ ?>  
           <strong> <?php esc_attr_e('Email:','skt-hotel-lite');?></strong> <a href="mailto:<?php echo sanitize_email($contact_mail); ?>"><?php echo $contact_mail; ?></a>
           <?php } ?>
           </div>
                </div><!--end .widget-column-4-->
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php esc_attr_e('SKT Hotel Lite','skt-hotel-lite');?></div>
                <div class="design-by"><?php echo hotel_themebytext(); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>