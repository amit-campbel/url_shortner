<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;

class PageController extends Controller {

    public function index() {
    	$mostAccessedUrls 							= Url::getMostAccessed();

    	return view( 'welcome', 					['most_accessed_urls' => $mostAccessedUrls] );
    }

}
