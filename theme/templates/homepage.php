<?php
/*
Template name: Home
*/
?>
<!-- HEADER -->
<?php get_header(); ?>

<!-- BLOC HOME -->
<div class="home">
    <!-- POSITION -->
    <h2>
        <?php the_field('position'); ?>
    </h2>

    <!-- AVATAR -->
    <!-- IF NOT CONNECTED LINK TO LOGIN PAGE -->
    <?php if(!is_user_logged_in()){ ?>
    <a href="<?php bloginfo('wpurl'); ?>/login">
        <img src="<?php the_field('main_icon'); ?>" alt="avatar">
    </a>
    <?php } else { ?>
    <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post.php?post=<?php the_ID(); ?>&action=edit">
        <img src="<?php the_field('main_icon'); ?>" alt="avatar">
    </a>
    <?php } ?>

    <!-- CATCHPHRASE -->
    <h3>
        <?php the_field('catchphrase'); ?>
    </h3>
</div>

<!-- BLOC KNOWLEDGE -->
<div class="knowledge" id="knowledge">
    <div class="knowledge-box">
        <!-- TITLE -->
        <h2>
            knowledge
        </h2>

        <!-- AVATAR -->
        <img src="<?php the_field('icon_knowledge'); ?>" alt="avatar" class="home-avatar">

        <!-- CONTENT -->
        <div class="knowledge-box-content">
            <div class="knowledge-box-content-text">
                <?php the_field('knowledge_text'); ?>
            </div>

            <div class="languages">
                <!-- LOOP LANGUAGES -->
                <?php if(is_user_logged_in()) { ?>
                <a href="<?php bloginfo('wpurl'); ?>/wp-admin/post-new.php?post_type=languages">
                    <h3>
                        languages I speak
                    </h3>
                </a>
                <?php } else { ?>
                <h3>
                    languages I speak
                </h3>
                <?php } ?>
                <div class=" languages-loop">
                    <?php get_template_part('./loops/home-languages'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BLOC PROJECTS -->
<div class="home-projects" id="projects">
    <div class="home-projects-box">
        <!-- TITLE -->
        <h2>projects</h2>

        <!-- AVATAR -->
        <img src="<?php the_field('icon_project'); ?>" alt="avatar" class="home-avatar">

        <!-- GRID PROJECT -->
        <div class="home-projects-box-content">
            <div class="home-projects-box-content-loop">
                <?php get_template_part('./loops/home-project'); ?>
            </div>
            <a href="<?php bloginfo('wprul'); ?>/projects" class="btn-dark">see all projects</a>
        </div>
    </div>
</div>

<!-- BLOC CONTACT -->
<div class="contact" id="contact">
    <div class="contact-box">
        <!-- TITLE -->
        <h2>
            contact
        </h2>

        <!-- AVATAR & LINKS -->
        <div class="contact-box-left">
            <!-- CV -->
            <a href="<?php the_field('cv'); ?>" target="_blank" rel="noopener noreferrer" class="btn-light">
                check my CV
            </a>

            <!-- AVATAR -->
            <img src="<?php the_field('icon_contact'); ?>" alt="avatar" class="home-avatar">

            <!-- GITHUB -->
            <a href="<?php the_field('github_home'); ?>" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-github"></i>
            </a>
        </div>

        <!-- CONTENT -->
        <div class="contact-box-content">
            <?php the_field('contact_text'); ?>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php get_footer(); ?>