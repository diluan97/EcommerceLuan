<?php
namespace App\Helpers;

use Carbon\Carbon;

class MakeOrderNumber
{

    public static function makeOrderNumber()
    {
        $now = Carbon::now();
        return config('custom.order_number') . $now->month . '-' . $now->timestamp . rand(100, 1000);
    }
}
