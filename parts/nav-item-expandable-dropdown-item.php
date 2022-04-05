<li>
    <a target="_blank" href="<?php echo $args[ 'url' ] ?>" class="block p-10 bg-white hover:bg-cyan-100 h-full">
        <h2 class="font-bold text-18 mb-3">
            <?php if( @$args[ 'icon' ] ): ?>
                <span class="mdi mdi-<?php echo $args[ 'icon' ] ?> mdi-24px text-primary mr-1"></span>
            <?php endif ?>
            <?php echo $args[ 'title' ] ?>
        </h2>
        <p class="text-gray-600 text-15"><?php echo @$args[ 'description' ] ?? '' ?></p>
    </a>
</li>
