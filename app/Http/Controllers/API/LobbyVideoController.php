<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\LobbyVideo;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
class LobbyVideoController extends BaseController
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
            'user_id' => 'required',
            'pubg_id' => 'required',
            'ingame_name' => 'required',
            'whatsapp_number' => 'required',
         ]);   
         
         if($validator->fails()){
            return $this->sendError($validator->errors());       
        }   

         $last_post = LobbyVideo::where('user_id', $request->user_id)->orderBy('id', 'desc')->where('created_at', '>', Carbon::now()->subMinutes(10080))->first();
         if($last_post){
            return $this->sendError('You are not Allowed to Collab for next 7 Days');
         }
        $success= LobbyVideo::create($input);
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
     * @param  \App\Models\LobbyVideo  $lobbyVideo
     * @return \Illuminate\Http\Response
     */
    public function show(LobbyVideo $lobbyVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LobbyVideo  $lobbyVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(LobbyVideo $lobbyVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LobbyVideo  $lobbyVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LobbyVideo $lobbyVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LobbyVideo  $lobbyVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(LobbyVideo $lobbyVideo)
    {
        //
    }
}
