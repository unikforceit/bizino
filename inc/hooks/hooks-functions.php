<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit();
}


// preloader hook function
if (!function_exists('bizino_preloader_wrap_cb')) {
    function bizino_preloader_wrap_cb()
    {
        $preloader_display = bizino_opt('bizino_display_preloader');

        if (class_exists('ReduxFramework')) {
            if ($preloader_display) {
                echo '<div class="preloader">';
                echo '<button class="vs-btn preloaderCls">' . esc_html__('Cancel Preloader', 'bizino') . '</button>';
                echo '<div class="preloader-inner">';
                if (!empty(bizino_opt('bizino_preloader_img', 'url'))) {

                    echo bizino_img_tag(array(
                        'url' => esc_url(bizino_opt('bizino_preloader_img', 'url')),
                        'class' => 'loader-img',
                    ));

                };
                echo '<span class="loader"></span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="preloader  ">';
            echo '<button class="vs-btn preloaderCls">' . esc_html__('Cancel Preloader', 'bizino') . ' </button>';
            echo '<div class="preloader-inner">';
            // echo '<img src="assets/img/logo.png" alt="HaarMax">';
            echo '<span class="loader"></span>';
            echo '</div>';
            echo '</div>';
        }
    }
}

// Header Hook function
if (!function_exists('bizino_header_cb')) {
    function bizino_header_cb()
    {
        get_template_part('templates/header');
        if (!is_404()) {
            get_template_part('templates/header-menu-bottom');
        }
    }
}

// back top top hook function
if (!function_exists('bizino_back_to_top_cb')) {
    function bizino_back_to_top_cb()
    {
        $backtotop_trigger = bizino_opt('bizino_display_bcktotop');
        $custom_bcktotop = bizino_opt('bizino_custom_bcktotop');
        $custom_bcktotop_icon = bizino_opt('bizino_custom_bcktotop_icon');
        if (class_exists('ReduxFramework')) {
            if ($backtotop_trigger) {
                if ($custom_bcktotop) {
                    echo '<!-- Back to Top Button -->';
                    echo '<a href="' . esc_url('#') . '" class="scrollToTop scroll-btn">';
                    echo '<i class="' . esc_attr($custom_bcktotop_icon) . '"></i>';
                    echo '</a>';
                    echo '<!-- End of Back to Top Button -->';
                } else {
                    echo '<!-- Back to Top Button -->';
                    echo '<a href="' . esc_url('#') . '" class="scrollToTop scroll-btn">';
                    echo '<i class="fal fa-arrow-up"></i>';
                    echo '</a>';
                    echo '<!-- End of Back to Top Button -->';
                }
            }
        } else {
            echo '<!-- Back to Top Button -->';
            echo '<a href="' . esc_url('#') . '" class="scrollToTop scroll-btn">';
            echo '<i class="fal fa-arrow-up"></i>';
            echo '</a>';
            echo '<!-- End of Back to Top Button -->';
        }

    }
}

// Blog Start Wrapper Function
if (!function_exists('bizino_blog_start_wrap_cb')) {
    function bizino_blog_start_wrap_cb()
    {
        $bizino_blog_style = '';
        if (class_exists('ReduxFramework')) {
            $bizino_blog_style = bizino_opt('bizino_blog_style');
            if ($bizino_blog_style == '2') {
                $bizino_blog_style == '2';
            } else {
                $bizino_blog_style == '1';
            }
        } else {
            $bizino_blog_style == '1';
        }

        if ($bizino_blog_style == '2') {
            echo '<section class="vs-blog-wrapper  space-top space-extra-bottom">
                        <div class="container">';
            if (is_active_sidebar('bizino-blog-sidebar')) {
                $bizino_gutter_class = ' pb-10';
            } else {
                $bizino_gutter_class = '';
            }
            echo '<div class="row ' . esc_attr($bizino_gutter_class) . '">';
        } else {
            echo '<section class="vs-blog-wrapper space-top space-extra-bottom">
                        <div class="container">
                            <div class="row gx-40">';
        }
    }
}

// Blog End Wrapper Function
if (!function_exists('bizino_blog_end_wrap_cb')) {
    function bizino_blog_end_wrap_cb()
    {
        $bizino_blog_style = '';
        if (class_exists('ReduxFramework')) {
            $bizino_blog_style = bizino_opt('bizino_blog_style');
            if ($bizino_blog_style == '2') {
                $bizino_blog_style == '2';
            } else {
                $bizino_blog_style == '1';
            }
        } else {
            $bizino_blog_style == '1';
        }

        echo '</div>';
        echo '</div>';
        echo '</section>';

    }
}

// Blog Column Start Wrapper Function
if (!function_exists('bizino_blog_col_start_wrap_cb')) {
    function bizino_blog_col_start_wrap_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_blog_style = bizino_opt('bizino_blog_style');
            if ($bizino_blog_style == '2') {
                echo '';
            } else {
                $bizino_blog_sidebar = bizino_opt('bizino_blog_sidebar');
                if ($bizino_blog_sidebar == '1' && is_active_sidebar('bizino-blog-sidebar')) {
                    echo '<div class="col-lg-12">';
                } elseif ($bizino_blog_sidebar == '2' && is_active_sidebar('bizino-blog-sidebar')) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-8">';
                }
            }
        } else {
            if (is_active_sidebar('bizino-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }
        }
    }
}
// Blog Column End Wrapper Function
if (!function_exists('bizino_blog_col_end_wrap_cb')) {
    function bizino_blog_col_end_wrap_cb()
    {
        echo '</div>';
    }
}

