<?php
/**
 * The main template file
 *
 *
 * @package Tiafeno
 * @subpackage David_Calmel
 * @since David Calmel 1.0
 */
get_template_part('head');
 ?>
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
    <header style="background-color: #2D2E83">
      <header class="header-nav-down animated slideInDown">
        <div class="uk-container uk-container-small HeaderSlogan">
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
      <header class="HeaderMenu animated  slideInDown">
        <div class="uk-container uk-container-small">
          <nav class="uk-navbar-transparent uk-navbar" uk-navbar>
            <div class="uk-navbar-left">
              <ul class="uk-navbar-nav">
                  <!-- On the desktop  uk-visible@m -->
                  <li class="uk-active">
                    <a href="#">
                      <!-- <div class="uk-cover-container img-navbar-title" style="position: absolute; top: 0; left: 0;">
                          <canvas width="328" height="45"></canvas>
                        <img src="<?= get_template_directory_uri().'/assets/img/portfolio.png' ?>" uk-cover/>
                      </div> -->
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
                  <div class="uk-navbar-right">
                      <a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle="target: #offcanvas-push"></a>
                  </div>
                  <div id="offcanvas-push" uk-offcanvas>
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
    
    

  </header>

  <div id="main-content" class="uk-section uk-section-default"> <!-- uk-padding-remove-top -->
