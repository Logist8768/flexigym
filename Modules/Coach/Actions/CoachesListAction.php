<?php

namespace Modules\Coach\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Coach\Http\Resources\CoachCollection;

class CoachesListAction
{
    public function __invoke()
    {
        $coaches = DB::table('coaches')
            ->join('users', 'coaches.id', '=', 'users.id')
            ->select('coaches.name', 'coaches.profession', 'coaches.description',
                'coaches.gender', 'users.phone', 'users.email')
            ->paginate(5);

        return CoachCollection::make($coaches);
    }
}
