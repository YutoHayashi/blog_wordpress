<?php require( __DIR__ . '/parts/nav-options.php' ) ?>
<footer class="w-full bg-white text-gray-600">
    <div class="w-full max-w-inner mx-auto py-24 md:py-36 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="col-span-1 mb-12 md:mb-0">
                <h2 class="text-15 md:text-20 text-gray-700 font-bold"><?php bloginfo( 'name' ) ?> - <?php bloginfo( 'description' ) ?></h2>
                <a href="mailto:<?php echo get_option( 'admin_email' ) ?>" class="inline-block underline text-20 md:text-28 text-cyan-500"><?php echo get_option( 'admin_email' ) ?></a>
                <div class="flex items-center mt-12 md:mt-24">
                    <div class="h-36 w-36 md:h-72 md:w-72 overflow-hidden rounded-full border border-slate-300">
                        <img src="<?php echo get_template_directory_uri(  ) ?>/images/me.jpg" alt="筆者の写真" width="100%" height="100%" class="w-full h-full object-cover" />
                    </div>
                    <div>
                        <h3 class="text-16 md:text-20 font-semibold ml-6 md:ml-12 mb-2">林裕大（YutoHayashi）</h3>
                        <p class="text-gray-500 text-18"></p>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <ul class="w-full flex justify-center md:border border-slate-500 rounded-full">
                    <?php foreach( ( new WP_Query( array( 'post_type' => 'links', ) ) )->get_posts(  ) as $link ): ?>
                    <li class="mx-2">
                        <a target="_blank" href="<?php echo esc_url( get_field( 'links_url', $link->ID ) ) ?>" class="block flex items-center justify-center h-20 w-20 text-gray-500 hover:text-cyan-500 text-24">
                            <span class="mdi mdi-<?php echo get_field( 'links_mdi', $link->ID ) ?>"></span>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
                <nav class="py-10 px-6">
                    <ul class="grid grid-cols-1 md:grid-cols-3 gap-1 text-14">
                        <?php foreach( $nav_options as $no ): ?>
                            <?php if( ! @$no[ 'expandable' ] ): ?>
                                <li class="font-bold">
                                    <a target="_blank" href="<?php echo $no[ 'href' ] ?>" class="text-gray-700 py-2 md:py-0 hover:text-cyan-500 hover:font-bold"><?php echo $no[ 'title' ] ?></a>
                                </li>
                            <?php else: ?>
                                <li class="font-bold mt-2 md:mt-0">
                                    <?php echo $no[ 'title' ] ?>
                                    <ul class="mt-4 font-normal list-disc">
                                        <?php foreach( $no[ 'dropdown' ] as $item ): ?>
                                            <li>
                                                <a target="_blank" href="<?php echo $item[ 'url' ] ?>" class="block py-2 hover:text-cyan-500 hover:font-bold"><?php echo $item[ 'title' ] ?></a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <hr />
    <small class="inline-block w-full text-12 md:text-14 text-center py-6">&copy;2022 YutoHayashi All Rights Reserved.</small>
</footer>
