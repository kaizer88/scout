<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserList;
use Redirect, Response;


class UserListController extends Controller
{
    public function index(){
        $users = UserList::all();
        return view('index',[
            'users' => $users,
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'username' => 'required|unique:user_lists',
            'nameTxt' => 'required|regex:/^[a-zA-Z]+$/',
            'surname' => 'required|regex:/^[a-zA-Z]+$/',
            'mobile' => 'required|numeric',
            'email' => 'required|unique:user_lists',
            'jobtitle' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new UserList();
        $user->username = $request->get('username');
        $user->name = $request->get('nameTxt');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->jobtitle = $request->get('jobtitle');
        $user->bio = $request->get('bio');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make($request->get('password'));

    
        $user->save();
        return redirect('/')->with('Saved user')->with('mssg','Added user');
    }

    public function edit($id){
        $user = UserList::find($id);

        return view('edit',[
            'id' => $id,
            'user' => $user,
        ]);
    }

    public function update($id, Request $request){
        $user = UserList::findOrFail($id);
        $input = $request->all();

        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->jobtitle = $request->get('jobtitle');
        $user->bio = $request->get('bio');
        $user->mobile = $request->get('mobile');
    
        $user->save();
        return redirect('/')->with('mssg','Updated user');
    }
}
