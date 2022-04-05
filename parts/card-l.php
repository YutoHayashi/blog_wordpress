<article role="article" <?php if( $index = @$args[ 'index' ] ): ?>aria-posinset="<?php echo $index ?>"<?php endif ?>>
    <a href="<?php echo get_post_permalink(  ) ?>" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <div class="bg-gray-300 flex items-center justify-center overflow-hidden max-h-card-img min-h-card-img">
            <img src="<?php echo get_the_post_thumbnail_url(  ) ?? '' ?>" alt="サムネイル画像" class="object-cover w-full h-full translation duration-150 transform md:hover:scale-110" height="100%" width="100%" />
        </div>
        <div class="lg:col-span-2 flex flex-col justify-center md:px-12 lg:px-24 py-4 md:py-12">
            <p class="mb-3 text-gray-600 font-bold text-14">
                <?php foreach( get_the_category(  ) as $category ): ?>
                    <span class="mdi mdi-<?php the_field( 'cat_mdi', $category->taxonomy . '_' . $category->term_id ) ?> mdi-24px text-primary ml-5 first:ml-0"></span>
                    <?php echo $category->cat_name ?>
                <?php endforeach ?>
            </p>
            <h3 class="block text-gray-700 text-18 font-bold mb-5"><?php the_title(  ) ?></h3>
            <p class="text-gray-500 text-15"><?php echo get_the_excerpt(  ) ?></p>
            <small class="inline-block text-gray-400 text-14 mt-5">投稿日：<?php the_date(  ) ?></small>
        </div>
    </a>
</article>
