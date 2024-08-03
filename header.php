<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <span>Portfolio</span>
        <nav class="projet__nav">
                <?php 
                $args = array(
                    'post_type' => 'projet',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $image = get_field('image');
                        $resume = get_field('resume');
                        if ($image) : ?>
                            <a class="projet__nav-items" href="<?php the_permalink() ?>">
                                <img class="projet__nav-image" src="<?php echo esc_url($image); ?>" alt="" />
                                <?php if ($resume): ?>
                                    <p class="projet__nav-resume"><?php echo esc_html($resume); ?></p>
                                <?php endif; ?>
                            </a>
                        <?php endif;
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
        </nav>
    </header>
</body>
</html>