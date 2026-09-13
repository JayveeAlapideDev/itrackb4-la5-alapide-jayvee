<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function featured()
    {
        $products = $this->products();
        $featured = $products[4];

        return view('products.show', ['product'=> $featured]);
    }
    public function index()
    {
       return view('products.index', ['products'=> $this -> products()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $products = $this->products();

        if(!isset($products[$id]))
            {
                abort(404);
            }

        return view('products.show', ['product' => $products[$id]]);
    }

    
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter($brand = null)
    {
      $all = $this->products();
       
      if ($brand === null) {
        $products = $all;
      } else {
        $products = [];
      
     foreach ($all as $id => $product) {
        if ($product['brand'] == $brand) {
            $products[$id] = $product;
        }
      }
    }
    return view('products.filter', ['products' => $products, 'brand' => $brand,]);
    }

    private function products(){
        return [
            1 => ['id' => 1,'name'=> 'Shampoo', 'price' => 10, 'stock'=> 50, 'brand' => 'sunsilk', 'is_available' => true],
            2 => ['id' => 2,'name'=> 'stick-O', 'price' => 100, 'stock'=> 20, 'brand' => 'choco', 'is_available' => true],
            3 => ['id' => 3,'name'=> 'smart', 'price' => 50, 'stock'=> 30, 'brand' => 'dishwashing', 'is_available' => false],
            4 => ['id' => 4,'name'=> 'joy', 'price' => 20, 'stock' => 40, 'brand' => 'dishwashing', 'is_available' => true],
            5 => ['id' => 5,'name'=> 'coffee', 'price' => 60, 'stock' => 70, 'brand' => 'nescafe', 'is_available' => false],
            6 => ['id' => 6,'name' => 'lollipop', 'price' => 80, 'stock' => 9, 'brand' => 'mint', 'is_available' => true],
        ];
    }
}
