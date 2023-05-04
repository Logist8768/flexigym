<?php declare (strict_types = 1);

namespace Modules\Cart\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CartStatus extends Enum
{
    const OPENED = 'opened';
    const ADANDONED = 'abandoned';
}
