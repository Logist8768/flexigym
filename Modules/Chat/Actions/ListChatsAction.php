<?php

namespace Modules\Chat\Actions;

use Modules\Chat\Entities\Chat;
use Modules\Chat\Http\Resources\ChatCollection;

class ListChatsAction
{
    public function __invoke()
    {
        $chats = Chat::whereHas('participants', function ($query) {
            $query->where('user_id', auth()->id());
        })->with(['messages' => function ($query) {
            $query->orderBy('created_at', 'DESC')->take(1);
        }])
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return ChatCollection::make($chats);
    }
}
