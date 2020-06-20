<?php get_header(); ?>

<?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <h1><?php the_title() ?></h1>
            <h2><?php the_author() ?></h2><br/>
            <p>
            <img src="<?php the_post_thumbnail_url() ?>" style="width:100%; height:auto;">
            </p>

            <?php the_content() ?>

        <?php endwhile ?>

<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer(); ?>