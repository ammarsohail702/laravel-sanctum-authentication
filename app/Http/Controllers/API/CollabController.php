<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Collab;
use Illuminate\Http\Request;
use Validator;
class CollabController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'real_name' => 'required',
            'channel_name' => 'required',
            'user_id' => 'required',
            'channel_link' => 'required',
            'tiktok_link' => 'required',
            'subscriber' => 'required',
            'whatsapp_number' => 'required',
            'pubg_id' => 'required',
            'email' => 'required',
         ]);     
         
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }   

        $success= Collab::create($input);
        if ($success){
            return $this->sendResponse((object) array(), 'You have successfully applied for this job');
        }
        else{
            return $this->sendError('Please try again, Something bad has Happened!'); 
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\API\Collab  $collab
     * @return \Illuminate\Http\Response
     */
    public function show(Collab $collab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\API\Collab  $collab
     * @return \Illuminate\Http\Response
     */
    public function edit(Collab $collab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\API\Collab  $collab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collab $collab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\API\Collab  $collab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collab $collab)
    {
        //
    }
}
