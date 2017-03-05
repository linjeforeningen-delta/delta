
      <?php global $product; ?>

    {!! the_post_thumbnail( null, 'full' ) !!}
    <div class="infoboks">
      <div class="infoboks__fagkode">
        <span>{{ $product->get_sku() }}</span>
      </div>
      <div class="infoboks__lagerstatus">
        <span>{!! wc_get_stock_html( $product ) !!}</span>
      </div>
      <div class="infoboks__pris">
        <span>{{ $product->get_price() }},-</span>
      </div>
      <div class="infoboks__knapp">
        @include ('wc-templates.add-cart-simple')
      </div>
    </div>