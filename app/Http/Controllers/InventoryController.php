<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $inventoryList = Inventory::join('products', 'products.id', 'product_id')
            ->where('products.admin_id', Auth::id());

        if (!empty($request->get('search'))) {
            $inventoryList->where(function ($query) use ($request) {
                $query->where('product_name', 'LIKE', '%' . $request->get('search') . '%')
                    ->orWhere('sku', 'LIKE', '%' . $request->get('search') . '%');
            });
        }

        return view('inventory.list', [
            'inventories' => $inventoryList->paginate(50),
            'searchString'=> $request->get('search')
        ]);
    }
}
