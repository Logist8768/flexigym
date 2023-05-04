<?php

namespace Modules\Client\Exceptions;

class CoachException extends \Exception
{
    public static function failedToSubscribe(): self
    {
        return new self(
            'You already subscribe to this coach before',
            422
        );
    }

    public function render()
    {
        return response()->json([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ], $this->getCode());
    }
}
