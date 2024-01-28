<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    private static $courier;

    public static function newCourier($request)
    {
        self::$courier           = new Courier();
        self::$courier->name     = $request->name;
        self::$courier->mobile   = $request->mobile;
        self::$courier->email    = $request->email;
        self::$courier->cost     = $request->cost;
        self::$courier->address  = $request->address;
        self::$courier->save();
    }
    public static function updateCourier($request,$courier)
    {
        $courier->name     = $request->name;
        $courier->mobile   = $request->mobile;
        $courier->email    = $request->email;
        $courier->cost     = $request->cost;
        $courier->address  = $request->address;
        $courier->save();
    }

    public static function deleteCourier($courier)
    {

        $courier->delete();
    }
}