// Blog Sidebar
if (!function_exists('bizino_blog_sidebar_cb')) {
    function bizino_blog_sidebar_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_blog_style = bizino_opt('bizino_blog_style');
            $bizino_blog_sidebar = bizino_opt('bizino_blog_sidebar');
        } else {
            $bizino_blog_sidebar = '2';
            $bizino_blog_style = '1';
        }
        if ($bizino_blog_sidebar != 1 && is_active_sidebar('bizino-blog-sidebar') && $bizino_blog_style != '2') {
            // Sidebar
            get_sidebar();
        }
    }
}


if (!function_exists('bizino_blog_details_sidebar_cb')) {
    function bizino_blog_details_sidebar_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_blog_single_sidebar = bizino_opt('bizino_blog_single_sidebar');
        } else {
            $bizino_blog_single_sidebar = 4;
        }
        if ($bizino_blog_single_sidebar != 1) {
            // Sidebar
            get_sidebar();
        }

    }
}

// Blog Pagination Function
if (!function_exists('bizino_blog_pagination_cb')) {
    function bizino_blog_pagination_cb()
    {
        get_template_part('templates/pagination');
    }
}

// Blog Content Function
if (!function_exists('bizino_blog_content_cb')) {
    function bizino_blog_content_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_blog_grid = bizino_opt('bizino_blog_grid');
            $bizino_blog_style = bizino_opt('bizino_blog_style');
        } else {
            $bizino_blog_grid = '1';
            $bizino_blog_style = '1';
        }

        if ($bizino_blog_grid == '1') {
            $bizino_blog_grid_class = 'col-lg-12';
        } elseif ($bizino_blog_grid == '2') {
            $bizino_blog_grid_class = 'col-lg-6';
        } elseif ($bizino_blog_grid == '3') {
            $bizino_blog_grid_class = 'col-lg-4';
        }

        if ($bizino_blog_style == '1') {
            echo '<div class="row">';
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<div class="' . $bizino_blog_grid_class . '">';
                    get_template_part('templates/content', get_post_format());
                    echo '</div>';
                }
                wp_reset_postdata();
            } else {
                get_template_part('templates/content', 'none');
            }
            echo '</div>';
        } else {
            if (have_posts()) {
                while (have_posts()) {
                    echo '<div class="col-md-6 col-xl-4">';
                    the_post();
                    get_template_part('templates/content', get_post_format());
                    echo '</div>';
                }
                wp_reset_postdata();
            } else {
                get_template_part('templates/content', 'none');
            }
        }
    }
}

