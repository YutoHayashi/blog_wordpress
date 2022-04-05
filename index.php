<!DOCTYPE html>
<html lang="ja" class="text-base">
<head>
    <?php get_template_part( 'parts/head' ) ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <?php wp_head(  ) ?>
</head>
<body>
    <div class="wrapper">
        <?php get_header(  ) ?>
        <main id="main" class="block w-full">
            <section class="relative w-full bg-white">
                <div id="mv" class="py-16 md:py-24 px-8 md:px-60 w-full max-w-inner mx-auto">
                    <h2 class="text-24 md:text-30 font-bold font-roboto mb-6 text-gray-700 text-center"><?php bloginfo( 'description' ) ?></h2>
                    <p class="inline-block w-full text-18 text-sky-600 text-center font-bold mb-24">
                        <?php foreach( get_categories( array( 'hide_empty' => false, ) ) as $category ): ?>
                            <span><?php echo $category->name ?></span>&ensp;/
                        <?php endforeach ?>
                    </p>
                    <?php get_search_form(  ) ?>
                </div>
            </section>
            <?php get_template_part( 'parts/category-nav-header' ) ?>
            <?php get_template_part(
                'parts/breadcrumbs',
                null,
                array(
                    'items' => [
                        [ 'title' => 'トップ', ],
                    ],
                ),
            ) ?>
            <section class="w-full bg-white py-16 md:py-24">
                <div class="w-full max-w-inner mx-auto px-6">
                    <h2 class="text-20 font-bold mb-4 text-gray-700">
                        <span class="mdi mdi-sort-clock-descending-outline"></span>
                        最近の投稿
                    </h2>
                    <?php
                    $recent_query = new WP_Query(
                        array(
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                        )
                    );
                    if ( $recent_query->have_posts(  ) ):
                        $recent_query->the_post(  );
                        get_template_part( 'parts/card', 'l' );
                    endif;
                    wp_reset_query(  ); ?>
                </div>
            </section>
            <section class="w-full bg-white py-16 md:py-24">
                <?php
                $main_query = new WP_Query(
                    array(
                        'paged' => max( 1, get_query_var( 'page' ) ),
                        'offset' => ( max( 1, get_query_var( 'page' ) ) - 1 ) * (int) get_option( 'posts_per_page' ) + 1,
                    )
                );
                ?>
                <div class="w-full max-w-inner mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16 px-6" aria-setsize="<?php echo $main_query->post_count ?>">
                    <?php
                    $index = 1;
                    if ( $main_query->have_posts(  ) ):
                        while( $main_query->have_posts(  ) ):
                            $main_query->the_post(  );
                            get_template_part( 'parts/card', 's', array( 'index' => $index ) );
                            $index ++;
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="flex justify-center py-8">
                    <?php echo paginate_links(
                        array(
                            'format' => '?page=%#%',
                            'current' => max( 1, get_query_var( 'page' ) ),
                            'total' => $main_query->max_num_pages,
                            'prev_next' => true,
                            'next_text' => '>',
                            'prev_text' => '<',
                        )
                    );
                    wp_reset_query(  );
                    ?>
                </div>
            </section>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
