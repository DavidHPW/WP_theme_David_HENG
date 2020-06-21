<?php get_header(); ?>

<?php if (have_posts()): ?>
    <div class="row">
        <?php while(have_posts()): the_post(); ?>
    
            <div class="col-md-6">
                <div class="card">
                <?php the_post_thumbnail( ('medium'), ['class' => 'card-img', 'alt' => '', 'style' => 'height: auto;'] ) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?> - <?php the_author() ?></li></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>

                        <?php
                        the_terms( get_the_ID(), 'Custom_Taxonomy_TAG')
                        ?>

                        <p class="card-text">
                            <?php the_excerpt() ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="card-link">Voir plus</a>
                    </div>
                </div>
            </div>
        <?php endwhile ?>

    </div>
<?php else: ?>
<?php endif; ?>

<?php get_footer(); ?>