// footer content Function
if (!function_exists('bizino_footer_content_cb')) {
    function bizino_footer_content_cb()
    {

        if (class_exists('ReduxFramework') && did_action('elementor/loaded')) {
            if (is_page() || is_page_template('template-builder.php')) {
                $post_id = get_the_ID();

                // Get the page settings manager
                $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers('page');

                // Get the settings model for current post
                $page_settings_model = $page_settings_manager->get_model($post_id);

                // Retrieve the Footer Style
                $footer_settings = $page_settings_model->get_settings('bizino_footer_style');

                // Footer Local
                $footer_local = $page_settings_model->get_settings('bizino_footer_builder_option');

                // Footer Enable Disable
                $footer_enable_disable = $page_settings_model->get_settings('bizino_footer_choice');

                if ($footer_enable_disable == 'yes') {
                    if ($footer_settings == 'footer_builder') {
                        // local options
                        $bizino_local_footer = get_post($footer_local);
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($bizino_local_footer->ID);
                    } else {
                        // global options
                        $bizino_footer_builder_trigger = bizino_opt('bizino_footer_builder_trigger');
                        if ($bizino_footer_builder_trigger == 'footer_builder') {
                            $bizino_global_footer_select = get_post(bizino_opt('bizino_footer_builder_select'));
                            $footer_post = get_post($bizino_global_footer_select);
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($footer_post->ID);
                        } else {
                            // wordpress widgets
                            bizino_footer_global_option();
                        }
                    }
                }
            } else {
                // global options
                $bizino_footer_builder_trigger = bizino_opt('bizino_footer_builder_trigger');
                if ($bizino_footer_builder_trigger == 'footer_builder') {
                    $bizino_global_footer_select = get_post(bizino_opt('bizino_footer_builder_select'));
                    $footer_post = get_post($bizino_global_footer_select);
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($footer_post->ID);
                } else {
                    // wordpress widgets
                    bizino_footer_global_option();
                }
            }
        } else {
            echo '<div class="copyright-wrap">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <p class="copyright-text">' . sprintf('Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>', date('Y'), esc_url('#'), __('Bizino.', 'bizino'), esc_url('#'), __('Vecuro', 'bizino')) . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

    }
}

// blog details wrapper start hook function
if (!function_exists('bizino_blog_details_wrapper_start_cb')) {
    function bizino_blog_details_wrapper_start_cb()
    {
        echo ' <section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
                        <div class="container">';
        if (is_active_sidebar('bizino-blog-sidebar')) {
            $bizino_gutter_class = 'gx-40';
        } else {
            $bizino_gutter_class = '';
        }
        echo '<div class="row ' . esc_attr($bizino_gutter_class) . '">';
    }
}

// blog details column wrapper start hook function
if (!function_exists('bizino_blog_details_col_start_cb')) {
    function bizino_blog_details_col_start_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_blog_single_sidebar = bizino_opt('bizino_blog_single_sidebar');
            if ($bizino_blog_single_sidebar == '2' && is_active_sidebar('bizino-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } elseif ($bizino_blog_single_sidebar == '3' && is_active_sidebar('bizino-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        } else {
            if (is_active_sidebar('bizino-blog-sidebar')) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }
        }
    }
}

// blog details post meta hook function
if (!function_exists('bizino_blog_post_meta_cb')) {
    function bizino_blog_post_meta_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_display_post_comment = bizino_opt('bizino_display_post_comment');
        } else {
            $bizino_display_post_comment = '1';
        }
        $bizino_display_post_date = bizino_opt('bizino_display_post_date') ? bizino_opt('bizino_display_post_date') : '1';
        echo '<!-- Blog Meta -->';
        if ($bizino_display_post_date) {
            echo '<a class="blog-date" href="' . esc_url(bizino_blog_date_permalink()) . '">';
            echo esc_html(get_the_date('M j, Y'));
            echo '</a>';
        }
        echo '<div class="blog-meta">';
        echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="fas fa-user"></i> ' . get_the_author_meta('display_name') . '</a>';
        if ($bizino_display_post_comment) {
            if (get_comments_number() == 1) {
                $comment_text = __(' Comment', 'bizino');
            } else {
                $comment_text = __(' Comments', 'bizino');
            }
            echo '<a href="' . esc_url(get_comments_link(get_the_ID())) . '"><i class="fas fa-comment-alt-lines"></i>' . esc_html(get_comments_number()) . '' . $comment_text . '</a>';
        }

        echo '</div>';

    }
}

