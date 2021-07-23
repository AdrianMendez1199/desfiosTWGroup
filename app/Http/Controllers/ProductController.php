<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getTotalPrice(int $id) {
        return Product::find($id, ['price']);
    }
}
