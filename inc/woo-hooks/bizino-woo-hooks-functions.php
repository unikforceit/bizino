<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// bizino gallery image size hook functions
add_filter('woocommerce_gallery_image_size','bizino_woocommerce_gallery_image_size');
function bizino_woocommerce_gallery_image_size( $imagesize ) {
    $imagesize = 'bizino-shop-single';
    return $imagesize;
}

// bizino shop main content hook functions
if( !function_exists('bizino_shop_main_content_cb') ) {
    function bizino_shop_main_content_cb( ) {

        if( is_shop() || is_product_category() || is_product_tag() ) {
            echo '<section class="vs-product-wrapper space-top space-negative-bottom">';
            if( class_exists('ReduxFramework') ) {
                $bizino_woo_product_col = bizino_opt('bizino_woo_product_col');
                if( $bizino_woo_product_col == '2' ) {
                    echo '<div class="container">';
                } elseif( $bizino_woo_product_col == '3' ) {
                    echo '<div class="container">';
                } elseif( $bizino_woo_product_col == '4' ) {
                    echo '<div class="container">';
                } elseif( $bizino_woo_product_col == '5' ) {
                    echo '<div class="bizino-container">';
                } elseif( $bizino_woo_product_col == '6' ) {
                    echo '<div class="bizino-container">';
                }
            } else {
                echo '<div class="container">';
            }
        } else {
            echo '<section class="vs-product-wrapper product-details space-top space-negative-bottom">';
                echo '<div class="container">';
        }
            echo '<div class="row gutters-40">';
    }
}

// bizino shop main content hook function
if( !function_exists('bizino_shop_main_content_end_cb') ) {
    function bizino_shop_main_content_end_cb( ) {
            echo '</div>';
        echo '</div>';
    echo '</section>';
    }
}

