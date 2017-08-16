<?php $arrangement = new Arrangement(get_the_ID()); ?>
<div class="seksjon seksjon--bilde">
  {!! get_the_post_thumbnail( null, 'full' ) !!}
</div>
<div class="seksjon {{ $arrangement->status? 'seksjon--infofelt' : ''}}">
<div class="seksjon__holder">
<article class="arrangement">

@if($arrangement->status)
  <div class="infofelt">
    {{ $arrangement->status }}
  </div>
@endif
  <aside class="sideboks">
    <div class="infoboks">
      <div class="infoboks__sted">
        <span>{{ get_field('sted') }}</span>
      </div>
      <div class="infoboks__dato">
        <time datetime="{{ $arrangement->tidspunkt }}">{{ $arrangement->hentDato() }}</time>
      </div>
      <div class="infoboks__tidspunkt">
        <time datetime="{{ $arrangement->tidspunkt }}">{{ $arrangement->hentTidspunkt() }}</time>
      </div>
      <div class="infoboks__pris">
        @if($arrangement->erGratis())
          <span>Gratis!</span>
        @else
          <span>{{ $arrangement->printPris() }}<br>
          <span class="infoboks__pris__forklaring">
            Deltagere // andre
          </span>
          </span>
          @endif
      </div>
      <div class="infoboks__kleskode">
        <span>{{ $arrangement->kleskode }}</span>
      </div>
      @if($arrangement->visPameldte())
      <div class="infoboks__teller">
        @if($arrangement->tilgjengelige_plasser > 0)
        <span>{{ $arrangement->tellPameldte() }} av {{ $arrangement->tilgjengelige_plasser }} påmeldte</span>
        <progress max="{{ $arrangement->tilgjengelige_plasser }}" value="{{ $arrangement->tellPameldte() }}"></progress>
        @else
        <span>{{ $arrangement->tellPameldte() }} påmeldte</span>
        @endif
      </div>
      @endif
      <div class="infoboks__knapp">
        @if( ! is_user_logged_in())
          <a href="{{ get_permalink( woocommerce_get_page_id( 'myaccount' ) ) }}" class="showlogin">Logg inn</a>
        @elseif($arrangement->erMed())
          @if($arrangement->harBetalt())
          <button disabled="disabled">Betaling registrert</button>
          @else
          <button disabled="disabled">Venter på betaling</button>
          @endif
        @elseif($arrangement->kanBliMed())
          <form method="post">
            <input type="submit" value="Meld meg på">
            <input type="hidden" name="handling" value="meld_paa">
            <input type="hidden" name="bruker" value="{{get_current_user_id() }}">
            <input type="hidden" name="arrkom" value="{{get_the_ID() }}">
          </form>
        @else
          <button disabled="disabled">Kan ikke bli med</button>
        @endif
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
<div class="seksjon seksjon--gronn">
<div class="seksjon__holder">
  <h1>Andre arrangementer</h1>
  <?php 
    $args = ['post_type' => 'arrangement', 'posts_per_page' => 3, 'post__not_in' => [get_the_ID()]];
    $arrangementer = new WP_Query($args);
  ?>
  <div class="arkivside">
    @while($arrangementer->have_posts()) <?php $arrangementer->the_post(); ?>
      @include ('partials.content-arrangement')
    @endwhile
  </div>
  <div class="seksjon__lenke"><a href="{{ get_post_type_archive_link('arrangement') }}">Se flere</a></div>
</div>
</div>