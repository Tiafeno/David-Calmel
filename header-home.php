<?php
/**
 * The main template file
 *
 *
 * @package WordPress
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

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header-nav-top">
    <div class="uk-container uk-container-small">
      <div class="uk-text-left" uk-grid>
          <div class="uk-width-1-4">
              <div class="uk-card uk-card-default uk-card-body navbar-card-slogan">
                <!--<p>DAVID ALEXANDRE CALMEL</p> -->
                <p class="blogingo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">DAVID ALEXANDRE CALMEL <?php //bloginfo( 'name' ); ?></a></p>
              </div>
          </div>
      </div>
    </div>
    <header class="header-nav-down">
      <div class="uk-container uk-container-small">
        <div class="uk-text-left" uk-grid>
            <div class="uk-width-3-4 uk-animation-toggle">
                <div class="uk-card uk-card-default uk-card-body navbar-card-slogan uk-animation-slide-top-small">
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
        					if ( $description || is_customize_preview() ) : ?>
                  <span>EXPERIENCED AGENCY MANAGER IN A MULTICULTURAL CONTEXT
                  EXECUTIVE CREATIVE DIRECTOR, ART DIRECTOR & COPY WRITER
                  CREDENTIALS ON GLOBAL BRANDS, OPEN MINDED, PASSIONATED</span>
                  <?php //echo $description; ?>
                  <?php endif; ?>

                </div>
            </div>
        </div>

      </div>
      <div class="uk-container uk-container-small">
        <nav class="uk-navbar-transparent uk-navbar" uk-navbar>

          <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="#"><h1 class="navbar-title">PORTFOLIO </h1></a></li>
            </ul>
          </div>

          <div class="uk-navbar-right">
            <!-- <ul class="uk-navbar-nav uk-visible@m">
              <li><a href="#">Parent</a></li>
              <li class="uk-active"><a href="#">Active</a></li>
              <li><a href="#">Item</a></li>
              <li><a href="#">Item</a></li>
              <li><a href="#">Item</a></li>
            </ul> -->
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

                          <!--<div class="uk-card-body">
                            <ul class="uk-nav uk-nav-default">
                              <li><a href="#">Parent</a></li>
                              <li class="uk-active"><a href="#">Active</a></li>
                              <li><a href="#">Item</a></li>
                              <li><a href="#">Item</a></li>
                              <li><a href="#">Item</a></li>
                            </ul>
                          </div> -->
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
