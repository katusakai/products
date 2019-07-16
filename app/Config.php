<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public static function getTaxRate()
    {
        return intval(self::where('name','tax_rate')->first()->value);
    }

    public static function getTaxInclusionFlag()
    {
        return self::where('name','tax_inclusion_flag')->first()->value;
    }

    public static function getGlobalDiscount()
    {
        return intval(self::where('name','global_discount')->first()->value);
    }
}
