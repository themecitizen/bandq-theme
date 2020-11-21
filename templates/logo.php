<?php
/**
 * Display header logo
 */

$option_name = 'opt_logo_1';
$header_layout = wpfunc_get_option( 'header_layout' );
$select_header = wpfunc_get_post_meta( 'mb_custom_header' );
if ( $select_header )
{
    $header_layout = wpfunc_get_post_meta( 'mb_header_layout' );
}
if ( $header_layout )
{
    $option_name = sprintf( 'opt_logo_%s', $header_layout );
}

$logo = wpfunc_get_option( $option_name );
$logo_url = '';
if ( isset( $logo['url'] ) && ! empty( $logo['url'] ) )
{
    $logo_url = $logo['url'];
}
else
{
    $logo_url = WPF_URL . '/img/logo.png';
}
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
    <img title="<?php echo esc_attr( get_bloginfo( 'name' ) );?>" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr__( 'logo', 'wpf_domain' ); ?>">
</a>
