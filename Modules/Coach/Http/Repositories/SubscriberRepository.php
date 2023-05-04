<?php

namespace Modules\Coach\Http\Repositories;

use Illuminate\Http\Request;
use Modules\Coach\Traits\CoachTrait;

class SubscriberRepository
{
    use CoachTrait;

    public function list(Request $request)
    {
        $coach = $this->getAuthenticatedCoach();
        $query = $coach->subscribers();

        if (! is_null($request->q)) {
            $query->where(function ($query) use ($request) {
                $query
                    ->Where('name', 'like', '%'.$request->q.'%');
            });
        }

        $query->orderBy('created_at', $request->sortBy ?? 'desc');

        return $query->paginate(10);
    }
}
