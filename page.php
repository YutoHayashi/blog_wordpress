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
                    <h2 class="text-24 md:text-30 font-bold font-roboto mb-6 text-gray-700 text-center"><?php the_title(  ) ?></h2>
                </div>
            </section>
            <?php get_template_part(
                'parts/breadcrumbs',
                null,
                array(
                    'items' => [
                        [ 'title' => 'トップ', 'href' => get_option( 'home' ), ],
                        [ 'title' => get_the_title(  ), ]
                    ],
                ),
            ) ?>
            <section class="w-full bg-white py-16 md:py-24 px-4 md:px-0">
                <div class="w-full max-w-content mx-auto page-content">
                    <?php the_content(  ) ?>
                </div>
            </section>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
