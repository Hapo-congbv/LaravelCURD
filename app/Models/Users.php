<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    protected $table = "users";

    public $timestamps = true;

    protected $fillable = [
        'username', 'userImage', 'password', 'fullname', 'email', 'mobile'
    ];

    public static function getUsers() {
        return self::select('*')->paginate(config('variable.pagination'));
    }

    static public function getAllUsers() {
        return self::get();
    }

    static public function getUserByName($username) {
        return self::where('username', $username)->first();
    }

    static public function getUserById($id) {
        return self::where('id', $id)->first();
    }

    public static function AddUser($username, $userImage, $password, $fullname, $email, $mobile) {
        self::insert([
            'username' => $username,
            'userImage' => $userImage,
            'password' => $password,
            'fullname' => $fullname,
            'email' => $email,
            'mobile' => $mobile,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public static function UpdateUser($id, $username, $userImage, $password, $fullname, $email, $mobile) {
        self::where('id', $id)
            ->update([
            'username' => $username,
            'userImage' => $userImage,
            'password' => $password,
            'fullname' => $fullname,
            'email' => $email,
            'mobile' => $mobile,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public static function deleteUser($id)
    {
        self::where('id', $id)->delete();
    }
}
