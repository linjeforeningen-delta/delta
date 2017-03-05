<article>
  <header>
    <div class="bedriftspresentasjoner__logo">
    <a href="{{ get_permalink() }}">
      @if (has_post_thumbnail())
        @php(the_post_thumbnail( null, 'full' ))
      @else
      <img src="{{ App\asset_path('images/logo.svg')}}" width="256" height="170" alt="{{ get_bloginfo('name', 'display') }}" class="deltalogo">
      @endif
    </a>
    </div> 
    <a href="{{ get_permalink() }}"><h3>{{ get_the_title() }}</h3></a>
  </header>
  <div class="innhold">
    @php(the_excerpt())
  </div>
  <footer>
    <a href="{{ get_permalink() }}">Les mer</a>
  </footer>
</article>