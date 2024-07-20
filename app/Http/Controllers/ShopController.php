<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
 
class ShopController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลร้านค้าและสินค้าของร้านค้า
        $shops = Shop::with('products')->get();
        return view('welcome', compact('shops'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
       
        // Define the radius (e.g., 10 kilometers)
        $radius = 10000;
    
        // Convert radius from kilometers to degrees
        $radiusInDegrees = $radius / 111.045;
    
        // Find products based on the search query
      // ค้นหาสินค้าตามชื่อที่กำหนด
        $products = Product::where('name', 'LIKE', "%{$query}%")
        ->with('shop')
        ->get();

        // ตรวจสอบว่ามีสินค้าที่พบหรือไม่
        if ($products->isEmpty()) {
        // ถ้าไม่พบสินค้าให้ค้นหาจากชื่อร้านค้าแทน
        $shops = Shop::where('name', 'LIKE', "%{$query}%")
            ->with('products')
            ->get();
        } else {
            // ถ้าพบสินค้าให้ดึงร้านค้าที่มีสินค้าเหล่านั้น
            $shops = $products->pluck('shop')->unique();
        }
        
        // Filter shops within the specified radius
        // $shops = Shop::selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        //     ->having('distance', '<', $radiusInDegrees)
        //     ->orderBy('distance')
        //     ->get();
        // $shopIds = $products->pluck('shop_id')->unique();
        
        // $shops = Shop::whereIn('id', $shopIds)->get();
        // Filter products that are from shops within the specified radius
        // $filteredProducts = $products->filter(function($product) use ($shops) {
        //     return $shops->contains($product->shop);
        // });
    
        return view('welcome', ['products' => $products, 'shops' => $shops]);
    }
}

