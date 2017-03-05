  <?php
    $args = ['post_type' => 'samarbeidspartner', 'posts_per_page' => 5];
    $samarbeidspartnere = new WP_Query($args);
  ?>
  <div class="samarbeidspartnere">
  @while ($samarbeidspartnere->have_posts()) @php($samarbeidspartnere->the_post())
    {!! get_the_post_thumbnail( null, 'full' ) !!}
  @endwhile

   <img src="{{ App\asset_path('images/realfagsdagene.jpg')}}" width="1828" height="320" alt="Realfagsdagene" class="realfagsdagene">
  </div>
  </div>