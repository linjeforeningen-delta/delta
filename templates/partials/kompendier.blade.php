  <?php
    $args = ['post_type' => 'product', 
    'posts_per_page' => 5,
    'tax_query'     => array(
        array(
            'taxonomy'  => 'product_cat',
            'field'     => 'slug', 
            'terms'     => 'kompendier'
        )
    )];
    if(is_product()){
      $args['post__not_in'] = array(get_the_ID());
    }else if(is_product_category()){
      $args['posts_per_page'] = -1;
    }
    $kompendier = new WP_Query($args);
  ?>
  <div class="kompendier">
  @while ($kompendier->have_posts()) <?php $kompendier->the_post(); ?>
    @include ('partials.content-kompendie')
  @endwhile
  </div>
  @if (!is_product_category())
    <div class="seksjon__lenke">
      <a href="{{ get_term_link( 'kompendier' ,'product_cat') }}">Se alle</a>
    </div>
  @endif