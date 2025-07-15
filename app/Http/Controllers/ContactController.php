<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{

public function send(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:100',
        'email' => [
            'required',
            'email',
            'regex:/@(gmail\.com|hotmail\.com|outlook\.com)$/i',
        ],
        'message' => 'required|string|max:1000',
    ]);

    Mail::to('elcele997@gmail.com')->send(new ContactMessage($data));

    return response()->json(['message' => 'Message sent successfully'], 200);
}


}