// blog details share options hook function
if (!function_exists('bizino_blog_details_share_options_cb')) {
    function bizino_blog_details_share_options_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_post_details_share_options = bizino_opt('bizino_post_details_share_options');
        } else {
            $bizino_post_details_share_options = false;
        }
        if (function_exists('bizino_social_sharing_buttons') && $bizino_post_details_share_options) {
            echo '<div class="col-md-auto text-md-end mt-20 mt-md-0">';
            echo '<span class="share-links-title">' . __('Share:', 'bizino') . '</span>';
            echo '<ul class="social-links">';
            echo bizino_social_sharing_buttons();
            echo '</ul>';
            echo '<!-- End Social Share -->';
            echo '</div>';
        }
    }
}

// blog details author bio hook function
if (!function_exists('bizino_blog_details_author_bio_cb')) {
    function bizino_blog_details_author_bio_cb()
    {
        if (class_exists('ReduxFramework')) {
            $postauthorbox = bizino_opt('bizino_post_details_author_desc_trigger');
            $postauthorboxthumb = bizino_opt('bizino_post_details_author_thumb');
            $author_thumb = !empty($postauthorboxthumb['url']) ? $postauthorboxthumb['url'] : get_avatar_url(get_the_author_meta('ID'), array(
                "size" => 150
            ));
        } else {
            $postauthorbox = '1';
        }
        if (!empty(get_the_author_meta('description')) && $postauthorbox == '1') {
            echo '<!-- Post Author -->';
            echo ' <div class="blog-author">
                            <div class="media-img">';
            echo bizino_img_tag(array(
                "url" => esc_url($author_thumb),
            ));
            echo '</div>
                            <div class="media-body">';
            echo '<p class="author-degi">' . esc_html__('Written by', 'bizino') . '</p>';
            echo bizino_heading_tag(array(
                "tag" => "h3",
                "text" => bizino_anchor_tag(array(
                    "text" => esc_html(ucwords(get_the_author())),
                    "url" => esc_url(get_author_posts_url(get_the_author_meta('ID')))
                )),
                'class' => 'author-name h5',
            ));

            if (!empty(get_the_author_meta('description'))) {
                echo '<p class="author-text">';
                echo esc_html(get_the_author_meta('description'));
                echo '</p>';
            }
            echo '</div>
                        </div>';
            echo '<!-- End of Post Author -->';
        }

    }
}

// Blog Details Comments hook function
if (!function_exists('bizino_blog_details_comments_cb')) {
    function bizino_blog_details_comments_cb()
    {
        if (!comments_open()) {
            echo '<div class="blog-comment-area">';
            echo bizino_heading_tag(array(
                "tag" => "h3",
                "text" => esc_html__('Comments are closed', 'bizino'),
                "class" => "inner-title"
            ));
            echo '</div>';
        }

        // comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    }
}

// Blog Details Column end hook function
if (!function_exists('bizino_blog_details_col_end_cb')) {
    function bizino_blog_details_col_end_cb()
    {
        echo '</div>';
    }
}

// Blog Details Wrapper end hook function
if (!function_exists('bizino_blog_details_wrapper_end_cb')) {
    function bizino_blog_details_wrapper_end_cb()
    {
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
}

// page start wrapper hook function
if (!function_exists('bizino_page_start_wrap_cb')) {
    function bizino_page_start_wrap_cb()
    {
        echo '<section class="position-relative space-top space-extra-bottom">
                    <div class="container">';
    }
}

// page wrapper end hook function
if (!function_exists('bizino_page_end_wrap_cb')) {
    function bizino_page_end_wrap_cb()
    {
        echo '</div>';
        echo '</section>';
    }
}

// page column wrapper start hook function
if (!function_exists('bizino_page_col_start_wrap_cb')) {
    function bizino_page_col_start_wrap_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_page_sidebar = bizino_opt('bizino_page_sidebar');
        } else {
            $bizino_page_sidebar = '1';
        }
        if ($bizino_page_sidebar == '2' && is_active_sidebar('bizino-page-sidebar')) {
            echo '<div class="col-lg-8 order-last">';
        } elseif ($bizino_page_sidebar == '3' && is_active_sidebar('bizino-page-sidebar')) {
            echo '<div class="col-lg-8">';
        } else {
            echo '<div class="col-lg-12">';
        }

    }
}

// page column wrapper end hook function
if (!function_exists('bizino_page_col_end_wrap_cb')) {
    function bizino_page_col_end_wrap_cb()
    {
        echo '</div>';
    }
}

