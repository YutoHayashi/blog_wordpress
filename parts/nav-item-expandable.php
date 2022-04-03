<li class="text-16 select-none expandable">
    <button class="block py-5 px-8 text-gray-600 font-bold cursor-pointer">
        <?php echo $args[ 'title' ] ?>
        <span class="mdi mdi-chevron-down"></span>
    </button>
    <div class="absolute left-0 w-full bg-white">
        <ul class="w-full max-w-inner mx-auto px-8 grid grid-cols-4 gap-0 overflow-hidden">
            <?php foreach( ( @$args[ 'dropdown' ] ?? array(  ) ) as $dropdown ):
                get_template_part(
                    'parts/nav-item',
                    'expandable-dropdown-item',
                    $dropdown,
                );
            endforeach; ?>
        </ul>
    </div>
</li>
