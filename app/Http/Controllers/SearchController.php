<?php

namespace App\Http\Controllers;

use App\Packt\Packt;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function list(Request $request)
    {
        $response = Packt::create()
            ->setPage($request->get('page', 1))
            ->list();

        $products = Arr::get($response, 'products', []);

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'html' => view('search.list', compact('products'))->render(),
        ]);
    }
}
