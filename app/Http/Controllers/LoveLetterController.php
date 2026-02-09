<?php

namespace App\Http\Controllers;

use App\Mail\LoveLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoveLetterController extends Controller
{
    public function send(Request $request)
    {
        // For now, we are sending to a hardcoded email or the user's email if provided.
        // The prompt says "sends an 'love letter' email to an email configured using an free mail server".
        // I will assume we are sending TO a specific address, or maybe the user wants to enter an email?
        // "sends an 'love letter' email to an email configured" -> likely a fixed recipient for this "app"
        // or the user sends it to themselves/partner.
        // I'll add a request input for validation just in case, but default to a config/env value if not provided.

        $recipient = config('mail.from.address'); // Default to self for testing/app purposes

        // If the user wants to input an email, we can validate it.
        // $request->validate(['email' => 'email']);
        // $recipient = $request->input('email', $recipient);

        Mail::to('jorrel_95@hotmail.co.uk')->send(new LoveLetter);

        return back()->with('success', 'Love letter sent!');
    }
}
