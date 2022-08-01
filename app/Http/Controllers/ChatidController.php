<?php

namespace App\Http\Controllers;

use App\Models\Chatid;
use App\Http\Requests\StoreChatidRequest;
use App\Http\Requests\UpdateChatidRequest;

class ChatidController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chatid  $chatid
     * @return \Illuminate\Http\Response
     */
    public function show(Chatid $chatid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chatid  $chatid
     * @return \Illuminate\Http\Response
     */
    public function edit(Chatid $chatid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatidRequest  $request
     * @param  \App\Models\Chatid  $chatid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatidRequest $request, Chatid $chatid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chatid  $chatid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chatid $chatid)
    {
        //
    }
}
