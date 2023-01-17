<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $datafile = 'products.json';

    public function index() {
        return view('product');
    }

    public function store(Request $request) {
        \Log::info($request);
        try {
            // Saving in products.json
            $products = [];
            if (Storage::disk('local')->exists($this->datafile)) {
                $products = json_decode(Storage::disk('local')->get($this->datafile));
            }
            $data = $request->only(['name', 'quantity', 'price']);
            $data['date_created'] = date('Y-m-d H:i:s');
            array_push($products, $data);

            Storage::disk('local')->put($this->datafile, json_encode($products));

            return Response::json('Product saved.', 200);
        } catch(Exception $e){
            return Response::json('Something went wrong', 422);
        }
    }
}
