<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model {

	//protected $primaryKey 						= 'hash';

	//Only fillable fields will be stored in db table others will be ignored.
    protected $fillable 						= ['hash', 'domain', 'url', 'access_count'];

    //Removes Empty fields from Request
    public static function formatData( $details = [] ) {
        return array_filter( array_map( 'trim', $details ) );
    }

    //Get Most Accessed Urls
    public static function getMostAccessed( $limit = 100 ) {
    	return Self::orderBy('access_count', 'desc')->limit($limit)->get();
    }
}
