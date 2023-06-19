<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        // Kod obsługi strony głównej
        return view('main');
    }

    public function sendMessage(Request $request)
    {
        // Pobierz dane z formularza
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Zapisz wiadomość w bazie danych
        $newMessage = new Message();
        $newMessage->name = $name;
        $newMessage->email = $email;
        $newMessage->message = $message;
        $newMessage->client_id = Auth::id(); // Przypisz ID klienta
        $newMessage->save();

        return redirect()->back()->with('success', 'Wiadomość została wysłana.');
    }

    public function viewMessage()
    {
        $messages = Message::all();
        return view('messages', ['messages' => $messages]);
    }



    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect()->route('messages')->with('success', 'Wiadomość została usunięta.');
    }
}
