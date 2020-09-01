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
        //Get all messages that are not archived
        $messages = Message::where('archived',NULL)->get();
        //Add preview and state items to the base message
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
        //send the user directly to the create view
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
        //Basic validation on subject and body
        $request->validate([
            'subject'=>'required',
            'body'=>'required',
        ]);
        //get the current date to save as the "send time"
        $current_date = date('Y-m-d H:i:s');

        //prepare the item for saving
        $message = new Message([
            'subject' => $request->get('subject'),
            'body' => $request->get('body'),
            'sent' => $current_date,
        ]);

        //Commit to DB
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
        //Find the message by ID
        $message = Message::find($id);
        //Update the read date with the current datetime stamp
        if ($message['read']== NULL){
            $current_date = date('Y-m-d H:i:s');
            $message['read'] = $current_date;
            $message->save();
        }
        //return the user to the view with an object containing the requested message
        return view('messages.show',compact('message'));
    }
    public function archive($id)
    {
        //Find the message to archive by id
        $message = Message::find($id);

        //Set the archived date to the current datetime stamp
        if ($message['archived'] == NULL){
            $current_date = date('Y-m-d H:i:s');
            $message['archived'] = $current_date;
            $message->save();
        }

        //redirect the user back to the index page
        return redirect('/');
    }

}
