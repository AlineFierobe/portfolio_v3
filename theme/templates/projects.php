<?php
/*
Template name: All Projects
*/
?>
<!-- HEADER -->
<?php get_header(); ?>

<!-- CONTAINER -->
<div class="post">
    <!-- TITLE -->
    <div class="post-title">
        <h2>
            <?php the_title(); ?>
        </h2>
    </div>
    <div class="projects-box">
        <!-- PROJECTS LOOP -->
        <div class="projects-box-loop">
            <?php get_template_part('./loops/all-projects'); ?>
        </div>

        <!-- TAXONOMIES -->
        <div class="projects-box-tax">
            <!-- SI L'UTILISATEUR EST CONNECTE ET EST ADMINISTRATEUR -->
            <!-- on lui affiche le bouton d'édition sinon il ne s'affiche pas -->
            <?php if(is_user_logged_in()) { ?>
            <div class="desktop projects-box-tax-btn">
                <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post-new.php?post_type=project" class="btn-dark">new
                    project</a>
            </div>
            <?php } ?>
            <span class="btn-dark">
                sort projects
            </span>
            <ul>
                <?php
                // get taxonomy in a variable
                $taxGenre = 'project_type';
                // variable with get_terms
                $termsGenre = get_terms($taxGenre, array('hide_empty' => false));
        
                // loop
                foreach ($termsGenre as $termGenre) {
                echo '<li><a href="' . esc_attr(get_term_link($termGenre, $taxGenre)) . '" title="' . sprintf( __( "Voir tous les … in %s" ), $termGenre->name ) . '" ' . '>' . $termGenre->name.'</a></li>';
                }
            ?>
            </ul>
        </div>
    </div>
</div>


<!-- FOOTER -->
<?php get_footer(); ?>