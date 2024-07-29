<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with('package','user', 'user.userImage')
        ->orderBy('created_at', 'desc')->get();
    }
}
