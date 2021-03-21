<?php


namespace App\Http\Controllers\Admin;


use App\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    public function index()
    {
        return view('admin/config/index');
    }

    public function indexJson()
    {
        return response()->json(
            Config::all()
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'tax_rate' => 'required|numeric|min:0',
            'global_discount' => 'required|numeric|min:0|max:100'
        ]);

        $taxRate = Config::find(1);
        $taxRate->value = $request->tax_rate;
        $taxRate->save();

        $taxInclusionFlag = Config::find(2);
        $taxInclusionFlag->value = $request->tax_inclusion_flag ? 1 : 0;
        $taxInclusionFlag->save();

        $globalDiscount = Config::find(3);
        $globalDiscount->value = $request->global_discount;
        $globalDiscount->save();

        return redirect(route('admin.config.index'));


    }
}