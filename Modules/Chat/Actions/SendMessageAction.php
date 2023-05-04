<?php

namespace Modules\Chat\Actions;

use Modules\Chat\Entities\Chat;
use Modules\Chat\Http\Requests\StoreMessageRequest;

class SendMessageAction
{
    public function __invoke(StoreMessageRequest $request, Chat $chat)
    {
        $chat->messages()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
    }
}
