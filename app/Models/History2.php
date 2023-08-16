<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History2 extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    protected $table = "histories2";

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
}
