<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function search()
    {
        $q = Input::get('q');
        if ($q != "") {
            $product = Product::where('title', 'LIKE', '%' . $q . '%')->orWhere('description', 'LIKE', '%' . $q . '%')->get();
            if (count($product) > 0)
                return view('partials.search')->withDetails($product)->withQuery($q);
            else
                return view('partials.search')->withMessage('No Details found. Try to search again !');
        }
        return view('partials.search')->withMessage('No Details found. Try to search again !');
    }
}