@extends('layouts.default')

@section('content')

<div class="white-bg">
    <div id="site_banner" class="text-center clearfix">
        <div class="container">
            <h1>Easy, Fast & Quick to Share</h1>
            <div class="row">
            	<form id="frm_shorten" method="POST" action="/urls/shorten">
            		{{ csrf_field() }}
	            	<div class="input-container">
	            		<div class="input-group">
		                    <input type="text" autocomplete="Off" class="form-control" id="txt_url" name="url" placeholder="Paste Url here to Shorten">
		                    <div class="input-group-btn">
		                        <button id="btn_shorten" class="btn btn-default" type="submit"><b>Shorten</b></button>
		                    </div>
		                </div>
	            	</div>
	            </form>
            </div>
        </div>
    </div>

    <div id="most_accessed_board" class="text-center">
    	<h3>Most Accessed Urls</h3>
    	<div class="urls-container">
    		@include('urls/most_accessed')
    	</div>
    </div>
</div>
@endsection