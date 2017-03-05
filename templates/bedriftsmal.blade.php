{{--
  Template Name: Bedriftsmal
--}}

@extends('layouts.base')

@section('content')
  @while(have_posts()) <?php the_post(); ?>
    <div class="toppbilde">
      {!! get_the_post_thumbnail( null, 'full' ) !!}
    </div>
        <div class="seksjon">
          <div class="seksjon__holder">
            {!! the_content() !!}
          </div>
        </div>
        <div class="seksjon seksjon--gronn">
          <div class="seksjon__holder">
            
            {!! get_field('underfelt') !!}
          </div>
        </div>
  @endwhile
@endsection
