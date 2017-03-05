<?php
if ( $product->is_in_stock() ) : ?>

  <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

  <form method="post" enctype='multipart/form-data'>
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <?php
      if ( ! $product->is_sold_individually() ) {
        woocommerce_quantity_input( array(
          'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
          'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
          'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ),
        ) );
      }
    ?>

    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

    <button type="submit" class="kjop"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
  </form>

  <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>