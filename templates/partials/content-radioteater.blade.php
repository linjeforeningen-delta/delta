<div class="trippel__enkel trippel__enkel--video">
  <a href="{{ get_permalink() }}">
    <div class="trippel__enkel__video">
      {!! wp_oembed_get(get_field('youtube_lenke')) !!}
    </div>
    <h3>{{ get_the_title() }}</h3>
  </a>
</div>