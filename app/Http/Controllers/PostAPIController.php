<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\APIBaseController as APIBaseController;

use App\Address;

use Validator;

use DB;

class PostAPIController extends APIBaseController
{
    public function listAlldata()
	{
		$Address_ = Address::all();
		return $this->sendResponse($Address_->toArray(), 'Address retrieved successfully.');
		
	}

	public function search(Request $request)
	{
		
		$keyword = $request->input('keyword');

		$address = Address::where(function ($query) use($keyword) {
		$query->where('name', 'like', '%' . $keyword . '%')
		->orWhere('address', 'like', '%' . $keyword . '%');
		})
		->get();
		
		if (is_null($address)) {
			return $this->sendError('Address not found.');
		}

		return $this->sendResponse($address->toArray(), 'Address retrieved successfully.');
	}
}
