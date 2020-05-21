<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view('users.index', ['users' => $model->paginate(15)]);
        $users = App\User::orderby('name', 'asc')->get();
        return view('users.index',compact('users'));
    }

    public function destroy($id)
    {
        $users = App\User::findorfail($id);
        $users->delete();

        return back()->withEliminar(__('Usuario Eliminado con exito.'));
        // return redirect()->route('users.index')
        // ->with('exito', 'Usuario Eliminado con exito');
    }
}
