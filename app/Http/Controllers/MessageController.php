<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function message(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Message::$rules);

        $message = new Message;
        $form = $request->all();
        return redirect('profile/message');
    }
}
