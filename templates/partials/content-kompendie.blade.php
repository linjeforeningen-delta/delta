<div class="arkiv__kompendie">
  <a href="{{ get_permalink() }}">
    {!! get_the_post_thumbnail( null, 'full' ) !!}
    @if (is_product_category())
      <span>{{ get_the_title() }}</span>
    @endif
  </a>
</div>