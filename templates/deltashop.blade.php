@extends('layouts.base')

@section('content')
    <div class="seksjon">
      <div class="seksjon__holder">
        <div class="produkter">
          @while(have_posts()) <?php the_post(); ?>
            @include('partials.enkeltprodukt')
          @endwhile
        </div>
      </div>
    </div>
  {!! get_the_posts_navigation() !!}
@endsection
