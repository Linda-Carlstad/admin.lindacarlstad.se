<?php

namespace App;

use Alkhachatryan\LaravelLoggable\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use Loggable;

    protected $table = 'users';

    public function days(){
        return $this->hasMany('App\InitiationDay');
    }

    public function persons(){
        return $this->hasMany('App\InitiationKeyPerson');
    }

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'email' ];

    public static function updateInfo(Admin $admin, Request $request)
    {
        self::validateRequest_update($admin, $request);
        $admin->password = Hash::make($request->new_password);
        $admin->save();
    }

    public static function validateRequest_update(Admin $admin, Request $request)
    {
        $request->validate([
            'password' => [
                'string',
                'required',
                function ($attribute, $value, $fail) use ($admin) {
                    if (!Hash::check($value, $admin->password)) {
                        $fail("Current password must match!");
                    }
                },
            ],
            'new_password' => [
                'string',
                'required',
                'max:64',
                'min:8',
                'different:password',
                'confirmed',
                function ($attribute, $value, $fail) use ($admin) {
                    if (Hash::check($value, $admin->password)) {
                        $fail("New password must be different from the previous one!");
                    }
                },
            ]
        ]);
    }
}
