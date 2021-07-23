<?php

namespace App\Http\Controllers;

use App\Model\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getTotalPrice(int $id) {
        return Invoice::find($id, ['price']);
    }
}
