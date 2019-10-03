<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Http\Requests\ChannelCreateRequest;

class AdminChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $channels = Channel::all();
        // return view('admin.channels.index')->with('channels', $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelCreateRequest $request)
    {
        //
        $channel = new Channel;
        $channel->channel_name = $request->channel_name;
        $channel->cover_path = $request->cover_path;
        $channel->user_id = auth()->user()->id;
        $channel->is_active = 1;
        $channel->save();
        return redirect('/admin/channels')->with('success', 'تم اضافة المجلة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $channel = Channel::findOrFail($id);
        return view('admin.channels.edit', compact('channel'));
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
        //
        $channel = Channel::findOrFail($id);
        if($request->has('cover_path')){
            //Asigning the uploaded image to a variable
            $file = $request->cover_path;
            //Asigining the image a new name
            $cover_name = time() . $file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $file->move('images', $cover_name);
            $channel->cover_path = $cover_name;
        }
        $channel->channel_name = $request->channel_name;
        $channel->save();
        return redirect('/admin/channels')->with('success', 'تم تعديل المجلة بنجاح');

    }

    public function activation(Request $request, $id){
        $channel = Channel::findOrFail($id);
        //Check its status and reverse it
        $channel->is_active == 0 ? $channel->is_active = 1 : $channel->is_active = 0;
        $channel->save();
        return back();
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
        Channel::findOrFail($id)->delete();
        return back();
    }
}
