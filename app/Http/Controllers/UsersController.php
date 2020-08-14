<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersRequestUpdate;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller {
    public function index() {
        $users = User::getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.add');
    }

    public function store(UsersRequest $request) {
        $users = new User();
        $data = $request->all();
        $userImage = null;
        if ($request->hasFile('user_image')) {
            $userImage = uniqid() . "_" . $request->user_image->getClientOriginalName();
            $request->file('user_image')->storeAs('public', $userImage);
            $data['user_image'] = $userImage;
        }

        $users::create($data);
        return redirect()->route('users.index')-> with('message', __('messages.success.create'));
    }

    public function show ($id) {
        $user = User::getUserById($id);
        return view('admin.users.show', compact('user')); 
    }

    public function edit($id) {
        $users = User::getUserById($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update($id, UsersRequestUpdate $request) {
        $users = new User();
        $data = $request->all();
        $userImage = null;
        if ($request->hasFile('user_image')) {
            $userImage = uniqid() . "_" . $request->user_image->getClientOriginalName();
            $request->file('user_image')->storeAs('public', $userImage);
            $image = User::find($id)->user_image;
            Storage::delete('public/' . $image);
            $data['user_image'] = $userImage;
        }

        $users::getUserById($id)->update($data);
        return redirect()->route('users.index')->with('message', __('messages.success.update'));
    }   

    public function destroy($id) {
        User::deleteUser($id);
        return redirect()->route('users.index')-> with('message', __('messages.success.delete'));
    }
}
