<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductVariant;

class VariantController extends Controller
{
    public function getMenu(){
        $variants = ProductVariant::whereStatus(1)->get();
        return view('guest.menu.menu')->with(['variants' => $variants]);
    }
}
