<?php

namespace Modules\Client\Actions;

use Modules\Client\Exceptions\CoachException;
use Modules\Client\Http\Requests\CoachSubscribeRequest;
use Modules\Client\Traits\ClientTrait;

class ClientSubscribeToCoachAction
{
    use ClientTrait;

    public function __invoke(CoachSubscribeRequest $request)
    {
        $client = $this->getAuthenticatedClient();
        //check if client subscribed to this coach before
        $subscription = $client->coaches()->where('coach_id', $request->coach_id)->exists();
        if ($subscription) {
            throw CoachException::failedToSubscribe();
        }

        $client->coaches()->attach($request->coach_id, [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }
}
