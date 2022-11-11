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

if (defined('CMB2_LOADED')) {
    if (!empty(bizino_meta('page_breadcrumb_area'))) {
        $bizino_page_breadcrumb_area = bizino_meta('page_breadcrumb_area');
    } else {
        $bizino_page_breadcrumb_area = '1';
    }
} else {
    $bizino_page_breadcrumb_area = '1';
}

$allowhtml = array(
    'p' => array(
        'class' => array()
    ),
    'span' => array(
        'class' => array(),
    ),
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
    'b' => array(),
    'sub' => array(),
    'sup' => array(),
);

if (is_page() || is_page_template('template-builder.php')) {
    if ($bizino_page_breadcrumb_area == '1') {
        if (class_exists('reduxframework')) {
            $breadcrumb_img = bizino_opt('bizino_allHeader_bg', 'url');
            $def_breadcrumb = '';
        } else {
            $breadcrumb_img = '';
            $def_breadcrumb = 'bredacrumb-default';
        }
        echo '<!-- Page title -->';
        echo '<div data-bg-src="'.esc_url($breadcrumb_img).'" class="breadcumb-wrapper ' . esc_attr($def_breadcrumb) . '" id="breadcumbwrap">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                if (defined('CMB2_LOADED') || class_exists('ReduxFramework')) {
                    if (!empty(bizino_meta('page_breadcrumb_settings'))) {
                        if (bizino_meta('page_breadcrumb_settings') == 'page') {
                            $bizino_page_title_switcher = bizino_meta('page_title');
                        } else {
                            $bizino_page_title_switcher = bizino_opt('bizino_page_title_switcher');
                        }
                    } else {
                        $bizino_page_title_switcher = '1';
                    }
                } else {
                    $bizino_page_title_switcher = '1';
                }

                if ($bizino_page_title_switcher) {
                    if (class_exists('ReduxFramework')) {
                        $bizino_page_title_tag = bizino_opt('bizino_page_title_tag');
                    } else {
                        $bizino_page_title_tag = 'h1';
                    }

                    if (defined('CMB2_LOADED')) {
                        if (!empty(bizino_meta('page_title_settings'))) {
                            $bizino_custom_title = bizino_meta('page_title_settings');
                        } else {
                            $bizino_custom_title = 'default';
                        }
                    } else {
                        $bizino_custom_title = 'default';
                    }

                    if ($bizino_custom_title == 'default') {
                        echo bizino_heading_tag(
                            array(
                                "tag" => esc_attr($bizino_page_title_tag),
                                "text" => esc_html(get_the_title()),
                                'class' => 'breadcumb-title'
                            )
                        );
                    } else {
                        echo bizino_heading_tag(
                            array(
                                "tag" => esc_attr($bizino_page_title_tag),
                                "text" => esc_html(bizino_meta('custom_page_title')),
                                'class' => 'breadcumb-title'
                            )
                        );
                    }

                }
                if (defined('CMB2_LOADED') || class_exists('ReduxFramework')) {

                    if (bizino_meta('page_breadcrumb_settings') == 'page') {
                        $bizino_breadcrumb_switcher = bizino_meta('page_breadcrumb_trigger');
                    } else {
                        $bizino_breadcrumb_switcher = bizino_opt('bizino_enable_breadcrumb');
                    }

                } else {
                    $bizino_breadcrumb_switcher = '1';
                }
                echo '<!-- End of Page title -->';
                    echo '<div class="breadcumb-menu-wrap">';
                    if ($bizino_breadcrumb_switcher == '1' && (is_page() || is_page_template('template-builder.php'))) {
                        bizino_breadcrumbs(
                            array(
                                'breadcrumbs_classes' => 'nav',
                            )
                        );
                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
} else {
    if (class_exists('reduxframework')) {
        $breadcrumb_img = bizino_opt('bizino_allHeader_bg', 'url');
        $def_breadcrumb = '';
    } else {
        $breadcrumb_img = '';
        $def_breadcrumb = 'bredacrumb-default';
    }
    echo '<!-- Page title -->';
    echo '<div data-bg-src="'.esc_url($breadcrumb_img).'" class="breadcumb-wrapper ' . esc_attr($def_breadcrumb) . '">';
        echo '<div class="container z-index-common">';
            echo '<div class="breadcumb-content">';
            if (class_exists('ReduxFramework')) {
                $bizino_page_title_switcher = bizino_opt('bizino_page_title_switcher');
            } else {
                $bizino_page_title_switcher = '1';
            }

            if ($bizino_page_title_switcher) {
                if (class_exists('ReduxFramework')) {
                    $bizino_page_title_tag = bizino_opt('bizino_page_title_tag');
                } else {
                    $bizino_page_title_tag = 'h1';
                }
                if (is_archive()) {
                    echo bizino_heading_tag(
                        array(
                            "tag" => esc_attr($bizino_page_title_tag),
                            "text" => wp_kses(get_the_archive_title(), $allowhtml),
                            'class' => 'breadcumb-title'
                        )
                    );
                } elseif (is_home()) {
                    $bizino_blog_page_title_setting = bizino_opt('bizino_blog_page_title_setting');
                    $bizino_blog_page_title_switcher = bizino_opt('bizino_blog_page_title_switcher');
                    $bizino_blog_page_custom_title = bizino_opt('bizino_blog_page_custom_title');
                    if (class_exists('ReduxFramework')) {
                        if ($bizino_blog_page_title_switcher) {
                            echo bizino_heading_tag(
                                array(
                                    "tag" => esc_attr($bizino_page_title_tag),
                                    "text" => !empty($bizino_blog_page_custom_title) && $bizino_blog_page_title_setting == 'custom' ? esc_html($bizino_blog_page_custom_title) : esc_html__('Our Blog', 'bizino'),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }
                    } else {
                        echo bizino_heading_tag(
                            array(
                                "tag" => "h1",
                                "text" => esc_html__('Our Blog', 'bizino'),
                                'class' => 'breadcumb-title',
                            )
                        );
                    }
                } elseif (is_search()) {
                    echo bizino_heading_tag(
                        array(
                            "tag" => esc_attr($bizino_page_title_tag),
                            "text" => esc_html__('Search Result', 'bizino'),
                            'class' => 'breadcumb-title'
                        )
                    );
                } elseif (is_404()) {
                    echo bizino_heading_tag(
                        array(
                            "tag" => esc_attr($bizino_page_title_tag),
                            "text" => esc_html__('404 PAGE', 'bizino'),
                            'class' => 'breadcumb-title'
                        )
                    );
                } else {
                    $posttitle_position = bizino_opt('bizino_post_details_title_position');
                    $postTitlePos = false;
                    if (is_single()) {
                        if (class_exists('ReduxFramework')) {
                            if ($posttitle_position && $posttitle_position != 'header') {
                                $postTitlePos = true;
                            }
                        } else {
                            $postTitlePos = false;
                        }
                    }
                    if (is_singular('product')) {
                        $posttitle_position = bizino_opt('bizino_product_details_title_position');
                        $postTitlePos = false;
                        if (class_exists('ReduxFramework')) {
                            if ($posttitle_position && $posttitle_position != 'header') {
                                $postTitlePos = true;
                            }
                        } else {
                            $postTitlePos = false;
                        }
                    }

                    if ($postTitlePos != true) {
                        echo bizino_heading_tag(
                            array(
                                "tag" => esc_attr($bizino_page_title_tag),
                                "text" => wp_kses(wp_trim_words(get_the_title(), 4, ''), $allowhtml),
                                'class' => 'breadcumb-title'
                            )
                        );
                    } else {
                        if (class_exists('ReduxFramework')) {
                            $bizino_post_details_custom_title = bizino_opt('bizino_post_details_custom_title');
                        } else {
                            $bizino_post_details_custom_title = __('Blog Details', 'bizino');
                        }

                        if (!empty($bizino_post_details_custom_title)) {
                            echo bizino_heading_tag(
                                array(
                                    "tag" => esc_attr($bizino_page_title_tag),
                                    "text" => wp_kses($bizino_post_details_custom_title, $allowhtml),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }
                    }
                }
            }
            echo '<!-- End of Page title -->';
                echo '<div class="breadcumb-menu-wrap">';
                if (class_exists('ReduxFramework')) {
                    $bizino_breadcrumb_switcher = bizino_opt('bizino_enable_breadcrumb');
                } else {
                    $bizino_breadcrumb_switcher = '1';
                }
                if ($bizino_breadcrumb_switcher == '1') {
                    bizino_breadcrumbs(
                        array(
                            'breadcrumbs_classes' => 'nav',
                        )
                    );
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
