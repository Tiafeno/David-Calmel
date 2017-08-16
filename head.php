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
    ul.category-nav-offcanvas {
      padding-right: 29px;
      display: inline-block;
      padding-left: 4px;
      margin: 0;
    }
    ul.category-nav-offcanvas > li {
      float: left;
      list-style: none;
      padding-left: 14px;
    }
    ul.category-nav-offcanvas > li > a{
      height: inherit;
      justify-content: space-between;
      color: #00A6DE;
      font-weight: 500;
      font-size: 0.685rem !important;
    }
    .header-offcanvas-title {
      padding-left: 43px;
    }
    .section-offcanvas h2.header-offcanvas-title{
      font-weight: bold;
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
      overflow-x : hidden;
    }
  </style>

</head>