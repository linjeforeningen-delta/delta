<?php
global $product;
$type = $product->get_type();
?>
<article class="produkter__produkt">
  <header>
    <div class="produkter__produkt__bilde">
    @if (has_post_thumbnail())
      {!! the_post_thumbnail( null, 'enkeltbilde' ) !!}
    @else
    <img src="{{ App\asset_path('images/logo.svg')}}" width="256" height="170" alt="{{ get_bloginfo('name', 'display') }}" class="deltalogo">
    @endif
    </div>
    <hgroup>
      <h3>{{ get_the_title() }}</h3>
      <h4>{!! $product->get_price_html() !!}</h4>
    </hgroup>
  </header>
  <div class="produkter__produkt__tekst">
    {!! the_content() !!}
  </div>
  <footer>
    @if($type == 'variable')
      <?php $product_variable = new WC_Product_Variable($product->id);
            $product_variations = $product_variable->get_available_variations();
            foreach ($product_variations as $variation)  {
              $stock[$variation['slug']] = $variation['availability_html'];
            } 
            // $stock inneholder alle lagerstatusene
            ?>
      <?php wp_enqueue_script( 'wc-add-to-cart-variation' ); ?>
      <?php $get_variations = sizeof( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product ); ?>
      <?php wc_get_template( 'single-product/add-to-cart/variable.php', array(
      'available_variations' => $get_variations ? $product->get_available_variations() : false,
      'attributes'           => $product->get_variation_attributes(),
      'selected_attributes'  => $product->get_default_attributes(),
    ) ); ?>
    @else

      <?php wc_get_template( 'single-product/add-to-cart/simple.php' ); ?>
    @endif

  </footer>
</article>