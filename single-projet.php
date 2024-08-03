<?php
get_header();
$previous_post = get_previous_post();
$next_post = get_next_post();
$custom_fields = get_post_meta(get_the_ID());

function get_value($value) {
    if (is_array($value) && count($value) == 1) {
        return $value[0];
    }
    return $value;
}

echo '<div class="single__head single__content">';

echo '<div class="single__head-content">';

the_title( '<h1>', '</h1>' );

if (isset($custom_fields['resume'])) {
    $value = get_value($custom_fields['resume']);
    echo '<p>' . esc_html($value) . '</p>';
}

if (isset($custom_fields['url'])) {
    $value = get_value($custom_fields['url']);
    echo '<a class="single__head-button" href="'. esc_html($value) .'">CODE DU SITE</a>';
}

echo '</div>';

if (isset($custom_fields['image'])) {
    $value = get_value($custom_fields['image']);
    $image_url = wp_get_attachment_url($value) ? wp_get_attachment_url($value) : $value;
    echo '<img class="single__head-image" src="' . esc_url($image_url) . '" alt="Image">';
}

echo '</div>';

for ($i = 1; $i <= 3; $i++) {
    echo '<div class="single__content single__content-' . ($i) . '">';
    echo '<div class="single__content-text">';
    $titre_key = 'titre_' . $i;
    if (isset($custom_fields[$titre_key])) {
        $value = get_value($custom_fields[$titre_key]);
        echo '<h' . ($i + 1) . '>' . esc_html($value) . '</h' . ($i + 1) . '>';
    }
    
    $paragraphe_key = 'paragraphe_' . $i;
    if (isset($custom_fields[$paragraphe_key])) {
        $value = get_value($custom_fields[$paragraphe_key]);
        echo '<p>' . esc_html($value) . '</p>';
    }

    echo '</div>';
    
    $image_key = 'image_' . $i;
    if (isset($custom_fields[$image_key])) {
        $value = get_value($custom_fields[$image_key]);
        $image_url = wp_get_attachment_url($value) ? wp_get_attachment_url($value) : $value;
        echo '<img src="' . esc_url($image_url) . '" alt="Image ' . $i . '">';
    }
    echo '</div>';
}
?>
<div class="single__nav">
    <a href="<?php echo get_permalink($previous_post); ?>">
        <img class="single__nav-left single__nav-arrow" src="<?php echo get_template_directory_uri(); ?>/medias/gauche.png" alt="Post précédent">
    </a>
    <a href="<?php echo get_home_url(); ?>"><img class="single__nav-arrow" src="<?php echo get_template_directory_uri(); ?>/medias/accueil.png"></a>
    <a href="<?php echo get_permalink($next_post); ?>">
        <img class="single__nav-right single__nav-arrow" src="<?php echo get_template_directory_uri(); ?>/medias/droite.png" alt="Post suivant">
    </a>
</div>

<?php get_footer(); ?>