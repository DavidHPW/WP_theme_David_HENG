<?php

function montheme_init(){
	register_taxonomy('Custom_Taxonomy_TAG', 'post_logement', [
		'labels' => [
			'name' => 'Dotation immobilière',
			'singular_name' => 'Dotation immobilière',
			'plural_name'   => 'Dotations immobilières',
			'search_items'  => 'Rechercher des dotations',
			'all_items'		=> 'Toutes les dotations immobilières',
			'edit_item'     => 'Editer la dotation',
			'update_item'	=> 'Mettre à jour la dotation',
			'add_new_item'	=> 'Ajouter une dotation',
			'new_item_name' => 'Ajouter un nouveau nom de dotation',
			'menu_name'		=> 'Dotation immobilière',
		],
		'show_in_rest' 		=> true,
		'hierarchical' 		=> true,
		'show_admin_column'	=> true
	]);

	wp_insert_term( 'Piscine', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Une jolie piscine qui servira quand été.',
			'slug' 			=> 'piscine'
				) 
		);

	wp_insert_term( 'Cuisine', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Une jolie cuisine pour manger omnivore, bio, végétarien, vegan ou de la junk food.',
			'slug' 			=> 'cuisine'
				) 
		);

	wp_insert_term( 'Aménagée', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Evidemment, aménagée est idéal !',
			'slug' 			=> 'amenagee'
				) 
		);

	wp_insert_term( 'Meublé', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Meublé et fonctionnel !',
			'slug' 			=> 'meuble'
				) 
		);

	wp_insert_term( 'Meublé', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Meublé et fonctionnel !',
			'slug' 			=> 'meuble'
				) 
		);

	wp_insert_term( 'Veranda', 'Custom_Taxonomy_TAG', 
		array(
			'description' 	=> 'Faut pas avoir le vertige.',
			'slug' 			=> 'veranda'
				) 
		);
}

function montheme_support(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support( 'menus' );
	register_nav_menu( 'header', 'en tête du menu' );
	register_nav_menu( 'footer', 'en pied de page' );

	add_image_size( 'card-header', 350, 215, true );
}

function montheme_register_assets (){
	wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
	wp_register_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
	wp_register_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
	wp_deregister_script( 'jquerymin' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
	wp_enqueue_style( 'bootstrap');
	wp_enqueue_script( 'bootstrap');
}

function montheme_title_separator (){
	return '|';
}

function montheme_document_title_parts($title){
	return $title;
}

// Register Custom Post Type
function custom_post_ville() {

	$labels = array(
		'name'                  => _x( 'Villes', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Ville', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Villes', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Archives des villes', 'text_domain' ),
		'attributes'            => __( 'Attributs de la ville', 'text_domain' ),
		'parent_item_colon'     => __( 'Ville parent', 'text_domain' ),
		'all_items'             => __( 'Toutes les villes', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une nouvelle ville', 'text_domain' ),
		'add_new'               => __( 'Ajouter une ville', 'text_domain' ),
		'new_item'              => __( 'Nouvelle ville', 'text_domain' ),
		'edit_item'             => __( 'Editer la ville', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la ville', 'text_domain' ),
		'view_item'             => __( 'Voir la ville', 'text_domain' ),
		'view_items'            => __( 'Voir les villes', 'text_domain' ),
		'search_items'          => __( 'Chercher la ville', 'text_domain' ),
		'not_found'             => __( 'Ville non trouvée', 'text_domain' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image à la une', 'text_domain' ),
		'set_featured_image'    => __( 'Mettre une image à la une', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image à la une', 'text_domain' ),
		'use_featured_image'    => __( 'Utilisé comme image à la une', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la ville', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Mettre à jour dans cette ville', 'text_domain' ),
		'items_list'            => __( 'Liste des villes', 'text_domain' ),
		'items_list_navigation' => __( 'Listes des villes pour la navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filtre de la liste', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Ville', 'text_domain' ),
		'description'           => __( 'Une ville où tu respires de l\'air pollué', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 0,
		'menu_icon'				=>'dashicons-admin-multisite',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'supports'				=> ['thumbnail']
	);
		register_post_type( 'post_ville', $args );

}

// Register Custom Post Type
function custom_post_logement() {

	$labels = array(
		'name'                  => _x( 'Logements', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Logement', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Logements', 'text_domain' ),
		'name_admin_bar'        => __( 'Type de logement', 'text_domain' ),
		'archives'              => __( 'Archives des logements', 'text_domain' ),
		'attributes'            => __( 'Attributs du logement', 'text_domain' ),
		'parent_item_colon'     => __( 'Logement parent', 'text_domain' ),
		'all_items'             => __( 'Tous les logements', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un nouveau logement', 'text_domain' ),
		'add_new'               => __( 'Ajouter un logement', 'text_domain' ),
		'new_item'              => __( 'Nouveau logement', 'text_domain' ),
		'edit_item'             => __( 'Editer le logement', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour le logement', 'text_domain' ),
		'view_item'             => __( 'Voir le logement', 'text_domain' ),
		'view_items'            => __( 'Voir les logements', 'text_domain' ),
		'search_items'          => __( 'Chercher un logement', 'text_domain' ),
		'not_found'             => __( 'Logement non trouvé', 'text_domain' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image à la une', 'text_domain' ),
		'set_featured_image'    => __( 'Mettre une image à la une', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image à la une', 'text_domain' ),
		'use_featured_image'    => __( 'Utilisé comme image à la une', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans le logement', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Mettre à jour dans ce logement', 'text_domain' ),
		'items_list'            => __( 'Liste des logements', 'text_domain' ),
		'items_list_navigation' => __( 'Listes des logements pour la navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filtre de la liste', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Logement', 'text_domain' ),
		'description'           => __( 'Un logement sympa', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 1,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'supports'				=> ['thumbnail']
	);
		register_post_type( 'post_logement', $args );


}




function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

function montheme_menu_class ($classe){
	$classe[] = 'nav_item';
	return $classe;

}

function montheme_menu_link ($att){
	$att['class'] = 'nav-link';
	return $att;

}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

add_filter( 'acf/settings/save_json', 'capitaine_json_save_groups' );

add_filter('nav_menu_css_class' , 'montheme_menu_class');

add_filter( 'nav_menu_link_attributes', 'montheme_menu_link');

add_action( 'init', 'custom_post_logement', 0 );

add_action( 'init', 'custom_post_ville', 0 );

add_action('init', 'montheme_init');

//chargement du support
add_action('after_setup_theme' , 'montheme_support');

//chargement des assets
add_action('wp_enqueue_scripts' , 'montheme_register_assets');

//séparation
add_filter('document_title_separator', 'montheme_title_separator'); 

//titre du document
add_filter('document_title_parts', 'montheme_document_title_parts')


?>