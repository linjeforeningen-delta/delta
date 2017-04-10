<?php
add_action( 'woocommerce_before_single_product', 'delta_before_single_product' );
add_action( 'woocommerce_after_single_product', 'delta_after_single_product' );

function delta_before_single_product() {
}
function delta_after_single_product() {
  echo App\Template('partials.andre-kompendier');
}

add_action( 'woocommerce_single_product_summary', 'delta_single_product_summary', -1);
function delta_single_product_summary($a1){
  if(get_the_terms( $post->ID, 'product_cat' )[0]->slug == "kompendier"){
    $actions = ['woocommerce_template_single_title' => 5, 
                'woocommerce_template_single_rating' => 10,
                'woocommerce_template_single_price' => 10,
                'woocommerce_template_single_excerpt' => 20,
                'woocommerce_template_single_meta' => 40,
                'woocommerce_template_single_sharing' => 50,
                'woocommerce_template_single_add_to_cart' => 30
    ];
    foreach($actions as $action => $priority){
      remove_action('woocommerce_single_product_summary',$action, $priority);
    }
     echo App\Template('partials.product-summary');
  }
}

add_action('woocommerce_before_single_product_summary', 'delta_before_single_product_summary', 0);
add_action('woocommerce_after_single_product_summary', 'delta_after_single_product_summary', 0);
function delta_before_single_product_summary(){
  remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
}
function delta_after_single_product_summary(){
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  echo App\Template('partials.product-content');
}

add_action( 'woocommerce_before_shop_loop_item', 'delta_before_shop_loop_item', 1 );
function delta_before_shop_loop_item(){
  remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
}

add_action( 'woocommerce_after_shop_loop_item_title', 'delta_after_shop_loop_item_title', 1 );
function delta_after_shop_loop_item_title(){
  the_content();
}

/**
 * Add new register fields for WooCommerce registration.
 */
function wooc_extra_register_fields() {
    ?>

    <p class="form-row form-row-first">
    <label for="fornavn"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="fornavn" id="fornavn" value="<?php if ( ! empty( $_POST['fornavn'] ) ) esc_attr_e( $_POST['fornavn'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
    <label for="etternavn"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="etternavn" id="etternavn" value="<?php if ( ! empty( $_POST['etternavn'] ) ) esc_attr_e( $_POST['etternavn'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
    <label for="reg_studieretning"><?php _e( 'Studieretning', 'woocommerce' ); ?> <span class="required">*</span></label>
    <select name="studieretning" id="reg_studieretning">
      <option value="matematikk" <?php if( ! empty( $_POST['studieretning'] ) && esc_attr( $_POST['studieretning'] )  == "matematikk" ) echo ' selected="selected"' ?>>Matematikk</option>
      <option value="fysikk" <?php if( ! empty( $_POST['studieretning'] ) && esc_attr( $_POST['studieretning'] )  == "fysikk" ) echo ' selected="selected"' ?>>Fysikk</option>
      <option value="annet" <?php if( ! empty( $_POST['studieretning'] ) && esc_attr( $_POST['studieretning'] )  == "annet" ) echo ' selected="selected"' ?>>Annet</option>
    </select>
    </p>

    <p class="form-row form-row-last">
    <label for="reg_kull"><?php _e( 'Kull', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="kull" id="reg_kull" value="<?php if ( ! empty( $_POST['kull'] ) ) esc_attr_e( $_POST['kull'] ); ?>" placeholder="2016" />
    </p>

    <div class="clear"></div>
    <?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );
function wooc_validate_extra_register_fields( $errors, $username, $email ) {
    if ( isset( $_POST['kull'] ) && empty( $_POST['kull'] ) ) {
        $errors->add( 'kull_error', __( '<strong>Error</strong>: Kull er påkrevd.', 'woocommerce' ) );
    }

    if ( isset( $_POST['studieretning'] ) && (empty( $_POST['studieretning'] ) || !in_array($_POST['studieretning'], ['matematikk', 'fysikk', 'annet'])) ) {
        $errors->add( 'studieretning_error', __( '<strong>Error</strong>: Studieretning er påkrevd.', 'woocommerce' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'wooc_validate_extra_register_fields', 10, 3 );


function wooc_save_extra_register_fields( $customer_id ) {
    if( isset( $_POST['fornavn'] ) ){
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['kull'] ) );
    }
    if( isset( $_POST['etternavn'] ) ){
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['kull'] ) );
    }
    if ( isset( $_POST['kull'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'kull', sanitize_text_field( $_POST['kull'] ) );
    }
    if ( isset( $_POST['studieretning'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'studieretning', sanitize_text_field( $_POST['studieretning'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

function fb_add_custom_user_profile_fields( $user ) {
?>
  <h3><?php _e('Delta profilinformasjon', 'delta'); ?></h3>
  
  <table class="form-table">
    <tr>
      <th>
        <label for="studieretning"><?php _e('Studieretning', 'delta'); ?>
      </label></th>
      <td>
        <select name="studieretning" id="studieretning">
          <option value="matematikk" <?php if( esc_attr( get_the_author_meta( 'studieretning', $user->ID ) )  == "matematikk" ) echo ' selected="selected"' ?>>Matematikk</option>
          <option value="fysikk" <?php if( esc_attr( get_the_author_meta( 'studieretning', $user->ID ) )  == "fysikk" ) echo ' selected="selected"' ?>>Fysikk</option>
          <option value="annet" <?php if( esc_attr( get_the_author_meta( 'studieretning', $user->ID ) )  == "annet" ) echo ' selected="selected"' ?>>Annet</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>
        <label for="kull"><?php _e('Kull', 'delta'); ?>
      </label></th>
      <td>
        <input type="text" class="input-text" name="kull" id="kull" value="<?php echo esc_attr( get_the_author_meta( 'kull', $user->ID ) ); ?>" placeholder="2016" />
      </td>
    </tr>
  </table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {
  if ( !current_user_can( 'edit_user', $user_id ) )
    return FALSE;
  
    if ( isset( $_POST['kull'] ) ) {
        // WordPress default first name field.
        update_user_meta( $user_id, 'kull', sanitize_text_field( $_POST['kull'] ) );
    }
    if ( isset( $_POST['studieretning'] ) ) {
        // WordPress default last name field.
        update_user_meta( $user_id, 'studieretning', sanitize_text_field( $_POST['studieretning'] ) );
    }
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );