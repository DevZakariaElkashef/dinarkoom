<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function index(Request $request, $id)
    {
    $user = $request->user();
    $order = Order::where('id', $id)->where('user_id', $user->id)->firstOrFail();

    $pdf = PDF::loadView('site.invoice', compact('user', 'order'));
    $pdf->download();

    }
}
