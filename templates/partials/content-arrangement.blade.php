<article class="arrangement--enkelt">
  <header>
    <div class="arrangement__bilde">
    <a href="{{ get_permalink() }}">{!! wp_get_attachment_image( get_field('minibilde'), 'medium' ) !!}</a>
    </div> 
    <a href="{{ get_permalink() }}"><h3>{{ get_the_title() }}</h3></a>
    <time class="arrangement__tidspunkt" datetime="{{ get_field('tidspunkt') }}">{{ date('d. F Y',strtotime(get_field('tidspunkt'))) }}</time>
  </header>
  <footer>
    <a href="{{ get_permalink() }}">Les mer</a>
  </footer>
</article>