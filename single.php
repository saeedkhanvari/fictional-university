<?php
get_header();

while (have_posts()) {
    the_post(); ?>
    <h1>
        <?php the_title(); ?>
    </h1>
    <p>
        <?php the_content() ?>
    </p>
    dfsdf
<?php }

get_footer();

?>