<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // ค้นหาสินค้าตามคำค้นหา
        $products = Product::where('name', 'like', "%$query%")->get();

        // ค้นหาร้านค้าที่มีสินค้าที่ค้นหา
        $shopIds = $products->pluck('shop_id')->unique();

        $shops = Shop::whereIn('id', $shopIds)->get();

        return view('welcome', [
            'products' => $products,
            'shops' => $shops,
            'query' => $query,
        ]);
    }
}
