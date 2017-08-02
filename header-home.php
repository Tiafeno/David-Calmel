<?php
/**
 * The main template file
 *
 *
 * @package Tiafeno
 * @subpackage David_Calmel
 * @since David Calmel 1.0
 */

 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <script type="text/javascript">
    var PAGE = "Home";
  </script>
  <?php wp_head(); ?>

  <style type="text/css">
    ul.category-nav-offcanvas {
      padding-right: 29px;
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
    .header-category-nav-offcanvas .section-offcanvas{
      -webkit-transition: width 2s, height 2s, background-color 2s, -webkit-transform 2s;
      transition: transform 2s;
    }
  </style>

</head>

<body <?php body_class(); ?>>
  <header class="header-nav-top">
    <header class="container-nav-top">
      <div class="uk-container uk-container-small animated  slideInDown">
        <div class="uk-text-left" uk-grid>
            <div class="uk-width-1-5">
                <div class="uk-card uk-card-default uk-card-body navbar-card-slogan">
                  <!--<p>DAVID ALEXANDRE CALMEL</p> -->
                  <p class="blogingo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">DAVID ALEXANDRE CALMEL <?php //bloginfo( 'name' ); ?></a></p>
                </div>
            </div>
        </div>
      </div>
    </header>
    <header class="header-nav-down">
      <div class="uk-container uk-container-small animated  slideInLeft HeaderSlogan">
        <div class="uk-text-left onStickyStartHide">
            <div class="uk-child-width-1-1@m uk-width-2-3@m uk-light" uk-grid>
              <div>
                <div class="uk-card uk-card-default uk-card-body navbar-card-slogan uk-animation-slide-top-small">
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
        					if ( $description || is_customize_preview() ) : ?>
                  <span >EXPERIENCED AGENCY MANAGER IN A MULTICULTURAL CONTEXT
                  EXECUTIVE CREATIVE DIRECTOR, ART DIRECTOR & COPY WRITER
                  CREDENTIALS ON GLOBAL BRANDS, OPEN MINDED, PASSIONATED</span>
                  <?php //echo $description; ?>
                  <?php endif; ?>

                </div>
              </div>
            </div>
        </div>

      </div>
    </header>
    <header class="sticky-menu">
      <div class="uk-container uk-container-large HeaderMenu">
        <nav class="uk-navbar-transparent uk-navbar uk-container uk-container-small animated  slideInRight" uk-navbar>
          <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-active">
                  <a href="#">
                    <h1 class="navbar-title">PORTFOLIO </h1>
                  </a>
                </li>
            </ul>
          </div>

          <div class="uk-navbar-right">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                  wp_nav_menu( array(
                    'menu_class' => 'uk-navbar-nav uk-visible@m',
                    'container_class' => '',
                    'theme_location' => 'primary',
                    'container_class' => 'container_class_menu'
                    ) );
                ?>
            <?php endif; ?> <!-- .main-navigation -->

            <div class="uk-offcanvas-content uk-hidden@m">
                <!-- The whole page content goes here -->
                <div class="uk-navbar-left">
                    <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas-usage" uk-toggle></a>
                </div>
                <div id="offcanvas-usage" uk-offcanvas>
                    <div class="uk-offcanvas-bar">
                        <button class="uk-offcanvas-close" type="button" uk-close></button>
                        <h3><?php _e( 'Menu', 'twentysixteen' ); ?></h3>
                        <div class="uk-card uk-card-secondary">

                          <?php if ( has_nav_menu( 'primary' ) ) : ?>
                              <?php
                                wp_nav_menu( array(
                                  'menu_class' => 'uk-nav uk-nav-default',
                                  'container_class' => '',
                                  'theme_location' => 'primary',
                                  'container_class' => 'uk-card-body'
                                  ) );
                              ?>
                          <?php endif; ?> <!-- .offcanvas main-navigation -->
                        </div>
                    </div>
                </div>
            </div>

          </div>

        </nav>
      </div>
    </header>
    

  </header>

  <div id="main-content" class="uk-section uk-section-default"> <!-- uk-padding-remove-top -->
