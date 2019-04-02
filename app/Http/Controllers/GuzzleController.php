<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\APIBaseController as APIBaseController;

use GuzzleHttp;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Http\Requests;

use App\Address;

use DB;

class GuzzleController extends APIBaseController
{
    
	public function getindex(){
		
		$url = 'http://127.0.0.1:8000/api/address/';
		$client = new \GuzzleHttp\Client();
		$geocodeResponse = $client->get( $url )->getBody();
		$geocodeData = json_decode( $geocodeResponse );

      	return view('index',['Address_'=>$geocodeData]);
		
	}
	
	
    public function geocodeAddress( $address, $city, $state, $zip){

    	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode( $address.' '.$city.','.$state.' '.$zip ).'&key='.env( 'GOOGLE_MAPS_KEY' );
		$client = new \GuzzleHttp\Client();
		$geocodeResponse = $client->get( $url )->getBody();
		$geocodeData = json_decode( $geocodeResponse );

		$coordinates['lat'] = null;
  		$coordinates['lng'] = null;
  		$coordinates['status'] = null;
  		if( !empty( $geocodeData )
		         && $geocodeData->status != 'ZERO_RESULTS' 
		         && isset( $geocodeData->results ) 
		         && isset( $geocodeData->results[0] ) ){
		    $coordinates['lat'] = $geocodeData->results[0]->geometry->location->lat;
		    $coordinates['lng'] = $geocodeData->results[0]->geometry->location->lng;
		    $coordinates['status'] = $geocodeData->status;
		}
		if(empty($coordinates['status'])){ $coordinates['status'] = $geocodeData->status; }

		return $coordinates;
	}
	

	public function postNew( Request $request ){
	  
	  //Get the Latitude and Longitude returned from the Google Maps Address.
	  $coordinates = $this->geocodeAddress( $request->get('address'), $request->get('city'), $request->get('state'), $request->get('zip') );

		  if($coordinates['lat'] != null && $coordinates['lng'] != null){

		  		$newData = new Address();

				$newData->name       = $request->get('name');
				$newData->address    = $request->get('address');
				$newData->city       = $request->get('city');
				$newData->state      = $request->get('state');
				$newData->zip        = $request->get('zip');
				$newData->latitude   = $coordinates['lat'];
				$newData->longitude  = $coordinates['lng'];

				$newData->save();

				return $this->sendResponse($newData->toArray(), "Address created successfully.");

		  } else {
		  	return $this->sendResponse("", "Unsuccessful!! - Status:".$coordinates['status']);
		  }
	  
	}
}
