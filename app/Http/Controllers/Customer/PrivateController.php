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
    public function updatePersonalData(Request $request)
    {
        try {
            $passwordRules = ($request->password) !== null
                ? 'sometimes|nullable|string|min:8|max:50' : '';
            $emailRules = ($request->email) !== null
                ? 'string|email|max:255|unique:users' : '';
            $nameRules = ($request->name) !== null
                ? 'string|max:1000' : '';
            $request->validate([
                'name' => $nameRules,
                'email' => $emailRules,
                'password' => $passwordRules
            ]);
            $user = User::findOrFail(Auth::user()->id);
            $message = 'nothing to update';
            if (($request->name !== $user->name) && $request->name) {
                $user->name = $request->name;
                $message = 'Your name has been updated';
            }
            if (($user->email !== $request->email) && $request->email) {
                $user->email = $request->email;
                $message = 'Your email has been updated';
            }
            if ($request->password) {
                $user->password = Hash::make($request->password);
                $message = 'Your password has been updated';
            }
            $user->save();
            return redirect()->back()->withSuccess($message);
        } catch (QueryException $exception) {
            return redirect()->back()->withError($exception->getMessage());
        };
    }
}
