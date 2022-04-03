<nav class="w-full bg-white shadow sticky" style="top: 82px">
    <ul class="flex justify-center w-full max-w-inner mx-auto overflow-x-auto">
        <?php foreach( get_categories( array( 'hide_empty' => false, ) ) as $category ): ?>
            <li>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( $category->cat_name ) ) ) ?>" class="block p-5 text-16 font-semibold text-gray-700 border-b-2 border-transparent hover:border-cyan-300 whitespace-nowrap">
                    <?php echo $category->name ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
