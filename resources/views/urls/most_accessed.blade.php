@if( count( $most_accessed_urls ) )
	@foreach( $most_accessed_urls as $most_accessed_url )
		<div class="row text-left">
			<div class="col-sm-4">
				<a target="_blank" href="{{ env('APP_URL') . '/' . $most_accessed_url->hash }}">{{ env('APP_URL') . '/' . $most_accessed_url->hash }}</a>
			</div>
			<div class="col-sm-8">
				<a target="_blank" href="{{ $most_accessed_url->url }}">{{ $most_accessed_url->url }}</a>
			</div>
		</div>
	@endforeach
@endif