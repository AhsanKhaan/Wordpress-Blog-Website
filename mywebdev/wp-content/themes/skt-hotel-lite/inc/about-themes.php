<?php
//about theme info
add_action( 'admin_menu', 'hotel_abouttheme' );
function hotel_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-hotel-lite'), esc_html__('About Theme', 'skt-hotel-lite'), 'edit_theme_options', 'hotel_guide', 'hotel_mostrar_guide');   
} 

//guidline for about theme
function hotel_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>
<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-hotel-lite'); ?>
		   </div>
          <p><?php esc_attr_e('SKT  Hotel is a hotel WordPress theme which is responsive. It caters to hotel, hospitality business, restaurant, eatery, cuisine, recipe, cafe, lodge, food joint and others. It is mobile friendly and has a very nice animated homepage. It can be easily set up using Customizer API','skt-hotel-lite'); ?></p>
		  <a href="<?php echo SKT_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKT_LIVE_DEMO_URL; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-hotel-lite'); ?></a> | 
				<a href="<?php echo SKT_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'skt-hotel-lite'); ?></a> | 
				<a href="<?php echo SKT_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-hotel-lite'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKT_URL; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>