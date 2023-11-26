<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'prefecture' => 'required',
        'level' => 'required',
        'climbing_type' => 'required',
        'introduction' => 'required',
    );
    // News Modelに関連付けを行う
    public function messages()
    {
        return $this->hasMAny(Message::class);
    }
}
