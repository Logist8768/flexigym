<?php

namespace Modules\Chat\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Chat\Actions\RetrieveChatMessagesAction;
use Modules\Chat\Actions\SendMessageAction;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Chat $chat)
    {
        return (new RetrieveChatMessagesAction())($chat);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('chat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreMessageRequest $request, Chat $chat)
    {
        (new SendMessageAction())($request, $chat);

        return response()->json([
            'message' => 'message is created successfully',
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('chat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('chat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
