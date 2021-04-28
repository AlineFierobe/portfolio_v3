<?php
$allProjects = new WP_Query( array(
    'post_type' => 'project', // filter one or more post type
    'orderby' => 'date', // order by date
    'order' => 'DESC', // sort from Z to A
    'posts_per_page' => -1, // how many post per page -1 will display all
    'post_status' => ' publish', // online post only
    ) 
);
?>

<?php if ($allProjects->have_posts()) : ?>
<!--  S'IL Y A DES POSTS -->
<?php while ($allProjects->have_posts()) : $allProjects->the_post(); ?>
<!-- POUR CHAQUE POST DANS LA LOOP -->
<div class="projects-loop-item">
    <a href="<?php the_permalink(); ?>">
        <h3>
            <?php the_title(); ?>
        </h3>
        <div class="projects-loop-item-img"
            style="background: url('<?php the_post_thumbnail_url(); ?>') center top/cover;"></div>
    </a>
</div>
<?php endwhile; ?>
<?php else : ?>
<!-- SI PAS DE POST A AFFICHER -->
<p class="empty">No project to display</p>
<?php endif; 

wp_reset_query(); ?>