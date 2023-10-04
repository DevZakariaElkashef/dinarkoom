<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        return back()->with('message', 'deleted successfully');
    }


    public function exportExcel()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }

    public function exportPdf()
    {
    // $pdf = PDF::loadView('pdf.document', $data);
    // $pdf->getMpdf()->AddPage(/*...*/);
    }
}
