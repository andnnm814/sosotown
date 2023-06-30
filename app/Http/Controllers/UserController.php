<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $data = [
            "user" => Auth::user(),
        ];
        return view("users.show", $data);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'post_code' => 'nullable|numeric',
            'adress' => 'nullable',
            'financial_institution' => 'nullable',
            'branch_name' => 'nullable',
            'account_type' => 'nullable',
            'account_number' => 'nullable',
            'nominee' => 'nullable',
        ]);

        $pass = Auth::user()->password;

        User::where('id', Auth::id())
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'post_code' => $request->post_code,
                'adress' => $request->adress,
                'financial_institution' => $request->financial_institution,
                'branch_name' => $request->branch_name,
                'account_type' => $request->account_type,
                'account_number' => $request->account_number,
                'nominee' => $request->nominee,
            ]);
        
        return redirect(route('users.show'));
    }
    public function softDelete(User $user)
    {
        $user = User::find(Auth::id());
        $user->delete();
        return redirect(route('products.index'));
    }
}
