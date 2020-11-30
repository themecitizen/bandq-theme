<div class="header-main">
    <div class="band-container">
        <div class="row align-items-center">
            <div class="left-content d-flex align-items-center col-10">
                <a class="toggle-menu"><img src="<?php echo BANDQ_URL . '/img/toggle-icon.png'; ?>" alt="toggle-mobile-icon"/></a>
                <?php
                get_template_part('templates/logo');
                ?>
                <div class="nav-container navbar navbar-expand-lg align-items-center d-lg-block">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav-menu navbar-nav menu'
                    ));
                }
                ?>
				</div>
            </div>
            <div class="right-content col-lg-2 d-none d-lg-block text-right">
                <div class="list-socials">
                    <a href="#" class="social">
                        <img title="phone" src="<?php echo BANDQ_URL . '/img/phone.png';; ?>" alt="<?php echo esc_attr__( 'phone', 'bandq' ); ?>">
                    </a>
                    <a href="#" class="social">
                        <img title="instagram" src="<?php echo BANDQ_URL . '/img/instagram.png';; ?>" alt="<?php echo esc_attr__( 'instagram', 'bandq' ); ?>">
                    </a>
                    <a href="#" class="social">
                        <img title="facebook" src="<?php echo BANDQ_URL . '/img/facebook.png';; ?>" alt="<?php echo esc_attr__( 'facebook', 'bandq' ); ?>">
                    </a>
                </div>
            </div>
            <div class="right-content col-2 d-lg-none text-right">
                <div class="mobile-nav-toggler navbar-toggler <?php echo esc_attr($classes); ?>"><span class="icon flaticon-menu"></span></div>
            </div>
        </div>
    </div>
</div>
