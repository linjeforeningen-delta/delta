
  <div class="seksjon">
  <div class="seksjon__holder">
<article>
  <aside class="sideboks">
    @php(the_post_thumbnail( null, 'full' ))
    <div class="infoboks">
      <div class="infoboks__fagkode">
        <span>{{'TMA4104'}}</span>
      </div>
      <div class="infoboks__lagerstatus">
        <span>{{'>10 på lager'}}</span>
      </div>
      <div class="infoboks__pris">
        <span>{{'150,-'}}</span>
      </div>
    </div>
  </aside>
  <header>
    <h1 class="entry-title">{{ get_the_title() }}</h1>
  </header>
  <div>
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>

</div>
</div>
<div class="seksjon seksjon--gronn">
<div class="seksjon__holder">

  <?php
    $args = ['post_type' => 'kompendie', 
    'posts_per_page' => 5, 
    'post__not_in' => array(get_the_ID())];
    $kompendier = new WP_Query($args);
  ?>
  <h1>Flere kompendier</h1>
  <div class="kompendier">
  @while ($kompendier->have_posts()) @php($kompendier->the_post())
    @include ('partials.content-kompendie')
  @endwhile
  </div>
  <div class="seksjon__lenke"><a href="{{ get_post_type_archive_link('kompendie') }}">Se alle</a></div>

</div>
</div>