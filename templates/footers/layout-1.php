<div class="footer-bottom">
	<div class="container">
		<div class="row align-items-center justify-content-center">
                <span>© 2020 Braddock and Purcell</span>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'menu d-flex'
                    ));
                }
                ?>
		</div>
	</div>
</div>