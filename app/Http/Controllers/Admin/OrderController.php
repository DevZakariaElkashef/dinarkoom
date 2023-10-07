<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return back()->with('message', __("Order Deleted Successfully"));
    }


    public function exportExcel()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }

    public function exportPdf()
    {
        $orders = Order::all();
        $pdf = PDF::loadView('dashboard.orders.pdf', compact('orders'));
        $pdf->download('orders.pdf');
    }

    public function search(Request $request)
    {
        $value = $request->value;

        $orders = Order::whereHas('user', function ($query) use ($value) {
            $query->where('name', 'like', "%$value%");
        })
        ->latest()
        ->paginate(10);

        return view('dashboard.orders.table', compact('orders'))->render();

    }
}
