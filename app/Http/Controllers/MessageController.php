<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('archived',NULL)->get();
        foreach ($messages as &$message){
            $message['preview'] = substr($message['body'],0,20);
            if ($message['read'] === NULL){
                $message['state'] = "Unread";
            }else{
                $message['state'] = "Read";
            }
        }
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'subject'=>'required',
            'body'=>'required',
        ]);

        $current_date = date('Y-m-d H:i:s');

        $message = new Message([
            'subject' => $request->get('subject'),
            'body' => $request->get('body'),
            'sent' => $current_date,
        ]);

        $message->save();
        return redirect('/messages')->with('success', 'Message sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        if ($message['read']== NULL){
            $current_date = date('Y-m-d H:i:s');
            $message['read'] = $current_date;
            $message->save();
        }
        return view('messages.show',compact('message'));
    }
    public function archive($id)
    {
        $message = Message::find($id);
        if ($message['archived'] == NULL){
            $current_date = date('Y-m-d H:i:s');
            $message['archived'] = $current_date;
            $message->save();
        }
        return redirect('/messages');
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
