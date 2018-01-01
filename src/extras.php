<?php


class ACFUpdater{
  private static function arrayToId($arr){
      if(!is_array($arr))
        $arr = [];
      $lengde = count($arr);
      for($i = 0; $i < $lengde; $i++){
        $arr[$i] = $arr[$i]["ID"];
      }
      return $arr;
  }
  public static function leggTil($field_name, $verdi, $post_id){
      $verdier = self::arrayToID(get_field($field_name, $post_id));
      $key = array_search($verdi, $verdier);
      if ($key != NULL || $key !== FALSE)
        return; // Verdi allerede lagt til
      array_push($verdier, $verdi);
      update_field($field_name, $verdier, $post_id);
  }
  public static function fjern($field_name, $verdi, $post_id){

    $verdier = self::arrayToID(get_field($field_name, $post_id));
    $key = array_search($verdi, $verdier);
    if (! ($key != NULL || $key !== FALSE))
      return; // Verdi finnes ikke
    unset($verdier[$key]);
    update_field($field_name, $verdier, $post_id);
  }
}

function wc_delta_remove_password_strength() {
  if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
    wp_dequeue_script( 'wc-password-strength-meter' );
  }
}
add_action( 'wp_print_scripts', 'wc_delta_remove_password_strength', 100 );


function rewrite_trykkfeil() {
  if($_SERVER['REQUEST_URI'] == '/faglig/trykkfeil-kompendium/'){
    wp_redirect( '/trykkfeil/', 301 );
    exit;
  }
}
add_action('init', 'rewrite_trykkfeil');