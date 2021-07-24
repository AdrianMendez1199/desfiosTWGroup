<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getTotalPriceByInvoice(int $id) {
        return Invoice::find($id, ['id'])
         ->products()
         ->sum('price');
    }
 
   public function getInvoiceByPrice(int $quantity = 100) {
        return Invoice::whereHas('products', function($query) {
            return $query->where('quantity', '>', $quantity);
        })
        ->pluck('id');
   }


  //  Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.
   public function getAllProductNameByPrice(float $price = 1000000) {
            return Product::select('name')
            ->where('price', '>', $price)
            ->get();
   }

   public function createProduct(Request $request) {
        $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
        ]);
   }
    
}
