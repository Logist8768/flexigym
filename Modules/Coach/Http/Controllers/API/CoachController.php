<?php

namespace Modules\Coach\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Coach\Actions\CoachesListAction;
use Modules\Coach\Http\Repositories\SubscriberRepository;
use Modules\Coach\Http\Resources\SubscriberCollection;

class CoachController extends Controller
{
    public function index()
    {
        return (new CoachesListAction)();
    }

    public function listOfSubscribers(Request $request, SubscriberRepository $data)
    {
        $subscribers = $data->list($request, $data);

        return new SubscriberCollection($subscribers);
    }
}
