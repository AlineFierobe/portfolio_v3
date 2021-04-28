<!-- 
redirect to Accueil
-->
<?php
$url = get_bloginfo('wpurl')."/home";
     wp_safe_redirect( $url );
     exit;
?>