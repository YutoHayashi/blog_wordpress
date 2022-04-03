<!DOCTYPE html>
<html lang="ja" class="text-base">
<head>
    <?php get_template_part( 'parts/head' ) ?>
    <?php wp_head(  ) ?>
</head>
<body>
    <div class="wrapper">
        <?php get_header(  ) ?>
        <main id="main" class="block w-full">
            <div class="w-full max-w-inner mx-auto"></div>
        </main>
        <?php get_footer(  ) ?>
    </div>
    <?php wp_footer(  ) ?>
</body>
</html>
