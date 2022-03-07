<?php

namespace App\Http\Controllers\Customer;

use Error;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class PrivateController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user =  Auth::user();
        return view('customer.personal_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|max:50',
                'password' => 'required|max:50',
            ]);
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->withSuccess('Your personal data has been updated');
        } catch (QueryException $exception) {
            return redirect()->back()->withError('Something went wrong. Try again');
        };
    }
}
