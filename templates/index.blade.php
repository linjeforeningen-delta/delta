@extends('layouts.base')

@section('content')

  <div class="seksjon">
  <div class="seksjon__holder">
  @include('partials.page-header')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @if(is_home())
    <div class="arkiv arkiv--wrap arkiv--invers">
  @endif
  @while (have_posts()) @php(the_post())

    @include ('partials.content-'.get_post_type())
  @endwhile
  @if(is_home())
    </div>
  @endif
  

  {!! get_the_posts_navigation() !!}
  
    </div>
    </div>

@endsection
