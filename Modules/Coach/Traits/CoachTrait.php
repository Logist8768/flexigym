<?php

namespace Modules\Coach\Traits;

trait CoachTrait
{
    public function getAuthenticatedCoach()
    {
        return auth()->user()->coach;
    }
}
