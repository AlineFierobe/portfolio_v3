<!-- HEADER -->
<?php get_header(); ?>

<!-- SINGLE POST PAR DEFAUT -->
<div class="post">
    <div class="post-title c-flex">
        <h2>
            <?php the_title(); ?>
        </h2>
    </div>
    <!-- SI L'UTILISATEUR EST CONNECTE ET EST ADMINISTRATEUR -->
    <!-- on lui affiche le bouton d'édition sinon il ne s'affiche pas -->
    <?php if(is_user_logged_in() && (user_role_check('administrator'))) { ?>
    <div class="desktop post-btn">
        <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit"
            class="btn-dark">éditer</a>
    </div>
    <?php } ?>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
</div>

<!-- FOOTER -->
<?php get_footer(); ?>