<?php


if ( ! function_exists('calcVat')) {
    function calcVat($amount, ?float $vatPercentage = null): float
    {
        $percentage = $vatPercentage ?? config('finance.vat_percentage', 0);

        return round($amount * $percentage / 100, 2);
    }
}
