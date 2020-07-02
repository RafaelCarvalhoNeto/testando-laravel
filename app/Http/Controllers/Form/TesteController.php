<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TesteController extends Controller
{
    public function listAllUsers(){
        $users = User::paginate(5);

        return view('usuarios.listAllUsers', [
            'users' => $users
        ]);
    }

    public function listUser(User $user){
        return view('usuarios.listUser', [
            'user' => $user
        ]);
    }

    public function formAddUser(){

        return view("usuarios.addUser");
    }
    public function createUser(Request $request){

        $request->validate([
            'name' => 'required|min:5'
        ]);

        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('users.listAll');
    }
    public function formEditUser(User $user){
        
        return view("usuarios.editUser", [
            'user' => $user
        ]);
    }
    public function editUser(User $user, Request $request){

        $user->name = $request->name;
        
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.listAll');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.listAll');
    }
}
