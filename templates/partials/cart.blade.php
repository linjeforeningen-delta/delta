<div class="topptekst__handlekurv">
<h3>Handlevogn</h3>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
  <?php do_action( 'woocommerce_before_cart_table' ); ?>

  <table class="" cellspacing="0">
    <thead>
      <tr>
        <th><?php _e( 'Product', 'woocommerce' ); ?></th>
        <th><?php _e( 'Price', 'woocommerce' ); ?></th>
        <th><?php _e( 'Quantity', 'woocommerce' ); ?></th>
        <th><?php _e( 'Total', 'woocommerce' ); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php do_action( 'woocommerce_before_cart_contents' ); ?>

      <?php
      foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
          $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
          ?>
          <tr class="produktrad <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

            <td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
              <?php
                echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                // Meta data
                //echo WC()->cart->get_item_data( $cart_item );

                // Backorder notification
                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                  echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
                }
              ?>
            </td>

            <td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
              <?php
                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
              ?>
            </td>

            <td class="antall" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
              {{$cart_item['quantity']}}
            </td>

            <td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
              <?php
                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
              ?>
            </td>
          </tr>
          <?php
        }
      }
      ?>

      <?php do_action( 'woocommerce_cart_contents' ); ?>

      <tr>
        <td colspan="5" class="actions">

          <a href="{{ get_permalink( woocommerce_get_page_id( 'cart' ) ) }}">Vis Handlekurv</a>

          <?php do_action( 'woocommerce_cart_actions' ); ?>

          <?php wp_nonce_field( 'woocommerce-cart' ); ?>
        </td>
      </tr>

      <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </tbody>
  </table>
  <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
</div>