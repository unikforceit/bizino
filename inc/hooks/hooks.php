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

/**
 * Hook for preloader
 */
add_action('bizino_preloader_wrap', 'bizino_preloader_wrap_cb', 10);

/**
 * Hook for offcanvas cart
 */
add_action('bizino_main_wrapper_start', 'bizino_main_wrapper_start_cb', 10);

/**
 * Hook for Header
 */
add_action('bizino_header', 'bizino_header_cb', 10);

/**
 * Hook for Blog Start Wrapper
 */
add_action('bizino_blog_start_wrap', 'bizino_blog_start_wrap_cb', 10);

/**
 * Hook for Blog Column Start Wrapper
 */
add_action('bizino_blog_col_start_wrap', 'bizino_blog_col_start_wrap_cb', 10);

/**
 * Hook for Blog Column End Wrapper
 */
add_action('bizino_blog_col_end_wrap', 'bizino_blog_col_end_wrap_cb', 10);

/**
 * Hook for Blog Column End Wrapper
 */
add_action('bizino_blog_end_wrap', 'bizino_blog_end_wrap_cb', 10);

/**
 * Hook for Blog Pagination
 */
add_action('bizino_blog_pagination', 'bizino_blog_pagination_cb', 10);

/**
 * Hook for Blog Content
 */
add_action('bizino_blog_content', 'bizino_blog_content_cb', 10);

/**
 * Hook for Blog Sidebar
 */
add_action('bizino_blog_sidebar', 'bizino_blog_sidebar_cb', 10);

/**
 * Hook for Blog Details Sidebar
 */
add_action('bizino_blog_details_sidebar', 'bizino_blog_details_sidebar_cb', 10);

/**
 * Hook for Blog Details Wrapper Start
 */
add_action('bizino_blog_details_wrapper_start', 'bizino_blog_details_wrapper_start_cb', 10);

/**
 * Hook for Blog Details Post Meta
 */
add_action('bizino_blog_post_meta', 'bizino_blog_post_meta_cb', 10);

/**
 * Hook for Blog Details Post Share Options
 */
add_action('bizino_blog_details_share_options', 'bizino_blog_details_share_options_cb', 10);

/**
 * Hook for Blog Details Post Author Bio
 */
add_action('bizino_blog_details_author_bio', 'bizino_blog_details_author_bio_cb', 10);

/**
 * Hook for Blog Details Tags and Categories
 */
add_action('bizino_blog_details_tags_and_categories', 'bizino_blog_details_tags_and_categories_cb', 10);

/**
 * Hook for Blog Deatils Post Navigation
 */
add_action('bizino_blog_details_post_navigation', 'bizino_blog_details_post_navigation_cb', 10);

/**
 * Hook for Blog Deatils Comments
 */
add_action('bizino_blog_details_comments', 'bizino_blog_details_comments_cb', 10);

/**
 * Hook for Blog Deatils Column Start
 */
add_action('bizino_blog_details_col_start', 'bizino_blog_details_col_start_cb');

/**
 * Hook for Blog Deatils Column End
 */
add_action('bizino_blog_details_col_end', 'bizino_blog_details_col_end_cb');

/**
 * Hook for Blog Deatils Wrapper End
 */
add_action('bizino_blog_details_wrapper_end', 'bizino_blog_details_wrapper_end_cb');

/**
 * Hook for Blog Post Thumbnail
 */
add_action('bizino_blog_post_thumb', 'bizino_blog_post_thumb_cb');

/**
 * Hook for Blog Post Content
 */
add_action('bizino_blog_post_content', 'bizino_blog_post_content_cb');


/**
 * Hook for Blog Post Excerpt And Read More Button
 */
add_action('bizino_blog_postexcerpt_read_content', 'bizino_blog_postexcerpt_read_content_cb');

/**
 * Hook for footer content
 */
add_action('bizino_footer_content', 'bizino_footer_content_cb', 10);

/**
 * Hook for main wrapper end
 */
add_action('bizino_main_wrapper_end', 'bizino_main_wrapper_end_cb', 10);

/**
 * Hook for Back to Top Button
 */
add_action('bizino_back_to_top', 'bizino_back_to_top_cb', 10);

/**
 * Hook for Page Start Wrapper
 */
add_action('bizino_page_start_wrap', 'bizino_page_start_wrap_cb', 10);

/**
 * Hook for Page End Wrapper
 */
add_action('bizino_page_end_wrap', 'bizino_page_end_wrap_cb', 10);

/**
 * Hook for Page Column Start Wrapper
 */
add_action('bizino_page_col_start_wrap', 'bizino_page_col_start_wrap_cb', 10);

/**
 * Hook for Page Column End Wrapper
 */
add_action('bizino_page_col_end_wrap', 'bizino_page_col_end_wrap_cb', 10);

/**
 * Hook for Page Column End Wrapper
 */
add_action('bizino_page_sidebar', 'bizino_page_sidebar_cb', 10);

/**
 * Hook for Page Content
 */
add_action('bizino_page_content', 'bizino_page_content_cb', 10);