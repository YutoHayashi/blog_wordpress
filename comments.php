<?php
require( __DIR__ . '/comments-helper.php' );
$args = array(
    'fields'                => array(
        'author'            => '
            <label class="block my-8">
                <p class="text-gray-700 text-16 mb-2">*名前</p>
                <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" required placeholder="＊your name" class="w-full text-18 text-gray-700 border-gray-500 p-6" />
            </label>
        ',
        'email'             => '
            <label class="block my-8">
                <p class="text-gray-700 text-16 mb-2">*メールアドレス</p>
                <input type="email" name="email" id="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" required placeholder="メールアドレス" class="w-full text-18 text-gray-700 border-gray-500 p-6" />
            </label>
        ',
        'url'               => '',
    ),
    'comment_field'         => '
        <label class="block my-8">
            <p class="text-gray-700 text-16 mb-2">*コメント</p>
            <textarea name="comment" id="comment" rows="6" required aria-required="true" placeholder="コメントを入力" class="w-full text-18 text-gray-700 p-6"></textarea>
        </label>
    ',
    'label_submit'          => '送信',
    'title_reply'           => null,
);
?>
<div id="comments" class="comments">
    <?php if( have_comments(  ) ): ?>
        <ol class="commets-list">
            <?php wp_list_comments( array(
                'callback' => 'yutips__comment_item',
            ) ) ?>
        </ol>
    <?php endif ?>
    <?php comment_form( $args ) ?>
</div>

