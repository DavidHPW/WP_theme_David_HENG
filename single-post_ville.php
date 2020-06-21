<?php get_header(); ?>

<?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>


        <div class="card mb-3">
            <img src="<?php the_post_thumbnail_url() ?>" style="width:25%; height:auto;" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php the_title() ?> (<?php the_field("code_postal")?>)</h5>
                <p class="card-text"><?php the_field("description");?></p>
                <p class="card-text"><small class="text-muted"><?php the_content() ?></small></p>
            </div>
        </div>


        <div class="row">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'post_logement', 'posts_per_page' => '10' ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="card" style="width: 25rem;">
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle"> 
                             <p>Type : <?php the_field("type") ?></p>
                             <p>Surface : <?php the_field("surface") ?> m²<p>
                             <p>Prix : <?php the_field("prix") ?> €<p>
                        
                        </h6>
                        <a href="<?php the_permalink() ?>" class="btn btn-primary">Acheter</a>
                    </div>
                </div>
				      
				<?php endwhile; wp_reset_query(); ?>
		</div>

            

        <?php endwhile ?>

<?php else: ?>
    <h1>Pas de villes</h1>
<?php endif; ?>



<?php get_footer(); ?>