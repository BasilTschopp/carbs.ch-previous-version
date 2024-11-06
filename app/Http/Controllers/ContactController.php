<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController {

    public function index() {
        return view('contact/contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'contact-name' => 'required|string|max:255',
            'contact-email' => 'required|email',
            'contact-message' => 'required|string',
        ]);

        // Nachricht senden (Beispiel, hier kann dein Mail-Setup hinzugefügt werden)
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('basil.tschopp@outlook.com')
                 ->from($request->email, $request->name)
                 ->subject('Neue Kontaktanfrage');
        });

        return back()->with('success', 'Vielen Dank für deine Nachricht!');
    }
}
