<?php
get_header();
?>
<h1>Accueil</h1>
	<div class="row">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'post_ville', 'posts_per_page' => '10' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="col-md-3">
                <div class="card">
				<a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail( ('card-header'), ['class' => 'card-img', 'alt' => '', 'style' => 'height: auto;'] ) ?>
				</a>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_field('nom') ?></li></h5>
                        <a href="<?php the_permalink() ?>" class="card-link">Voir les logements</a>
                    </div>
                </div>
            </div>

				<?php endwhile; wp_reset_query(); ?>

	</div>

<?php 
get_footer();

?>