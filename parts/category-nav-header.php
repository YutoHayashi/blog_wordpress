<?php
$category = get_category( get_query_var( 'cat', NULL ) );
?>
<nav class="w-full bg-white shadow sticky z-10" style="top: 82px">
    <ul class="flex justify-start md:justify-center w-full max-w-inner mx-auto overflow-x-auto hide-scrollbar">
        <?php foreach( get_categories( array( 'hide_empty' => false, ) ) as $_category ): ?>
            <li>
                <a href="<?php echo esc_url( get_category_link( get_cat_ID( $_category->cat_name ) ) ) ?>" class="block p-5 px-8 text-16 font-semibold text-gray-700 border-b-2 border-<?php echo @$category->term_id === $_category->term_id ? 'cyan-300' : 'transparent' ?> hover:border-cyan-300 whitespace-nowrap">
                    <?php echo $_category->name ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
