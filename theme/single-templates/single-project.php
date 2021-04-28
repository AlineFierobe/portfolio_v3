<!-- GET HEADER -->
<?php get_header(); ?>

<!-- SINGLE POST PAR DEFAUT -->
<div class="post">
    <!-- SI L'UTILISATEUR EST CONNECTE ET EST ADMINISTRATEUR -->
    <!-- on lui affiche le bouton d'édition sinon il ne s'affiche pas -->
    <?php if(is_user_logged_in()) { ?>
    <div class="desktop post-btn">
        <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit"
            class="btn-dark">edit</a>
    </div>
    <?php } ?>

    <!-- TITLE -->
    <div class="post-title">
        <h2>
            <?php the_title(); ?>
        </h2>
    </div>

    <div class="single-project">
        <!-- CONTENT -->
        <?php 
        // get acf field for conditioning
        $why = get_field('project_why');
        $design = get_field('project_design');
        $dev = get_field('project_dev');
        $update = get_field('project_update');
        ?>
        <div class="single-project-content">
            <!-- WHYN THIS PROJECT -->
            <h3>
                why this project?
            </h3>
            <div class="single-project-content-why">
                <?php echo $why ?>
            </div>

            <!-- DESIGN -->
            <?php if($design){ ?>
            <h3>
                design
            </h3>
            <div class="single-project-content-design">
                <?php echo $design ?>
            </div>
            <?php } ?>

            <!-- DEVELOPMENT -->
            <?php if($dev){ ?>
            <h3>
                development
            </h3>
            <div class="single-project-content-dev">
                <?php echo $dev ?>
            </div>
            <?php } ?>

            <!-- UPDATE -->
            <?php if($update){ ?>
            <h3>
                more
            </h3>
            <div class="single-project-content-update">
                <?php echo $update ?>
            </div>
            <?php } ?>
        </div>
        <div class="single-project-aside">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <!-- TYPE -->
            <h4>type</h4>
            <div class="single-project-aside-type">
                <?php the_terms($post->ID, 'project_type', '' , ' ' , ' '); ?>
            </div>

            <!-- LANGUAGES USED -->
            <h4>used</h4>
            <div class="single-project-aside-used">
                <?php the_field('project_languages'); ?>
            </div>

            <h4>online</h4>
            <!-- WEBSITE -->
            <div class="single-project-aside-online">
                <?php 
            // check if url is field
            $link = get_field('project_url');
            if($link){ ?>
                <a href="<?php echo $link ?>" target="_blank" rel="noopener noreferrer">website</a>
                <?php } ?>

                <!-- GITHUB -->
                <?php
            // check if github is field
            $github = get_field('project_github');
            if($github){ ?>
                <a href="<?php echo $github ?>" target="_blank" rel="noopener noreferrer">github</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<!-- GET FOOTER -->
<?php get_footer(); ?>