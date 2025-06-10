<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function send_message(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:225|string',
            'email' => 'required|email|min:8|max:255',
            'message' => 'required|string|min:8|max:1024',
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;


        // $message->fill($validated);

        // var_dump($message->toArray());
        if ($message->save()) {
            return redirect()->route('home')->with('success', 'Message sent successfully');
        } else {
            return redirect()->route('home')->with('error', 'Failed to send message. Please try again.');
        }        

    }
    
}
