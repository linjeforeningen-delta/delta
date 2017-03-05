@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(has_post_thumbnail())
    <div class="toppbilde">
      {!! get_the_post_thumbnail( null, 'toppbilde' ) !!}
    </div>
    @endif
    
    @if(get_field('gronn'))
    <div class="seksjon seksjon--gronn">
    @else
    <div class="seksjon">
    @endif
    
      <div class="seksjon__holder">
        <h1>{{get_the_title()}}</h1>
        <div class="tekst">
          {!! the_content() !!}
        </div>
      </div>
    </div>
  @endwhile
@endsection
