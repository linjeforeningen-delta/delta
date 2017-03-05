@extends('layouts.base')

@section('content')
    @if(get_field('arrangementsbilde','option'))
    <div class="toppbilde">
      {!! wp_get_attachment_image( get_field('arrangementsbilde', 'option'), 'toppbilde' ) !!}
    </div>
    @endif
  <div class="seksjon">
  <div class="seksjon__holder">
  @include('partials.page-header')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="arkivside">
  @while (have_posts()) @php(the_post())
    @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
  @endwhile
  </div>
  </div>
  </div>
  {!! get_the_posts_navigation() !!}
@endsection
