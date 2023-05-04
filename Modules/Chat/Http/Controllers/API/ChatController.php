<?php

namespace Modules\Chat\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Chat\Actions\ListChatsAction;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Http\Resources\ChatResource;

class ChatController extends Controller
{
    public function index()
    {
        return (new ListChatsAction())();
    }

    public function show(Chat $chat)
    {
        return ChatResource::make($chat);
    }
}
