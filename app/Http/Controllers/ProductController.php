<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $datafile = 'products.json';

    public function index() {
        $data = array(
            'products_data' => $this->prepareList()
        );
        return view('product', $data);
    }

    public function store(Request $request) {
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

            $productsList = $this->prepareList();

            return Response::json($productsList, 200);
        } catch(Exception $e){
            return Response::json('Something went wrong', 422);
        }
    }

    public function show($index) {
        $product = [];
        if (Storage::disk('local')->exists($this->datafile)) {
            $products = json_decode(Storage::disk('local')->get($this->datafile));
            if ($products && ($index - 1) >= 0 && isset($products[$index-1])) {
                $product = $products[$index-1];
                return Response::json($product, 200);
            } else {
                return Response::json('Product not found', 404);
            }
        } else {
            return Response::json('Something went wrong', 422);
        }
    }

    public function update(Request $request, $index) {
        if (Storage::disk('local')->exists($this->datafile)) {
            $products = json_decode(Storage::disk('local')->get($this->datafile));
            if ($products && ($index - 1) >= 0 && isset($products[$index-1])) {
                $products[$index-1]->name = $request->name;
                $products[$index-1]->quantity = $request->quantity;
                $products[$index-1]->price = $request->price;

                Storage::disk('local')->put($this->datafile, json_encode($products));

                $productsList = $this->prepareList();
                return Response::json($productsList, 200);
            } else {
                return Response::json('Product not found', 404);
            }
        } else {
            return Response::json('Something went wrong', 422);
        }
    }

    public function prepareList() {
        $productsList = '';
        $products = [];
        if (Storage::disk('local')->exists($this->datafile)) {
            $products = json_decode(Storage::disk('local')->get($this->datafile));
            $totalSum = 0;
            if ($products && count($products) > 0) {
                foreach($products as $key => $product) {
                    $total = $product->quantity * $product->price;
                    $totalSum += $total;

                    $productsList .= '
                    <tr>
                        <td scope="col">' . $key + 1 . '</td>
                        <td scope="col">' . $product->name . '</td>
                        <td scope="col">' . $product->quantity . '</td>
                        <td scope="col">' . $product->price . '</td>
                        <td scope="col">' . $product->date_created . '</td>
                        <td scope="col">' . $total . '</td>
                        <td scope="col">
                            <button type="button" class="btn btn-outline-dark btn-sm editproduct" productindex="'. $key + 1 .'">Edit</button>
                        </td>
                    </tr>
                    ';
                }

                $productsList .= '
                <tr>
                    <td scope="col" colspan="5"><strong>Sum of all Total</strong></td>
                    <td scope="col" colspan="2"><strong><u>' . $totalSum . '</u></strong></td>
                </tr>
                ';
            }
        }
        return $productsList;
    }
}
