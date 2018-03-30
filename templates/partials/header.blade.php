<header class="topptekst">
  <div class="topptekst__holder topptekst__logo__holder">
    <a class="topptekst__logo" href="{{ home_url('/') }}">
      <img src="{{ App\asset_path('images/logo.svg')}}" width="256" height="170" alt="{{ get_bloginfo('name', 'display') }}" class="topptekst__logo__svg">
      <hgroup class="topptekst__logo__tekst">
        <h1>Delta</h1>
        <h2>Linjeforeningen for matematikk og fysikk</h2>
      </hgroup>

    </a>
  </div>
  <nav class="topptekst__navigasjon">
    <div class="topptekst__holder">
      <div class="relativ">
        <a class="topptekst__navigasjon__logo" href="{{ home_url('/') }}">
          <svg width="130px" height="86px" viewBox="0 0 130 86" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-31.000000, -23.000000)" fill="#005500">
                      <path d="M63.0345005,54.2297404 C63.0345005,54.2297404 79.5574028,54.1066336 79.8199977,53.8125421 C95.9713316,35.7239561 95.7272206,26.1240146 139.425775,92.3043124 C35.8911188,92.4301685 139.425775,92.3043124 35.1702517,92.3043124 C29.791105,93.1364938 29.4316314,107.90879 35.1702517,108.752486 C29.2300573,108.752486 158.578666,108.940284 158.578666,108.940284 C162.817612,103.201588 158.578666,93.7187958 158.578666,93.7187958 C99.0712274,8.79410876 99.8377802,6.55038932 63.0345005,54.2297404 Z" id="Path"></path>
                  </g>
              </g>
          </svg>
        </a>
        @if (has_nav_menu('primary_navigation'))
          <ul>
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav','items_wrap' => '%3$s', 'container' => '']) !!}
            <li class="hoyrelenke">
              <a href="{{ get_permalink( woocommerce_get_page_id( 'myaccount' ) ) }}" class="bruker"><span>Brukerinfo</span></a>
            </li>
            <li class="hoyrelenke">
              <a href="{{ get_permalink( woocommerce_get_page_id( 'cart' ) ) }}" class="kurv"><span>Handlekurv</span>
                <span class="teller"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
              </a>
            </li>
          </ul>
        @endif
        @include('partials.login')
        @include('partials.cart')
      </div>
    </div>
    <button class="topptekst__navigasjon__lukk">
      <span class="screen-reader-text">Lukk meny</span>
    </button>
  </nav>
</header>

@php(wc_print_notices() )

<button class="mobilmeny">
  <svg width="130px" height="86px" viewBox="0 0 130 86" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-31.000000, -23.000000)" fill="#ffffff">
              <path d="M63.0345005,54.2297404 C63.0345005,54.2297404 79.5574028,54.1066336 79.8199977,53.8125421 C95.9713316,35.7239561 95.7272206,26.1240146 139.425775,92.3043124 C35.8911188,92.4301685 139.425775,92.3043124 35.1702517,92.3043124 C29.791105,93.1364938 29.4316314,107.90879 35.1702517,108.752486 C29.2300573,108.752486 158.578666,108.940284 158.578666,108.940284 C162.817612,103.201588 158.578666,93.7187958 158.578666,93.7187958 C99.0712274,8.79410876 99.8377802,6.55038932 63.0345005,54.2297404 Z" id="Path"></path>
          </g>
      </g>
  </svg>
<span class="screen-reader-text">Åpne Mobilmeny</span>
</button>