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
    exit;
}

// theme option callback
function bizino_opt($id = null, $url = null)
{
    global $bizino_opt;

    if ($id && $url) {

        if (isset($bizino_opt[$id][$url]) && $bizino_opt[$id][$url]) {
            return $bizino_opt[$id][$url];
        }
    } else {
        if (isset($bizino_opt[$id]) && $bizino_opt[$id]) {
            return $bizino_opt[$id];
        }
    }
}


// theme logo
function bizino_theme_logo()
{
    // escaping allow html
    $allowhtml = array(
        'a' => array(
            'href' => array()
        ),
        'span' => array(),
        'i' => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="' . esc_url($siteUrl) . '">';
        $siteLogo .= bizino_img_tag(array(
            "class" => "img-fluid",
            "url" => esc_url(wp_get_attachment_image_url($custom_logo_id, 'full'))
        ));
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif (!bizino_opt('bizino_text_title') && bizino_opt('bizino_site_logo', 'url')) {

        $siteLogo = '<img class="img-fluid" src="' . esc_url(bizino_opt('bizino_site_logo', 'url')) . '" alt="' . esc_attr__('logo', 'bizino') . '" />';
        return '<a class="logo" href="' . esc_url($siteUrl) . '">' . wp_kses_post($siteLogo) . '</a>';


    } elseif (bizino_opt('bizino_text_title')) {
        return '<h2 class="mb-0"><a class="logo" href="' . esc_url($siteUrl) . '">' . wp_kses(bizino_opt('bizino_text_title'), $allowhtml) . '</a></h2>';
    } else {
        return '<h2 class="mb-0"><a class="logo" href="' . esc_url($siteUrl) . '">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    }
}

// theme mobile logo
function bizino_theme_mobile_logo()
{
    // escaping allow html
    $allowhtml = array(
        'a' => array(
            'href' => array()
        ),
        'span' => array(),
        'i' => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="' . esc_url($siteUrl) . '">';
        $siteLogo .= bizino_img_tag(array(
            "class" => "img-fluid",
            "url" => esc_url(wp_get_attachment_image_url($custom_logo_id, 'full'))
        ));
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif (!bizino_opt('bizino_text_title') && bizino_opt('bizino_mobile_logo', 'url')) {

        $siteLogo = '<img class="img-fluid" src="' . esc_url(bizino_opt('bizino_mobile_logo', 'url')) . '" alt="' . esc_attr__('logo', 'bizino') . '" />';
        return '<a class="logo m-logo" href="' . esc_url($siteUrl) . '">' . wp_kses_post($siteLogo) . '</a>';


    } elseif (bizino_opt('bizino_text_title')) {
        return '<h2 class="mb-0"><a class="logo" href="' . esc_url($siteUrl) . '">' . wp_kses(bizino_opt('bizino_text_title'), $allowhtml) . '</a></h2>';
    } else {
        return '<h2 class="mb-0"><a class="logo" href="' . esc_url($siteUrl) . '">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    }
}

// custom meta id callback
function bizino_meta($id = '')
{
    $value = get_post_meta(get_the_ID(), '_bizino_' . $id, true);
    return $value;
}


// Blog Date Permalink
function bizino_blog_date_permalink()
{
    $year = get_the_time('Y');
    $month_link = get_the_time('m');
    $day = get_the_time('d');
    $link = get_day_link($year, $month_link, $day);
    return $link;
}

//audio format iframe match
function bizino_iframe_match()
{
    $audio_content = bizino_embedded_media(array('audio', 'iframe'));
    $iframe_match = preg_match("/iframe\b/i", $audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function bizino_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);


    if (in_array('audio', $type)) {
        if (count($embed) > 0) {
            $output = str_replace('?visual=true', '?visual=false', $embed[0]);
        } else {
            $output = '';
        }

    } else {
        if (count($embed) > 0) {
            $output = $embed[0];
        } else {
            $output = '';
        }
    }
    return $output;
}


// WP post link pages
function bizino_link_pages()
{
    wp_link_pages(array(
        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'bizino') . '</span>',
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'bizino') . ' </span>%',
        'separator' => '<span class="screen-reader-text">, </span>',
    ));
}


// Data Background image attr
function bizino_data_bg_attr($imgUrl = '')
{
    return 'data-bg-img="' . esc_url($imgUrl) . '"';
}

// image alt tag
function bizino_image_alt($url = '')
{
    if ($url != '') {
        // attachment id by url
        $attachmentid = attachment_url_to_postid(esc_url($url));
        // attachment alt tag
        $image_alt = get_post_meta(esc_html($attachmentid), '_wp_attachment_image_alt', true);
        if ($image_alt) {
            return $image_alt;
        } else {
            $filename = pathinfo(esc_url($url));
            $alt = str_replace('-', ' ', $filename['filename']);
            return $alt;
        }
    } else {
        return;
    }
}

//social icon list
function bizino_social_icon()
{
    $bizino_social_icon = bizino_opt('bizino_social_links');
    if (!empty($bizino_social_icon) && isset($bizino_social_icon)) {
        foreach ($bizino_social_icon as $social_icon) {
            if (!empty($social_icon['title'])) {
                echo '<a href="' . esc_url($social_icon['url']) . '"><i class="' . esc_attr($social_icon['title']) . '"></i></a>';
            }
        }
    }
}


// Flat Content wysiwyg output with meta key and post id

function bizino_get_textareahtml_output($content)
{
    global $wp_embed;

    $content = $wp_embed->autoembed($content);
    $content = $wp_embed->run_shortcode($content);
    $content = wpautop($content);
    $content = do_shortcode($content);

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function bizino_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'bizino_pingback_header');


// Excerpt More
function bizino_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'bizino_excerpt_more');


// bizino comment template callback
function bizino_comment_callback($comment, $args, $depth)
{
    $add_below = 'comment';
    ?>
    <li <?php comment_class(array('vs-comment-item vs-comment-form')); ?>>
    <div id="comment-<?php comment_ID() ?>" class="vs-post-comment">
        <?php
        if (get_avatar($comment, 100)) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                if ($args['avatar_size'] != 0) {
                    echo get_avatar($comment, 100);
                }
                ?>
            </div>
            <!-- Author Image -->
        <?php
        endif;
        ?>
        <!-- Comment Content -->
        <div class="comment-content">
            <span class="commented-on"><i
                        class="fal fa-calendar-alt"></i> <?php printf(esc_html__('%1$s', 'bizino'), get_comment_date()); ?> </span>
            <h4 class="name h4"><?php echo esc_html(ucwords(get_comment_author())); ?></h4>
            <?php comment_text(); ?>
            <div class="reply_and_edit">
                <?php
                $reply_text = esc_html__('Reply', 'bizino');
                //$edit_reply_text = '<i class="far fa-pencil-alt"></i>'.esc_html__( 'Edit', 'bizino' ).'';
                comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text)));
                ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'bizino'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Comment Content -->
    <?php
}

