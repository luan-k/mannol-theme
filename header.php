<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <? wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	<div class="wraper" >

  <header class="wk-header">
    <div class="wk-header-wrapper">
      <div class="wk-header__logo-wrapper">
        <a href="<?php echo home_url(); ?>" class="wk-header__logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo">
        </a>
      </div>
      <div class="wk-header__menu">
        <nav class="wk-header__nav">
          <?php
            /* wp_nav_menu( array(
              'theme_location' => 'header_menu',
              'container' => false,
              'menu_class' => 'wk-header__nav-list',
              'items_wrap' => '<ul class="%2$s">%3$s</ul>'
            ) ); */
          ?>
          <ul class="wk-header__nav-list">
            <li class="wk-header__nav-item">
              <a href="#" class="wk-header__nav-link">Início</a>
            </li>
            <li class="wk-header__nav-item">
              <a href="#" class="wk-header__nav-link">Sobre Nós</a>
            </li>
            <li class="wk-header__nav-item">
              <a href="#" class="wk-header__nav-link">Produtos</a>
            </li>
            <li class="wk-header__nav-item">
              <a href="#" class="wk-header__nav-link">Contato</a>
            </li>
            <!-- catalogo -->
          </ul>
        </nav>
        <div class="search">search</div>
    </div>
  </header>