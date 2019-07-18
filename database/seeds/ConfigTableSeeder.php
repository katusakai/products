<?php

use Illuminate\Database\Seeder;
use App\Config;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tax_rate = new Config();
        $tax_rate->name = 'tax_rate';
        $tax_rate->value = '21';
        $tax_rate->save();

        $tax_inclusion_flag = new Config();
        $tax_inclusion_flag->name = 'tax_inclusion_flag';
        $tax_inclusion_flag->value = '1';
        $tax_inclusion_flag->save();

        $global_discount = new Config();
        $global_discount->name = 'global_discount';
        $global_discount->value = '5';
        $global_discount->save();
    }
}
