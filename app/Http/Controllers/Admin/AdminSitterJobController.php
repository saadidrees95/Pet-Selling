<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSitterJobController extends Controller
{
    public function index()
    {
        return view('admin.job.index');
    }
}
