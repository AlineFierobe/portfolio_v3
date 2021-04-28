<!-- HEADER -->
<?php get_header(); ?>

<!-- CONTAINER -->
<div class="post">
    <!-- TITLE -->
    <div class="post-title">
        <h2>
            recherche pour : <?php the_search_query(); ?>
        </h2>
    </div>
    <!-- CONTENT -->
    <div class="post-content">
        <?php if (have_posts()) : ?>
        <!-- IF THERE ARE POST -->
        <?php while (have_posts()) : the_post(); ?>
        <!-- FOR EACH POST IN THE LOOP -->

        <!-- TITLE WITH LINK -->
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
        <?php endwhile; ?>

        <?php else : ?>
        <!-- IF THERE IS NO POST -->
        <p class="empty">
            Aucun post à afficher
        </p>
        <?php endif; ?>
    </div>
</div>

<!-- FOOTER -->
<?php get_footer(); ?>