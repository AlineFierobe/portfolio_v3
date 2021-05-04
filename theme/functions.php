<?php
// Permet la redirection en cas de soucis de chargement de header
ob_clean();
ob_start();

//  ajout du fichier javascript 
function theme_js(){
    wp_enqueue_script( 'javascript',
    get_template_directory_uri() . '/js/script.js',
    array() );
}
add_action( 'wp_footer', 'theme_js' );

// ajout des menus
function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );

// ajout des miniatures
add_theme_support( 'post-thumbnails' );

// suppression de l'affichage d'un menu dans le panel admin 
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
    remove_menu_page( 'edit.php' ); // supprime l'onglet Article
    remove_menu_page( 'edit-comments.php' ); // supprime l'onglet Commentaire
}


// masquer par défaut la barre d'outils WordPress en haut du site pour TOUS les utilisateurs
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (is_user_logged_in()) {
        show_admin_bar(false);
    }
}


// Rediriger les non-administrateurs vers la page d'accueil À partir de l'administration
function wpm_admin_redirection() {
    // Si on essaye d'accéder sans être administrateur
    if ( is_admin() && ! current_user_can( 'administrator' ) ) {
        // On redirige vers la page d'accueil
        wp_redirect( home_url() );
        exit;
    }
}
add_action( 'init', 'wpm_admin_redirection' );

// Ajout d'une class sur les liens "voir les articles plus anciens" dans les query
function posts_link_attributes() {
    return 'class="myClass"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');

