<?php
if( ! function_exists( 'yutips__comment_item' ) ):
    function yutips__comment_item( $comment, $args, $depth ) { ?>
        <li <?php comment_class( 'flex my-8 items-start' ) ?>>
            <figure class="block border-gray-600">
                <?php echo get_avatar( $comment, $size='100', '', '', array(
                    'class' => 'rounded-full'
                ) ) ?>
            </figure>
            <div class="ml-4 md:ml-8 w-full">
                <?php if( $comment->comment_approved == '0' ) : ?>
                    <em class="whitespace-nowrap overflow-auto"><?php esc_html_e( 'あなたのコメントは管理者による承認を待っている状態です。','5balloons_theme' ) ?></em>
                <?php endif; ?>
                <div class="border border-gray-500 rounded-lg p-6 text-gray-700 text-16">
                    <?php comment_text(  ) ?>
                </div>
                <div class="flex mt-4">
                    <div class="ml-auto">
                        <p class="text-gray-500 text-14">投稿者：<?php echo get_comment_author(  ) ?>&ensp;投稿日：<?php printf( esc_html__( '%1$s at %2$s', '5balloons_theme' ), get_comment_date(  ),  get_comment_time(  ) ) ?></p>
                    </div>
                </div>
                <?php comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'depth' => $depth,
                            'max_depth' => $args[ 'max_depth' ]
                        )
                    )
                ) ?>
            </div>
        </li>
    <?php }
endif;
