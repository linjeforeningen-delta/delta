<section class="seksjon">
<div class="seksjon__holder">
	@if(Delta\bruker_har_tilgang('skjulte'))
	<header>
		<h1>{{ the_title() }}</h1>
	</header>

	@while(have_rows('felt')) @php(the_row())

		<article class="komiteside__felt">

		  <aside class="komiteside__bilde">
		    	{!! wp_get_attachment_image( get_sub_field('bilde'), 'medium' ) !!}
		  </aside>

		  <div>
		    {!! get_sub_field('innhold') !!}
		  </div>

		</article>

	@endwhile
	@else
		<h1>Du har ikke tilgang til denne siden</h1>
		<p>Bruk menyen over for å navigere til andre sider.</p>
		<p>Hvis det er gjort en feil, og du egentlig burde ha tilgang til siden, ta kontakt med din komiteleder så får vi ordnet det.</p>
	@endif
</div>
</section>