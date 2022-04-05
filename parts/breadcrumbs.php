<nav id="breadcrumbs" class="w-full bg-white py-8">
    <ol class="w-full max-w-inner mx-auto flex items-center px-6">
        <?php foreach( ( @$args[ 'items' ] ?? array(  ) ) as $item ): ?>
            <li class="text-cyan-500 text-14 font-bold after:text-gray-500 after:content-['/'] mr-3">
                <?php if( @$item[ 'href' ] ): ?>
                    <a href="<?php echo $item[ 'href' ] ?>" class="inline-block text-gray-500 px-3 py-2">
                        <?php echo @$item[ 'title' ] ?>
                    </a>
                <?php else: ?>
                    <span class="px-3 py-2"><?php echo @$item[ 'title' ] ?></span>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ol>
</nav>
