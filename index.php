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
            <section class="relative w-full bg-slate-100">
                <div id="mv" class="py-24 px-60 w-full max-w-inner mx-auto">
                    <h2 class="text-30 font-bold font-roboto mb-6 text-gray-700 text-center"><?php bloginfo( 'description' ) ?></h2>
                    <small class="inline-block w-full text-18 text-sky-600 text-center font-bold mb-24">
                        <?php foreach( get_categories( array( 'hide_empty' => false, ) ) as $category ): ?>
                            <span><?php echo $category->name ?></span>&ensp;/
                        <?php endforeach ?>
                    </small>
                    <form action="/" class="flex justify-center">
                        <label class="w-full flex">
                            <input type="search" name="s" class="w-full px-8 text-24 text-gray-600 focus:ring-0 focus:outline-none outline-none border-0 border-l border-t border-b border-slate-100 font-bold" />
                            <button type="submit" class="py-2 px-4 bg-primary text-white hover:bg-white hover:text-primary border border-primary">
                                <span class="mdi mdi-magnify mdi-24px"></span>
                            </button>
                        </label>
                    </form>
                </div>
            </section>
            <?php get_template_part( 'parts/category-nav-header' ) ?>
            <section class="w-full bg-white">
                <div class="py-16 w-full max-w-inner mx-auto">
                    <h2 class="text-20 font-bold mb-4 text-gray-700">最近の投稿</h2>
                    <?php if( have_posts(  ) ): the_post(  );
                        get_template_part( 'parts/card', 'l' );
                    endif; ?>
                </div>
            </section>
            <section class="w-full bg-slate-100">
                <div class="py-16 w-full max-w-inner mx-auto grid grid-cols-3 gap-12">
                    <?php if( have_posts(  ) ):
                        while( have_posts(  ) ): the_post(  );
                            get_template_part( 'parts/card', 's' );
                        endwhile;
                    endif; ?>
                </div>
            </section>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
