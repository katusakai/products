<?php


namespace App\Validations;


class ProductValidation
{
    public static function get() : array
    {
        $validatedData = [
            'name' => 'required|max:60',
            'sku' => 'required',
            'price' => 'required|numeric|min:0.01',
            'description' => 'required',
            'discount' => 'required|numeric|max:99|min:0'
        ];

        return $validatedData;
    }
}