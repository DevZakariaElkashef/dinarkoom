<?php

namespace App\Exports;

use App\Models\Winner;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WinnerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Winner::all()->map(function ($winner){
            return [
                'name' => $winner->user->name,
                'value' => $winner->value,
                'month' => Carbon::createFromFormat('m', $winner->month)->locale(app()->getLocale())->format('F'),
                'added_by' => $winner->admin->name
            ];
        });
    }

    public function headings() :array
    {
        return [
            __("Name"),
            __("value"),
            __("Month"),
            __("Added_by")
        ];
    }
}
