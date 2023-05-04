<?php

namespace Modules\Chat\Actions;

use Modules\Chat\Http\Resources\MessageCollection;

class RetrieveChatMessagesAction
{
    public function __invoke($chat)
    {
        $messages = $chat->messages()->orderBy('created_at', 'DESC')->paginate(10);

        return MessageCollection::make($messages);
    }
}
