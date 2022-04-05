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
                <div class="py-16 md:py-24 px-8 md:px-60 w-full max-w-inner mx-auto">
                    <p class="mb-3 font-bold text-14 text-center">
                        <?php foreach( get_the_category(  ) as $category ): ?>
                            <a href="<?php echo esc_url( get_category_link( get_cat_ID( $category->cat_name ) ) ) ?>" class="inline-block mx-3 text-cyan-500"><?php echo $category->cat_name ?></a>
                        <?php endforeach ?>
                    </p>
                    <h2 class="text-24 md:text-30 font-bold font-roboto mb-6 text-gray-700 text-center"><?php the_title(  ) ?></h2>
                    <p class="text-13 text-center mt-6">
                        <?php if( $tags = get_the_tags(  ) ): ?>
                            <?php foreach( $tags as $tag ): ?>
                                <a href="<?php echo get_tag_link( $tag->term_id ) ?>" class="inline-block bg-gray-100 rounded py-2 px-6 mx-2 my-2 md:my-0">
                                    <span class="mdi mdi-pound"></span>
                                    <?php echo $tag->name ?>
                                </a>
                            <?php endforeach ?>
                        <?php endif ?>
                    </p>
                </div>
            </section>
            <?php get_template_part(
                'parts/breadcrumbs',
                null,
                array(
                    'items' => [
                        [ 'title' => 'トップ', 'href' => get_option( 'home' ), ],
                        [ 'title' => get_the_title(  ), ],
                    ],
                ),
            ) ?>
            <section class="w-full bg-white py-16 md:py-24 px-4 md:px-0">
                <div class="w-full max-w-content mx-auto coldark post-content">
                    <small class="text-14 text-gray-500 mb-20">投稿日：<?php the_date(  ) ?></small>
                    <?php the_content(  ) ?>
                </div>
            </section>
            <section class="w-full bg-white py-16 md:py-24 px-4 md:px-0">
                <div class="w-full max-w-content mx-auto">
                    <h2 class="text-20 font-bold mb-4 text-gray-700">
                        <span class="mdi mdi-comment-multiple"></span>
                        コメント
                    </h2>
                    <?php comments_template(  ) ?>
                </div>
            </section>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