//body class
add_filter('body_class', 'bizino_body_class');
function bizino_body_class($classes)
{
    if (class_exists('ReduxFramework')) {
        $bizino_blog_single_sidebar = bizino_opt('bizino_blog_single_sidebar');
        if (($bizino_blog_single_sidebar != '2' && $bizino_blog_single_sidebar != '3') || !is_active_sidebar('bizino-blog-sidebar')) {
            $classes[] = 'no-sidebar';
        }
    } else {
        if (!is_active_sidebar('bizino-blog-sidebar')) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function bizino_footer_global_option()
{

    // Bizino Widget Enable Disable
    if (class_exists('ReduxFramework') && (is_active_sidebar('bizino-footer-1') || is_active_sidebar('bizino-footer-2') || is_active_sidebar('bizino-footer-3') || is_active_sidebar('bizino-footer-4'))) {
        $bizino_footer_widget_enable = bizino_opt('bizino_footerwidget_enable');
    } else {
        $bizino_footer_widget_enable = '';
    }

    // Bizino Footer Bottom Enable Disable
    if (class_exists('ReduxFramework')) {
        $bizino_footer_bottom_active = bizino_opt('bizino_disable_footer_bottom');
        $bizino_footer_background_image = !empty(bizino_opt('bizino_footer_background_image')['url']) ?
            bizino_opt('bizino_footer_background_image')['url'] : '';
    } else {
        $bizino_footer_bottom_active = '1';
        $bizino_footer_background_image = '';
    }

    $bizino_footer_gallery_active = bizino_opt('bizino_gallery_footer_widget');

    $allowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array(
            'class' => array(),
        ),
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'b' => array(),
    );

    echo '<footer class="footer-wrapper footer-layout1" data-bg-src="' . esc_url($bizino_footer_background_image) . '">';
    echo '<div class="widget-area">';
    echo '<div class="container">';
    if ((is_active_sidebar('bizino-footer-1') || is_active_sidebar('bizino-footer-2') || is_active_sidebar('bizino-footer-3') || is_active_sidebar('bizino-footer-4'))) :
        echo '<div class="row justify-content-between">';
        if (is_active_sidebar('bizino-footer-1')) :
            echo '<div class="col-lg-auto col-xl-4">';
            dynamic_sidebar('bizino-footer-1');
            echo '</div>';
        endif;

        if (is_active_sidebar('bizino-footer-2')) :
            echo '<div class="col-lg-auto col-xl-4">';
            dynamic_sidebar('bizino-footer-2');
            echo '</div>';
        endif;

        if (is_active_sidebar('bizino-footer-3')) :
            echo '<div class="col-lg-auto col-xl-4">';
            dynamic_sidebar('bizino-footer-3');
            echo '</div>';
        endif;
        echo '</div> ';
    endif;
    echo '</div>';
    echo '</div>';
    if ($bizino_footer_bottom_active == '1') {
        echo '<div class="copyright-wrap">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">';
                                if (!empty(bizino_opt('bizino_copyright_text'))) {
                                    echo '<p class="copyright-text">' . wp_kses(bizino_opt('bizino_copyright_text'), $allowhtml) . '</p>';
                                }
                                echo '</div>
                                <div class="col-auto d-none d-md-block">
                                    <div class="header-social">';
                                    bizino_social_icon();
                                    echo '</div>
                                </div>
                        </div>
                    </div>
                </div>';
    }
    echo '</footer>';
}

// global header
function bizino_global_header_option()
{
    if (class_exists('ReduxFramework')) {
        $bizino_show_header_topbar = bizino_opt('bizino_header_topbar_switcher');
        ?>
        <!--==============================
                Mobile Menu
                ============================== -->
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <?php echo bizino_theme_mobile_logo(); ?>
                </div>
                <div class="vs-mobile-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            "theme_location" => 'primary-menu',
                            "container" => '',
                            "menu_class" => ''
                        ));
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--==============================
        Header Area
        ==============================-->
        <header class="vs-header header-layout1">
            <?php
            if ($bizino_show_header_topbar) {
                $bizino_topbar_address = bizino_opt('bizino_topbar_address');
                $mobile = bizino_opt('bizino_topbar_phone');
                $bizino_topbar_email = bizino_opt('bizino_topbar_email');
                $bizino_phone_icon = bizino_opt('bizino_phone_icon');

                $email = is_email($bizino_topbar_email);

                $replace = array(' ', '-', ' - ');
                $with = array('', '', '');

                $emailurl = str_replace($replace, $with, $email);
                $mobileurl = str_replace($replace, $with, $mobile);
                ?>
                <div class="header-top">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col d-none d-lg-block">
                                <div class="header-links">
                                    <ul>
                                        <?php
                                        if (!empty($email)) {
                                            echo '<li><i class="fal fa-envelope"></i><a class="text-reset" href="' . esc_attr('mailto:' . $emailurl) . '">' . esc_html($email) . '</a></li>';
                                        }
                                        if (!empty($bizino_topbar_address)) {
                                            echo '<li><i class="fal fa-map-marker-alt"></i>' . esc_html($bizino_topbar_address) . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <?php if (class_exists('GTranslate')) { ?>
                                    <div class="header-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe"></i>English</a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li>
                                                <?php echo do_shortcode('[gtranslate]'); ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <div class="header-social">
                                    <span class="social-label"><?php esc_html_e('Get In Touch:', 'bizino'); ?></span>
                                    <?php bizino_social_icon(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="sticky-wrapper">
                <div class="sticky-active">
                    <!-- Main Menu Area -->
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <?php echo bizino_theme_logo(); ?>
                                </div>
                            </div>
                            <div class="col-auto col-xl text-xl-center">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <?php
                                    if (has_nav_menu('primary-menu')) {
                                        wp_nav_menu(array(
                                            "theme_location" => 'primary-menu',
                                            "container" => '',
                                            "menu_class" => ''
                                        ));
                                    }
                                    ?>
                                </nav>
                                <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i>
                                </button>
                            </div>
                            <?php
                            if (!empty($mobile)) {
                                echo '<div class="col-auto d-none d-xxl-block">
                                        <a class="header-number" href="' . esc_attr('tel:' . $mobileurl) . '"><img src="' . $bizino_phone_icon['url'] . '" alt="Phone"> ' . esc_html($mobile) . '</a>
                                    </div>';
                            }
                            if (!empty(bizino_opt('bizino_btn_text'))) {
                                echo '<div class="col-auto d-none d-xl-block">
                                        <a href="' . esc_url(bizino_opt('bizino_btn_url')) . '" class="vs-btn">' . esc_html(bizino_opt('bizino_btn_text')) . '</a>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
    } else {
        ?>
        <!--==============================
                Mobile Menu
                ============================== -->
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <?php echo bizino_theme_mobile_logo(); ?>
                </div>
                <div class="vs-mobile-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            "theme_location" => 'primary-menu',
                            "container" => '',
                            "menu_class" => ''
                        ));
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--==============================
        Header Area
        ==============================-->
        <header class="vs-header header-layout1">
            <div class="sticky-wrapper">
                <div class="sticky-active">
                    <!-- Main Menu Area -->
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <?php echo bizino_theme_logo(); ?>
                                </div>
                            </div>
                            <div class="col-auto col-xl text-xl-center">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <?php
                                    if (has_nav_menu('primary-menu')) {
                                        wp_nav_menu(array(
                                            "theme_location" => 'primary-menu',
                                            "container" => '',
                                            "menu_class" => ''
                                        ));
                                    }
                                    ?>
                                </nav>
                                <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }

}

function bizino_custom_search_form($class)
{
    echo '<!-- Search Form -->';
    echo '<form role="search" method="get" action="' . esc_url(home_url('/')) . '" class="' . esc_attr($class) . '">';
    echo '<label class="searchIcon">';
    echo bizino_img_tag(array(
        "url" => '',
        "class" => "svg"
    ));
    echo '<input value="' . get_search_query() . '" name="s" required type="search" placeholder="' . esc_attr__('What are you looking for?', 'bizino') . '">';
    echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}


//Fire the wp_body_open action.
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}
// password protected form
add_filter('the_password_form', 'bizino_password_form', 10, 1);
function bizino_password_form($output)
{
    $output = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="' . esc_attr__('Enter Password', 'bizino') . '">
        <button type="submit" class="submit-btn btn-fill">' . esc_html__('Enter', 'bizino') . '</button></div></form>';
    return $output;
}

//Remove Tag-Clouds inline style
add_filter('wp_generate_tag_cloud', 'bizino_remove_tagcloud_inline_style', 10, 1);
function bizino_remove_tagcloud_inline_style($input)
{
    return preg_replace('/ style=("|\')(.*?)("|\')/', '', $input);
}

function bizino_setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function bizino_getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __('0', 'bizino');
    }
    return $count;
}

