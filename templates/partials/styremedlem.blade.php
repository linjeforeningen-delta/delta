<article class="styremedlem">
  <aside>
    {!! wp_get_attachment_image( get_sub_field('bilde'), 'styrebilde', false, '' ) !!}
    <a href="mailto:{{ get_sub_field('e-post') }}"><span>{{ get_sub_field('e-post') }}</span></a>
  </aside>
  <div class="innhold">
    <header>
      <hgroup>
        <h2>{{ get_sub_field('stilling') }}</h2>
        <h3>{{ get_sub_field('navn') }}</h3>
      </hgroup>
    </header>
    {!! get_sub_field('beskrivelse') !!}
  </div>
</article>