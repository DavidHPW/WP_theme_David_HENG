<?php get_header(); ?>

<?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <h1><?php the_title() ?></h1>
            <p>
            <img src="<?php the_post_thumbnail_url() ?>" style="width:100%; height:auto;">
            </p>
            <?php the_content() ?>
            <h3>Type : <?php the_field("type") ?></h3>
            <h3>Surface : <?php the_field("surface") ?> m²</h3>
            <h3>Prix : <?php the_field("prix") ?> €</h3>
            <h3>Frais d'agence : <?php the_field("frais_dagence") ?> €</h3>
            <h3>Date de mise en vente : <?php the_field("date_de_mise_en_vente") ?></h3>
            <h3>Exposition : <?php the_field("exposition") ?></h3>  
            <h3>Dotations immobilières : <h3>

            <?php
            $terms = wp_get_post_terms( get_the_ID(), "Custom_Taxonomy_TAG", array ('fields' => 'all'));
            foreach ($terms as $dotation) {?>
                <h4> - <?php echo $dotation->name ?></h4>
            <?php }
            
            ?>

        <?php endwhile ?>

<?php else: ?>
    <h1>Pas de logements</h1>
<?php endif; ?>

<?php get_footer(); ?>