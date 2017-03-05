@if (get_field('tidspunkt') >= date('c'))
<article>
  <header>
    <div class="bedriftspresentasjoner__logo">
    <a href="{{ get_permalink() }}">@php(the_post_thumbnail( null, 'full' ))</a>
    </div> 
    <a href="{{ get_permalink() }}"><h3>{{ get_the_title() }}</h3></a>
    <time class="bedpress__tidspunkt" datetime="{{ get_field('tidspunkt') }}">{{ date_i18n('d. F Y',strtotime(get_field('tidspunkt'))) }}</time>
  </header>
  <div>
    @php(the_excerpt())
  </div>
  <footer>
    <a href="{{ get_permalink() }}">Les mer</a>
  </footer>
</article>
@else
<article class="bedpress--tom">
  <header>
    <div class="bedriftspresentasjoner__logo">
      <img src="{{ App\asset_path('images/logo.svg')}}" width="256" height="170" alt="{{ get_bloginfo('name', 'display') }}" class="deltalogo">
    </div>
    <h3>Ingen flere bedpresser</h3>
  </header>
  <div>
    <p>Det er desverre ingen flere planlagte bedriftspresentasjoner.<br>
    Sjekk igjen ved et senere tidspunkt</p>
  </div>
</article>
@endif