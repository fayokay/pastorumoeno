<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use App\Quote;
use App\Product;
use App\ProductOrder;
use Auth;
class DashboardController extends Controller
{
    public function dashboard()
    {

        if(Auth::user()->role_id==5){
            return redirect()->route('admin.statistics.getIncrease', 'lga');
        }

        $data['quotes'] = Quote::orderBy('id', 'DESC')->limit(10)->get();
        $data['porders'] = ProductOrder::orderBy('id', 'DESC')->limit(10)->get();
        $data['default'] = Language::where('is_default', 1)->first();
        return view('admin.dashboard', $data);
    }
}
