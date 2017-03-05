  <?php
    $args = ['post_type' => 'post', 'posts_per_page' => 3];
    $nyheter = new WP_Query($args);
  ?>
  <div class="arkiv">
  @while ($nyheter->have_posts()) @php($nyheter->the_post())
    @include ('partials.content-nyhet')
  @endwhile
  </div>
  <div class="seksjon__lenke"><a href="{{ get_post_type_archive_link('post') }}">Se alle</a></div>