// page sidebar hook function
if (!function_exists('bizino_page_sidebar_cb')) {
    function bizino_page_sidebar_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_page_sidebar = bizino_opt('bizino_page_sidebar');
        } else {
            $bizino_page_sidebar = '1';
        }

        if (class_exists('ReduxFramework')) {
            $bizino_page_layoutopt = bizino_opt('bizino_page_layoutopt');
        } else {
            $bizino_page_layoutopt = '3';
        }

        if ($bizino_page_layoutopt == '1' && $bizino_page_sidebar != 1) {
            get_sidebar('page');
        } elseif ($bizino_page_layoutopt == '2' && $bizino_page_sidebar != 1) {
            get_sidebar();
        }
    }
}

// page content hook function
if (!function_exists('bizino_page_content_cb')) {
    function bizino_page_content_cb()
    {
        echo '<div class="page--content clearfix">';

        the_content();

        // Link Pages
        bizino_link_pages();

        echo '</div>';
        // comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    }
}

if (!function_exists('bizino_blog_post_thumb_cb')) {
    function bizino_blog_post_thumb_cb()
    {
        if (get_post_format()) {
            $format = get_post_format();
        } else {
            $format = 'standard';
        }
        $bizino_blog_style = bizino_opt('bizino_blog_style');
        $thumb_size = $bizino_blog_style == '2' && !is_single() ? 'bizino-blog-content' : 'full';
        $bizino_post_slider_thumbnail = bizino_meta('post_format_slider');

        if (!empty($bizino_post_slider_thumbnail)) {
            echo '<div class="blog-img vs-carousel-global" data-arrows="true" data-slide-show="1">';
            foreach ($bizino_post_slider_thumbnail as $single_image) {
                echo bizino_img_tag(array(
                    'url' => esc_url($single_image)
                ));
            }
            echo '</div>';
        } elseif (has_post_thumbnail() && $format == 'standard') {
            echo '<!-- Post Thumbnail -->';
            echo '<div class="blog-img">';
            if (!is_single()) {
                echo '<a href="' . esc_url(get_permalink()) . '" class="post-thumbnail">';
            }

            the_post_thumbnail($thumb_size);

            if (!is_single()) {
                echo '</a>';
            }
            echo '</div>';
            echo '<!-- End Post Thumbnail -->';
        } elseif ($format == 'video') {
            if (has_post_thumbnail() && !empty (bizino_meta('post_format_video'))) {
                echo '<div class="blog-img">';
                if (!is_single()) {
                    echo '<a href="' . esc_url(get_permalink()) . '" class="post-thumbnail">';
                }
                the_post_thumbnail($thumb_size);
                if (!is_single()) {
                    echo '</a>';
                }
                echo '<a href="' . esc_url(bizino_meta('post_format_video')) . '" class="play-btn popup-video">';
                echo '<i class="fas fa-play"></i>';
                echo '</a>';
                echo '</div>';
            } elseif (!has_post_thumbnail() && !is_single()) {
                echo '<div class="blog-video">';
                if (!is_single()) {
                    echo '<a href="' . esc_url(get_permalink()) . '" class="post-thumbnail">';
                }
                echo bizino_embedded_media(array('video', 'iframe'));
                if (!is_single()) {
                    echo '</a>';
                }
                echo '</div>';
            }
        } elseif ($format == 'audio') {
            $bizino_audio = bizino_meta('post_format_audio');
            if (!empty($bizino_audio)) {
                echo '<div class="blog-audio">';
                echo wp_oembed_get($bizino_audio);
                echo '</div>';
            } elseif (!is_single()) {
                echo '<div class="blog-audio">';
                echo wp_oembed_get($bizino_audio);
                echo '</div>';
            }
        }

    }
}

// blog details post meta hook function
if (!function_exists('bizino_blog_post_meta_cb')) {
    function bizino_blog_post_meta_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_display_post_date = bizino_opt('bizino_display_post_date');
            $bizino_display_post_views = bizino_opt('bizino_display_post_views');
            $bizino_display_post_comment = bizino_opt('bizino_display_post_comment');

        } else {
            $bizino_display_post_date = '1';
            $bizino_display_post_views = '';
            $bizino_display_post_comment = '1';
        }

        echo '<!-- Blog Meta -->';
        echo '<div class="blog-meta">';
        if ($bizino_display_post_views) {
            echo '<i class="far fa-eye"></i>';
            echo bizino_getPostViews(get_the_ID());
            echo esc_html__(' Views', 'bizino');
        }
        if ($bizino_display_post_comment) {
            echo '<a href="' . esc_url(get_comments_link(get_the_ID())) . '"><i class="fal fa-comments"></i>';
            echo esc_html(get_comments_number());
            if (get_comments_number() == '1') {
                echo esc_html__(' Comment', 'bizino');
            } else {
                echo esc_html__(' Comments', 'bizino');
            }
            echo '</a>';
        }
        if ($bizino_display_post_date) {
            echo '<a href="' . esc_url(bizino_blog_date_permalink()) . '"><i class="fal fa-calendar-alt"></i>';
            echo '<time datetime="' . esc_attr(get_the_date(DATE_W3C)) . '">' . esc_html(get_the_date()) . '</time>';
            echo '</a>';
        }
        echo '</div>';
    }
}

