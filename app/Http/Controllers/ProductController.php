<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.list', [
            'products' => Product::where('admin_id', Auth::id())->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Logger $logger)
    {
        if ($product->admin_id != Auth::id()) {
            $logger->warning('Security warning!');
            return redirect('/dashboard');
        }

        return view('product.edit', [
            'product'   => $product,
            'submit'    => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Logger $logger)
    {
        if ($product->admin_id != Auth::id()) {
            $logger->warning('Security warning!');
            return redirect('/dashboard');
        }

        $product->update([
             'product_name' => $request->get('product_name'),
             'description'  => $request->get('description')
         ]);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Logger $logger)
    {
        if ($product->admin_id != Auth::id()) {
            $logger->warning('Security warning!');
            return redirect('/dashboard');
        }

        $product->delete();
        return redirect('/products');
    }
}