// shop column start hook function
if( !function_exists('bizino_shop_col_start_cb') ) {
    function bizino_shop_col_start_cb( ) {
        if( class_exists('ReduxFramework') ) {
            if( class_exists('woocommerce') && is_shop() ) {
                $bizino_woo_shoppage_sidebar = bizino_opt('bizino_woo_shoppage_sidebar');
                if( $bizino_woo_shoppage_sidebar == '2' && is_active_sidebar('bizino-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-8 order-last">';
                } elseif( $bizino_woo_shoppage_sidebar == '3' && is_active_sidebar('bizino-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        } else {
            if( class_exists('woocommerce') && is_shop() ) {
                if( is_active_sidebar('bizino-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        }

    }
}

// shop column end hook function
if( !function_exists('bizino_shop_col_end_cb') ) {
    function bizino_shop_col_end_cb( ) {
        echo '</div>';
    }
}

// bizino woocommerce pagination hook function
if( ! function_exists('bizino_woocommerce_pagination') ) {
    function bizino_woocommerce_pagination( ) {
        if( ! empty( bizino_pagination() ) ) {

            echo '<div class="vs-pagination mb-30">';
                echo '<ul>';
                    $prev   = '<i class="fas fa-chevron-left"></i>';
                    $next   = '<i class="fas fa-chevron-right"></i>';
                    // previous
                    if( get_previous_posts_link() ){
                        echo '<li>';
                        previous_posts_link( $prev );
                        echo '</li>';
                    }
                    echo bizino_pagination();
                    // next
                    if( get_next_posts_link() ){
                        echo '<li>';
                        next_posts_link( $next );
                        echo '</li>';
                    }
                echo '</ul>';
            echo '</div>';
        }
    }
}
// woocommerce filter wrapper hook function
if( ! function_exists('bizino_woocommerce_filter_wrapper') ) {
    function bizino_woocommerce_filter_wrapper( ) {
        echo '<div class="vs-sort-bar mb-40">';
            echo '<div class="row text-center text-md-start justify-content-between align-items-center">';
                echo '<div class="col-md-auto">';
                    echo '<div class="col-auto d-flex align-items-center">';
                        echo '<label class="text-body2">'.woocommerce_result_count().'</label>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="col-md-auto">';
                    echo '<div class="row">';
                        echo '<div class="col-auto d-flex align-items-center mb-3 mb-sm-0">';
                            echo '<label class="text-body2">'.esc_html__( 'Sort By', 'bizino' ).'</label>';
                            echo woocommerce_catalog_ordering();
                        echo '</div>';

                        echo '<div class="col-auto">';
                            echo '<div class="nav d-block">';
                                echo '<a href="#" class="icon-btn style3 active " id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fas fa-th"></i></a>';

                                echo '<a href="#" class="icon-btn style3 " id="tab-shop-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-grid" aria-selected="false"><i class="fas fa-list"></i></a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('bizino_woocommerce_tab_content_wrapper_start') ) {
    function bizino_woocommerce_tab_content_wrapper_start( ) {
        echo '<!-- Tab Content -->';
        echo '<div class="tab-content" id="nav-tabContent">';
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('bizino_woocommerce_tab_content_wrapper_end') ) {
    function bizino_woocommerce_tab_content_wrapper_end( ) {
        echo '</div>';
        echo '<!-- End Tab Content -->';
    }
}
// bizino grid tab content hook function
if( !function_exists('bizino_grid_tab_content_cb') ) {
    function bizino_grid_tab_content_cb( ) {
        echo '<!-- Grid -->';
            echo '<div class="tab-pane fade show active" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">';
                echo '<div class="shop-grid-area">';
                    woocommerce_product_loop_start();
                    if( class_exists('ReduxFramework') ) {
                        $bizino_woo_product_col = bizino_opt('bizino_woo_product_col');
                        if( $bizino_woo_product_col == '2' ) {
                            $bizino_woo_product_col_val = 'col-lg-6 col-sm-6 mb-30';
                        } elseif( $bizino_woo_product_col == '3' ) {
                            $bizino_woo_product_col_val = 'col-lg-4 col-sm-6 mb-30';
                        } elseif( $bizino_woo_product_col == '4' ) {
                            $bizino_woo_product_col_val = 'col-lg-3 col-sm-6 mb-30';
                        }elseif( $bizino_woo_product_col == '5' ) {
                            $bizino_woo_product_col_val = 'col-xl col-lg-4 col-sm-6 mb-30';
                        } elseif( $bizino_woo_product_col == '6' ) {
                            $bizino_woo_product_col_val = 'col-lg-2 col-sm-6 mb-30';
                        }
                    } else {
                        $bizino_woo_product_col_val = 'col-lg-4 col-sm-6 mb-30';
                    }

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            echo '<div class="'.esc_attr( $bizino_woo_product_col_val ).'">';
                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );

                            echo '</div>';
                        }
                        wp_reset_postdata();
                    }

                    woocommerce_product_loop_end();
                echo '</div>';
            echo '</div>';
        echo '<!-- End Grid -->';
    }
}

// bizino list tab content hook function
if( !function_exists('bizino_list_tab_content_cb') ) {
    function bizino_list_tab_content_cb( ) {
        echo '<!-- List -->';
        echo '<div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">';
            echo '<div class="shop-list-area">';
                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();
                        echo '<div class="col-md-6 col-lg-6 col-xl-4 mb-30">';
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content-horizontal', 'product' );
                        echo '</div>';
                    }
                    wp_reset_postdata();
                }

                woocommerce_product_loop_end();
            echo '</div>';
        echo '</div>';
        echo '<!-- End List -->';
    }
}

// bizino woocommerce get sidebar hook function
if( ! function_exists('bizino_woocommerce_get_sidebar') ) {
    function bizino_woocommerce_get_sidebar( ) {
        if( class_exists('ReduxFramework') ) {
            $bizino_woo_shoppage_sidebar = bizino_opt('bizino_woo_shoppage_sidebar');
        } else {
            if( is_active_sidebar('bizino-woo-sidebar') ) {
                $bizino_woo_shoppage_sidebar = '2';
            } else {
                $bizino_woo_shoppage_sidebar = '1';
            }
        }

        if( is_shop() ) {
            if( $bizino_woo_shoppage_sidebar != '1' ) {
                get_sidebar('shop');
            }
        }
    }
}

// bizino loop product thumbnail hook function
if( !function_exists('bizino_loop_product_thumbnail') ) {
    function bizino_loop_product_thumbnail( ) {
        global $product;
        echo '<div class="vs-product-box">';
            echo '<div class="product-img">';
            if( has_post_thumbnail() ){
                    echo '<img class="w-100" src="'.esc_url( get_the_post_thumbnail_url() ).'" alt="'.esc_attr( bizino_img_default_alt(  get_the_post_thumbnail_url() )).'" >';
                echo '<div class="actions">';
                    // Cart Button
                    woocommerce_template_loop_add_to_cart();
                    // Quick View Button
                    if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                    }
                    // Wishlist Button
                    if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="product-content">';
                echo '<div class="rating-wrap">';
                // Product Rating
                    woocommerce_template_loop_rating();
                echo '</div>';
                
                // Product Title
                echo '<h4 class="product-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h4>';
                // Product Price
                echo woocommerce_template_loop_price();

            echo '</div>';
        echo '</div>';
    }
}

// bizino loop horizontal product thumbnail hook function
if( !function_exists('bizino_loop_horiontal_product_thumbnail') ) {
    function bizino_loop_horiontal_product_thumbnail( ) {
        global $product;

            echo '<div class="product-img">';
            if( has_post_thumbnail() ){
                    echo '<img class="w-100" src="'.esc_url( get_the_post_thumbnail_url() ).'" alt="'.esc_attr( bizino_img_default_alt(  get_the_post_thumbnail_url() )).'" >';
                echo '<div class="actions">';
                    // Cart Button
                    woocommerce_template_loop_add_to_cart();
                    // Quick View Button
                    if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                    }
                    // Wishlist Button
                    if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="product-content">';
                echo '<div class="rating-wrap">';
                // Product Rating
                    woocommerce_template_loop_rating();
                echo '</div>';
                
                // Product Title
                echo '<h4 class="product-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h4>';
                // Product Price
                echo woocommerce_template_loop_price();

            echo '</div>';
    }
}

// before single product summary hook
if( ! function_exists('bizino_woocommerce_before_single_product_summary') ) {
    function bizino_woocommerce_before_single_product_summary( ) {

        global $post,$product;

        $attachments = $product->get_gallery_image_ids();

        if( $attachments ){
            $slider_class = "product-big-img vs-carousel";
        }else{
            $slider_class = "product-big-img";
        }
        // woocommerce_show_product_images();
        echo '<div class="position-relative">';

            if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {
      
                $regular_price  = get_post_meta( $product->get_id(), '_regular_price', true ); 
                $sale_price     = get_post_meta( $product->get_id(), '_sale_price', true );
             
                 if( !empty($sale_price) ) {
          
                    $amount_saved = $regular_price - $sale_price;
                    $currency_symbol = get_woocommerce_currency_symbol();
                    $percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

                    echo "<div class='discount-tagged'>" . number_format($percentage,0, '', '') . "".esc_html__('% Off', 'bizino')."</div>";
                    echo '<div class="product-tagged">';
                        echo '<a href="'.esc_url( get_permalink() ).'" class="offers">'.esc_html__( 'Offers', 'bizino' ).'</a>';
                    echo '</div>';   
                }
            }

            echo '<div class="'.esc_attr( $slider_class ).'" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-fade="true" data-dots="true">';
                if( $attachments ){
                    $x = 0;
                    foreach( $attachments as $single_image ){
                        $image_url = wp_get_attachment_image_url( $single_image, 'bizino-shop-single' );
                        echo '<div class="product-img">';
                            echo bizino_img_tag( array(
                                'url'   => esc_url( wp_get_attachment_image_url( $attachments[$x], 'bizino-shop-single' ) ),
                                'class' => 'w-100',
                            ) );
                        echo '</div>';
                        $x++;
                    }
                }elseif( has_post_thumbnail() ){
                    the_post_thumbnail( 'bizino-shop-single', [ 'class' => 'w-100', ] );
                }
            echo '</div>';
        echo '</div>';
    }
}

// single product price rating hook function
if( !function_exists('bizino_woocommerce_single_product_price_rating') ) {
    function bizino_woocommerce_single_product_price_rating() {
        global $product;
        $count = $product->get_review_count();
        echo woocommerce_template_loop_price();
        echo '<div class="woocommerce-product-rating">';
            echo '<div class="mt-2">';
            woocommerce_template_loop_rating();
            echo '</div>';
        echo '</div>';
    }
}

// single product title hook function
if( !function_exists('bizino_woocommerce_single_product_title') ) {
    function bizino_woocommerce_single_product_title( ) {
        if( class_exists( 'ReduxFramework' ) ) {
            $producttitle_position = bizino_opt('bizino_product_details_title_position');
        } else {
            $producttitle_position = 'header';
        }

        if( $producttitle_position != 'header' ) {
            echo '<!-- Product Title -->';
            echo '<h3 class="product-title mb-1">'.esc_html( get_the_title() ).'</h3>';

        }

    }
}

// single product title hook function
if( !function_exists('bizino_woocommerce_quickview_single_product_title') ) {
    function bizino_woocommerce_quickview_single_product_title( ) {
        echo '<!-- Product Title -->';
        echo '<h3 class="product-title mb-1">'.esc_html( get_the_title() ).'</h3>';
        echo '<!-- End Product Title -->';
    }
}

// single product excerpt hook function
if( !function_exists('bizino_woocommerce_single_product_excerpt') ) {
    function bizino_woocommerce_single_product_excerpt( ) {
        echo '<!-- Product Description -->';
        woocommerce_template_single_excerpt();
        echo '<!-- End Product Description -->';
    }
}

// single product availability hook function
if( !function_exists('bizino_woocommerce_single_product_availability') ) {
    function bizino_woocommerce_single_product_availability( ) {
        global $product;
        $availability = $product->get_availability();

        if( $availability['class'] != 'out-of-stock' ) {
            echo '<!-- Product Availability -->';
                echo '<div class="mt-2 link-inherit">';
                    echo '<p>';
                        echo '<strong class="text-title me-3 font-theme">'.esc_html__( 'Availability:', 'bizino' ).'</strong>';
                        if( $product->get_stock_quantity() ){
                            echo '<span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>'.esc_html( $product->get_stock_quantity() ).'</span>';
                        }else{
                            echo '<span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>'.esc_html__( 'In Stock', 'bizino' ).'</span>';
                        }
                    echo '</p>';
                echo '</div>';
            echo '<!--End Product Availability -->';
        } else {
            echo '<!-- Product Availability -->';
            echo '<div class="mt-2 link-inherit">';
                echo '<p>';
                    echo '<strong class="text-title me-3 font-theme">'.esc_html__( 'Availability:', 'bizino' ).'</strong>';
                    echo '<span class="stock out-of-stock"><i class="far fa-check-square me-2 ms-1"></i>'.esc_html__( 'Out Of Stock', 'bizino' ).'</span>';
                echo '</p>';
            echo '</div>';
            echo '<!--End Product Availability -->';
        }
    }
}

// single product add to cart fuunction
if( !function_exists('bizino_woocommerce_single_add_to_cart_button') ) {
    function bizino_woocommerce_single_add_to_cart_button( ) {
        woocommerce_template_single_add_to_cart();
    }
}

// single product ,eta hook function
if( !function_exists('bizino_woocommerce_single_meta') ) {
    function bizino_woocommerce_single_meta( ) {
        global $product;
        echo '<div class="product_meta">';
            if( ! empty( $product->get_sku() ) ){
                echo '<span class="sku_wrapper">'.esc_html__( 'SKU:', 'bizino' ).'<span class="sku">'.$product->get_sku().'</span></span>';
            }
            echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'bizino' ) . ' ', '</span>' );
        echo '</div>';
    }
}

// single produt sidebar hook function
if( !function_exists('bizino_woocommerce_single_product_sidebar_cb') ) {
    function bizino_woocommerce_single_product_sidebar_cb(){
        if( class_exists('ReduxFramework') ) {
            $bizino_woo_singlepage_sidebar = bizino_opt('bizino_woo_singlepage_sidebar');
            if( ( $bizino_woo_singlepage_sidebar == '2' || $bizino_woo_singlepage_sidebar == '3' ) && is_active_sidebar('bizino-woo-sidebar') ) {
                get_sidebar('shop');
            }
        } else {
            if( is_active_sidebar('bizino-woo-sidebar') ) {
                get_sidebar('shop');
            }
        }
    }
}

// reviewer meta hook function
if( !function_exists('bizino_woocommerce_reviewer_meta') ) {
    function bizino_woocommerce_reviewer_meta( $comment ){
        $verified = wc_review_is_from_verified_owner( $comment->comment_ID );
        if ( '0' === $comment->comment_approved ) { ?>
            <em class="woocommerce-review__awaiting-approval">
                <?php esc_html_e( 'Your review is awaiting approval', 'bizino' ); ?>
            </em>

        <?php } else { ?>
            <div class="comment-author">
                <h4 class="name h5"><?php echo ucwords( get_comment_author() ); ?> </h4>
                <span class="commented-on"><time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"> <?php printf( esc_html__('%1$s at %2$s', 'bizino'), get_comment_date(wc_date_format()),  get_comment_time() ); ?> </time></span>
            </div>
                <?php
                if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
                    echo '<em class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'bizino' ) . ')</em> ';
                }

                ?>
        <?php
        }

        woocommerce_review_display_rating();
    }
}

// woocommerce proceed to checkout hook function
if( !function_exists('bizino_woocommerce_button_proceed_to_checkout') ) {
    function bizino_woocommerce_button_proceed_to_checkout() {
        echo '<a href="'.esc_url( wc_get_checkout_url() ).'" class="checkout-button button alt wc-forward vs-btn rounded-1 shadow-none no-skew">';
            esc_html_e( 'Proceed to checkout', 'bizino' );
        echo '</a>';
    }
}

// bizino woocommerce cross sell display hook function
if( !function_exists('bizino_woocommerce_cross_sell_display') ) {
    function bizino_woocommerce_cross_sell_display( ){
        woocommerce_cross_sell_display();
    }
}

// bizino minicart view cart button hook function
if( !function_exists('bizino_minicart_view_cart_button') ) {
    function bizino_minicart_view_cart_button() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button checkout wc-forward vs-btn style1">' . esc_html__( 'View cart', 'bizino' ) . '</a>';
    }
}

