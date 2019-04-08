<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public static function createMember( $count )
    {
        for( $i=0; $i < $count; $i++ )
        {
            Member::create([
                'name' => 'Ny medlem',
                'id_number' => 'xxxxxx-xxxx',
                'membership' => 'Livstid',
                'start' => date( "Y" ),
            ]);
        }
    }
}
