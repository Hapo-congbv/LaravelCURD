<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersRequestUpdate;
use App\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller {
    public function index() {
        $users = Users::getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.add');
    }

    public function store(UsersRequest $request) {
        $users = new Users();
        $data = $request->all();
        $user_image = null;
        if ($request->hasFile('user_image')) {
            $user_image = uniqid() . "_" . $request->user_image->getClientOriginalName();
            $request->file('user_image')->storeAs('public', $user_image);
            $data['user_image'] = $user_image;
        }

        $users::create($data);
        return redirect()->route('users.index')-> with('message', __('messages.success.create'));
    }

    public function show ($id) {
        $user =  new Users();
        $userId = $user::getUserById($id);
        return view('admin.users.show',compact('userId')); 
    }

    public function edit($id) {
        $users = Users::getUserById($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update($id, UsersRequestUpdate $request) {
        $users = new Users();
        $data = $request->all();
        $user_image = null;
        if ($request->hasFile('user_image')) {
            $user_image = uniqid() . "_" . $request->user_image->getClientOriginalName();
            $request->file('user_image')->storeAs('public', $user_image);
            $image = User::find($id)->user_image;
            Storage::delete('public/' . $image);
            $data['user_image'] = $user_image;
        }

        $users::getUserById($id)->update($data);
        return redirect()->route('users.index')->with('message', __('messages.success.update'));
    }   

    public function destroy($id) {
        $user = new Users();
        $user::deleteUser($id);
        return redirect()->route('users.index')-> with('message', __('messages.success.delete'));
    }
}
