<form method="get" id="form" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
    <input type="submit" id="submit" value="search">
</form>

<!-- CODE POUR APPELER LE SEARCHFORM -->
<?php get_search_form(); ?>