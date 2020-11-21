<section class="page-title" <?php echo wp_kses_post($section_style); ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-md-left">
                <?php
                $title = get_the_title();
                if (is_home()) {
                    $title = wpfunc_get_option('blog_title') ? wpfunc_get_option('blog_title') : esc_html__('Blog', 'wpf_domain');
                } else if (is_singular('services')) {
                    $title = get_the_title();
                } else if (is_archive('services')) {
                    $title = esc_html__('Services', 'wpf_domain');
                } else if (is_404()) {
                    $title = esc_html__('404 Page', 'wpf_domain');
                }
                ?>
                <h2 class="f_600 page_title color_w"><?php echo esc_html($title); ?></h2>
            </div>
            <div class="col-lg-6">
                <?php
                if ($show_breadcrumb) {
                    $hide_on = wpfunc_get_option('hide_breadcrumb_on');
                    $current_postype = get_post_type();

                    $hide_breadcrumb = false;

                    if (isset($hide_on[$current_postype]) &&  $hide_on[$current_postype]) {
                        $hide_breadcrumb = true;
                    }

                    if (wpfunc_get_post_meta('mb_hide_breadcrumb')) {
                        $hide_breadcrumb = wpfunc_get_post_meta('mb_hide_breadcrumb');
                    }

                    if (!$hide_breadcrumb) {
                ?>
                        <ol class="breadcrumb mb-0 justify-content-end">
                            <?php
                            wpfunc_breadcrumbs(array(
                                'separator'     => '<li><i class="fal fa-angle-right"></i></li>',
                                'before_item'   =>  '<li>',
                                'after_item'    =>  '</li>',
                                'before'        => '',
                            ));
                            ?>
                        </ol>
                <?php
                    }
                }
                ?>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>