<div class="seksjon">
<div class="seksjon__holder">
<article class="avis">

  <aside class="sideboks">
    <div class="infoboks">

      {!! the_post_thumbnail( null, 'full' ) !!}
      <div class="infoboks__knapp">
        <a href="{{ get_field('nedlastbar_fil')['url'] }}" target="_blank">Last ned</a>
      </div>
    </div>
  </aside>
  <header>
      <h1>{{ get_the_title() }}</h1>
  </header>
  <div>
    {!! the_content() !!}
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
</div>
</div>