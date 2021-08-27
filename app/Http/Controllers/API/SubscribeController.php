<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Website;
use Validator;

class SubscribeController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'website_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $user = User::find($input['user_id']);
        if(!$user) {
          return $this->sendError('Validation Error.', 'User not exist');
        }

        $website = Website::find($input['website_id']);
        if(!$website) {
          return $this->sendError('Validation Error.', 'Website not exist');
        }

        $exists = $website->users->contains($input['user_id']);
        if($exists) {
          return $this->sendError('Validation Error.', 'User already subscribed to this website');
        }

        $website->users()->attach($input['user_id']);

        return $this->sendResponse(null, 'Subscribed successfully.');
    }
}