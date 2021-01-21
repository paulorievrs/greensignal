<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->paginate(20);
        $roles = Role::all();

        return view('admin.alter-userrole', [
            'users' => $users,
            'roles' => $roles
        ]);

    }

    public function updateUserRole(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->role_id = $request->role_id;
            $user->save();

            return redirect('/alter-userrole')->with([
                'response' => 'Alterado com successo!'
            ]);
        } catch (\Exception $e) {

            return redirect('/alter-userrole')->with([
                'error' => 'Erro ao alterar!'
            ]);
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
