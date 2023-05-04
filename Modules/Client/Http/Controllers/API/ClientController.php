<?php

namespace Modules\Client\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Client\Actions\ClientSubscribeToCoachAction;
use Modules\Client\Http\Requests\CoachSubscribeRequest;

class ClientController extends Controller
{
    public function subscribe(CoachSubscribeRequest $request)
    {
        (new ClientSubscribeToCoachAction)($request);

        return sendResponse('client is subscribed successfully');
    }
}
