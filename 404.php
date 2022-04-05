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
                    <h2 class="text-24 md:text-30 font-bold font-roboto mb-6 text-gray-700 text-center">404 | NotFound</h2>
                    <p class="inline-block w-full text-18 text-gray-500 text-center font-bold mb-24">申し訳ございませんが、お探しのページは見つかりませんでした。</p>
                    <a href="<?php echo get_option( 'home' ) ?>" class="relative inline-block left-1/2 transform -translate-x-1/2 bg-primary hover:bg-white text-white hover:text-primary border border-primary rounded-full py-3 px-12 text-18 mb-12">トップへ戻る</a>
                    <?php get_search_form(  ) ?>
                </div>
            </section>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
