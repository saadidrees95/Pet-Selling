<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PetOwnersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('address', 'userImage', 'pets', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image')
        ->where('role_id', 4)->get();
    }
}
