  <nav class="uk-navbar-transparent uk-navbar" uk-navbar>
    <div class="uk-navbar-left animated slideInLeft">
      <ul class="uk-navbar-nav">
          <!-- On the desktop  uk-visible@m -->
          <li class="uk-active">
            <a href="#" class="uk-padding-remove-left">
              <h1 class="navbar-title"> <?= $title ?> </h1>
            </a>
          </li>
      </ul>
    </div>

    <div class="uk-navbar-right animated slideInRight">
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