<?php
/**
 * Output single post content
 */
?>
<article id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header clearfix">

    </header>
    <div class="entry-content">
        <?php
        the_content();
        ?>
        <div class="clearfix"></div>
    </div><!-- .entry-content -->
    <footer>
    <?php
    wp_link_pages( array(
        'before' => '<div class="page-links"><label>' . esc_html__( 'Pages:', 'bandq' ) . '</label>',
        'after'  => '</div>',
        'link_before' => '<span class="no">',
        'link_after'  => '</span>',
    ) );
    ?>
    </footer>
</article>

