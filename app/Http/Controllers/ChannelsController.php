<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Http\Requests\ChannelCreateRequest;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //Only admin users can CRUD channels
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('Admin')->except(['index', 'show']);

    }

    public function index()
    {
        //Returns all channels that is only approved by the admin
        $channels = Channel::where('is_active', '1')->get();
        return view('channels.index')->with('channels', $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelCreateRequest $request)
    {
        //Instantiating a new channel object
        $channel = new Channel;

        //Asigning the uploaded image to a variable
        $file = $request->cover_path;
        //Asigining the image a new name
        $cover_name = time() . $file->getClientOriginalName();
        //Moving image to images folder
        $file->move('images', $cover_name);
        //If the user was an admin the channel will be autmatically active
        auth()->user()->is_admin == 1 ? $channel->is_active = 1 : $channel->is_active = 0;
        //Creating the new channel by the logged in user
        $channel->channel_name = $request->channel_name;
        $channel->cover_path = $cover_name;
        auth()->user()->channels()->save($channel);

        //redirecting to index
        return redirect('/channels')->with('success', 'تم اضافة المجالة بنجاح.');;
        


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($channel_id)
    {
        //Find the specified channel
        $magazines = Channel::findOrFail($channel_id)->magazines()->where('is_active',1)->get();
        //Return the channel with all its magazines relases
        return view('channels.show', compact('magazines', 'channel_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
