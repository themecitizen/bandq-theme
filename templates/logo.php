<?php
/**
 * Display header logo
 */

$logo_url = BANDQ_URL . '/img/logo.png';
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
    <img title="<?php echo esc_attr( get_bloginfo( 'name' ) );?>" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr__( 'logo', 'bandq' ); ?>">
</a>
