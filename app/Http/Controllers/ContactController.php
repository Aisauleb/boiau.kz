<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function send(Request $request)
    {
        Mail::raw($request->name . " Оставил заявку. Телефон: " . $request->phone, function ($message) {
            $message->from(env('MAIL_USERNAME', 'no-reply@boiau.kz'), "Boiau.kz");
            $message->to('aisauleb19@gmail.com');
        });

        return redirect()->back();
    }
    public function sendRequest(Request $request)
    {
        Mail::raw($request->name . " Оставил заявку. Почта: " . $request->email . " Предмет обращение: " . $request->subject . " Описание: " . $request->message, function ($message) {
            $message->from(env('MAIL_USERNAME', 'no-reply@boiau.kz'), "Boiau.kz");
            $message->to('aisauleb19@gmail.com');
        });
        return redirect()->back();
    }
}
