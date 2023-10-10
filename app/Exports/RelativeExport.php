<?php

namespace App\Exports;

use App\Models\Relative;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RelativeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Relative::all()->map(function($relative){
            return [
                'id' => $relative->id,
                'name' => $relative->name,
                'relation' => $relative->type->{'name_' . app()->getLocale()},
                'user' => $relative->user->name,
                'civil_id' => $relative->civil_id,
            ];
        });
    }

    public function headings() :array
    {
        return [
            '#',
            __("Name"),
            __("Relatives"),
            __("User name"),
            __('Civil ID number')
        ];
    }
}