function bizino_blog_category()
{

    if ('post' == get_post_type()) {
        $categories = get_the_category();
        $output = '';
        if ($categories) {
            $index = 0;
            foreach ($categories as $category) {
                $index++;
                if ($index == 1) {
                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->cat_name . '</a>';
                }
            }
        }
        return $output;
    }

}


/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'bizino_cat_count_span');
function bizino_cat_count_span($links)
{
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'bizino_archive_count_span');
function bizino_archive_count_span($links)
{
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

// Add Extra Class On Comment Reply Button
function bizino_custom_comment_reply_link($content)
{
    $extra_classes = 'replay-btn';
    return preg_replace('/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'bizino_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function bizino_custom_edit_comment_link($content)
{
    $extra_classes = 'replay-btn';
    return preg_replace('/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'bizino_custom_edit_comment_link', 99);


function bizino_post_classes($classes, $class, $post_id)
{
    if (class_exists('ReduxFramework')) {
        $bizino_blog_style = bizino_opt('bizino_blog_style');
    } else {
        $bizino_blog_style = '1';
    }
    if (get_post_type() === 'post') {
        if (!is_single()) {
            if ($bizino_blog_style != '2')
                $classes[] = "vs-blog blog-single";
            else {
                $classes[] = "vs-blog blog-style2 layout2";
            }
        } else {
            $classes[] = "vs-blog blog-single";
        }
    } elseif (get_post_type() === 'page') {
        $classes[] = "page--item";
    }

    return $classes;
}

add_filter('post_class', 'bizino_post_classes', 10, 3);