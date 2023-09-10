<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function createAdmin(Request $res)
    {
        $validated = $res->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $res->admin_name;
        $user->email = $res->admin_email;
        $user->role = 'admin';
        $user->password = $res->password;
        $user->save();

        return redirect('new_admin')->with('admin', 'admin created');

    }

    public function adminList()
    {
        $admins = User::whereIn('role', ['admin', 'user'])->get();

        return view('admin_list', compact('admins'));
    }

    public function getAdmin($id)
    {
        return User::findOrfail($id);
    }

    public function adminEdit($id)
    {
        $admin = User::findOrfail($id);

        return view('admin_edit', compact('admin'));
    }

    public function adminUpdate(Request $res)
    {
        $validated = $res->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'OldPass' => 'required',
            'newPass' => 'required',
        ]);
        $oldPass = $this->getAdmin($res->admin_id);
        $wordCount = Str::length($res->newPass);

        if (Hash::check($res->OldPass, $oldPass->password)) {
            if ($wordCount >= 8) {
                $user = User::find($res->admin_id);
                $user->name = $res->admin_name;
                $user->email = $res->admin_email;
                $user->password = Hash::make($res->newPass);
                $user->save();

                return redirect('admin_list')->with('adminInfo', 'Update Success');
            } else {
                return redirect('admin/edit/'.$res->admin_id)->with('errorInfo', 'New Password must have 8 characters');
            }

        } else {
            return redirect('admin/edit/'.$res->admin_id)->with('errorInfo', 'Password doesnot Match');
        }
    }

    public function deleteAdmin($id)
    {
        if (User::find($id)->delete()) {
            return redirect('admin_list')->with('adminInfo', 'Delete');
        }
    }
}
