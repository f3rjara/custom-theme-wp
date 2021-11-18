<?php
  /**
   * The header for our theme *
   * This is the template that displays all of the <head> section and everything up until <div id="content"> *
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials *
   * @package playtic
  */
?>

<!doctype html>
  <html <?php language_attributes(); ?>>
    <head>  
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta content='width=device-width, initial-scale=1.0' name='viewport'>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta content='#fff' name=' theme-color'>
      <meta content='<?php bloginfo('description'); ?>' name='description'>
      <meta content='playtic' name='keywords'>
      <meta content='website' property='og:type'>
      <meta content='<?php wp_title('|', true, 'right'); ?>' property='og:title'>
      <meta content='<?php bloginfo('description'); ?>' property='og:description'>
      <link rel="profile" href="https://gmpg.org/xfn/11">
      <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
      <?php wp_head(); ?>
    </head>

  <body data-page-handle="<?php echo $_SERVER['REQUEST_URI']; ?>" <?php body_class(); ?> >
  <?php wp_body_open(); ?>

    <header>
      <?php  get_template_part( 'template-parts/main-header', 'content' );?>
    </header>

  <div id="site-main-content" class="site-main-content">