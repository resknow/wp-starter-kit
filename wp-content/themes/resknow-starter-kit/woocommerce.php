<?php

// Top level shop page
if ( is_shop() ) {
    Timber::render('woocommerce/home.twig', get_context_with_fields([
        'this' => Timber::get_post( get_option( 'woocommerce_shop_page_id' ) )
    ]));
}

// Product Category Archive
if ( is_product_category() ) {
    global $paged;
    $paged = ( !isset($paged) || !$paged ? 1 : $paged );

    $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
    $context['category'] = get_category_tree($term_id);
    $context['hasChildren'] = !empty($context['category']->children);
    $context['isTopLevel'] = $queried_object->parent === 0 && $context['hasChildren'];

    // Get products by date (newest first)
    $context['products'] = new Timber\PostQuery([
        'post_type' => 'product',
        'orderby' => 'date',
        'posts_per_page' =>  12,
        'paged' => $paged,
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => [$queried_object->slug],
            ]
        ]
    ]);

    // Get Pagination Object so we can pass data to the template
    $pagination = $context['products']->pagination();

    // Store the page number & category slug
    $context['category_meta']['page'] = $pagination->current;
    $context['category_meta']['slug'] = $queried_object->slug;
    $context['category_meta']['pages'] = $pagination->total;

    Timber::render('woocommerce/archive.twig', get_context_with_fields($context));
}

// Single Product
if ( is_singular('product') ) {
    $the_post = Timber::get_post();
    $product = wc_get_product($the_post->ID);
    $the_product = $product;

    // Get related products
    $related_limit = wc_get_loop_prop('columns');
    $related_ids = wc_get_related_products($the_post->id, $related_limit);
    $related_products = Timber::get_posts($related_ids);

    // Restore the context and loop back to the main query loop.
    wp_reset_postdata();

    Timber::render('woocommerce/single-product.twig', get_context_with_fields([
        'post' => $the_post,
        'this' => $the_product,
        'related' => $related_products
    ]));
}