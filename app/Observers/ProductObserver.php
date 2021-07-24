<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Invoice;

class ProductObserver
{
    
    public function created(Product $product) {
      $invoice = Invoice::find($product->invoice_id);
      $invoice->total = $invoice->total + $product->price ?? $product->price;
      $invoice->save();
    }
}
