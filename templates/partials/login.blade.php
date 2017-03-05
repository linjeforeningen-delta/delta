<div class="topptekst__login">
@if(is_user_logged_in())
<?php $usr = wp_get_current_user(); ?>
<h3>Hei {{ $usr->display_name }}</h3>

<nav class="brukernavigasjon">
  <ul>
    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
      <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
        <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>

@else
<form method="post">
  <h3>Logg inn</h3>
  <div class="topptekst__login__felt">
    <label for="username"><?php _e( 'Brukernavn', 'delta' ); ?></label>
    <input type="text" name="username" id="username" value="{{$_POST['username']}}"  placeholder="<?php _e( 'Brukernavn', 'delta' ); ?>"/>
  </div>
  <div class="topptekst__login__felt">
    <label for="password"><?php _e( 'Passord', 'delta' ); ?></label>
    <input class="input-text" type="password" name="password" id="password" placeholder="<?php _e( 'Passord', 'delta' ); ?>" />
  </div>
  <div class="topptekst__login__knapp">
    <?php wp_nonce_field( 'woocommerce-login' ); ?>
    <a href="{{ get_permalink( woocommerce_get_page_id( 'myaccount' ) ) }}">Registrer</a>
    <input type="submit" name="login" value="<?php _e( 'Logg inn', 'delta' ); ?>" />
    <input type="hidden" name="redirect" value="http://{{ $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] }}" />
  </div>
</form>
@endif
</div>