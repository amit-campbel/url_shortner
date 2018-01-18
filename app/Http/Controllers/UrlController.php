<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Hasher;
use App\Url;

class UrlController extends Controller {
    
	public function shorten( Request $request ) {

		$details 								= $request->validate([
											        'url' => 'required|url|max:2000'
											    ]);

		$details 								= Url::formatData( $details );
	
		$urlElements 							= parse_url( $details['url'] );

		$url 									= Url::where('domain', $urlElements['host'])->where('url', $details['url'])->first();
		if( !$url ) {
			$hasher 							= new Hasher;

			$details['hash'] 					= $hasher->encode( microtime(true) * 1000 );
			$details['domain'] 					= $urlElements['host'];

			$url 								= Url::create( $details );
		}

		return response()->json( ['error' => '', 'short_url' => env('APP_URL') . '/' . $url->hash, 'code' => 200], 200 );
	}

	public function access( Request $request, $hash ) {
		$url 									= Url::where( 'hash', $hash )->first();

		if( $url ) {
			$access_count 						= $url->access_count;
			$url->update(['access_count' => $access_count++]);

			return redirect( $url->url, 301 );
		}

		abort(404);
	}

	//Can be used for auto refresh of most accessed urls board
	/*public function getMostAccessed( Request $request ) {

		$mostAccessedUrls 						= Url::getMostAccessed(100);

		return view( 'urls.most_accessed', 		['most_accessed_urls' => $mostAccessedUrls] );
	}*/

}
