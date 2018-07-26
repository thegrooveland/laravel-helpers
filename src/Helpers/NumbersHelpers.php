<?php

if (!function_exists('format_number')) {

    /**
     * return the current lang
     *
     * @param bool $upper
     * @return string
     */
    function format_number($number, string $thousandSeparator = '.', string $decimalPoint = ',', int $decimals = 2): string
    {
        $numberFormat = new \h4kuna\Number\NumberFormatState([
			'emptyValue' => '-',
			'zeroIsEmpty' => false,
			'decimalPoint' => $decimalPoint,
			'thousandsSeparator' => $thousandSeparator,
			'decimals' => $decimals,
            'zeroClear' => true,
            'intOnly' => false
        ]);
        
        return $numberFormat->format($number);
    }
}