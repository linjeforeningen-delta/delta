  <?php
    $args = ['post_type' => 'bedpress', 'posts_per_page' => 3];
    $bedpresser = new WP_Query($args);
  ?>
  <div class="bedriftspresentasjoner">
  @if($bedpresser->have_posts())
  @while ($bedpresser->have_posts()) <?php $bedpresser->the_post(); ?>
    @include ('partials.content-bedpress')
  @endwhile
  @else
  <h3>Vi har foreløpig ingen planlagte bedriftspresentasjoner</h3>
  <p>Følg med på denne siden og vår facebook side for oppdateringer</p>
  @endif
  </div>