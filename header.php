<?php require_once( __DIR__ . '/parts/nav-options.php' ) ?>
<header class="sticky top-0 w-full bg-white z-50" role="navigation">
    <div class="flex items-center justify-between max-w-inner mx-auto">
        <h1>
            <a href="<?php echo get_option( 'home' ) ?>" class="block text-28 font-semibold text-gray-800 py-8 px-14">
                <?php echo get_bloginfo( 'name' ) ?>
            </a>
        </h1>
        <nav id="nav">
            <ul class="flex items-center">
                <?php foreach( $nav_options as $nav_option ):
                    get_template_part(
                        'parts/nav-item',
                        ( @$nav_option[ 'expandable' ] ?? false ) ? 'expandable' : null,
                        $nav_option
                    );
                endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
