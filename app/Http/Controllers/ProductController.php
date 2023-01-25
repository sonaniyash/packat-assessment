<?php

namespace App\Http\Controllers;

use App\Packt\Packt;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->route('id');

        if (!$id) {
            abort(404);
        }

        return view('product.show', compact('id'));
    }

    public function detail(Request $request)
    {
        $product = Packt::create()->detail($request->route('id'));

        $prices = Packt::create()->prices($product['id']);

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'html' => view('product.card', compact('product', 'prices'))->render(),
        ]);
    }
}
