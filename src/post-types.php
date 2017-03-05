<?php
// Register Custom Post Type
function bedriftspresentasjoner_cpt() {

  $labels = array(
    'name'                  => _x( 'Bedpresser', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Bedpress', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Bedpresser', 'delta' ),
    'name_admin_bar'        => __( 'Bedpress', 'delta' ),
    'archives'              => __( 'Bedriftspresentasjoner', 'delta' ),
    'attributes'            => __( 'Bedpressegenskaper', 'delta' ),
    'parent_item_colon'     => __( '', 'delta' ),
    'all_items'             => __( 'Alle bedpresser', 'delta' ),
    'add_new_item'          => __( 'Legg til ny bedpress', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny bedpress', 'delta' ),
    'edit_item'             => __( 'Rediger bedpress', 'delta' ),
    'update_item'           => __( 'Oppdater bedpress', 'delta' ),
    'view_item'             => __( 'Vis Bedpress', 'delta' ),
    'view_items'            => __( 'Vis Bedpresser', 'delta' ),
    'search_items'          => __( 'Søk blant Bedpresser', 'delta' ),
    'not_found'             => __( 'Ingen bedpresser', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen bedpresser i papirkurven', 'delta' ),
    'featured_image'        => __( 'Fremhevet bilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem fremhevet bilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern fremhevet bilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som fremhevet bilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i bedpress', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til denne bedpressen', 'delta' ),
    'items_list'            => __( 'Bedpressliste', 'delta' ),
    'items_list_navigation' => __( 'Bedpresslistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer bedpressliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'bedkom',
    'read_post'             => 'bedkom',
    'delete_post'           => 'bedkom',
    'edit_posts'            => 'bedkom',
    'edit_others_posts'     => 'bedkom',
    'publish_posts'         => 'bedkom',
    'read_private_posts'    => 'bedkom',
  );
  $args = array(
    'label'                 => __( 'Bedpress', 'delta' ),
    'description'           => __( 'Bedriftspresentasjoner', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-nametag',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'bedpress', $args );

}
add_action( 'init', 'bedriftspresentasjoner_cpt', 0 );


// Register Custom Post Type
function samarbeidspartnere_cpt() {

  $labels = array(
    'name'                  => _x( 'Samarbeidspartnere', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Samarbeidspartner', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Partnere', 'delta' ),
    'name_admin_bar'        => __( 'Samarbeidspartnere', 'delta' ),
    'archives'              => __( 'Partnerarkiv', 'delta' ),
    'attributes'            => __( 'Samarbeidspartneregenskaper', 'delta' ),
    'parent_item_colon'     => __( '', 'delta' ),
    'all_items'             => __( 'Alle partnere', 'delta' ),
    'add_new_item'          => __( 'Legg til ny samarbeidspartner', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny samarbeidspartner', 'delta' ),
    'edit_item'             => __( 'Rediger samarbeidspartner', 'delta' ),
    'update_item'           => __( 'Oppdater samarbeidspartner', 'delta' ),
    'view_item'             => __( 'Vis samarbeidspartner', 'delta' ),
    'view_items'            => __( 'Vis samarbeidspartnere', 'delta' ),
    'search_items'          => __( 'Søk blant samarbeidspartnere', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Logo', 'delta' ),
    'set_featured_image'    => __( 'Bestem logo', 'delta' ),
    'remove_featured_image' => __( 'Fjern logo', 'delta' ),
    'use_featured_image'    => __( 'Bruk som logo', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i partner', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til partner', 'delta' ),
    'items_list'            => __( 'Samarbeidspartnerliste', 'delta' ),
    'items_list_navigation' => __( '', 'delta' ),
    'filter_items_list'     => __( 'Filter samarbeidspartnerliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'edit_pages',
    'read_post'             => 'edit_pages',
    'delete_post'           => 'edit_pages',
    'edit_posts'            => 'edit_pages',
    'edit_others_posts'     => 'edit_pages',
    'publish_posts'         => 'edit_pages',
    'read_private_posts'    => 'edit_pages',
  );
  $args = array(
    'label'                 => __( 'Samarbeidspartner', 'delta' ),
    'description'           => __( 'Samarbeidspartnere', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-awards',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,   
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'samarbeidspartner', $args );

}
add_action( 'init', 'samarbeidspartnere_cpt', 0 );

// Register Custom Post Type
function avis_posttype() {

  $labels = array(
    'name'                  => _x( 'Aviser', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Avis', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Δt Avis', 'delta' ),
    'name_admin_bar'        => __( 'Δt Avis', 'delta' ),
    'archives'              => __( 'Avisarkiv', 'delta' ),
    'attributes'            => __( 'Avisatributter', 'delta' ),
    'parent_item_colon'     => __( 'Foreldreavis', 'delta' ),
    'all_items'             => __( 'Alle aviser', 'delta' ),
    'add_new_item'          => __( 'Legg til ny avis', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny avis', 'delta' ),
    'edit_item'             => __( 'Rediger avis', 'delta' ),
    'update_item'           => __( 'Oppdater avis', 'delta' ),
    'view_item'             => __( 'Vis avis', 'delta' ),
    'view_items'            => __( 'Vis aviser', 'delta' ),
    'search_items'          => __( 'Søk blant avisene', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen aviser funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Forsidebilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem forsidebilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern forsidebilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som forsidebilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i avis', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til denne avisen', 'delta' ),
    'items_list'            => __( 'Avisliste', 'delta' ),
    'items_list_navigation' => __( 'Avislistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer avisliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'medkom',
    'read_post'             => 'medkom',
    'delete_post'           => 'medkom',
    'edit_posts'            => 'medkom',
    'edit_others_posts'     => 'medkom',
    'publish_posts'         => 'medkom',
    'read_private_posts'    => 'medkom',
  );
  $args = array(
    'label'                 => __( 'Avis', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-id-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'avis', $args );

}
add_action( 'init', 'avis_posttype', 0 );

// Register Custom Post Type
function podcast_post_type() {

  $labels = array(
    'name'                  => _x( 'Podcaster', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Δp Podcast', 'delta' ),
    'name_admin_bar'        => __( 'Δp Podcast', 'delta' ),
    'archives'              => __( 'Podcastarkiv', 'delta' ),
    'attributes'            => __( 'Podcastatributter', 'delta' ),
    'parent_item_colon'     => __( 'Podcastforelder', 'delta' ),
    'all_items'             => __( 'Alle Podcaster', 'delta' ),
    'add_new_item'          => __( 'Legg til ny podcast', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny podcast', 'delta' ),
    'edit_item'             => __( 'Rediger podcast', 'delta' ),
    'update_item'           => __( 'Oppdater podcast', 'delta' ),
    'view_item'             => __( 'Vis podcast', 'delta' ),
    'view_items'            => __( 'Vis podcaster', 'delta' ),
    'search_items'          => __( 'Søk blant podcaster', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Fremhevet bilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem fremhevet bilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern fremhevet bilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som fremhevet bilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i podcast', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til denne podcasten', 'delta' ),
    'items_list'            => __( 'Podcastliste', 'delta' ),
    'items_list_navigation' => __( 'Podcastlistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer podcastliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'medkom',
    'read_post'             => 'medkom',
    'delete_post'           => 'medkom',
    'edit_posts'            => 'medkom',
    'edit_others_posts'     => 'medkom',
    'publish_posts'         => 'medkom',
    'read_private_posts'    => 'medkom',
  );
  $args = array(
    'label'                 => __( 'Podcast', 'delta' ),
    'description'           => __( 'Δp Podcast', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-megaphone',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'podcast', $args );

}
add_action( 'init', 'podcast_post_type', 0 );

// Register Custom Post Type
function radioteater_post_type() {

  $labels = array(
    'name'                  => _x( 'Radioteater', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Radioteater', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Δr Radioteater', 'delta' ),
    'name_admin_bar'        => __( 'Δp Radioteater', 'delta' ),
    'archives'              => __( 'Radioteaterarkiv', 'delta' ),
    'attributes'            => __( 'Radioteaterattributter', 'delta' ),
    'parent_item_colon'     => __( 'Radioteaterforelder', 'delta' ),
    'all_items'             => __( 'Alle radioteater', 'delta' ),
    'add_new_item'          => __( 'Legg til nytt radioteater', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny radioteater', 'delta' ),
    'edit_item'             => __( 'Rediger radioteater', 'delta' ),
    'update_item'           => __( 'Oppdater radioteater', 'delta' ),
    'view_item'             => __( 'Vis radioteater', 'delta' ),
    'view_items'            => __( 'Vis radioteater', 'delta' ),
    'search_items'          => __( 'Søk blant radioteater', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Fremhevet bilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem fremhevet bilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern fremhevet bilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som fremhevet bilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i radioteater', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til dette radioteateret', 'delta' ),
    'items_list'            => __( 'Radioteaterliste', 'delta' ),
    'items_list_navigation' => __( 'Radioteaterlistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer radioteaterliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'medkom',
    'read_post'             => 'medkom',
    'delete_post'           => 'medkom',
    'edit_posts'            => 'medkom',
    'edit_others_posts'     => 'medkom',
    'publish_posts'         => 'medkom',
    'read_private_posts'    => 'medkom',
  );
  $args = array(
    'label'                 => __( 'Radioteater', 'delta' ),
    'description'           => __( 'Δr radioteater', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-format-chat',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'radioteater', $args );

}
add_action( 'init', 'radioteater_post_type', 0 );

// Register Custom Post Type
function video_post_type() {

  $labels = array(
    'name'                  => _x( 'Videoer', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Δv Video', 'delta' ),
    'name_admin_bar'        => __( 'Δv Video', 'delta' ),
    'archives'              => __( 'Videoarkiv', 'delta' ),
    'attributes'            => __( 'Videoattributter', 'delta' ),
    'parent_item_colon'     => __( 'Videoforelder', 'delta' ),
    'all_items'             => __( 'Alle videoer', 'delta' ),
    'add_new_item'          => __( 'Legg til ny video', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Ny video', 'delta' ),
    'edit_item'             => __( 'Rediger video', 'delta' ),
    'update_item'           => __( 'Oppdater video', 'delta' ),
    'view_item'             => __( 'Vis video', 'delta' ),
    'view_items'            => __( 'Vis videoer', 'delta' ),
    'search_items'          => __( 'Søk blant videoer', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Fremhevet bilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem fremhevet bilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern fremhevet bilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som fremhevet bilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i video', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til denne videoen', 'delta' ),
    'items_list'            => __( 'Videoliste', 'delta' ),
    'items_list_navigation' => __( 'Videolistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer videoliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'medkom',
    'read_post'             => 'medkom',
    'delete_post'           => 'medkom',
    'edit_posts'            => 'medkom',
    'edit_others_posts'     => 'medkom',
    'publish_posts'         => 'medkom',
    'read_private_posts'    => 'medkom',
  );
  $args = array(
    'label'                 => __( 'Video', 'delta' ),
    'description'           => __( 'Δv video', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-format-video',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'video', $args );

}
add_action( 'init', 'video_post_type', 0 );

// Register Custom Post Type
function arrangementer_cpt() {

  $labels = array(
    'name'                  => _x( 'Arrangementer', 'Post Type General Name', 'delta' ),
    'singular_name'         => _x( 'Arrangement', 'Post Type Singular Name', 'delta' ),
    'menu_name'             => __( 'Arrangement', 'delta' ),
    'name_admin_bar'        => __( 'Arrangementer', 'delta' ),
    'archives'              => __( 'Arrangementarkiv', 'delta' ),
    'attributes'            => __( 'Arrangementattributter', 'delta' ),
    'parent_item_colon'     => __( 'Foreldrearrangement', 'delta' ),
    'all_items'             => __( 'Alle arrengement', 'delta' ),
    'add_new_item'          => __( 'Legg til nytt arrangement', 'delta' ),
    'add_new'               => __( 'Legg til ny', 'delta' ),
    'new_item'              => __( 'Nytt arrangement', 'delta' ),
    'edit_item'             => __( 'Rediger arrangement', 'delta' ),
    'update_item'           => __( 'Oppdater arrangement', 'delta' ),
    'view_item'             => __( 'Vis arrangement', 'delta' ),
    'view_items'            => __( 'Vis arrangementer', 'delta' ),
    'search_items'          => __( 'Søk blant arrangementer', 'delta' ),
    'not_found'             => __( 'Ingen funnet', 'delta' ),
    'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'delta' ),
    'featured_image'        => __( 'Fremhevet bilde', 'delta' ),
    'set_featured_image'    => __( 'Bestem fremhevet bilde', 'delta' ),
    'remove_featured_image' => __( 'Fjern fremhevet bilde', 'delta' ),
    'use_featured_image'    => __( 'Bruk som fremhevet bilde', 'delta' ),
    'insert_into_item'      => __( 'Sett inn i arrangement', 'delta' ),
    'uploaded_to_this_item' => __( 'Lastet opp til dette arrangementet', 'delta' ),
    'items_list'            => __( 'Arrangementliste', 'delta' ),
    'items_list_navigation' => __( 'Arrangementlistenavigasjon', 'delta' ),
    'filter_items_list'     => __( 'Filtrer arrangementliste', 'delta' ),
  );
  $capabilities = array(
    'edit_post'             => 'arrkom',
    'read_post'             => 'arrkom',
    'delete_post'           => 'arrkom',
    'edit_posts'            => 'arrkom',
    'edit_others_posts'     => 'arrkom',
    'publish_posts'         => 'arrkom',
    'read_private_posts'    => 'arrkom',
  );
  $args = array(
    'label'                 => __( 'Arrangement', 'delta' ),
    'description'           => __( 'Arrangementer', 'delta' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-calendar',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capabilities'          => $capabilities,
  );
  register_post_type( 'arrangement', $args );

}
add_action( 'init', 'arrangementer_cpt', 0 );