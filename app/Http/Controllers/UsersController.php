<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller {
    public function index() {
        $user =  new Users();
        $users = $user::getUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.add');
    }

    public function store(UsersRequest $request) {
        $user =  new Users();

        $username =  $request->input('username');
        $email = $request->input('email');
        $fullname = $request->input('fullname');
        $mobile =  $request->input('mobile');
        $userImage = $request->file('userImage');
        $password = $request->input('password');
        //user image avatar
        $userImageName = uniqid().'_'. $userImage->getClientOriginalName();
        $userImage->storeAs('public/', $userImageName);
        //
        $user::AddUser($username, $userImageName, $password, $fullname, $email, $mobile);
        return redirect()->route('users.index')-> with('message', __('messages.success.create'));
    }

    public function show ($id) {
        $user =  new Users();
        $userId = $user::getUserById($id);
        return view('admin.users.show',compact('userId')); 
    }

    public function edit($id) {
        $user = new Users();
        $users = $user::getUserById($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update($id, Request $request) {
        $user =  new Users();
        $username =  trim($request->input('username'));
        $email = $request->input('email');
        $fullname = trim($request->input('fullname'));
        $mobile =  $request->input('mobile');
        $userImage = $request->file('userImage');
        $password = $request->input('password');

        //user image avatar
        if ($userImage != null) {
            $userImageName = uniqid() . '_' . $userImage->getClientOriginalName();
            $userImage->storeAs('public/', $userImageName);
            $image =  $user::find($id)->userImage;
            Storage::delete('public/' . $image); 
            $user::UpdateUser($id, $username, $userImageName, $password, $fullname, $email, $mobile);
        } else {
            $user::UpdateU($id, $username, $password, $fullname, $email, $mobile);
        }

        return redirect()->route('users.index')->with('message', __('messages.success.update'));
    }   

    public function destroy($id) {
        $user = new Users();
        $user::deleteUser($id);
        return redirect()->route('users.index')-> with('message', __('messages.success.delete'));
    }
}
