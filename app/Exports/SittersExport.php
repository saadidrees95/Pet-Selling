<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class SittersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('sitter', 'address', 'userImage', 'sitter.petType')->where('role_id', 5)
        ->get();
    }
}
