<?php
function initialize_user_roles(){
  /* Uncomment if you modify the code below (otherwise it will not run)
    global $wp_roles;
    remove_role( 'hr' );
  */

  if(current_user_can('administrator') ){
    // Only do if is admin, makes admin panel a little faster for other users
    $roller = ['bedkom' => 'BedKom', 'komkom' => 'KomKom', 'arrkom' => 'ArrKom', 'medkom' => 'MedKom', 'kvinnekom' => 'KvinneKom', 'fagansvarlig' => 'Fagansvarlig'];
    if(! $GLOBALS['wp_roles']->is_role( 'bedkom' )){
      // bedkom role does not exist - ensures that the following is ony called once
        // Adding HR role
        foreach($roller as $cap => $rolle){
          add_role(
              $cap,
              __( $rolle ),
              array(
                  'read'         => true,
                  'edit_posts'   => false,
                  'delete_posts' => false, 
                  'publish_posts' => false,
                  'upload_files' => true,
                  $cap => true,
              )
          );
        }
       // Holds the roles that will get the capability to edit offices and careers
       $roles = ['administrator'];
       
       // Loop through each role and assign capabilities
      foreach($roles as $the_role) { 
        $role = get_role($the_role);
        // Office CPT
        $role->add_cap( 'read' );
        foreach($roller as $cap => $rolle){
          $role->add_cap($cap); // Legg til alle rollene til de andre komiteene
        }
      }
    }
  }
}
add_action( 'admin_init', 'initialize_user_roles' );