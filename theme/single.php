<!-- GET HEADER -->
<?php get_header(); ?>

<!-- ON VERIFIE LE POST TYPE POUR REDIRIGER VERS LE BON SINGLE TEMPLATE
la redirection automatique ne fonctionne pas car les singles templates ne sont pas à la racine du thème mais dans un sous-dossier on fait donc la redirection manuellement -->
<?php 
// on récupère le post type
$postType = get_post_type();

if($postType === "project") {
    // on redirige vers le bon single template
    get_template_part('./single-templates/single', 'project');

} else if($postType === "languages") {

    //redirect to Home
    $url = get_bloginfo('wpurl')."/home/#knowledge";
         wp_safe_redirect( $url );
         exit;


} else {  ?>
<!-- SINGLE POST PAR DEFAUT -->
<div class="post">
    <div class="post-title c-flex">
        <h2>
            <?php the_title(); ?>
        </h2>
    </div>
    <!-- SI L'UTILISATEUR EST CONNECTE ET EST ADMINISTRATEUR -->
    <!-- on lui affiche le bouton d'édition sinon il ne s'affiche pas -->
    <?php if(is_user_logged_in()) { ?>
    <div class="desktop post-btn">
        <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit"
            class="btn-dark">éditer</a>
    </div>
    <?php } ?>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
</div>

<?php } ?>

<!-- GET FOOTER -->
<?php get_footer(); ?>