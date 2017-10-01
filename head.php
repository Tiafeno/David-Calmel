<?php
$favicon_url = get_stylesheet_directory_uri().'/favicon/';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=450, initial-scale=0.9, maximum-scale=0.9">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <?php endif; ?>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="apple-touch-icon" sizes="57x57" href="<?= $favicon_url ?>apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?= $favicon_url ?>apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= $favicon_url ?>apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $favicon_url ?>apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= $favicon_url ?>apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?= $favicon_url ?>apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?= $favicon_url ?>apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= $favicon_url ?>apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $favicon_url ?>apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?= $favicon_url ?>android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $favicon_url ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= $favicon_url ?>favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $favicon_url ?>favicon-16x16.png">
  <link rel="manifest" href="<?= $favicon_url ?>manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?= $favicon_url ?>ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  
  <?php wp_head(); ?>

  <style type="text/css">
    @media(max-width: 960px){
      .HeaderMenu .uk-navbar-right:before,
      .uk-navbar-right:before{
        border-left: none;
        display: none;
      }
    }
    
    @media(min-width: 960px){
      .HeaderMenu .uk-navbar-right:before{
        border-left:2px solid dimgrey;
      }
      .uk-navbar-right:before{
        border-left:2px solid #ffffff;
        display: inherit;
      }
      .vc_column_container > .vc_column-inner {
        padding-left: 0;
      }
    }

    @media(max-width: 640px){
      .flag{
        margin: 0 auto;
      }
      .flag span{
        width: 24px;
        height: 24px;
      }
    }

    @media(min-width: 640px){
      .flag span{
        width: 17.7px;
        height: 17.7px;
      }
    }

    .flag span{
      display: block;
      margin-right: 0;
      margin-left: auto;
      padding-right: 10px;
    }

    .bloginfo > .uk-icon-image{
      height: 30px;
      width: 30px;
      opacity: 0.5;
      position: relative;
      top: 2px;
      float: right;
    }

    h1, .uk-h1, h2, .uk-h2, h3, .uk-h3, h4, .uk-h4, h5, .uk-h5, h6, .uk-h6{
      font-family: 'Playfair Display', serif;
    }
    .uk-navbar-right .uk-navbar-nav > li > a{
      font-family: 'Roboto', sans-serif;
    }

    .uk-navbar-right:before{
      content:' ';
      height: 40px;
      display: block;
      width: 1px;
      margin-right: 50px;
    }

    header.header-category-nav, .uk-container.section-offcanvas{
      background: url(<?= get_template_directory_uri() . '/images/bg-sub-menu.png'?>) repeat top left;
    }
    header.header-middle-top{
      background: url(<?= get_template_directory_uri() . '/images/bg-header-menu.png'?>) repeat top left;
      background-size: 86px;
    }
    header nav.uk-navbar {
      min-height: 44px;
    }
    ul.category-nav-offcanvas {
      padding-right: 29px;
      display: inline-block;
      padding-left: 4px;
      margin: 0;
    }
    ul.category-nav-offcanvas > li {
      float: left;
      list-style: none;
      padding-right: 14px;
    }
    ul.category-nav-offcanvas > li > a{
      height: inherit;
      justify-content: space-between;
      color: #00A6DE;
      font-weight: 500;
      font-size: 0.685rem !important;
    }
    ul.category-nav-offcanvas span.scroll {
      color: white;
      font-size: 0.685rem;
      font-weight: 500;
      font-family: 'Roboto', sans-serif;
      padding-right: 3px;
    }
    .header-offcanvas-title {
      padding-left: 43px;
    }
    .section-offcanvas h2.header-offcanvas-title{
      font-weight: lighter;
      font-size: 40px;
    }
    .header-category-nav-offcanvas .section-offcanvas{
      -webkit-transition: width 2s, height 2s, background-color 2s, -webkit-transform 2s;
      transition: transform 2s;
    }
    .fw-background-container .loading{
      display: block;
      width: 133px;
      height: 124px;
      position: absolute;
      visibility: hidden;
      top: 36%;
      left: 29%;
      background: url(https://media.giphy.com/media/k0RechlPcfQeA/giphy.gif);
      visibility: initial;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .fw-background-container > .fw-background{
      display: block;
      width: inherit;
      height: inherit;
      background-size: cover;
      background-repeat: no-repeat;
    }
    html, body{
      /* overflow-x : hidden; */
    }
    .vc_row{
      display: inline-block;
      width: 100%;
      margin-left: 0;
      margin-right: 0;
    }
    .vc_column_container>.vc_column-inner {
      padding-left: initial;
    }
    
  </style>

</head>