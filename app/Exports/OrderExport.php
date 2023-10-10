<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all()->map(function($order){
            return [
                '#' => $order->id,
                'user' => $order->user->name,
                'purchased_for' => $order->relative_id ? $order->relative->name : __("himself"),
                'Relations' => $order->relative_id ? $order->relative->type->name : 'N/A',
                'date' => date('y/m/d h:i a', strtotime($order->date)),
                'status' => $order->status ? __("Active") : __("Not Active"),
                'address' => $order->address ?? __('online')
            ];
        });
    }

    public function headings():array
    {
        return [
            '#',
            __("User name"),
            __("purchased for"),
            __('Relatievs Type'),
            __("Date"),
            __("Status"),
            __("address")
        ];
    }
}