/****************************************************************/
/**************************** CPTUI *****************************/
/****************************************************************/
function cptui_register_my_cpts() {

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => __( "Projects", "custom-post-type-ui" ),
		"singular_name" => __( "Project", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Projects", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "project", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-index-card",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "project", $args );

	
	/**
	 * Post Type: Languages.
	 */

	$labels = [
		"name" => __( "Languages", "custom-post-type-ui" ),
		"singular_name" => __( "Language", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Languages", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "languages", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-generic",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "languages", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


/****************************************************************/
/************************** TAXONOMY ****************************/
/****************************************************************/
function cptui_register_my_taxes_project_type() {

	/**
	 * Taxonomy: Projects Type.
	 */

	$labels = [
		"name" => __( "Project Types", "custom-post-type-ui" ),
		"singular_name" => __( "Project Type", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Project Types", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'project_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "project_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "project_type", [ "project" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_project_type' );


/****************************************************************/
/***************************** ACF ******************************/
/****************************************************************/
if( function_exists('acf_add_local_field_group') ):

    // HOME PAGE 
    acf_add_local_field_group(array(
        'key' => 'group_60881280d54fb',
        'title' => 'HOME',
        'fields' => array(
            // POSITION
            array(
                'key' => 'field_60881287515e7',
                'label' => 'Position',
                'name' => 'position',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            // FIRST IMAGE
            array(
                'key' => 'field_6088139c515ed',
                'label' => 'Main Icon',
                'name' => 'main_icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            // SLOGAN
            array(
                'key' => 'field_608812bd515e8',
                'label' => 'Catchphrase',
                'name' => 'catchphrase',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            // IMAGE KNOWLEDGE
            array(
                'key' => 'field_608813d5515ef',
                'label' => 'Icon Knowledge',
                'name' => 'icon_knowledge',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            // KNOWLEDGE TEXT
            array(
                'key' => 'field_608812e0515e9',
                'label' => 'Knowledge',
                'name' => 'knowledge_text',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 5,
                'new_lines' => 'br',
            ),
            // IMAGE PROJECT
            array(
                'key' => 'field_608813f1515f0',
                'label' => 'Icon Project',
                'name' => 'icon_project',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            // IMAGE CONTACT
            array(
                'key' => 'field_608813fe515f1',
                'label' => 'Icon Contact',
                'name' => 'icon_contact',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            // CONTACT TEXT
            array(
                'key' => 'field_6088135a515ea',
                'label' => 'Contact',
                'name' => 'contact_text',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => 'br',
            ),
            // LINK TO CV
            array(
                'key' => 'field_60881372515eb',
                'label' => 'CV',
                'name' => 'cv',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            // LINK TO GITHUB
            array(
                'key' => 'field_6088137e515ec',
                'label' => 'Github',
                'name' => 'github_home',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'templates/homepage.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));

    // PROJECTS
    acf_add_local_field_group(array(
        'key' => 'group_608815e6c97cf',
        'title' => 'PROJECT',
        'fields' => array(
            // LANGUAGES USED
            array(
                'key' => 'field_60881676341f2',
                'label' => 'Languages',
                'name' => 'project_languages',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'HTML' => 'HTML',
                    'CSS' => 'CSS',
                    'SASS' => 'SASS',
                    'JavaScript' => 'JavaScript',
                    'TypeScript' => 'TypeScript',
                    'VueJS' => 'VueJS',
                    'Angular' => 'Angular',
                    'React' => 'React',
                    'Flutter' => 'Flutter',
                    'MySQL' => 'MySQL',
                    'PHP' => 'PHP',
                    'Laravel' => 'Laravel',
                ),
                'allow_custom' => 0,
                'save_custom' => 0,
                'default_value' => array(
                ),
                'layout' => 'horizontal',
                'toggle' => 0,
                'return_format' => 'value',
            ),
            // LINK TO GITHUB REPO
            array(
                'key' => 'field_608815fa341f1',
                'label' => 'GitHub',
                'name' => 'project_github',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            // LINK TO FINAL WEBSITE
            array(
                'key' => 'field_608817a4358a0',
                'label' => 'URL',
                'name' => 'project_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'excerpt',
            2 => 'discussion',
            3 => 'comments',
            4 => 'revisions',
            5 => 'slug',
            6 => 'author',
            7 => 'format',
            8 => 'page_attributes',
            9 => 'tags',
            10 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
    // DETAILS PROJECT
    acf_add_local_field_group(array(
        'key' => 'group_6088622e05cf3',
        'title' => 'DETAILS',
        'fields' => array(
            // WHY THIS PROJECT
            array(
                'key' => 'field_6088624014522',
                'label' => 'Why this project?',
                'name' => 'project_why',
                'type' => 'medium_editor',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'standard_buttons' => array(
                    0 => 'bold',
                    1 => 'quote',
                    2 => 'unorderedlist',
                    3 => 'h4',
                    4 => 'h5',
                    5 => 'removeFormat',
                ),
                'other_options' => '',
                'delay' => 0,
            ),
            // DESIGN
            array(
                'key' => 'field_6088630ba57f6',
                'label' => 'Design',
                'name' => 'project_design',
                'type' => 'medium_editor',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'standard_buttons' => array(
                    0 => 'bold',
                    1 => 'image',
                    2 => 'quote',
                    3 => 'unorderedlist',
                    4 => 'h4',
                    5 => 'h5',
                    6 => 'removeFormat',
                ),
                'other_options' => '',
                'delay' => 0,
            ),
            // DEVELOPMENT
            array(
                'key' => 'field_6088635fa57f7',
                'label' => 'Development',
                'name' => 'project_dev',
                'type' => 'medium_editor',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'standard_buttons' => array(
                    0 => 'bold',
                    1 => 'image',
                    2 => 'quote',
                    3 => 'unorderedlist',
                    4 => 'h4',
                    5 => 'h5',
                    6 => 'removeFormat',
                ),
                'other_options' => '',
                'delay' => 0,
            ),
            // UPDATE
            array(
                'key' => 'field_60886380a57f8',
                'label' => 'More',
                'name' => 'project_update',
                'type' => 'medium_editor',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'standard_buttons' => array(
                    0 => 'bold',
                    1 => 'image',
                    2 => 'quote',
                    3 => 'unorderedlist',
                    4 => 'h4',
                    5 => 'h5',
                    6 => 'removeFormat',
                ),
                'other_options' => '',
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'categories',
            11 => 'tags',
            12 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));

    // LANGUAGES
    acf_add_local_field_group(array(
        'key' => 'group_60890bd90141b',
        'title' => 'LANGUAGES',
        'fields' => array(
            array(
                'key' => 'field_60890bd90469b',
                'label' => 'Image',
                'name' => 'language_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'languages',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
    
    
    endif;