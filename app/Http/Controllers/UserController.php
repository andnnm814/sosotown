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
            'postcode' => 'nullable|numeric',
            'adress' => 'nullable',
            'bankInfo1' => 'nullable',
            'bankInfo2' => 'nullable',
            'bankInfo3' => 'nullable',
            'bankInfo4' => 'nullable',
            'bankInfo5' => 'nullable',
        ]);

        $pass = Auth::user()->password;

        User::where('id', Auth::id())
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'postcode' => $request->postcode,
                'adress' => $request->adress,
                'bankInfo1' => $request->bankInfo1,
                'bankInfo2' => $request->bankInfo2,
                'bankInfo3' => $request->bankInfo3,
                'bankInfo4' => $request->bankInfo4,
                'bankInfo5' => $request->bankInfo5,
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
