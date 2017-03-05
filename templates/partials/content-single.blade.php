
  <div class="seksjon">
  <div class="seksjon__holder">
<article>
  <header>
    {!! get_the_post_thumbnail( null, 'full' ) !!}
    <h1 class="entry-title">{{ get_the_title() }}</h1>
  </header>
  <div class="entry-content">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>

</div>
</div>