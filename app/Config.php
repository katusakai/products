<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public static function taxRate()
    {
        return self::where('name','tax_rate')->first();
    }

    public static function taxInclusionFlag()
    {
        return self::where('name','tax_inclusion_flag')->first();
    }

    public static function globalDiscount()
    {
        return self::where('name','global_discount')->first();
    }
}
