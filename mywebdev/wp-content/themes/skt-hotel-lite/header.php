<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Hotel Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
<div class="header">
  <div class="header-inner">
    <div class="logo">
	<?php hotel_the_custom_logo(); ?>
    <div class="clear"></div>	
    <a href="<?php echo home_url('/'); ?>">
      <h1>
        <?php bloginfo('name'); ?>
      </h1>
      <span class="tagline">
      <?php bloginfo( 'description' ); ?>
      </span> </a> </div>
    <!-- logo -->
    <div class="toggle"> <a class="toggleMenu" href="#">
      <?php esc_html_e('Menu','skt-hotel-lite'); ?>
      </a> </div>
    <!-- toggle -->
    <div class="nav">
      <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
    </div>
    <!-- nav -->
    <div class="clear"></div>
  </div>
  <!-- header-inner --> 
</div>
<!-- header -->