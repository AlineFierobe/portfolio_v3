<?php
/*
Template name: Login
*/
?>

<!-- HEADER -->
<?php get_header(); ?>

<!-- CONTAINER -->
<div class="login-page">
    <div class="post-title">
        <h2>
            Connexion
        </h2>
    </div>
    <?php 
    wp_login_form( 
    
        array(
            'echo'           => true,
            // Default 'redirect' value takes the user back to the request URI.
            'redirect'       => home_url(),
            'form_id'        => 'loginform',
            'label_username' => __( 'Identifiant' ),
            'label_password' => __( 'Mot de Passe' ),
            'label_remember' => __( 'Se souvenir de moi' ),
            'label_log_in'   => __( 'Connexion' ),
            'id_username'    => 'user_login',
            'id_password'    => 'user_pass',
            'id_remember'    => 'rememberme',
            'id_submit'      => 'wp-submit',
            'remember'       => true,
            'value_username' => '',
            // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
            'value_remember' => false,
        )
                            
    );	
    ?>
    <a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=lostpassword">mot de passe oublié ?</a>

</div>

<!-- FOOTER -->
<?php get_footer(); ?>