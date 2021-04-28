<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1'; // for paged
$myQuery = new WP_Query( array(
    'post_type' => 'Nom du Post Type', // filter one or more post type
    'nopaging'               => false, // activate pagination
    'paged'                  => $paged, // pagination
    'orderby' => 'date', // order by date
    'orderby' => 'title', // order by title
    'order' => 'ASC', // sort from A to Z
    'order' => 'DESC', // sort from Z to A
    'orderby' => 'meta_value', // order by an ACF
    'meta_key' => 'slug_acf', // ACF slug to use for order by
    'posts_per_page' => 5, // how many post per page -1 will display all
    'post_status' => ' publish', // online post only
    'meta_query' => array( // filter one or more ACF
            array(
                'key' => 'slug_acf', // ACF slig to use to filter
                'value' => 'votre valeur a comparer', // value to compare
                'compare' => '=', // how to compare
                'type'    => 'DATE' // type of data to compare
            ),
        ) 
    ) 
);
?>

<?php if ($myQuery->have_posts()) : ?>
<!--  S'IL Y A DES POSTS -->
<?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
<!-- POUR CHAQUE POST DANS LA LOOP -->
<?php endwhile; ?>
<!-- POUR AVOIR LE LIEN VERS LES ARTICLES PLUS ANCIENS -->
<?php next_posts_link( 'Voir les posts plus anciens', $myPostType->max_num_pages ); ?>
<?php else : ?>
<!-- SI PAS DE POST A AFFICHER -->
<p class="empty">Aucun post à afficher</p>
<?php endif; ?>