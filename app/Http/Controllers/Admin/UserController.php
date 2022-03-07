<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('created_at', 'DESC')->get();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $roles = Role::pluck('name')->filter(function ($value, $key) {
                return $value != 'admin';
            });
            $user = User::findOrFail($id);
            return view('admin.users.edit', [
                'user' => $user,
                'roles' => $roles
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect(route('users.index'))->withError('User with id:  ' . $id . ' not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            $user = User::findOrFail($id);
            $message = 'nothing to update';
            if (($request->name !== $user->name) && $request->name) {
                $user->name = $request->name;
                $message = 'User\'s name has been updated';
            }
            if (($user->email !== $request->email) && $request->email) {
                $user->email = $request->email;
                $message = 'User\'s email has been updated';
            }
            if ($request->password) {
                $user->password = Hash::make($request->password);
                $message = 'User\'s password has been updated';
            }
            if ($request->role) {
                $user->removeRole($user->getRoleNames()->first());
                $user->assignRole($request->role);
                $message = 'User\'s role has been updated';
            }
            $user->save();
            return redirect()->back()->withSuccess($message);
        } catch (QueryException $exception) {
            return redirect()->back()->withError($exception->getMessage());
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->withSuccess('User has been deleted successfully');
    }
}
