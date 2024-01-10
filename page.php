<?php
get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php the_title() ?>
            </h1>
            <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
    <?php
    $theParentId = wp_get_post_parent_id(get_the_ID());
    if ($theParentId) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($theParentId) ?>"><i
                            class="fa fa-home" aria-hidden="true"></i> Back to
                        <?php echo get_the_title($theParentId) ?>
                    </a> <span class="metabox__main">
                        <?php echo the_title() ?>
                    </span>
                </p>
            </div>
        </div>
    <?php } ?>

    <?php
    $testArray = get_pages(
        array('child_of' => get_the_ID())
    );
    if ($theParentId or $testArray) { ?>
        <div class="page-links">
            <h2 class="page-links__title"><a href="<?php echo get_the_permalink($theParentId) ?>">
                    <?php echo get_the_title($theParentId) ?>
                </a></h2>
            <ul class="min-list">
                <?php
                if ($theParentId) {
                    $findChildrenOf = $theParentId;
                    //this mean the time that you are in child page and you have parent
                } else {
                    $findChildrenOf = get_the_ID();
                    //this mean the time that you are not in child page and you dont have parent
                }
                wp_list_pages(array('title_li' => Null, 'child_of' => $findChildrenOf, 'sort_column' => 'menu_order'));
                // this line of code means that when you have a parent you can see all child pages of your parent and choose one of theme but when you dont have any parent you can access to child page of your own page by using id (get_the_ID() function)
                ?>
            </ul>
        </div>
    <?php } ?>
    <div class="generic-content">
        <?php the_content() ?>
    </div>
    </div>
<?php }

get_footer();

?>