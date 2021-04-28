<?php
$languages = new WP_Query( array(
    'post_type' => 'languages', // filter one or more post type
    'orderby' => 'date', // order by date
    'order' => 'ASC', // sort from Z to A
    'posts_per_page' => -1, // how many post per page -1 will display all
    'post_status' => ' publish', // online post only
    ) 
);
?>

<?php if ($languages->have_posts()) : ?>
<!--  S'IL Y A DES POSTS -->
<?php while ($languages->have_posts()) : $languages->the_post(); ?>
<!-- POUR CHAQUE POST DANS LA LOOP -->
<div class="languages-loop-item">
    <?php if(is_user_logged_in()) { ?>
    <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit">
        <img src="<?php the_field('language_image'); ?>" alt="<?php the_title(); ?>">
    </a>
    <?php } else { ?>
    <img src="<?php the_field('language_image'); ?>" alt="<?php the_title(); ?>">
    <?php } ?>
</div>
<?php endwhile; ?>
<?php else : ?>
<!-- SI PAS DE POST A AFFICHER -->
<p class="empty">no languages to display</p>
<?php endif; 

wp_reset_query(); ?>