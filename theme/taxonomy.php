<!-- HEADER -->
<?php get_header(); ?>

<!-- CONTAINER -->
<div class="post">
    <!-- TITLE -->
    <div class="post-title">
        <h2>
            all <?php single_term_title(); ?> projects
        </h2>
    </div>
    <div class="projects-box">
        <!-- PROJECTS LOOP -->
        <div class="projects-box-loop">
            <?php if (have_posts()) : ?>
            <!--  S'IL Y A DES POSTS -->
            <?php while (have_posts()) : the_post(); ?>
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
            <p class="empty">no project to display for now</p>
            <?php endif; ?>
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