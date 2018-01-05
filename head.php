<?php
$favicon_url = get_stylesheet_directory_uri().'/favicon/';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
<!--
                                                          
                                                      
`7MM"""YMM `7MMF'`7MN.   `7MF'`7MM"""YMM  `7MMF'      
  MM    `7   MM    MMN.    M    MM    `7    MM        
  MM   d     MM    M YMb   M    MM   d      MM        
  MM""MM     MM    M  `MN. M    MMmmMM      MM        
  MM   Y     MM    M   `MM.M    MM   Y  ,   MM      , 
  MM         MM    M     YMM    MM     ,M   MM     ,M 
.JMML.     .JMML..JML.    YM  .JMMmmmmMMM .JMMmmmmMMM 
                                                      
Hi there, nice to meet you!
Visit https://www.falicrea.com to know our current or former work.
-->
  <meta name="viewport" content="width=450, initial-scale=0.9">
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
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
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
    @media screen and (max-width: 853px) {
      .header-nav-down {
        /* padding-bottom: 36px; */
      }
    }
    @media screen and (min-width: 853px) {
      .header-nav-down {
        /* padding-bottom: 5px; */
      }
    }
    .header-middle-top .navbar-card-slogan {
      height: 50px;
      max-height: 50px;
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

    .bloginfo > .uk-icon-image{
      height: 30px;
      width: 30px;
      opacity: 0.5;
      position: relative;
      top: 0px;
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
      margin-right: 58px;
    }
    .dc-icon-image {
      width: 150px;
      display: block;
      background-size: contain;
      height: 40px;
      background-repeat: no-repeat;
      background-position: center left;
      margin-top: 5px;
      margin-bottom: 5px;
    }

    #menu-social-menu .uk-icon-button {
      width: 30px !important;
      height: 30px !important;
    }

    header.header-category-nav, .uk-container.section-offcanvas{
      background: url(<?= get_template_directory_uri() . '/images/bg-sub-menu.png'?>) repeat 0px -34px;
    }
    header.header-middle-top{
      background: url(<?= get_template_directory_uri() . '/images/bg-header-menu.png'?>) repeat top left;
    }
    header nav.uk-navbar {
      /* min-height: 44px; */
    }
    ul.category-nav-offcanvas {
      padding-right: 0px;
      display: inline-block;
      padding-left: 0px;
      margin: 10px 0 0 0;
    }
    ul.cv-offcanvas {
      display: inline-flex;
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
      display: block;
      color: white;
      font-size: 0.685rem;
      font-weight: 400;
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
    div.fw-background-container:hover:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: url(<?= get_template_directory_uri() . '/assets/img/striped.png'?>);
      background-size: cover;
    }

    .fw-background-container a {
      font-size: 170%;
      line-height: 1;
    }
    .fw-background-container .loading{
      display: block;
      width: 133px;
      height: 124px;
      position: absolute;
      visibility: hidden;
      top: 36%;
      left: 29%;
      /* background: url(https://media.giphy.com/media/k0RechlPcfQeA/giphy.gif); */
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
      background-position: center;
    }
    .fw-box-title {
      background: none;
      white-space: normal !important;
      margin-left: 2%;
    }
    .vc_row{
      display: inline-block;
      width: 100%;
      margin-left: 0;
      margin-right: 0;
    }
    .vc_column_container >.vc_column-inner {
      padding-left: initial;
    }

    .model p {
      font-size: 16px;
      font-weight: 400;
      line-height: 1.5;
      color: #19afe7;
      padding-bottom: 0px;
    }

    .flag span{
      display: block;
      margin-right: 0;
      padding-right: 10px;
    }
    a.dc-translate {
      display: block;
    }
    .flag > .container-flag {
      display: block;
      width: 30px;
      margin-right: 0;
      margin-left: auto;
    }
    .resize-single-img {
      width: 50% !important;
    }
    ul[id*='menu-cv'] {
      margin-bottom: 7px;
    }
    footer {
      background: #f5f2f2;
    }
    footer p{
      font-size: 10px;
      margin-top: 0;
      margin-bottom: 0;
    }
    .footer__copyright__title {
      font-weight: 700;
      margin: 0;
      font-family: 'Roboto', sans-serif;
      text-align: center;
      margin-top: 15px;
    }
    .footer__reserved {
      font-size: small;
      text-align: center;
    }
    .footer__logo {
      margin: auto;
      display: block;
    }
    .footer__contact {
      font-size: 14px;
      font-weight: 700;
    }
    .footer__description {
      font-size: .775rem !important;
      font-family: "Roboto", sans-serif;
    }
  </style>

</head>