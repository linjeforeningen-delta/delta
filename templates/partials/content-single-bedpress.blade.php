<?php
  $bedpress = new Bedpress(get_the_id());
?>
<div class="seksjon {{ $bedpress->status? 'seksjon--infofelt' : ''}}">
<div class="seksjon__holder">
<article class="bedpress">
@if($bedpress->status)
  <div class="infofelt">
    {{ $bedpress->status }}
  </div>
@endif
  @if( ! get_field('skjul_sideboks'))
  <aside class="sideboks">
    {!! the_post_thumbnail( null, 'full' ) !!}
    <div class="infoboks">
      <div class="infoboks__sted">
        <span>{{ $bedpress->sted }}</span>
      </div>
      <div class="infoboks__dato">
        <time datetime="{{ $bedpress->tidspunkt }}">{{ $bedpress->hentDato() }}</time>
      </div>
      <div class="infoboks__tidspunkt">
        <time datetime="{{ $bedpress->tidspunkt }}">{{ $bedpress->hentTidspunkt() }}</time>
      </div>
      <div class="infoboks__plasser">
        <span>{{ $bedpress->tilgjengelige_plasser }} Plasser</span>
        <progress max="{{ $bedpress->tilgjengelige_plasser }}" value="{{ $bedpress->tellPameldte() }}"></progress>
      </div>
      <div class="infoboks__trinn">
        <span> {{ $bedpress->printTrinn() }}</span>
        <span>
        @if($bedpress->forStudieretning('andre'))
          Åpent for alle!
        @else
        @if($bedpress->forStudieretning('matematikk'))
          Matematikk 
        @else
          <span class="infoboks__trinn--skjul">Matematikk</span>
        @endif
        @if($bedpress->flereStudieretninger())
          &#47;&#47; 
        @else
          <span class="infoboks__trinn--skjul">&#47;&#47; </span>
        @endif
        @if($bedpress->forStudieretning('fysikk'))
          Fysikk
        @else
          <span class="infoboks__trinn--skjul">Fysikk</span>
        @endif
        @endif
        </span>
      </div>
      <div class="infoboks__knapp">
        @if( ! is_user_logged_in())
          <a href="{{ get_permalink( woocommerce_get_page_id( 'myaccount' ) ) }}" class="showlogin">Logg inn</a>
        @elseif($bedpress->erMed())
          <form method="post">
          <input type="submit" value="Meld av">
          <input type="hidden" name="handling" value="meld_av">
            <input type="hidden" name="bruker" value="{{get_current_user_id() }}">
            <input type="hidden" name="bedriftspresentasjon" value="{{get_the_ID() }}">
          </form>
        @elseif($bedpress->kanBliMed())
          <form method="post">
            <input type="submit" value="Meld meg på">
            <input type="hidden" name="handling" value="meld_paa">
            <input type="hidden" name="bruker" value="{{get_current_user_id() }}">
            <input type="hidden" name="bedriftspresentasjon" value="{{get_the_ID() }}">
          </form>
        @else
          <button disabled="disabled">Kan ikke bli med</button>
        @endif
      </div>
    </div>
  </aside>
  @endif
  <header>
    <hgroup>
      <h1>{{ get_the_title() }}</h1>
      @if(get_field('tittel'))
        <h2>{{ get_field('tittel') }}</h2>
      @elseif(get_field('er_bedpress'))
        <h2>Bedriftspresentasjon</h2>
      @else
        <h2>Presentasjon</h2>
      @endif
    </hgroup>
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
@if(get_field('sted_lenke'))
<div class="seksjon seksjon--gronn bedpress__kart">
  <div class="seksjon__holder">
    <h1>Sted for bedpress</h1>
    {!! get_field('sted_lenke') !!}
  </div>
</div>
@endif