// bizino minicart checkout button hook function
if( !function_exists('bizino_minicart_checkout_button') ) {
    function bizino_minicart_checkout_button() {
        echo '<a href="' .esc_url( wc_get_checkout_url() ) . '" class="button wc-forward vs-btn style1">' . esc_html__( 'Checkout', 'bizino' ) . '</a>';
    }
}

// bizino woocommerce before checkout form
if( !function_exists('bizino_woocommerce_before_checkout_form') ) {
    function bizino_woocommerce_before_checkout_form() {
        echo '<div class="row">';
            if ( ! is_user_logged_in() && 'yes' === get_option('woocommerce_enable_checkout_login_reminder') ) {
                echo '<div class="col-lg-12">';
                    woocommerce_checkout_login_form();
                echo '</div>';
            }

            echo '<div class="col-lg-12">';
                woocommerce_checkout_coupon_form();
            echo '</div>';
        echo '</div>';
    }
}

// add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'cart-button icon-btn',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="fal fa-cart-plus"></i>'
        );
}

// product searchform
add_filter( 'get_product_search_form' , 'bizino_custom_product_searchform' );
function bizino_custom_product_searchform( $form ) {

    $form = '<form class="search-form" role="search" method="get" action="' . esc_url( home_url( '/'  ) ) . '">
        <label class="screen-reader-text" for="s">' . __( 'Search for:', 'bizino' ) . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search', 'bizino' ) . '" />
        <button class="submit-btn" type="submit"><i class="far fa-search"></i></button>
        <input type="hidden" name="post_type" value="product" />
    </form>';

    return $form;
}

// cart empty message
add_action('woocommerce_cart_is_empty','bizino_wc_empty_cart_message',10);
function bizino_wc_empty_cart_message( ) {
    echo '<h3 class="cart-empty d-none">'.esc_html__('Your cart is currently empty.','bizino').'</h3>';
}