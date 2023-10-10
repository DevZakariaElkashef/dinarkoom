<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all()->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'addition Phone' => $user->addition_phone,
                'email' => $user->email,
                'civil_id' => $user->civil_id,
                'role' => $user->getRoleNames()->first(),
                'register_date' => $user->created_at->format('y/m/d h:i:s a')
            ];
        });
    }

    public function headings() :array
    {
        return [
            '#',
            __("Name"),
            __("Phone"),
            __("Addition_Phone"),
            __("Email"),
            __("Civil ID number"),
            __("Role"),
            __("Register Date")
        ];
    }
    
}
