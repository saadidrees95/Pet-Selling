<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminSettingController extends Controller
{
    public function create()
    {
        $admin = User::where('role_id',1)->first();
        return view('admin.setting.create',compact('admin'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
        ]);

        $admin = User::where('id',Auth::user()->id)->first();

        if ($request->hasFile('image')) {

            $destination = public_path($admin->resume);

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = time() . '.' . $name;
            $file->move(public_path('admin_image/'), $filename);
        }
        // dd($filename);
        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->image = $filename;
        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Admin Record updated successfully');
    }
}
