<?php

namespace App\Http\Controllers;

use App\Models\PesanChat;
use App\Http\Requests\StorePesanChatRequest;
use App\Http\Requests\UpdatePesanChatRequest;

class PesanChatController extends Controller
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
     * @param  \App\Http\Requests\StorePesanChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesanChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesanChat  $pesanChat
     * @return \Illuminate\Http\Response
     */
    public function show(PesanChat $pesanChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanChat  $pesanChat
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanChat $pesanChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesanChatRequest  $request
     * @param  \App\Models\PesanChat  $pesanChat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesanChatRequest $request, PesanChat $pesanChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanChat  $pesanChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanChat $pesanChat)
    {
        //
    }
}