if (!function_exists('bizino_blog_post_content_cb')) {
    function bizino_blog_post_content_cb()
    {
        $allowhtml = array(
            'p' => array(
                'class' => array()
            ),
            'span' => array(),
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'b' => array(),
        );
        if (class_exists('ReduxFramework')) {
            $bizino_excerpt_length = bizino_opt('bizino_blog_postExcerpt');
            $bizino_display_post_category = bizino_opt('bizino_display_post_category');
        } else {
            $bizino_excerpt_length = '48';
            $bizino_display_post_category = '1';
        }

        echo '<!-- blog-content -->';

        do_action('bizino_blog_post_thumb');

        echo '<div class="blog-content">';
        echo '<!-- Post Title -->';
        // Blog Post Meta
        do_action('bizino_blog_post_meta');
        echo '<h2 class="blog-title"><a href="' . esc_url(get_permalink()) . '">' . wp_kses(get_the_title(), $allowhtml) . '</a></h2>';
        echo '<!-- End Post Title -->';

        echo '<!-- Post Summary -->';
        echo bizino_paragraph_tag(array(
            "text" => wp_kses(wp_trim_words(get_the_excerpt(), $bizino_excerpt_length, ''), $allowhtml),
        ));
        echo '<!-- End Post Summary -->';
        echo '</div>';
        echo '<!-- End Post Content -->';
    }
}

// Blog Details Post Navigation hook function
if (!function_exists('bizino_blog_details_post_navigation_cb')) {
    function bizino_blog_details_post_navigation_cb()
    {
        if (class_exists('ReduxFramework')) {
            $bizino_post_details_post_navigation = bizino_opt('bizino_post_details_post_navigation');
        } else {
            $bizino_post_details_post_navigation = false;
        }

        $prevpost = get_previous_post();
        $nextpost = get_next_post();

        $allowhtml = array(
            'p' => array(
                'class' => array()
            ),
            'span' => array(),
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'b' => array(),
        );

        if ($bizino_post_details_post_navigation && !empty($prevpost) || !empty($nextpost)) {
            echo '<div class="post-pagination  ">';
            echo '<div class="row justify-content-between align-items-center">';
            if (!empty($prevpost)) {
                echo '<div class="col">';
                echo '<div class="post-pagi-box prev">';
                echo '<a href="' . esc_url(get_permalink($prevpost->ID)) . '">' . esc_html__('Prev Post', 'bizino') . '</a>';

                echo '<h4 class="pagi-title"><a href="' . esc_url(get_permalink($prevpost->ID)) . '" class="text-inherit">' . wp_trim_words(wp_kses(get_the_title($prevpost->ID), $allowhtml), '3', '...') . '</a></h4>';
                echo '</div>';
                echo '</div>';
            }
            if (!empty($nextpost)) {
                echo '<div class="col">';
                echo '<div class="post-pagi-box next">';
                echo '<a href="' . esc_url(get_permalink($nextpost->ID)) . '">' . esc_html__('Next Post', 'bizino') . '</a>';
                echo '<h4 class="pagi-title"><a href="' . esc_url(get_permalink($nextpost->ID)) . '" class="text-inherit">' . wp_trim_words(wp_kses(get_the_title($nextpost->ID), $allowhtml), '3', '...') . '</a></h4>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
    }
}