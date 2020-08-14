<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'user_name', 'user_image', 'password', 'full_name', 'email', 'mobile'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getAllUsers() {
        return self::select('*')->paginate(config('variable.pagination'));
    }

    static public function getUserByName($username) {
        return self::where('username', $username)->first();
    }

    static public function getUserById($id) {
        return self::find($id);
    }

    public static function deleteUser($id)
    {
        self::find($id)->delete();
    }
}
