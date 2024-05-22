<?php

use App\Common\Tools\Setting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;

/**
 * return array value or null
 *
 * @param array $data
 * @param string $target
 * @return mixed|null
 */
function getVal(array $data, string $target)
{
    return isset($data[$target]) ? $data[$target] : null;
}

/**
 * @param int $time
 * @param string $format
 * @return string
 */
function toDate($time, $format = Setting::DATE_TIME_FORMAT): string
{
    return format(Carbon::now()->addSeconds($time), $format);
}

/**
 * @param Carbon $date
 * @param string $format
 * @return string
 */
function format(Carbon $date, string $format = Setting::DATE_TIME_FORMAT)
{
    return $date->format($format);
}

/**
 * @param int $length
 * @return string
 */
function makeToken(int $length = 8): string
{
    return Str::random($length);
}