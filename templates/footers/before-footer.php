<div class="before-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>CONTACT US</h3>
                <h4>Send us a message</h4>
                <div class="contact-form">
                <?php
                echo do_shortcode('[contact-form-7 title="Footer-Contact"]');
                ?>
                </div>
             </div>
        </div>
    </div>
    <div class="social-section">
        <div class="container">
            <ul class="socials-info">
                <?php
                    $phone =  get_theme_mod( 'bandq_phone_number') != "" ? get_theme_mod( 'bandq_phone_number') : '#';
                    $instagram_acc =  get_theme_mod( 'bandq_instagram_acc') != "" ? get_theme_mod( 'bandq_instagram_acc') : '#';
                    $instagram =  get_theme_mod( 'bandq_instagram_url') != "" ? get_theme_mod( 'bandq_instagram_url') : '#';
                    $facebook_acc =  get_theme_mod( 'bandq_facebook_acc') != "" ? get_theme_mod( 'bandq_facebook_acc') : '#';
                    $facebook =  get_theme_mod( 'bandq_facebook_url') != "" ? get_theme_mod( 'bandq_facebook_url') : '#';
                    $email1 =  get_theme_mod( 'bandq_email_1') != "" ? get_theme_mod( 'bandq_email_1') : '#';
                    $email2 =  get_theme_mod( 'bandq_email_2') != "" ? get_theme_mod( 'bandq_email_2') : '#';
                ?>
                <li><a href="tel:<?php echo $phone; ?>"><img title="phone" src="<?php echo BANDQ_URL . '/img/phone-green.png'; ?>" alt="<?php echo esc_attr__( 'phone', 'bandq' ); ?>"><?php echo $phone; ?></a></li>
                <li><a href="mailto:<?php echo $email1; ?>"><img title="email" src="<?php echo BANDQ_URL . '/img/mail-green.png'; ?>" alt="<?php echo esc_attr__( 'email', 'bandq' ); ?>"><?php echo $email1; ?></a></li>
                <li><a href="mailto:<?php echo $email2; ?>"><img title="email" src="<?php echo BANDQ_URL . '/img/mail-green.png'; ?>" alt="<?php echo esc_attr__( 'email', 'bandq' ); ?>"><?php echo $email2; ?></a></li>                
                <li><a href="<?php echo $facebook; ?>"><img title="facebook" src="<?php echo BANDQ_URL . '/img/facebook-green.png'; ?>" alt="<?php echo esc_attr__( 'facebook', 'bandq' ); ?>"> <?php echo $facebook_acc; ?></a></li>
                <li><a href="<?php echo $instagram; ?>"><img title="instagram" src="<?php echo BANDQ_URL . '/img/instagram-green.png'; ?>" alt="<?php echo esc_attr__( 'instagram', 'bandq' ); ?>"> <?php echo $instagram_acc; ?></a></li>
            </ul>
        </div>
    </div>
</div>